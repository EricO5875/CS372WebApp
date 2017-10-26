/*

	Select statements to find data

*/

/* Get a list of books that the user has read */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE ISBN IN (SELECT ISBN FROM BOOKSTOUSER_T
			   WHERE USERID = $userID AND Status = 0);

/* Get List of Books that the User is reading */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE ISBN IN (SELECT ISBN FROM BOOKSTOUSER_T
               WHERE USERID = $userID AND Status = 1);

/* Get a list of books that the user wants to read */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE ISBN IN (SELECT ISBN FROM BOOKSTOUSER_T
			   WHERE USERID = $userID AND Status = 2);

/* Gets a list of books with a similar title */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE $title LIKE Title;

/* Gets a list of books from a specific author */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE $author LIKE Author;

/* Finds a book by ISBN number */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE $isbn = ISBN;



/*

	Insert Statements for new data

*/

/* New book that the user wants to read */
INSERT INTO USERTOBOOKS_T(UserID, ISBN, Status, PublicationDate, NotificationDate)
VALUES ($userID, $isbn, $status, $publicationDate, $notificationDate);

/* New book that the user is reading */
INSERT INTO USERTOBOOKS_T(UserID, ISBN, Status, PublicationDate, CurrentProgress)
VALUES ($userID, $isbn, $status, $publicationDate, $currentProgress);

/* New book that the user has read */
INSERT INTO USERTOBOOKS_T(UserID, ISBN, Status, PublicationDate, CurrentProgress)
VALUES ($userID, $isbn, $status, $publicationDate, $rating, $comments);


/*

	Update statements for already existing data

*/

UPDATE BOOKSTOUSER_T
SET NotificationDate = $newDate
WHERE UserID = $userID AND ISBN = $isbn AND status = 0;
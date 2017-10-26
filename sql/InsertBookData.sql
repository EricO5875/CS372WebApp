INSERT INTO USER_T (Username, email, UserPassword)
VALUES ('TESTING', 'MORE TESTING', 'FINAL TESTING');

INSERT INTO BOOKS_T (ISBN, Title, Author, PublicationDate, Edition, Series, NumberInSeries)
Values (9780375826696, 'Eragon', 'Christopher Paolini', '2005-4-26', 'Reprint', 'Inheritance Cycle', 1);
INSERT INTO BOOKS_T (ISBN, Title, Author, PublicationDate, Edition, Series, NumberInSeries)
Values (9780375840401, 'Eldest', 'Christopher Paolini', '2007-3-13', 'Reprint', 'Inheritance Cycle', 2);
INSERT INTO BOOKS_T (ISBN, Title, Author, PublicationDate, Edition, Series, NumberInSeries)
Values (9780375826740, 'Brisingr', 'Christopher Paolini', '2010-4-13', 'Reprint', 'Inheritance Cycle', 3);
INSERT INTO BOOKS_T (ISBN, Title, Author, PublicationDate, Edition, Series, NumberInSeries)
Values (9780375846311, 'Inheritance', 'Christopher Paolini', '2012-8-23', 'Reprint', 'Inheritance Cycle', 4);

/*Inserting Book that has been read */
INSERT INTO BOOKSTOUSER_T (UserID, ISBN, Status, Rating, Comments)
VALUES (10000, 9780375826696, 0, 5, 'Was a good book');

/* Inserting Book that is in progress */
INSERT INTO BOOKSTOUSER_T (UserID, ISBN, Status, CurrentProgress)
VALUES (10000, 9780375840401, 1, 67);
INSERT INTO BOOKSTOUSER_T (UserID, ISBN, Status, CurrentProgress)
VALUES (10000, 9780375846311, 1, 10);

/* Inserting Book that user wants to read */
INSERT INTO BOOKSTOUSER_T (UserID, ISBN, Status, NotificationDate)
VALUES (10000, 9780375826740, 2, '2017-8-7');
DROP TABLE BOOKSTOUSER_T;
DROP TABLE USER_T;
DROP TABLE BOOKS_T;

CREATE TABLE USER_T(
    UserID  INT NOT NULL AUTO_INCREMENT,
    Username VARCHAR(16) NOT NULL,
    UserPassword VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    PRIMARY KEY (UserID)
)

AUTO_INCREMENT = 10000;

CREATE TABLE BOOKS_T(
    ISBN BIGINT NOT NULL,
    Title VARCHAR(50) NOT NULL,
    Author VARCHAR(25) NOT NULL,
    ImagePath VARCHAR(50),
    AverageRating INT,
    PublicationDate DATE,
    Edition VARCHAR(10),
    Series VARCHAR(50),
    NumberInSeries INT,
    Genre VARCHAR(20),
    PRIMARY KEY (ISBN),
    CHECK ((AverageRating >= 0 AND AverageRating <= 5))
)


CREATE TABLE BOOKSTOUSER_T(
    UserID INT NOT NULL,
    ISBN BIGINT NOT NULL,
    Status INT NOT NULL,
    PublicationDate DATE,
    Rating INT,                     /* 0 = Have Finished, 1 = In Progress, 2 = Wants to Read */
    Comments VARCHAR(250),
    NotificationDate DATE,
    CurrentProgress INT,             /* As a percentage */
    PRIMARY KEY (UserID, ISBN),
    FOREIGN KEY (UserID) REFERENCES USER_T(UserID) ON DELETE CASCADE,
    FOREIGN KEY (ISBN) REFERENCES BOOKS_T(ISBN) ON DELETE CASCADE,
    CHECK ((Rating >= 0 AND Rating <= 5)),
    CHECK ((CurrentProgress >=0 AND CurrentProgress <= 100))
)

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

/* Get List of Books that the User is reading */
SELECT Title, Author, Series, NumberInSeries FROM BOOKS_T
WHERE ISBN IN (SELECT ISBN FROM BOOKSTOUSER_T
               WHERE USERID = 10000 AND Status = 1);


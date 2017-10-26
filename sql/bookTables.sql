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
);


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
);

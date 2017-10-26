DROP TABLE MOVIESTOUSER_T;
DROP TABLE MOVIES_T;

CREATE TABLE MOVIES_T(
    Title VARCHAR(50) NOT NULL,
    YearOfRelease INT NOT NULL,
    ImagePath VARCHAR(50),
    AverageRating INT,
    PublicationDate DATE,
    Series VARCHAR(50),
    NumberInSeries INT,
    Genre VARCHAR(20),
    PRIMARY KEY (Title, YearOfRelease),
    CHECK ((AverageRating >= 0 AND AverageRating <= 5))
);

CREATE TABLE MOVIESTOUSER_T(
    UserID INT NOT NULL,
    Title VARCHAR(50) NOT NULL,
    YearOfRelease INT NOT NULL,
    Status INT NOT NULL,
    PublicationDate DATE,
    Rating INT,                     /* 0 = Have Finished, 1 = In Progress, 2 = Wants to Watch */
    Comments VARCHAR(250),
    NotificationDate DATE,
    CurrentProgress INT,             /* As a percentage */
    PRIMARY KEY (UserID, Title, YearOfRelease),
    FOREIGN KEY (UserID) REFERENCES USER_T(UserID),
    FOREIGN KEY (Title, YearOfRelease) REFERENCES MOVIES_T(Title, YearOfRelease),
    CHECK ((Rating >= 0 AND Rating <= 5)),
    CHECK ((CurrentProgress >=0 AND CurrentProgress <= 100))
);
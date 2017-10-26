DROP TABLE EPISODES_T;
DROP TABLE SEASONS_T;
DROP TABLE SHOWSTOUSER_T;
DROP TABLE SHOWS_T;

CREATE TABLE SHOWS_T(
    Title VARCHAR(50) NOT NULL,
    YearOfRelease INT NOT NULL,
    ImagePath VARCHAR(50),
    AverageRating INT,
    PublicationDate DATE,
    Series VARCHAR(50),
    NumberOfSeasons INT,
    Genre VARCHAR(20),
    PRIMARY KEY (Title, YearOfRelease),
    CHECK ((AverageRating >= 0 AND AverageRating <= 5))
);

CREATE TABLE SHOWSTOUSER_T(
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
    FOREIGN KEY (Title, YearOfRelease) REFERENCES SHOWS_T(Title, YearOfRelease),
    CHECK ((Rating >= 0 AND Rating <= 5)),
    CHECK ((CurrentProgress >=0 AND CurrentProgress <= 100))
);

CREATE TABLE SEASONS_T(
	Title VARCHAR(50) NOT NULL,
    YearOfRelease INT NOT NULL,
    SeasonNumber INT NOT NULL,
    NumberOfEpisodes INT,
    PRIMARY KEY (Title, YearOfRelease, SeasonNumber),
    FOREIGN KEY (Title, YearOfRelease) REFERENCES SHOWS_T(Title, YearOfRelease)
);

CREATE TABLE EPISODES_T(
	Title VARCHAR(50) NOT NULL,
    YearOfRelease INT NOT NULL,
    SeasonNumber INT NOT NULL,
	EpisodeNumber INT,
    EpisodeTitle VARCHAR(50),
    PRIMARY KEY (Title, YearOfRelease, SeasonNumber, EpisodeNumber),
    FOREIGN KEY (Title, YearOfRelease, SeasonNumber) REFERENCES SEASONS_T(Title, YearOFRelease, SeasonNumber)
);
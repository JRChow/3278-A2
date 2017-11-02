CREATE TABLE Teams (
	teamID int(12),
	name varchar(64),
	stadiumID int(12),
	PRIMARY KEY (teamID),
	FOREIGN KEY (stadiumID) REFERENCES Stadiums(stadiumID)
);

CREATE TABLE Stadiums (
	stadiumID int(12),
	name varchar(64),
	location varchar(64),
	PRIMARY KEY (stadiumID)
);

CREATE TABLE Players (
	playerID int(12),
	teamID int(12),
	name varchar(64),
	PRIMARY KEY (playerID, teamID),
	FOREIGN KEY (teamID) REFERENCES Teams(teamID)
);

CREATE TABLE Matches (
	matchID int(12),
	date DATE,
	stadiumID int(12),
	parentMatch int(12),
	PRIMARY KEY (matchID),
	FOREIGN KEY (stadiumID) REFERENCES Stadiums(stadiumID),
	FOREIGN KEY (parentMatch) REFERENCES Matches(matchID)
);

CREATE TABLE Play (
	playerID int(12),
	teamID int(12),
	matchID int(12),
	numberOfGoals int(12),
	PRIMARY KEY (playerID, teamID, matchID),
	FOREIGN KEY (playerID, teamID) REFERENCES Players(playerID, teamID),
	FOREIGN KEY (matchID) REFERENCES Matches(matchID)
);

CREATE TABLE Participate(
	teamID int(12),
	matchID int(12),
	role ENUM('host', 'guest'),
	PRIMARY KEY (teamID, matchID),
	FOREIGN KEY (teamID) REFERENCES Teams(teamID),
	FOREIGN KEY (matchID) REFERENCES Matches(matchID)
);
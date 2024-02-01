DROP TABLE myUser CASCADE CONSTRAINTS;
DROP TABLE Recruiter CASCADE CONSTRAINTS;
DROP TABLE JobSeeker CASCADE CONSTRAINTS;
DROP TABLE Company CASCADE CONSTRAINTS;
DROP TABLE CompanyLocation CASCADE CONSTRAINTS;
DROP TABLE Interviews CASCADE CONSTRAINTS;
DROP TABLE JobListing CASCADE CONSTRAINTS;
DROP TABLE JobApplications CASCADE CONSTRAINTS;
DROP TABLE SavedJobs CASCADE CONSTRAINTS;
DROP TABLE JobMode CASCADE CONSTRAINTS;
DROP TABLE Attains CASCADE CONSTRAINTS;
DROP TABLE AssociatedWith CASCADE CONSTRAINTS;
DROP TABLE FilterWith CASCADE CONSTRAINTS;

CREATE TABLE myUser (
UserID	INTEGER,
UserName	VARCHAR(255),
UserPassword	VARCHAR(255),
Education	VARCHAR(255),
PRIMARY KEY(UserID)
);

CREATE TABLE Company (
CompanyID	    INTEGER,
CompanyName VARCHAR(255),
PRIMARY KEY(CompanyID)
 );

CREATE TABLE Recruiter (
RecruiterName        VARCHAR(255),
UserID	            INTEGER,
CompanyID      	INTEGER,
PRIMARY KEY(UserID),
FOREIGN KEY(UserID)
	REFERENCES myUser(UserID)
		ON DELETE CASCADE,
FOREIGN KEY(CompanyID)
	REFERENCES Company(CompanyID)
		ON DELETE CASCADE
);

CREATE TABLE JobSeeker (
JobSeekerName	VARCHAR(255),
UserID	            INTEGER,
PRIMARY KEY (UserID),
FOREIGN KEY(UserID)
	REFERENCES myUser(UserID)
		ON DELETE CASCADE
);


CREATE TABLE CompanyLocation (
City	            VARCHAR(255),
Province	VARCHAR(255),
PostalCode	VARCHAR(255),
Country	VARCHAR(255),
PRIMARY KEY (City, Province, PostalCode)
);

CREATE TABLE Interviews (
InterviewID	           INTEGER,
InterviewMode	VARCHAR(255),
UserID	            INTEGER	NOT NULL,
CompanyID	            INTEGER	NOT NULL,
PRIMARY KEY(InterviewID),
FOREIGN KEY(UserID)
	REFERENCES myUser(UserID)
		ON DELETE CASCADE,
FOREIGN KEY(CompanyID)
	REFERENCES Company(CompanyID)
		ON DELETE CASCADE
);

CREATE TABLE JobListing (
JobID	                        INTEGER,
Requirements	VARCHAR(255),
Position	            VARCHAR(255),
UserID	             INTEGER	NOT NULL,
CompanyID	             INTEGER	NOT NULL,
PRIMARY KEY(JobID),
FOREIGN KEY(UserID)
	REFERENCES myUser(UserID)
		ON DELETE CASCADE,
FOREIGN KEY(CompanyID)
	REFERENCES Company(CompanyID)
		ON DELETE CASCADE
);

CREATE TABLE JobApplications (
ApplicationID	            INTEGER,
JobID		                       INTEGER,
CoverLetterUploaded	CHAR(1),
ResumeUploaded		CHAR(1),
ApplicationDate	DATE,
ApplicantName	VARCHAR(255),
ApplicationStatus	CHAR(8),
PRIMARY KEY (ApplicationID, JobID),
FOREIGN KEY(JobID)
	REFERENCES JobListing(JobID)
		ON DELETE CASCADE
);

CREATE TABLE SavedJobs(
SavedJobNumber		INTEGER,
SavedDate		DATE,
UserID	            INTEGER	NOT NULL,
PRIMARY KEY(SavedJobNumber),
FOREIGN KEY(UserID)
	REFERENCES myUser(UserID)
		ON DELETE CASCADE
);

CREATE TABLE JobMode (
    ModeName VARCHAR(255),
    WorkingHours INTEGER,
    PRIMARY KEY(ModeName)
);

CREATE TABLE Attains (
    UserID INTEGER,
    ApplicationID INTEGER,
    JobID INTEGER,
    PRIMARY KEY (UserID, ApplicationID, JobID),
    FOREIGN KEY (UserID) REFERENCES myUser(UserID) ON DELETE CASCADE,
    FOREIGN KEY (ApplicationID, JobID) REFERENCES JobApplications(ApplicationID, JobID) ON DELETE CASCADE
);

CREATE TABLE AssociatedWith (
InterviewID	         INTEGER,
JobID	             INTEGER,
PRIMARY KEY (InterviewID, JobID),
FOREIGN KEY(InterviewID)
	REFERENCES Interviews(InterviewID)
		ON DELETE CASCADE,
FOREIGN KEY(JobID)
	REFERENCES JobListing(JobID)
		ON DELETE CASCADE
);

CREATE TABLE FilterWith (
SavedJobNumber	              INTEGER,
JobID		                INTEGER,
PRIMARY KEY (SavedJobNumber, JobID),
FOREIGN KEY(SavedJobNumber)
	REFERENCES SavedJobs(SavedJobNumber)
		ON DELETE CASCADE,
FOREIGN KEY(JobID)
	REFERENCES JobListing(JobID)
		ON DELETE CASCADE
);
DROP TABLE myUser CASCADE CONSTRAINTS;
DROP TABLE Company CASCADE CONSTRAINTS;
DROP TABLE Recruiter CASCADE CONSTRAINTS;
DROP TABLE JobSeeker CASCADE CONSTRAINTS;
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
FOREIGN KEY(UserID) REFERENCES myUser(UserID) ON DELETE CASCADE,
FOREIGN KEY(CompanyID) REFERENCES Company(CompanyID) ON DELETE CASCADE
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
FOREIGN KEY(UserID) REFERENCES myUser(UserID) ON DELETE CASCADE,
FOREIGN KEY(CompanyID) REFERENCES Company(CompanyID) ON DELETE CASCADE
);

CREATE TABLE JobListing (
JobID	        INTEGER,
Requirements	VARCHAR(255),
Position	            VARCHAR(255),
UserID	             INTEGER	NOT NULL,
CompanyID	             INTEGER	NOT NULL,
PRIMARY KEY(JobID),
FOREIGN KEY(UserID) REFERENCES myUser(UserID) ON DELETE CASCADE,
FOREIGN KEY(CompanyID) REFERENCES Company(CompanyID) ON DELETE CASCADE
);

CREATE TABLE JobApplications (
ApplicationID	      INTEGER,
JobID		          INTEGER,
CoverLetterUploaded	CHAR(1),
ResumeUploaded		CHAR(1),
ApplicationDate	DATE,
ApplicantName	VARCHAR(255),
ApplicationStatus	CHAR(8),
PRIMARY KEY (ApplicationID, JobID),
FOREIGN KEY(JobID) REFERENCES JobListing(JobID) ON DELETE CASCADE
);

CREATE TABLE SavedJobs(
SavedJobNumber		INTEGER,
SavedDate		DATE,
UserID	            INTEGER	NOT NULL,
PRIMARY KEY(SavedJobNumber),
FOREIGN KEY(UserID) REFERENCES myUser(UserID) ON DELETE CASCADE
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
FOREIGN KEY(InterviewID) REFERENCES Interviews(InterviewID) ON DELETE CASCADE,
FOREIGN KEY(JobID) REFERENCES JobListing(JobID) ON DELETE CASCADE
);

CREATE TABLE FilterWith (
SavedJobNumber	              INTEGER,
JobID		                INTEGER,
PRIMARY KEY (SavedJobNumber, JobID),
FOREIGN KEY(SavedJobNumber) REFERENCES SavedJobs(SavedJobNumber) ON DELETE CASCADE,
FOREIGN KEY(JobID) REFERENCES JobListing(JobID) ON DELETE CASCADE
);


INSERT INTO myUser
VALUES(12345, 'Adam Troy', 'adam123', 'BSc. in Computer Science');
INSERT INTO myUser 
VALUES(10201, 'Max Tan', 'maxxi', 'BSc. in Statistics');
INSERT INTO myUser
VALUES(20190, 'Kate Menon', 'km567', 'BSc. in Mathematics');
INSERT INTO myUser
VALUES(11111, 'Nathon Karl', 'kl1234', 'BSc. in Biology');
INSERT INTO myUser
VALUES(90123, 'John Miller', 'john312', 'BSc. in Computer Science');

INSERT INTO Company
VALUES(90410, 'Apple');
INSERT INTO Company
VALUES(32130, 'Tesla');
INSERT INTO Company
VALUES(80801, 'Microsoft');
INSERT INTO Company
VALUES(41029, 'IBM');
INSERT INTO Company
VALUES(50192, 'Facebook');

INSERT INTO Recruiter
VALUES('Edward Kim', 12345, 90410);
INSERT INTO Recruiter
VALUES('Dr. Saint Lauraine', 10201, 32130);
INSERT INTO Recruiter
VALUES('Jason Seo', 20190, 80801);
INSERT INTO Recruiter
VALUES('Katy Leo', 11111, 41029);
INSERT INTO Recruiter
VALUES('Pamela Ellis', 90123, 50192);

INSERT INTO JobSeeker
VALUES('Adam Troy', 12345);
INSERT INTO JobSeeker
VALUES('Max Tan', 10201);
INSERT INTO JobSeeker
VALUES('Kate Menon', 20190);
INSERT INTO JobSeeker
VALUES('Nathon Karl', 11111);
INSERT INTO JobSeeker
VALUES('John Miller', 90123);

INSERT INTO CompanyLocation
VALUES('Toronto', 'Ontario',  'M5J 0A8', 'Canada');
INSERT INTO CompanyLocation
VALUES('Richmond', 'British Columbia', 'V6X 1S1', 'Canada');
INSERT INTO CompanyLocation
VALUES('Vancouver', 'British Columbia', 'V6B 1C1', 'Canada');
INSERT INTO CompanyLocation
VALUES('Toronto', 'Ontario', 'M5J 0E7', 'Canada');
INSERT INTO CompanyLocation
VALUES('Toronto', 'Ontario', 'M4P 1E4', 'Canada');

INSERT INTO Interviews
VALUES(10203, ' Online', 12345, 90410);
INSERT INTO Interviews
VALUES(10902, ' Online', 10201, 32130);
INSERT INTO Interviews
VALUES(20304, ' In-Person', 20190, 80801);
INSERT INTO Interviews
VALUES(40506, ' In-Person', 11111, 41029);
INSERT INTO Interviews
VALUES(60060, ' Online', 90123, 50192);

INSERT INTO JobListing
VALUES(55555, 'Bsc. in Computer Science', 'Software Developer', 
12345, 90410);
INSERT INTO JobListing
VALUES(54545, 'Bsc. in Mathematics', 'Mathematician', 10201,
 32130);
INSERT INTO JobListing
VALUES(67676, 'Bsc. in Computer Science', 'Front End Developer', 
20190, 80801);
INSERT INTO JobListing
VALUES(78651, 'Bsc. in Statistics', 'Data Analyst', 11111, 41029);
INSERT INTO JobListing
VALUES(30456, 'Bsc. in Biology', 'Research Assistant', 90123, 50192);

INSERT INTO JobApplications
VALUES(10921, 55555, 'T', 'T', TO_DATE('2023-09-10', 'YYYY-MM-DD'), 'Adam Troy', 'Accepted');
INSERT INTO JobApplications
VALUES(20891, 54545, 'F', 'T', TO_DATE('2023-09-25', 'YYYY-MM-DD'), 'Max Tan', 'Rejected');
INSERT INTO JobApplications
VALUES(80801, 67676, 'T', 'T', TO_DATE('2023-10-01', 'YYYY-MM-DD'), 'Kate Menon', 'Accepted');
INSERT INTO JobApplications
VALUES(30121, 78651, 'F', 'F', TO_DATE('2023-10-08', 'YYYY-MM-DD'), 'Nathon Karl', 'Pending');
INSERT INTO JobApplications
VALUES(16080, 30456, 'T', 'T', TO_DATE('2023-10-10', 'YYYY-MM-DD'), 'John Miller', 'Accepted');

INSERT INTO SavedJobs
VALUES(1,  TO_DATE('2023-09-01', 'YYYY-MM-DD'), 12345);
INSERT INTO SavedJobs
VALUES(2, TO_DATE('2023-09-03', 'YYYY-MM-DD'), 10201);
INSERT INTO SavedJobs
VALUES(3, TO_DATE('2023-09-05', 'YYYY-MM-DD'), 20190);
INSERT INTO SavedJobs
VALUES(4, TO_DATE('2023-10-05', 'YYYY-MM-DD'), 11111);
INSERT INTO SavedJobs
VALUES(5, TO_DATE('2023-10-10', 'YYYY-MM-DD'), 90123);

INSERT INTO JobMode
VALUES('Hybrid', 35);
INSERT INTO JobMode
VALUES('In-Person', 35);
INSERT INTO JobMode
VALUES('Online', 40);

INSERT INTO Attains
VALUES(12345, 10921, 55555);
INSERT INTO Attains
VALUES(10201, 20891, 54545);
INSERT INTO Attains
VALUES(20190, 80801, 67676);
INSERT INTO Attains
VALUES(11111, 30121, 78651);
INSERT INTO Attains
VALUES(90123, 16080, 30456);

INSERT INTO AssociatedWith
VALUES(10203, 55555);
INSERT INTO AssociatedWith
VALUES(10902, 54545);
INSERT INTO AssociatedWith
VALUES(20304, 67676);
INSERT INTO AssociatedWith
VALUES(40506, 78651);
INSERT INTO AssociatedWith
VALUES(60060, 30456);

INSERT INTO FilterWith
VALUES(1, 55555);
INSERT INTO FilterWith
VALUES(2, 54545);
INSERT INTO FilterWith
VALUES(3, 67676);
INSERT INTO FilterWith
VALUES(4, 78651);
INSERT INTO FilterWith
VALUES(5, 30456);
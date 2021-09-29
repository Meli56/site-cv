/*
Le Nours Antoine
Carn Yohan
Script de création de table
*/

--We drop the tables to avoid problems when we modify the database / tables
DROP TABLE users;
DROP TABLE data;
DROP TABLE activity;

-- Create the users table
CREATE TABLE users (
    
    mail text CHECK (mail LIKE '%@%.%') PRIMARY KEY ,
    lname text NOT NULL ,
    fname text NOT NULL ,
    birthDate text NOT NULL CHECK (birthDate LIKE '%/%/%'),
    gender text NOT NULL,
    height integer NOT NULL CHECK (height >= 0 AND height <= 280),   
    weight integer NOT NULL,
    password text NOT NULL
);

--Create the activity table
CREATE TABLE activity (
    idActivity integer PRIMARY KEY,
    dateActivity text NOT NULL CHECK (dateActivity LIKE '%/%/%'),    
    description text NOT NULL ,
    start text NOT NULL CHECK (start LIKE '%:%:%'),
    duration integer NOT NULL CHECK (duration >= 0),
    distance integer NOT NULL CHECK (distance >= 0),
    maxFrequency integer,
    minFrequency integer,
    moyFrequency integer,
    athlete integer REFERENCES users(mail)
);

-- Create the dat table
CREATE TABLE data(
    idData integer PRIMARY KEY,
    activityTime text NOT NULL,
    cardioFrequency integer NOT NULL,
    latitude real NOT NULL,
    longitude real NOT NULL,
    altitude real NOT NULL,
    theActivity  integer REFERENCES activity(idActivity)
);

-- Creation du trigger
CREATE TRIGGER IF NOT EXISTS trig_VerifCardioFreq
BEFORE INSERT ON Activity
BEGIN
    SELECT CASE
    WHEN NEW.minFrequency > NEW.moyFrequency THEN
        RAISE(ABORT, 'Error: The minimum heart frequency is greater than the avergage frequency !')
    END;

    SELECT CASE
    WHEN NEW.maxFrequency < NEW.moyFrequency THEN
        RAISE(ABORT, 'Error: The maximun heart frequency is lower than the avergage frequency !')
    END;

END;

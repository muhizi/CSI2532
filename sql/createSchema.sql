DROP SCHEMA IF EXISTS Pharmacy CASCADE;
CREATE SCHEMA Pharmacy;

SET search_path = Pharmacy;

CREATE TABLE Secretary (
    id SERIAL PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    tel VARCHAR(255) NOT NULL
);

CREATE TABLE Doctor (
    id SERIAL PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    tel VARCHAR(255) NOT NULL,
    specialty VARCHAR(255),
    secretary INTEGER REFERENCES Secretary ON DELETE SET NULL
);

CREATE TABLE Patient (
    id SERIAL PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    birthDate DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    tel VARCHAR(255) NOT NULL,
    sex CHAR(1) NOT NULL,
    CONSTRAINT checkSex CHECK (sex = 'M' OR sex = 'F'),
    ssn VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE Appointment (
    id SERIAL PRIMARY KEY,
    date TIMESTAMP NOT NULL,
    endDate TIMESTAMP NOT NULL,
    remarks TEXT,
    patient INTEGER REFERENCES Patient NOT NULL,
    doctor INTEGER REFERENCES Doctor NOT NULL,
    CHECK (date < endDate)
);

CREATE TABLE Drug (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price NUMERIC(11, 2) NOT NULL,
    substance VARCHAR(255) NOT NULL,
    generic BOOLEAN NOT NULL
);

CREATE TABLE DrugScript (
    id SERIAL PRIMARY KEY,
    drug INTEGER REFERENCES Drug NOT NULL,
    doctor INTEGER REFERENCES Doctor NOT NULL, -- replace with appointment
    patient INTEGER REFERENCES Patient NOT NULL,
    date DATE NOT NULL,
    validDays INTEGER
);

CREATE TABLE ProcScript (
    id SERIAL PRIMARY KEY,
    procName VARCHAR(255) NOT NULL,
    doctor INTEGER REFERENCES Doctor NOT NULL,
    patient INTEGER REFERENCES Patient NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE DrugConflict (
    id SERIAL PRIMARY KEY,
    substance1 VARCHAR(255) NOT NULL,
    substance2 VARCHAR(255) NOT NULL
);

CREATE TABLE Pathology (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE DrugPathologyConflict (
    id SERIAL PRIMARY KEY,
    substance VARCHAR(255) NOT NULL,
    pathology INTEGER REFERENCES Pathology NOT NULL
);

CREATE TABLE PatientPathology (
    id SERIAL PRIMARY KEY,
    patient INTEGER REFERENCES Patient NOT NULL,
    pathology INTEGER REFERENCES Pathology NOT NULL
);

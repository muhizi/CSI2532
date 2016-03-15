DROP SCHEMA IF EXISTS Pharmacy CASCADE;
CREATE SCHEMA Pharmacy;

SET search_path = Pharmacy;

CREATE TABLE Doctor (
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    tel VARCHAR(255) NOT NULL,
    specialty VARCHAR(255),
    id SERIAL PRIMARY KEY
);

CREATE TABLE Patient (
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    birthDate DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    tel VARCHAR(255) NOT NULL,
    sex CHAR(1) NOT NULL,
    CONSTRAINT checkSex CHECK (sex = 'M' OR sex = 'F'),
    ssn VARCHAR(255) UNIQUE NOT NULL,
    id SERIAL PRIMARY KEY
);

CREATE TABLE Appointment (
    date TIMESTAMP NOT NULL,
    endDate TIMESTAMP NOT NULL,
    remarks TEXT,
    patient INTEGER REFERENCES Patient NOT NULL,
    doctor INTEGER REFERENCES Doctor NOT NULL,
    id SERIAL PRIMARY KEY,
    CHECK date < endDate
);

CREATE TABLE Drug (
    name VARCHAR(255) NOT NULL,
    price NUMERIC(11, 2) NOT NULL,
    substance VARCHAR(255) NOT NULL,
    generic BOOLEAN NOT NULL,
    id SERIAL PRIMARY KEY
);

CREATE TABLE DrugScript (
    drug INTEGER REFERENCES Drug NOT NULL,
    doctor INTEGER REFERENCES Doctor NOT NULL,
    patient INTEGER REFERENCES Patient NOT NULL,
    date DATE NOT NULL,
    dateFulfilled DATE,
    endValidDate DATE NOT NULL,
    id SERIAL PRIMARY KEY
);

CREATE TABLE ProcScript (
    procName VARCHAR(255) NOT NULL,
    doctor INTEGER REFERENCES Doctor NOT NULL,
    patient INTEGER REFERENCES Patient NOT NULL,
    date DATE NOT NULL,
    dateFulfilled DATE,
    id SERIAL PRIMARY KEY
);

CREATE TABLE DrugConflict (
    substance1 VARCHAR(255) NOT NULL,
    substance2 VARCHAR(255) NOT NULL,
    id SERIAL PRIMARY KEY
);

CREATE TABLE Pathology (
    name VARCHAR(255) NOT NULL,
    id SERIAL PRIMARY KEY
);

CREATE TABLE DrugPathologyConflict (
    substance VARCHAR(255) NOT NULL,
    pathology INTEGER REFERENCES Pathology NOT NULL,
    id SERIAL PRIMARY KEY
);

CREATE TABLE PatientPathology (
    patient INTEGER REFERENCES Patient NOT NULL,
    pathology INTEGER REFERENCES Pathology NOT NULL,
    id SERIAL PRIMARY KEY
);

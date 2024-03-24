-- Lucas Yanetsko IT 4400
-- Demographics Script
-- This script will create a table for demographics and insert data into the table
-- There are also corresponding queries in that will: 
-- A list of all records sorted by country name
-- The country with the highest population
-- The country with the lowest population
-- Countries that share a common language, such as French 

-- Create the Database + Table with fields: country, primary language, and population
CREATE DATABASE IF NOT EXISTS demographics_database;

USE demographics_database;

CREATE TABLE IF NOT EXISTS demographics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(100) NOT NULL,
    primary_language VARCHAR(100) NOT NULL,
    population INT NOT NULL
);
-- Enter records for at least 10 countries:

USE demographics_database;

INSERT INTO demographics (country, primary_language, population) VALUES
('United States', 'English', 334000000),
('China', 'Mandarin', 1442000000),
('India', 'Hindi', 1408000000),
('Brazil', 'Portuguese', 216000000),
('Russia', 'Russian', 143000000),
('Indonesia', 'Indonesian', 273000000),
('Pakistan', 'Urdu', 231000000),
('Nigeria', 'English', 213000000),
('Bangladesh', 'Bengali', 169000000),
('Mexico', 'Spanish', 126700000);

-- Query 1: A list of all records sorted by country name
USE demographics_database;

SELECT * FROM demographics
ORDER BY country ASC;

-- Query 2: The country with the highest population
USE demographics_database;

SELECT country, population FROM demographics
ORDER BY population DESC
LIMIT 1;

-- Query 3: The country with the lowest population
USE demographics_database;

SELECT country, population FROM demographics
ORDER BY population ASC
LIMIT 1;


-- Query 4: Countries that share a common language, such as French
USE demographics_database;

SELECT country, primary_language FROM demographics 
WHERE primary_language = 'English'; 




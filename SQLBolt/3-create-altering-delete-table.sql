-- ///////////////////////////////////////////////////////////////////////////////////////////////
--                             SQL Lesson 16: Creating tables
-- ///////////////////////////////////////////////////////////////////////////////////////////////

SELECT * FROM database;


-- 1. Create a new table named Database with the following columns:
--    – Name A string (text) describing the name of the database
--    – Version A number (floating point) of the latest version of this database
--    – Download_count An integer count of the number of times this database was downloaded
--    This table has no constraints.

CREATE TABLE Database (
    Name TEXT,
    Version FLOAT,
    Download_count INTEGER
);




-- ///////////////////////////////////////////////////////////////////////////////////////////////
--                             SQL Lesson 17: Altering tables
-- ///////////////////////////////////////////////////////////////////////////////////////////////

SELECT * FROM movies;

-- 1. Add a column named Aspect_ratio with a FLOAT data type 
--    to store the aspect-ratio each movie was released in.
ALTER TABLE movies
ADD Aspect_ratio FLOAT;

-- 2. Add another column named Language with a TEXT data type 
--    to store the language that the movie was released in. 
--    Ensure that the default for this language is English.
ALTER TABLE movies
ADD Language TEXT
    DEFAULT 'English';




-- ///////////////////////////////////////////////////////////////////////////////////////////////
--                             SQL Lesson 18: Dropping tables
-- ///////////////////////////////////////////////////////////////////////////////////////////////

SELECT * FROM movies

-- 1. We've sadly reached the end of our lessons, lets clean up by removing the Movies table
DROP TABLE IF EXISTS movies;

-- 2. And drop the BoxOffice table as well
DROP TABLE IF EXISTS boxoffice;


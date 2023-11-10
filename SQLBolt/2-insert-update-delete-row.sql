-- ///////////////////////////////////////////////////////////////////////////////////////////////
--                             SQL Lesson 13: Inserting rows
-- ///////////////////////////////////////////////////////////////////////////////////////////////

SELECT * FROM movies;

-- 1. Add the studio's new production, Toy Story 4 to the list of movies (you can use any director)
INSERT INTO movies 
VALUES (4, 'Toy Story 4', 'John Lasseter', 2023, 100);

-- 2. Toy Story 4 has been released to critical acclaim! It had a rating of 8.7, 
--    and made 340 million domestically and 270 million internationally. 
--    Add the record to the BoxOffice table.
INSERT INTO boxoffice
VALUES (4, 8.7, 340 * 1000000, 270 * 1000000);




-- ///////////////////////////////////////////////////////////////////////////////////////////////
--                             SQL Lesson 14: Updating rows
-- ///////////////////////////////////////////////////////////////////////////////////////////////

SELECT * FROM movies;

-- 1. The director for A Bug's Life is incorrect, it was actually directed by John Lasseter
SELECT * FROM movies
WHERE title = "A Bug's Life";

UPDATE movies
SET director = 'John Lasseter'
WHERE title = "A Bug's Life";

-- 2. The year that Toy Story 2 was released is incorrect, it was actually released in 1999
SELECT * FROM movies
WHERE title = "Toy Story 2";

UPDATE movies
SET year = 1999
WHERE title = "Toy Story 2";

-- 3. Both the title and director for Toy Story 8 is incorrect! The title should be "Toy Story 3" 
--    and it was directed by Lee Unkrich
SELECT * FROM movies
WHERE title = "Toy Story 8";

UPDATE movies
SET title = "Toy Story 3",
    director = "Lee Unkrich"
WHERE title = "Toy Story 8";




-- ///////////////////////////////////////////////////////////////////////////////////////////////
--                             SQL Lesson 15: Deleting rows
-- ///////////////////////////////////////////////////////////////////////////////////////////////

SELECT * FROM movies;

-- 1. This database is getting too big, lets remove all movies that were released before 2005.
SELECT * FROM movies
WHERE year < 2005;

DELETE FROM movies
WHERE year < 2005;

-- 2. Andrew Stanton has also left the studio, so please remove all movies directed by him.
SELECT * FROM movies
WHERE director LIKE 'Andrew Stanton';

DELETE FROM movies
WHERE director LIKE 'Andrew Stanton';





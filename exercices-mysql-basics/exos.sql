-- Affiche toutes les données.
SELECT * FROM school
LEFT JOIN students
    ON school.idschool = students.school
ORDER BY students.school ASC;

-- Affiche uniquement les prénoms.
SELECT prenom FROM students;

-- Affiche les prénoms, les dates de naissance et l’école de chacun.
SELECT prenom, datenaissance, school FROM students;

-- Affiche uniquement les élèves qui sont de sexe féminin.
SELECT prenom, nom, genre 
FROM students
WHERE genre LIKE 'F';

-- Affiche uniquement les élèves qui font partie de l’école d'Addy.
SELECT * FROM students
WHERE school=(SELECT school FROM students WHERE nom='Addy');

-- Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet (DESC). Ensuite, la même chose mais en limitant les résultats à 2.
SELECT prenom FROM students
ORDER BY prenom DESC
LIMIT 2;

-- Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles, toujours en SQL.
INSERT INTO students (prenom, nom, datenaissance, genre, school)
VALUES ('Ginette', 'Dalor', '1930-01-01', 'F', 1);

SELECT * FROM students WHERE prenom='Ginette';

-- Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”.
SELECT * FROM students WHERE nom='Dalor';

UPDATE students
SET prenom='Omer',
    genre='M'
WHERE nom='Dalor';


-- Supprimer la personne dont l’ID est 3.
SELECT * FROM students;
SELECT * FROM students WHERE idStudent=3;

DELETE FROM students WHERE idStudent=3; 
SELECT * FROM students;

-- Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Liege" et "2" soit remplacé par "Gent". (attention au type de la colonne !)

-- en deux requêtes
SELECT * FROM school;

UPDATE school
SET school = "Liege"
WHERE idschool = 1;

UPDATE school
SET school = "Gent"
WHERE idschool = 2;

SELECT * FROM school;

--  en une seule requête
SELECT * FROM school;

UPDATE school
SET school = CASE
    WHEN idschool = 1 THEN 'Liege'
    WHEN idschool = 2 THEN 'Gent'
    -- Ajoutez d'autres conditions WHEN au besoin
    ELSE school -- Si vous avez d'autres cas, vous pouvez ajouter une condition par défaut
END;

SELECT * FROM school;


-- revenir aux valeurs du début
SELECT * FROM school;

UPDATE school
SET school = CASE
    WHEN idschool = 1 THEN 'Bruxelles'
    WHEN idschool = 2 THEN 'Charleroi'
    ELSE school
END;

SELECT * FROM school;


-- fonction GROUP_CONCAT()
SELECT school, GROUP_CONCAT(prenom SEPARATOR ', ') AS students_list
FROM students
GROUP BY school;
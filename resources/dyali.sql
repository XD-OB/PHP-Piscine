CREATE DATABASE db_obelouch;
USE db_obelouch;
source ~/Desktop/base-student.sql;
CREATE TABLE ft_table (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(8) NOT NULL DEFAULT 'toto',
	`group` ENUM ('staff', 'student', 'other') NOT NULL,
	`creation_date` DATE NOT NULL,
	PRIMARY KEY (id)
);INSERT INTO ft_table (`login`, `group`, `creation_date`)
VALUES ('loki', 'staff', '2013-05-01'),
	('scadoux', 'student', '2014-01-01'),
	('chap', 'staff', '2011-04-27'),
	('bambou', 'staff', '2014-03-01'),
	('fantomet', 'staff', '2010-04-03');INSERT INTO ft_table (`login`, `group`, `creation_date`)
SELECT `last_name`, 'other', `birthdate`
FROM user_card
WHERE (last_name LIKE '%a%')AND LENGTH(last_name) < 9
ORDER BY last_name ASC LIMIT 10;
UPDATE ft_table
SET creation_date = DATE_ADD(creation_date, INTERVAL 20 YEAR)
WHERE id > 5;DELETE FROM ft_table
WHERE id < 6 LIMIT 5;SELECT title, summary
FROM film
WHERE lower(summary) LIKE '%vincent%'
ORDER BY id_film ASC;SELECT title, summary
FROM film
WHERE (title LIKE '%42%') OR (summary LIKE '%42%')
ORDER BY duration ASC;SELECT last_name, first_name, DATE(birthdate) AS 'birthdate'
FROM user_card
WHERE YEAR(birthdate) = 1989
ORDER BY last_name;SELECT COUNT(*) AS 'nb_short-films'
FROM film
WHERE duration <= 42;SELECT
	title AS 'Title',
	summary AS 'Summary',
	prod_year
FROM film
INNER JOIN genre
	ON film.id_genre = genre.id_genre
WHERE genre.name = 'erotic'
ORDER BY film.prod_year DESC;SELECT
	upper(user_card.last_name) AS 'NAME',
	user_card.first_name,
	subscription.price
FROM
	user_card
	INNER JOIN member ON user_card.id_user = member.id_user_card
	INNER JOIN subscription ON member.id_sub = subscription.id_sub
WHERE subscription.price > 42
ORDER BY user_card.last_name, user_card.first_name ASC;SELECT last_name, first_name
FROM user_card
WHERE
	(last_name LIKE '%-%') OR (first_name LIKE '%-%')
ORDER BY last_name, first_name;SELECT CEIL(AVG(nb_seats)) AS 'average'
FROM cinema;SELECT
	floor_number AS 'floor',
	SUM(nb_seats) AS 'seats'
FROM cinema
GROUP BY floor_number
ORDER BY seats DESC;SELECT REVERSE(RIGHT(phone_number, LENGTH(phone_number) - 1)) AS 'rebmunenohp'
FROM distrib
WHERE phone_number LIKE '05%';SELECT COUNT(id_film) AS 'movies'
FROM member_history
WHERE
	DATE(`date`) BETWEEN "2006-10-30" AND "2007-07-27"
OR
	DAY(`date`) = '24' AND MONTH(`date`) = '12';SELECT
	COUNT(id_sub) AS 'nb_susc',
	FLOOR(AVG(price)) AS 'av_susc',
	MOD(SUM(duration_sub), 42) AS 'ft'
FROM subscription;SELECT name FROM distrib
WHERE
	id_distrib IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90)
OR
	name REGEXP '.*[yY].*[yY].*' LIMIT 2, 5;SELECT DATEDIFF(MAX(`date`), MIN(`date`)) AS 'uptime'
FROM member_history;SELECT
	genre.id_genre AS 'id_genre',
	genre.name AS 'name_genre',
	distrib.id_distrib AS 'id_distrib',
	distrib.name AS 'name_distrib',
	film.title AS 'title_film'
FROM film
LEFT JOIN genre ON film.id_genre=genre.id_genre
LEFT JOIN distrib ON film.id_distrib=distrib.id_distrib
WHERE genre.id_genre >= 4 AND genre.id_genre <= 8;SELECT MD5(REPLACE(CONCAT(phone_number, "42"), 7, 9) )AS 'ft5'
FROM distrib
WHERE id_distrib = 84;

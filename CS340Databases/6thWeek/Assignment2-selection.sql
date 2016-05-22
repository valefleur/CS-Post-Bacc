#Adina Edwards
#CS340
#8th May 2016
#1 Find all films with maximum length and minimum rental duration (compared to all other films). 
#In other words let L be the maximum film length, and let R be the minimum rental duration in the table film. You need to find all films with length L and rental duration R.
#You just need to return attribute film id for this query. 

SELECT film_id FROM film f 
WHERE
f.length = (SELECT MAX(a.length) FROM film a) AND
f.rental_duration = (SELECT MIN(b.rental_duration) FROM film b)
GROUP BY film_id;
#returns film_id 872: Sweet Brotherhood

#2 We want to find out how many of each category of film ED CHASE has started in so return a table with category.name and the count
#of the number of films that ED was in which were in that category order by the category name ascending (Your query should return every category even if ED has been in no films in that category).

#Results in 16 categories, with a count
SELECT cat.name, COUNT(ec.film_id) AS Staring_ED_CHASE FROM category cat
LEFT JOIN film_category fcat ON cat.category_id = fcat.category_id
LEFT JOIN
#Movies in which ED CHASE played a role
(SELECT ec_film.film_id, ec_film.title FROM film ec_film
INNER JOIN film_actor fa ON ec_film.film_id = fa.film_id
INNER JOIN actor a ON fa.actor_id = a.actor_id
WHERE a.first_name = "ED" AND a.last_name = "CHASE") AS ec
ON fcat.film_id = ec.film_id
GROUP BY cat.name;



#3 Find the first name, last name and total combined film length of Sci-Fi films for every actor
#That is the result should list the names of all of the actors(even if an actor has not been in any Sci-Fi films)and the total length of Sci-Fi films they have been in.
#Results in 121 actors
SELECT a.first_name, a.last_name, SUM(sf_films.length) from actor a 
INNER JOIN film_actor fa ON a.actor_id = fa.actor_id
LEFT JOIN
#films whose category is Sci-fi
(SELECT f.film_id, f.title, f.length FROM film_actor fa
INNER JOIN film f ON fa.film_id = f.film_id
INNER JOIN film_category fc ON f.film_id = fc.film_id
INNER JOIN category cat ON fc.category_id = cat.category_id
WHERE cat.name = "Sci-Fi") AS sf_films
ON fa.film_id = sf_films.film_id
GROUP BY a.last_name;


#4 Find the first name and last name of all actors who have never been in a Sci-Fi film
#select all actors in all films INNER JOIN

#select all actors NOT IN subquery
SELECT a.first_name, a.last_name FROM actor a 
WHERE a.actor_id NOT IN (#All actors in Sci Fi
SELECT star.actor_id FROM actor star 
INNER JOIN film_actor ac ON star.actor_id = ac.actor_id
INNER JOIN film f ON ac.film_id = f.film_id
INNER JOIN film_category fc ON f.film_id = fc.film_id
INNER JOIN category cat ON fc.category_id = cat.category_id
WHERE cat.name = "Sci-Fi")
GROUP BY a.last_name


#5 Find the film title of all films which feature both KIRSTEN PALTROW and WARREN NOLTE
#Order the results by title, descending (use ORDER BY title DESC at the end of the query)
#Warning, this is a tricky one and while the syntax is all things you know, you have to think oustide
#the box a bit to figure out how to get a table that shows pairs of actors in movies

SELECT costars.title FROM film costars INNER JOIN
(#Subquery to find all films with KIRSTEN PALTROW - 27 Movies
	SELECT kp.title, kp.film_id FROM film kp
	INNER JOIN film_actor kpfa ON kp.film_id = kpfa.film_id
	INNER JOIN actor kpa ON kpfa.actor_id = kpa.actor_id
	WHERE kpa.first_name = "KIRSTEN" AND kpa.last_name = "PALTROW"
) AS kp_films
 ON costars.film_id = kp_films.film_id
INNER JOIN
(#Subquery to find all films with WARREN NOLTE - 34 Movies
	SELECT wn.title, wn.film_id FROM film wn
	INNER JOIN film_actor wnfa ON wn.film_id = wnfa.film_id
	INNER JOIN actor wna ON wnfa.actor_id = wna.actor_id
	WHERE wna.first_name = "WARREN" AND wna.last_name = "NOLTE"
) AS wn_films
ON costars.film_id = wn_films.film_id
ORDER BY DESC both.title;
#Should get 6 titles in resulting table
#Agent Truman
#Ladybugs Armageddon
#Pulp Beverly
#River Outlaw
#Thief Pelican
#Unbreakable Karate









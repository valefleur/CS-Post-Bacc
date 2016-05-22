DROP TABLE IF EXISTS `gardener_with_plot`;
DROP TABLE IF EXISTS `plot_with_plant`;
DROP TABLE IF EXISTS `community_garden_with_gardener`;
DROP TABLE IF EXISTS `plot`;
DROP TABLE IF EXISTS `gardener`;
DROP TABLE IF EXISTS `plant`;
DROP TABLE IF EXISTS `community_garden`;

-- gardener:
-- gardener_id - an auto incrementing integer which is the primary key, cannot be null
-- fname - a varchar with a maximum length of 255 characters, cannot be null
-- lname - a varchar with a maximum length of 255 characters, cannot be null
-- phone_number - integer
-- email - a varchar with a maximum length of 255 characters
CREATE TABLE gardener(
	gardener_id int(11) NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	phone_number int(11),
	email varchar(255),
	PRIMARY KEY(gardener_id)
)ENGINE=InnoDB;

-- plant:
-- plant_id - an auto incrementing integer which is the primary key, cannot be null
-- type - a varchar of maximum length 255, cannot be null
# TODO: should this table actually be "plant_type" and we have another table that is "plant"?
# Alternatively, we could chance "type" to "name" and have a table of plant names
CREATE TABLE plant(
	plant_id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	PRIMARY KEY(plant_id)
)ENGINE=InnoDB;

-- community_garden
-- community_id - an auto incrementing integer which is the primary key, cannot be null
-- size - an integer 
-- location - a varchar of maximum length 255
CREATE TABLE community_garden(
	community_id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	size int(11),
	location varchar(255) NOT NULL, 
	PRIMARY KEY (community_id)
)ENGINE=InnoDB;

-- plot
-- plot_id - an auto incrementing integer which is the primary key, cannot be null
-- plot_size - an integer 
-- community - a varchar of maximum length 255, unique key, cannot be null, reference to community_garden
CREATE TABLE plot(
	plot_id int(11) NOT NULL AUTO_INCREMENT,
	plot_size int(11), 
	community int(11),
	PRIMARY KEY(plot_id),
	FOREIGN KEY (community) REFERENCES community_garden(community_id)
	ON DELETE SET NULL
	ON UPDATE CASCADE
)ENGINE=InnoDB;

-- gardener_with_plot:
-- gardener_id - an integer references gardener
-- plot_id - an integer references plot
-- The primary key is a combination of gardener_id and plot_id
CREATE TABLE gardener_with_plot(
	gardener_id int(11), 
	plot_id int(11), 
	FOREIGN KEY (plot_id) REFERENCES plot(plot_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (gardener_id) REFERENCES gardener(gardener_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	PRIMARY KEY (gardener_id,plot_id)
)ENGINE=InnoDB;

-- plot_with_plant:
-- plot_id - an integer references plot
-- plant_id - an integer references plant
-- The primary key is a combination of plot_id and plant_id
CREATE TABLE plot_with_plant(
	plot_id int(11),
	plant_id int(11),
	FOREIGN KEY (plot_id) REFERENCES plot(plot_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (plant_id) REFERENCES plant(plant_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	PRIMARY KEY (plot_id,plant_id)
)ENGINE=InnoDB;

-- community_garden_with_gardener:
-- community_id - an integer references community_garden
-- gardener_id - an integer references gardener
-- The primary key is a combination of community_id and gardener_id
CREATE TABLE community_garden_with_gardener(
	community_id int(11),
	gardener_id int(11),
	FOREIGN KEY (community_id) REFERENCES community_garden(community_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE, 
	FOREIGN KEY (gardener_id) REFERENCES gardener(gardener_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	PRIMARY KEY (community_id,gardener_id)
)ENGINE=InnoDB;
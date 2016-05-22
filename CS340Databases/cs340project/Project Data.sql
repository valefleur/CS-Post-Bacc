# fill the Community Garden table
INSERT INTO community_garden(name, size, location) values 
("Unity Springs", "100", "Wilsonville"),
("Beautiful Strolls", "75", "Tualatin Hills"),
("Equestrian Break", "45", "Sherwood"),
("Cookie Cutters Grow", "150", "Beaverton"),
("Plants Bring Us Together", "165", "Hillsboro"),
("Rabbit Food", "80", "Aloha");

#fill the Gardeners table
INSERT INTO gardener(fname, lname, phone_number, email) values
("Jean-Luc", "Picard", "1234567890", ""),
("William", "Riker", "1234567891", "wriker@enterprise.fed"),
("Deanna", "Troi", "", ""),
("Geordi", "La Forge", "1234567884", "glaforge@enterprise.fed"),
("Beverly", "Crusher", "1234567911", "bcrusher@enterprise.fed"),
("James","Kirk","3238617890","jkirk@enterprise.fed"),
("Nyota","Uhura","3238611234","nuhura@enterprise.fed"),
("Leonard","McCoy","3238618852","lmccoy@enterprise.fed"),
("Montgomery","Scott","3238618822","mscott@enterprise.fed"),
("Hikaru","Sulu","3238612456","hsulu@enterprise.fed"),
("Pavel","Chekov","3238612264",""),
("Christine","Chapel","","cchapel@enterprise.fed"),
("Leah","Brahms","4320502336","lbrahms@cochrane.sci");

# fill the Plots table
INSERT INTO plot(plot_size, community) values
("10", "1"),
("20", "1"),
("30", "1"),
("10", "1"),
("20", "1"),
("10", "1"),
("10", "2"),
("15", "2"),
("20", "2"),
("20", "2"),
("10", "2"),
("10", "3"),
("10", "3"),
("10", "3"),
("15", "3"),
("10", "4"),
("10", "4"),
("10", "4"),
("20", "4"),
("20", "4"),
("20", "4"),
("30", "4"),
("30", "4"),
("10", "5"),
("10", "5"),
("10", "5"),
("15", "5"),
("15", "5"),
("15", "5"),
("20", "5"),
("20", "5"),
("30", "5"),
("30", "5"),
("10", "6"),
("10", "6"),
("10", "6"),
("15", "6"),
("15", "6"),
("20", "6");

# fill the plants table
INSERT INTO plant(name) values
("Tomato"),
("Snow Pea"),
("Butter Head Lettuce"),
("Strawberry"),
("Bok Choy"),
("Spinach"),
("Rose"),
("Chive"),
("Cilantro"),
("Jasmine"),
("Mint"),
("Begonia"),
("Lily"),
("Carrot"),
("Onion"),
("Thai Basil"),
("Chrysanthemum"),
("Cat Mint"),
("Pothos"),
("Spider Plant");

# fill Gardeners with Plots
INSERT INTO gardener_with_plot(gardener_id, plot_id) values
("13","1"),
("12","2"),
("11","3"),
("10","4"),
("9","5"),
("8","6"),
("7","7"),
("6","8"),
("5","9"),
("4","10"),
("3","11");


# fill Plots with plants
INSERT INTO plot_with_plant(plot_id, plant_id) values
("1", "20"),
("2", "19"),
("3", "18"),
("4", "17"),
("5", "16"),
("6", "15"),
("7", "14"),
("8", "13"),
("9", "12"),
("10", "11"),
("10", "10"),
("11","9"),
("10","8"),
("9","7"),
("8","6"),
("7","5"),
("6","4"),
("5","3"),
("4","2"),
("3","1"),
("2","7"),
("1","7");


# fill Community Garden with Gardener
INSERT INTO community_garden_with_gardener(community_id, gardener_id) values
("1","1"),
("1","2"),
("1","3"),
("1","4"),
("1","5"),
("1","6"),
("2","7"),
("2","8"),
("2","9"),
("2","10"),
("3","11"),
("3","12"),
("4","13"),
("4","12"),
("4","11"),
("4","10"),
("4","9"),
("4","8"),
("5","7"),
("5","6"),
("5","5"),
("5","4"),
("6","3"),
("6","2"),
("6","1"),
("6","13");

# General Use Queries

# Show all plants grown by gardeners
SELECT g.fname, g.lname, pa.name FROM gardener g
INNER JOIN gardener_with_plot gp ON g.gardener_id = gp.gardener_id
INNER JOIN plot po ON gp.plot_id = po.plot_id
INNER JOIN plot_with_plant pwp ON po.plot_id = pwp.plot_id
INNER JOIN plant pa ON pwp.plant_id = pa.plant_id
ORDER BY g.lname;

# Find all gardeners in the Wilsonville garden
SELECT g.fname, g.lname FROM gardener g
INNER JOIN community_garden_with_gardener cgwg ON g.gardener_id = cgwg.gardener_id
INNER JOIN community_garden cg ON cgwg.community_id = cg.community_id
WHERE cg.location = "Wilsonville"
ORDER BY g.lname;

# Find all gardeners growing onions
SELECT g.fname, g.lname, pa.name FROM gardener g
INNER JOIN gardener_with_plot gp ON g.gardener_id = gp.gardener_id
INNER JOIN plot po ON gp.plot_id = po.plot_id
INNER JOIN plot_with_plant pwp ON po.plot_id = pwp.plot_id
INNER JOIN plant pa ON pwp.plant_id = pa.plant_id
WHERE pa.name = "Onion"
ORDER BY g.lname;

# Find all gardeners with more than one plot

# Find all gardens with roses
SELECT cg.name, cg.location FROM community_garden cg
INNER JOIN community_garden_with_gardener cgwg ON cg.community_id = cgwg.community_id
INNER JOIN gardener g ON cgwg.gardener_id = g.gardener_id
INNER JOIN gardener_with_plot gwp ON g.gardener_id = gwp.gardener_id
INNER JOIN plot po ON gwp.plot_id = po.plot_id
INNER JOIN plot_with_plant pwp ON po.plot_id = pwp.plot_id
INNER JOIN plant pa ON pwp.plant_id = pa.plant_id
WHERE pa.name = "Rose"
ORDER BY cg.location;

#Find all gardeners who tend plot 1 in the Tualatin Hills garden.

SELECT gwp.gardener_id, COUNT(gwp.plot_id) FROM gardener_with_plot gwp GROUP BY gwp.gardener_id;



SELECT gar.gardener_id, gar.fname, gar.lname FROM garener gar INNER JOIN
(SELECT g.fname, g.lname, g.gardener_id FROM gardener g
INNER JOIN community_garden_with_gardener cgwg ON cgwg.gardener_id = g.gardener_id
INNER JOIN community_garden cg ON cgwg.community_id = cg.community_id
WHERE cg.location = "Tualatin Hills"
GROUP BY g.lname) AS th_gardener
ON gar.gardener_id = th_gardener.gardener_id
INNER JOIN
(SELECT g.fname, g.lname, g.gardener_id FROM gardener g 
INNER JOIN gardener_with_plot gwp ON g.gardener_id = gwp.gardener_id
WHERE gwp.plot_id = 1) AS tends_plot_1
ON th_gardener.gardener_id = tends_plot_1.gardener_id







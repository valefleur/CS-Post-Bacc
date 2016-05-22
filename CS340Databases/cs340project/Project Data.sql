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
#(SELECT community_id FROM community_garden WHERE location = "")
("10", (SELECT community_id FROM community_garden WHERE location = "Wilsonville")),
("20", (SELECT community_id FROM community_garden WHERE location = "Wilsonville")),
("30", (SELECT community_id FROM community_garden WHERE location = "Wilsonville")),
("10", (SELECT community_id FROM community_garden WHERE location = "Wilsonville")),
("20", (SELECT community_id FROM community_garden WHERE location = "Wilsonville")),
("10", (SELECT community_id FROM community_garden WHERE location = "Wilsonville")),
("10", (SELECT community_id FROM community_garden WHERE location = "Tualatin Hills")),
("15", (SELECT community_id FROM community_garden WHERE location = "Tualatin Hills")),
("20", (SELECT community_id FROM community_garden WHERE location = "Tualatin Hills")),
("20", (SELECT community_id FROM community_garden WHERE location = "Tualatin Hills")),
("10", (SELECT community_id FROM community_garden WHERE location = "Tualatin Hills")),
("10", (SELECT community_id FROM community_garden WHERE location = "Sherwood")),
("10", (SELECT community_id FROM community_garden WHERE location = "Sherwood")),
("10", (SELECT community_id FROM community_garden WHERE location = "Sherwood")),
("15", (SELECT community_id FROM community_garden WHERE location = "Sherwood")),
("10", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("10", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("10", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("20", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("20", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("20", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("30", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("30", (SELECT community_id FROM community_garden WHERE location = "Beaverton")),
("10", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("10", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("10", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("15", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("15", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("15", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("20", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("20", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("30", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("30", (SELECT community_id FROM community_garden WHERE location = "Hillsboro")),
("10", (SELECT community_id FROM community_garden WHERE location = "Aloha")),
("10", (SELECT community_id FROM community_garden WHERE location = "Aloha")),
("10", (SELECT community_id FROM community_garden WHERE location = "Aloha")),
("15", (SELECT community_id FROM community_garden WHERE location = "Aloha")),
("15", (SELECT community_id FROM community_garden WHERE location = "Aloha")),
("20", (SELECT community_id FROM community_garden WHERE location = "Aloha"));

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
#((SELECT g.gardener_id FROM gar g WHERE g.fname = "" AND g.lname = ""), ""),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "Jean-Luc" AND g.lname = "Picard"), "1"),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "Jean-Luc" AND g.lname = "Picard"), "2"),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "Jean-Luc" AND g.lname = "Picard"), "3"),

((SELECT g.gardener_id FROM gardener g WHERE g.fname = "" AND g.lname = ""), ""),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "" AND g.lname = ""), ""),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "" AND g.lname = ""), ""),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "" AND g.lname = ""), ""),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "" AND g.lname = ""), ""),
((SELECT g.gardener_id FROM gardener g WHERE g.fname = "" AND g.lname = ""), ""),
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
((SELECT community_id FROM community_garden WHERE location = "Wilsonville"),(SELECT gardener_id FROM gardener WHERE fname = "Jean-Luc" AND lname = "Picard")),
((SELECT community_id FROM community_garden WHERE location = "Wilsonville"),(SELECT gardener_id FROM gardener WHERE fname = "William" AND lname = "Riker")),
((SELECT community_id FROM community_garden WHERE location = "Wilsonville"),(SELECT gardener_id FROM gardener WHERE fname = "James" AND lname = "Kirk")),
((SELECT community_id FROM community_garden WHERE location = "Wilsonville"),(SELECT gardener_id FROM gardener WHERE fname = "Leonard" AND lname = "McCoy")),
((SELECT community_id FROM community_garden WHERE location = "Tualatin Hills"),(SELECT gardener_id FROM gardener WHERE fname = "Christine" AND lname = "Chapel")),
((SELECT community_id FROM community_garden WHERE location = "Tualatin Hills"),(SELECT gardener_id FROM gardener WHERE fname = "Pavel" AND lname = "Chekov")),
((SELECT community_id FROM community_garden WHERE location = "Tualatin Hills"),(SELECT gardener_id FROM gardener WHERE fname = "Hikaru" AND lname = "Sulu")),
((SELECT community_id FROM community_garden WHERE location = "Tualatin Hills"),(SELECT gardener_id FROM gardener WHERE fname = "Montgomery" AND lname = "Scott")),
((SELECT community_id FROM community_garden WHERE location = "Tualatin Hills"),(SELECT gardener_id FROM gardener WHERE fname = "Leonard" AND lname = "McCoy")),
((SELECT community_id FROM community_garden WHERE location = "Sherwood"),(SELECT gardener_id FROM gardener WHERE fname = "Deanna" AND lname = "Troi")),
((SELECT community_id FROM community_garden WHERE location = "Sherwood"),(SELECT gardener_id FROM gardener WHERE fname = "Nyota" AND lname = "Uhura")),
((SELECT community_id FROM community_garden WHERE location = "Sherwood"),(SELECT gardener_id FROM gardener WHERE fname = "Beverly" AND lname = "Crusher")),
((SELECT community_id FROM community_garden WHERE location = "Beaverton"),(SELECT gardener_id FROM gardener WHERE fname = "Leah" AND lname = "Brahms")),
((SELECT community_id FROM community_garden WHERE location = "Beaverton"),(SELECT gardener_id FROM gardener WHERE fname = "Geordi" AND lname = "La Forge")),
((SELECT community_id FROM community_garden WHERE location = "Beaverton"),(SELECT gardener_id FROM gardener WHERE fname = "Nyota" AND lname = "Uhura")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "Geordi" AND lname = "La Forge")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "Jean-Luc" AND lname = "Picard")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "Beverly" AND lname = "Crusher")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "Deanna" AND lname = "Troi")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "William" AND lname = "Riker")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "Christine" AND lname = "Chapel")),
((SELECT community_id FROM community_garden WHERE location = "Hillsboro"),(SELECT gardener_id FROM gardener WHERE fname = "Leah" AND lname = "Brahms"));


#((SELECT community_id FROM community_garden WHERE location = ""),(SELECT gardener_id FROM gardener WHERE fname = "" AND lname = "")),






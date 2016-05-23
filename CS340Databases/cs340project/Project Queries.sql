### General Use Queries

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
SELECT g.fname, g.lname FROM gardener g 
INNER JOIN
#count of all plots, by gardener
(SELECT gar.gardener_id, gar.fname, gar.lname, COUNT(po.plot_id) AS tot FROM gardener gar 
INNER JOIN gardener_with_plot gwp ON gar.gardener_id = gwp.gardener_id 
INNER JOIN plot po ON gwp.plot_id = po.plot_id
GROUP BY gar.gardener_id) AS po_by_gar
ON g.gardener_id = po_by_gar.gardener_id
WHERE tot > 1
GROUP BY g.lname;


# Find all gardeners with more than one community garden
SELECT g.fname, g.lname, cg_by_gar.tot FROM gardener g 
INNER JOIN
#count of all gardens, by gardener
(SELECT gar.gardener_id, gar.fname, gar.lname, COUNT(cgwg.community_id) AS tot FROM gardener gar 
INNER JOIN community_garden_with_gardener cgwg ON gar.gardener_id = cgwg.gardener_id 
GROUP BY gar.gardener_id) AS cg_by_gar
ON g.gardener_id = cg_by_gar.gardener_id
WHERE tot > 1
GROUP BY g.lname;


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

# Find all gardeners at the Wilsonville garden, ordered by Garden Name
SELECT cg.name, g.fname, g.lname FROM community_garden_with_gardener cgwg
INNER JOIN gardener g ON cgwg.gardener_id = g.gardener_id
INNER JOIN community_garden cg ON cgwg.community_id = cg.community_id
ORDER BY cg.name, g.lname;


#Find all gardeners who tend plot 1 in the Tualatin Hills garden.

#all gardeners in Tualatin Hills garden
SELECT th_gardener.fname, th_gardener.lname FROM
(SELECT g.gardener_id, g.fname, g.lname FROM gardener g
INNER JOIN community_garden_with_gardener cgwg ON g.gardener_id = cgwg.gardener_id
INNER JOIN community_garden cg ON cgwg.community_id = cg.community_id
WHERE cg.location = "Tualatin Hills") AS th_gardener
INNER JOIN
#count of all plots, by gardener
(SELECT gar.gardener_id, gar.fname, gar.lname, COUNT(po.plot_id) AS tot FROM gardener gar 
INNER JOIN gardener_with_plot gwp ON gar.gardener_id = gwp.gardener_id 
INNER JOIN plot po ON gwp.plot_id = po.plot_id
GROUP BY gar.gardener_id) AS po_by_gar
ON th_gardener.gardener_id = po_by_gar.gardener_id
WHERE po_by_gar.tot = 1;
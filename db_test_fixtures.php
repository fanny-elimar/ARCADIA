<?php

$pdo = new PDO("pgsql:dbname="."arcadiadb_test"." options='--client_encoding=UTF8';host="."localhost".";","user", "arcadiamdp");


$pdo->exec("CREATE TABLE arc_habitat (
	ha_id SERIAL PRIMARY KEY,
	ha_name VARCHAR(60) NOT NULL, 
	ha_description TEXT,
	ha_images VARCHAR(255),
	ha_comment TEXT
)");

$pdo->exec("CREATE TABLE arc_animal (
	an_id SERIAL PRIMARY KEY,
	an_name VARCHAR(60) NOT NULL, 
	an_species VARCHAR(60),
	an_images VARCHAR(255), 
	an_ha_id INT NOT NULL REFERENCES arc_habitat(ha_id), 
	an_extra_images TEXT,
	an_en_name VARCHAR(60)
)");


$pdo->exec("CREATE TABLE arc_enclosure (
	en_name VARCHAR(60) PRIMARY KEY NOT NULL,
	en_comment TEXT
)");

$pdo->exec("CREATE TABLE arc_food (
	fo_id SERIAL PRIMARY KEY,
	fo_type VARCHAR(255) NOT NULL
)");

$pdo->exec("CREATE TABLE arc_feeding (
	fe_id SERIAL PRIMARY KEY,
	fe_fo_id INT NOT NULL REFERENCES arc_food(fo_id) ON DELETE CASCADE ON UPDATE CASCADE,
	fe_an_id INT NOT NULL REFERENCES arc_animal(an_id) ON DELETE CASCADE,
	fe_quantity REAL NOT NULL,
	fe_date DATE NOT NULL,
	fe_time TIME NOT NULL
)");

$pdo->exec("CREATE TABLE arc_horaire (
	ho_id SERIAL PRIMARY KEY, 
	ho_periode_start DATE NOT NULL, 
	ho_periode_end DATE NOT NULL, 
	ho_days VARCHAR(255) NOT NULL, 
	ho_time_start TIME NOT NULL, 
	ho_time_end TIME NOT NULL
)");

$pdo->exec("CREATE TABLE arc_image_animal (
	im_an_id SERIAL PRIMARY KEY, 
	im_an_an_id INT NOT NULL REFERENCES arc_animal(an_id) ON DELETE CASCADE, 
	im_an_filename VARCHAR(255) NOT NULL
)");

$pdo->exec("CREATE TABLE arc_instruction (
	in_id SERIAL PRIMARY KEY,
	in_fo_id INT NOT NULL REFERENCES arc_food(fo_id) ON DELETE CASCADE ON UPDATE CASCADE,
	in_an_id INT NOT NULL REFERENCES arc_animal(an_id) ON DELETE CASCADE,
	in_quantity REAL
)");

$pdo->exec("CREATE TABLE arc_review (
	re_id SERIAL PRIMARY KEY,
	re_pseudo VARCHAR(60) NOT NULL,
	re_review TEXT NOT NULL,
	re_approved BOOL, 
	re_date DATE NOT NULL
)");

$pdo->exec("CREATE TABLE arc_service (
	se_id SERIAL PRIMARY KEY,
	se_name VARCHAR(255) NOT NULL,
	se_description TEXT,
	se_images VARCHAR(255),
	se_info TEXT
)");

$pdo->exec("CREATE TABLE arc_user (
	us_id SERIAL PRIMARY KEY,
	us_email VARCHAR(60) NOT NULL,
	us_password VARCHAR(255) NOT NULL,
	us_role VARCHAR(60) NOT NULL, 
	us_fname VARCHAR(60)
)");

$pdo->exec("CREATE TABLE arc_visit (
	vi_id SERIAL PRIMARY KEY,
	vi_condition VARCHAR(255) NOT NULL, 
	vi_date DATE NOT NULL,
	vi_condition_details TEXT,
	vi_an_id INT NOT NULL REFERENCES arc_animal(an_id) ON DELETE CASCADE
)");



$pdo->exec("INSERT INTO arc_habitat(ha_name,ha_description) VALUES 
('marais', 'L''espace marais de notre zoo vous plonge dans l''atmosphère des zones humides. En avançant sur des passerelles surélevées, vous pourrez admirer des étendues d''eau bordées de joncs et de nénuphars. Des tortues paressent sur des troncs d''arbres émergés, tandis que des alligators se dissimulent à peine sous la surface calme de l''eau. Des oiseaux, comme les hérons et les ibis, picorent dans les marécages à la recherche de leur prochain repas. Vous découvrirez également une variété de poissons et d''amphibiens. Des panneaux informatifs racontent l''importance écologique des marais et la diversité des espèces qui y vivent. Vous apprécierez cette promenade relaxante au cœur de ce biotope fascinant et vital.'),
('jungle', 'L''espace jungle de notre zoo est une immersion totale dans l''exubérante forêt tropicale. Dès votre entrée, une végétation luxuriante vous entoure, avec des lianes pendantes, des fougères géantes et des arbres imposants abritant une multitude de créatures exotiques. Vous pouvez apercevoir des singes espiègles se balancer de branche en branche, tandis que des perroquets colorés survolent les sentiers. Des panneaux éducatifs jalonnent le parcours, offrant des informations fascinantes sur les espèces végétales et animales de la jungle. L''humidité ambiante et les sons envoûtants de la faune créent une expérience sensorielle unique, transportant les visiteurs au cœur de la nature sauvage.'),
('savane', 'L''espace savane de notre zoo est une immersion totale dans une zone aride. ');;
");

$pdo->exec("INSERT INTO arc_animal(an_name, an_species, an_images, an_ha_id) VALUES
('Simba', 'lion', 'simba1.webp', 2),
('Zephir', 'zèbre', 'zephir1.webp', 2),
('Zoe', 'zèbre', 'zoe1.webp', 2),
('Zelia', 'zèbre', 'zelia1.webp', 2),
('Gina', 'girafe', 'gina1.webp', 2),
('Gisèle', 'girafe', 'gisèle1.webp', 2),
('Arya', 'antilope', 'arya1.webp', 2),
('Aliza', 'antilope', 'aliza1.webp', 2),
('Antou', 'antilope', 'antou1.webp', 2),
('Ellie', 'éléphant', 'ellie1.webp', 2),
('Elika', 'éléphant', 'elika1.webp', 2);
");

$pdo->exec("INSERT INTO arc_service(se_name,se_description)
VALUES ('restauration','Notre zoo propose une variété de services de restauration pour satisfaire toutes vos envies culinaires pendant votre visite. Vous trouverez plusieurs snacks disséminés dans le parc, offrant des en-cas rapides comme des sandwiches, des fruits frais et des boissons rafraîchissantes. Pour une pause gourmande, arrêtez-vous à l''un de nos stands de glace, où des délices glacés aux saveurs variées raviront petits et grands. Pour un repas plus complet, notre restaurant vous accueille dans un cadre convivial, avec un menu diversifié comprenant des plats chauds, des salades, et des options végétariennes. Des aires de pique-nique ont été également été aménagées dans chaque espace.'),
('visite guidée des habitats','Profitez de visites guidées gratuites des habitats. Elles vous permettront de découvrir nos animaux de manière enrichissante et éducative. Chaque visite est une occasion d''apprendre des anecdotes fascinantes sur les espèces que vous rencontrez, leurs comportements et leurs habitats naturels. Les guides sont également disponibles pour répondre à vos questions et partager des faits surprenants. Ces visites guidées sont idéales pour tous les âges, offrant une expérience immersive et interactive qui enrichira votre visite et vous laissera avec des souvenirs inoubliables.'),
('Petit train','Embarquez à bord de notre petit train, qui vous conduira à travers les différentes zones du parc, telles que la jungle, la savane et les marais. Conçu pour toute la famille, ce moyen de transport pratique permet de profiter d''une vue panoramique sur les habitats et les animaux, tout en se relaxant. Le petit train est commenté, offrant des informations intéressantes et des anecdotes amusantes sur les espèces que vous croisez. C''est l''occasion idéale pour découvrir le zoo sans fatigue. Rejoignez-nous pour une expérience mémorable et conviviale, qui plaira aux petits comme aux grands.');
");


$pdo->exec("INSERT INTO arc_review (re_pseudo, re_review, re_approved, re_date) VALUES 
('Marie63','Nous avons passé une superbe journée à Arcadia. C’est un plaisir de voir que les animaux sont si bien traités',true, '26/06/2024'),
('Paul.legarec','Bravo pour ce joli parc, toute la famille a adoré !',true, '26/06/2024');");
INSERT INTO user (name, firstname) VALUES
('Riquier', 'Zara'),
('Langley', 'Bertrand'),
('Martineau', 'Jolie'),
('Leclair', 'Nicolas'),
('Germain', 'Dubois');

INSERT INTO address (name, address, zip, city, phone, user_id) VALUES
('Domicile', '27, boulevard Albin Durand', '59000', 'Lille', '08.36.65.65.65', 1),
('Maison', '7, rue de Lille', '92600', 'Asnières-sur-Seine', '01.78.02.78.27', 2),
('Travail', '7, rue du Paillie en queue', '33500', 'Libourne', '05.89.10.28.31', 1),
('Boulot', '69, rue de Verdun', '40000', 'Mont-de-Marsan', '01.78.02.78.27', 2),
('Mon appartement', '233 boulevard Gambetta', '59810', 'Lesquin', '03.20.57.38.92', 1);


-- Créer une base de données "blogjoin" dans PHPMyAdmin
-- Créer 2 tables aricle et user
-- Dans article, on aura un id, un titre, un auteur (pourra être null)
-- Dans user, on aura un id et un nom



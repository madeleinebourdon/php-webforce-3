-- On veut insérer des tailles pour nos pizzas
-- S(0), M(0,99), L (1.99), XL (2.99)

INSERT INTO size (name, price) VALUES
('S', 0),
('M', 0.99),
('L', 1.99),
('XL', 2.99);

-- Ajouter les relations dans la table "pizza_has_size"

-- On veut récupérer toutes les pizzas avec leurs différentes tailles et prix
SELECT * FROM `pizza` INNER JOIN `pizza_has_size` ON `id` = `pizza_id`

SELECT * FROM `pizza` 
INNER JOIN `pizza_has_size` ON  `pizza.id` =  `pizza_has_size.pizza_id`;
SELECT * FROM `pizza_has_size` INNER JOIN `size` ON  `id` =  `price`
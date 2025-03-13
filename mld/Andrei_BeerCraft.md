---
title: 'Creation d''une table:'

---

# Creation des tables avec les valeurs differents va cree 3 tables: beer, users et comments.

CREATE TABLE beers (
   beer_id INT PRIMARY KEY AUTO_INCREMENT,
   beer_name VARCHAR(255) NOT NULL,
   beer_type VARCHAR(100) NOT NULL,
   beer_origin VARCHAR(100) NOT NULL,
   beer_alc DECIMAL(4,2) CHECK (beer_alc >= 0 AND beer_alc <= 20),
   beer_description TEXT,
   beer_img VARCHAR(255)
);

CREATE TABLE users (
   user_id INT PRIMARY KEY AUTO_INCREMENT,
   first_name VARCHAR(255) NOT NULL,
   last_name VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL, -- Увеличен размер для хэшированных паролей
   role ENUM('user', 'admin') DEFAULT 'user'
);

CREATE TABLE comments (
   id_comment INT PRIMARY KEY AUTO_INCREMENT,
   avis TEXT,
   note INT CHECK (note BETWEEN 1 AND 5),
   user_id INT NOT NULL,
   beer_id INT NOT NULL,
   FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
   FOREIGN KEY (beer_id) REFERENCES beers(beer_id) ON DELETE CASCADE
);

# REmplisage de table 'beers' avec 5 bieres differantes, beer_id va etre remplis autamatiquement.

INSERT INTO beers (beer_name, beer_type, beer_origin, beer_alc, beer_description, beer_img)
VALUES
  ('Guinness', 'Stout', 'Irlande', 4.2, 'Famous Irish stout beer.', 'guinness.jpg'),
  ('Chimay Bleue', 'Trappiste', 'Belgique', 9.0, 'Strong Trappist beer from Belgium.', 'chimay_bleue.jpg'),
  ('Punk IPA', 'IPA', 'Écosse', 5.4, 'Popular craft IPA from Scotland.', 'punk_ipa.jpg'),
  ('Leffe Blonde', 'Blonde', 'Belgique', 6.6, 'Classic Belgian blonde beer.', 'leffe_blonde.jpg'),
  ('Duvel', 'Blonde', 'Belgique', 8.5, 'Strong Belgian blonde ale.', 'duvel.jpg');
  
# Modification de la description pour la biere 'Guinness' avec beer_id=1.

UPDATE beers
SET beer_description = 'Nouvelle description'
WHERE beer_id = 1;

# Supprimation de biere 'Chimay Bleue' avec beer_id = 2.

DELETE FROM beers
WHERE beer_id = 2;

# Affichage des toutes les bieres.

SELECT * FROM beers;

# Affichage des IPAs.

SELECT * FROM beers
WHERE beer_type = 'IPA';

# Ajoutes des commentaires pour les bieres qui restes.

INSERT INTO commens (user_id, beer_id, note, avis) VALUES 
(1, 1, 1, 'Bad'),
(1, 3, 2, 'Not bad'),
(1, 4, 3, 'Good'),
(1, 5, 4, 'Very Good');

# Affichages des beer_id par leurs notes par ordre decroissant.

SELECT beer_id FROM comments
ORDER BY note DESC;

# Affichages des comments d'un user.

SELECT avis FROM comments
ORDER BY user_id = 1;

# Supprimer la biere et commenteire.

DELETE FROM comments WHERE beer_id = 1;
DELETE FROM beers WHERE beer_id = 1;


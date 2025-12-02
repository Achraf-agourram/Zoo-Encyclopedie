CREATE DATABASE Zoo_enclopedie;

CREATE TABLE Habitat (
    id_hab INT PRIMARY KEY AUTO_INCREMENT,
    name_hab VARCHAR(100),
    desc_hab TEXT
);

CREATE TABLE Animal (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_animal VARCHAR(100),
    type_alimentaire VARCHAR(100),
    image_animal VARCHAR(150),
    habitat_id INT,
    FOREIGN KEY (habitat_id) REFERENCES Habitat(id_hab)
);

/* Ajouter un habitat */
INSERT INTO Habitat (name_hab, desc_hab)
VALUES ('Savane', 'Grande plaine chaude avec herbes.');

/* Ajouter un Animal */
INSERT INTO Animal (name_animal, type_alimentaire, image_animal, habitat_id)
VALUES ('Lion', 'Carnivore', 'lion.jpg', 1);

/* Modifier les détails d'un animal */
UPDATE Animal
SET name_animal = 'Lion d’Afrique',
    type_alimentaire = 'Carnivore',
    image_animal = 'lion_afrique.jpg',
    habitat_id = 1
WHERE id = 1;

/* Modifier un habitat */
UPDATE Habitat
SET name_hab = 'Savane Africaine',
    desc_hab = 'Grande zone herbeuse chaude.'
WHERE id_hab = 1;

/* Supprimer un animal */
DELETE FROM Animal
WHERE id = 1;

/* Afficher la liste des animaux du zoo avec leurs images */
SELECT name_animal, image_animal, Habitat.name_hab
FROM Animal
JOIN Habitat ON Animal.habitat_id = Habitat.id_hab;
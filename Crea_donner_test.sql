INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `NOM`, `PRENOM`, `EMAIL`, `MotDePasse`, `ID_ROLE`) VALUES 
(NULL, 'Martin', 'Léo', 'leo.martin@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Bernard', 'Gabriel', 'gabriel.bernard@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Thomas', 'Raphaël ', 'raphael.thomas@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Petit', 'Arthur', 'arthur.petit@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Robert', 'Louis', 'louis.robert@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Richard', 'Jules', 'jules.richard@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Durand', 'Adam', 'adam.durand@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Dubois', 'Maël', 'mael.dubois@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Moreau', 'Lucas', 'lucas.moreau@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Laurent', 'Hugo', 'hugo.laurent@gmail.com', '123456789ABC*', '2'), 
(NULL, 'Simon', 'Jade', 'jade.simon@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Michel', 'Louise', 'louise.michel@gmail.com', '123456789ABC*', '3'), 
(NULL, 'Lefebvre', 'Emma', 'emma.lefebvre@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Leroy', 'Alice', 'alice.leroy@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Roux', 'Ambre', 'ambre.roux@gmail.com', '123456789ABC*', '1'), 
(NULL, 'David', 'Lina', 'lina.david@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Bertrand', 'Rose', 'rose.bertrand@gmail.com', '123456789ABC*', '2'), 
(NULL, 'Girard', 'Chloé', 'chloé.girard@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Morel', 'Mia', 'mia.morel@gmail.com', '123456789ABC*', '1'), 
(NULL, 'Fournier', 'Léa', 'lea.fournier@gmail.com', '123456789ABC*', '1')

INSERT INTO `classe` (`ID_CLASSE`) VALUES 
(NULL),
(NULL)

INSERT INTO `groupe` (`ID_GROUPE`, `ID_CLASSE`) VALUES 
(NULL, '1'), 
(NULL, '1'), 
(NULL, '2'), 
(NULL, '2')

INSERT INTO `eleve` (`ID_ELEVE`, `ID_CLASSE`, `ID_GROUPE`, `ID_ROLE`, `ID_UTILISATEUR`) VALUES 
(NULL, '1', '1', '1', '1'), 
(NULL, '1', '1', '1', '2'), 
(NULL, '1', '1', '1', '3'), 
(NULL, '1', '1', '1', '4'), 
(NULL, '1', '1', '1', '5'), 
(NULL, '1', '2', '1', '6'), 
(NULL, '1', '2', '1', '7'), 
(NULL, '1', '2', '1', '8'), 
(NULL, '1', '2', '1', '9'), 
(NULL, '2', '3', '1', '11'), 
(NULL, '2', '3', '1', '13'), 
(NULL, '2', '3', '1', '14'), 
(NULL, '2', '3', '1', '15'), 
(NULL, '2', '4', '1', '16'), 
(NULL, '2', '4', '1', '18'), 
(NULL, '2', '4', '1', '19'), 
(NULL, '2', '4', '1', '20')

INSERT INTO `professeur` (`ID_PROFESSEUR`, `ID_ROLE`, `ID_UTILISATEUR`) VALUES 
(NULL, '2', '10'), 
(NULL, '2', '17')

INSERT INTO `document` (`ID_DOCUMENT`, `VALID`) VALUES 
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL)

INSERT INTO `calandrier` (`ID_CALANDRIER`, `HEUR_DEBUT`, `HEUR_FIN`, `ID_CLASSE`, `ID_GROUPE`) VALUES 
(NULL, '2022-09-04 9:0:0', '2022-09-04 13:0:0', '1', '1'), 
(NULL, '2022-09-04 9:0:0', '2022-09-04 13:0:0', '1', '2'), 
(NULL, '2022-09-04 9:0:0', '2022-09-04 13:0:0', '2', '3'), 
(NULL, '2022-09-04 9:0:0', '2022-09-04 13:0:0', '2', '4')

INSERT INTO `signature` (`ID_SIGNATURE`, `ID_ROLE`, `ID_DOCUMENT`, `VALID`, `ID_UTILISATEUR`, `ID_CALANDRIER`) VALUES 
(NULL, '1', '1', NULL, '1', '1'), 
(NULL, '1', '1', NULL, '2', '1'), 
(NULL, '1', '1', NULL, '3', '1'), 
(NULL, '1', '1', NULL, '4', '1'), 
(NULL, '1', '1', NULL, '5', '1'), 
(NULL, '1', '2', NULL, '6', '2'), 
(NULL, '1', '2', NULL, '7', '2'), 
(NULL, '1', '2', NULL, '8', '2'), 
(NULL, '1', '2', NULL, '9', '2'), 
(NULL, '2', '1', NULL, '10', '1'), 
(NULL, '1', '3', NULL, '11', '3'), 
(NULL, '1', '3', NULL, '13', '3'), 
(NULL, '1', '3', NULL, '14', '3'), 
(NULL, '1', '3', NULL, '15', '3'), 
(NULL, '1', '4', NULL, '16', '4'), 
(NULL, '2', '3', NULL, '17', '3'), 
(NULL, '1', '4', NULL, '18', '4'), 
(NULL, '1', '4', NULL, '19', '4'), 
(NULL, '1', '4', NULL, '20', '4')
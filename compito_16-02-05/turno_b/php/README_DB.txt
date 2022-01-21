Istruzioni per creare il database e la tabella

Andare in phpmyAdmin e andare nella voce di menu a tab "SQL".

1. Creare il DB

CREATE DATABASE Cibo

2. Andare nel database appena creato e 

3. Creare la tabella 

CREATE TABLE Pizzerie (
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR(30) NOT NULL,
Luogo VARCHAR(30) NOT NULL,
N_Tavoli VARCHAR(10),
Telefono VARCHAR(10),
Chiusura VARCHAR(10)
) 

3. Popolare il DB

INSERT INTO `Pizzerie`(`Nome`, `Luogo`, `N_Tavoli`, `Telefono`, `Chiusura`) VALUES ("Bella Napoli", "Bologna", "20","051435677", "Lunedi’")

INSERT INTO `Pizzerie`(`Nome`, `Luogo`, `N_Tavoli`, `Telefono`, `Chiusura`) VALUES ("La Tana dell'orso", "Bologna", "10","051345632", "Giovedi’")

INSERT INTO `Pizzerie`(`Nome`, `Luogo`, `N_Tavoli`, `Telefono`, `Chiusura`) VALUES ("Bella Bologna", "Napoli", "30","043434312", "Domenica")




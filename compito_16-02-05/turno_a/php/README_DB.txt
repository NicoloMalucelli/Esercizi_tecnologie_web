Istruzioni per creare il database e la tabella

Andare in phpmyAdmin e andare nella voce di menu a tab "SQL".

1. Creare il DB

CREATE DATABASE Cibo

2. Andare nel database appena creato e 

3. Creare la tabella 

CREATE TABLE Pasticcerie (
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR(30) NOT NULL,
Luogo VARCHAR(30) NOT NULL,
Orario_apertura VARCHAR(10),
Orario_chiusura VARCHAR(10),
Chiusura VARCHAR(10)
) 

3. Popolare il DB

INSERT INTO `Pasticcerie`(`Nome`, `Luogo`, `Orario_apertura`, `Orario_chiusura`, `Chiusura`) VALUES ("Fagioli", "Cesena",	"6:00",	"20:00", "Lunedi’")

INSERT INTO `Pasticcerie`(`Nome`, `Luogo`, `Orario_apertura`, `Orario_chiusura`, `Chiusura`) VALUES ("Romagna", "Cesena", "7:00", "19:00", "Giovedi’")

INSERT INTO `Pasticcerie`(`Nome`, `Luogo`, `Orario_apertura`, `Orario_chiusura`, `Chiusura`) VALUES ("Neri", "Bologna", "8:00", "18:00", "Domenica")




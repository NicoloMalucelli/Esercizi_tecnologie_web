Istruzioni per creare il database e la tabella

Andare in phpmyAdmin e andare nella voce di menu a tab "SQL".

1. Creare il DB

CREATE DATABASE Concerti

2. Andare nel database appena creato e 

3. Creare la tabella 

CREATE TABLE ConcertiBologna (
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Gruppo VARCHAR(30) NOT NULL,
Luogo VARCHAR(30) NOT NULL,
Data VARCHAR(10) NOT NULL,
Ora VARCHAR(5) NOT NULL
) 

3. Popolare il DB

INSERT INTO `ConcertiBologna`(`Gruppo`, `Luogo`, `Data`, `Ora`) VALUES ("Ligabue", "Stadio Renato Dall'Ara", "07/09/2016", "20:00")

INSERT INTO `ConcertiBologna`(`Gruppo`, `Luogo`, `Data`, `Ora`) VALUES ("Blink-182", "Unipol Arena", "16/10/2016", "20:30")

INSERT INTO `ConcertiBologna`(`Gruppo`, `Luogo`, `Data`, `Ora`) VALUES ("Laura Pausini", "Arena Imola", "16/11/2016", "20:30")

INSERT INTO `ConcertiBologna`(`Gruppo`, `Luogo`, `Data`, `Ora`) VALUES ("Jovanotti", "Unipol Arena", "20/10/2016", "21:00")




Istruzioni per creare il database e la tabella

Andare in phpmyAdmin e andare nella voce di menu a tab "SQL".

1. Creare il DB

CREATE DATABASE settembre

2. Andare nel database appena creato e create la tabella 

CREATE TABLE `stringhe` (
  `id` int(11) NOT NULL,
  `stringa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `stringhe`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `stringhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
3. Popolare il DB

INSERT INTO `stringhe` (`id`, `stringa`) VALUES
(1, "carlo"),
(2, "costa"),
(3, "partenone"),
(4, "zaino"),
(5, "casa"),
(6, "pollo");


Istruzioni per creare il database e la tabella

Andare in phpmyAdmin e andare nella voce di menu a tab "SQL".

1. Creare il DB

CREATE DATABASE eventi

2. Andare nel database appena creato e create la tabella 

CREATE TABLE `manifestazioni` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `descrizione` text NOT NULL,
  `datainizio` date NOT NULL,
  `datafine` date NOT NULL,
  `luogo` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;


3. Popolare il DB

INSERT INTO `manifestazioni` (`id`, `titolo`, `descrizione`, `datainizio`, `datafine`, `luogo`, `citta`) VALUES
(1, 'Sono Romagnolo torna la Fiera della romagnolita', 'Torna alla Fiera di Cesena, dopo il successo della prima edizione con 24 mila presenze, la kermesse Sono Romagnolo.', '2017-03-03', '2017-03-07', 'Cesena Fiera', 'Cesena'),
(2, 'Ritornano gli Yuppies al Teatro Verdi: ospite Sergio Sgrilli', 'Sabato ritornano gli Yuppies al Teatro Verdi Cesena. Ad animare la serata Sergio Sgrilli. Sono aperte le prenotazioni!\r\n\r\n', '2017-01-21', '2017-01-21', 'Teatro Verdi', 'Cesena');



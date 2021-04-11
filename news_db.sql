-- USER CREATION
CREATE TABLE `newsapp`.`user` ( 
`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(50) NOT NULL , 
`user` VARCHAR(50) NOT NULL , 
`password` VARCHAR(50) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- NEWS CREATION
CREATE TABLE `newsapp`.`news` (
`id` INT NOT NULL AUTO_INCREMENT ,
`title` VARCHAR(50) NOT NULL ,
`photo` VARCHAR(50) NOT NULL ,
`text` TEXT NOT NULL ,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`autor` VARCHAR(50) NOT NULL ,
`section_id` INT NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- SECTION CREATION
CREATE TABLE `newsapp`.`sections` ( 
`id` INT NOT NULL AUTO_INCREMENT , 
`section` VARCHAR(50) NOT NULL , 
`st` INT NOT NULL DEFAULT '1' ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- FOREIGN KEY NEWS
ALTER TABLE `news` ADD FOREIGN KEY (
`section_id`) REFERENCES `sections`(`id`) 
ON DELETE RESTRICT ON UPDATE RESTRICT;

-- SECTION DATA INSERTION
INSERT INTO `sections` (`id`, `section`, `st`) VALUES (NULL, 'Sports', '1'), (NULL, 'Financial', '1'), (NULL, 'Politics','1');

-- USER DATA INSERTION
INSERT INTO `user` (`id`, `name`, `user`, `password`) VALUES (NULL, 'Emanuel', 'mezcal_editor', '1234');

-- NEWS DATA INSERTION
INSERT INTO `news` (`id`, `title`, `photo`, `text`, `date`, `autor`, `section_id`) 
VALUES (NULL, '¡Tensión en Madrid!', 'madrid.jpg', 'En Madrid, estalla una ola de crimen devastador. La gente comienza a exigirle a sus mandatarios que comiencen a tomar cartas en el asunto. Sin embargo, al no ser escuchados, quemaron uno de los centros joyeros más importantes del mundo.', current_timestamp(), 'Emanuel Camarena', '3'),
(NULL, 'Guarden sus Bitcoins', 'stonks.jpg', 'El banco mundial comenzó a ver el aumento del valor de la moneda internacional que no le pertenece a ninguna nación. Se preguntarán como funciona, y esto es porque es una clave criptográfica que se asocia a un monedero virtual, el cual descuenta y recibe pagos. Para poder hacer un intercambio, cada usuario debe tener una clave criptográfica y el sistema permite descontar la cantidad de bitcoin a quien compra y aumentar la cantidad de bitcoin de la cuenta de quien vende.', current_timestamp(), 'Carlos Gutierrez', '2');



INSERT INTO `news` (`id`, `title`, `photo`, `text`, `date`, `autor`,`section_id`) VALUES (NULL, 'Test','test.jpg','TEST\r\nTEST\r\nTEST\r\nTEST\r\nTEST', current_timestamp(),'Test', '1')

INSERT INTO `news` (`id`, `title`, `photo`, `text`, `date`, `autor`,`section_id`) VALUES (NULL, 'Test2','test.jpg','TEST 2\r\nTEST 2\r\nTEST 2\r\nTEST 2\r\nTEST 2', current_timestamp(),'Test', '3');

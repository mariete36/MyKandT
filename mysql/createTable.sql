CREATE TABLE `page` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
   `title` VARCHAR (110) NOT NULL,
   `h1` VARCHAR (70) NOT NULL,
   `paragraphe` VARCHAR (3000) NOT NULL,
   `span-class` VARCHAR (400) NOT NULL,
   `span-text` VARCHAR (50) NOT NULL,
   `img-alt` VARCHAR (100) NOT NULL,
   `img-src` VARCHAR (2048) NOT NULL,
   `nav-title` VARCHAR (50) NOT NULL,
   `slug` VARCHAR (50) NOT NULL,
   PRIMARY KEY (`id`)
);

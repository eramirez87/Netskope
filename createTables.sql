CREATE TABLE `movies` (
   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `Film` text,
   `Genre` text,
   `Lead_Studio` text,
   `Audience_score` int(11) DEFAULT NULL,
   `Profitability` double DEFAULT NULL,
   `Rotten_Tomatoes` int(11) DEFAULT NULL,
   `Worldwide_Gross` text,
   `Year` int(11) DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `comments` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `id_movie` int(10) unsigned DEFAULT NULL,
   `name` varchar(45) DEFAULT NULL,
   `comment` tinytext,
   `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`),
   KEY `k_movies` (`id_movie`),
   CONSTRAINT `FK_MOVIES` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 
 
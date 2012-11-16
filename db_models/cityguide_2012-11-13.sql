# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.24)
# Datenbank: cityguide
# Erstellungsdauer: 2012-11-13 20:33:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle location
# ------------------------------------------------------------

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;

INSERT INTO `location` (`id`, `name`, `lat`, `lng`, `description`, `poi`, `type`)
VALUES
	(1,'Zytglogge',46.947907,7.447669999999999,'Der Zeitglockenturm (Zytglogge) war das erste Westtor der Stadt (1191 - 1256) und zählt heute zu den wichtigsten Sehenswürdigkeiten Berns.\n\n1530 entstanden die kunstvolle astronomische Kalenderuhr und das Spielwerk. Die Turmuhr hatte die Funktion der Hauptuhr der Stadt und war somit massgebend in Bern. Von dort aus wurden die Wegstunden gemessen, welche auf den Stundensteinen der Kantonsstrassen vermerkt sind.',1,1),
	(2,'Bärenpark',46.946722,7.459047899999999,'BärenPark\nDas Berner Wappentier wurde im Herbst 2009 in die neue Freiheit am wunderschönen Aarehang entlassen. Im artgerechten BärenPark wurde eine Landschaft geschaffen, in der die Bären klettern, fischen und spielen und sich aber auch zurückziehen können.\n\nDer Besuch des BärenParks ist für Jung und Alt ein Erlebnis der besonderen Art. Besucherwege führen durchs Gelände bis runter an den Uferweg der Aare und ermöglichen den Gästen einen tollen Einblick ins Bärenleben. Praktisch hautnah kann man den Bären beim Spielen, Baden und Klettern zusehen.',1,2),
	(3,'Bundeshaus',46.94654269999999,7.4442543,'Das Bundeshaus\nBereits 1852 begann der Bau des Bundeshauses (heute Bundeshaus West). 1884 wurde es durch das spiegelbildliche Bundeshaus Ost ergänzt und 1902 schliesslich durch das mittlere Parlamentsgebäude zu einem dreiteiligen Gebäudekomplex erweitert. \n\nInsgesamt 38 Künstler aus allen Landesteilen waren für die Dekorationen am Bundeshaus verantwortlich. Das Bundeshaus ist der Sitz der Schweizer Regierung (+Bundesrat) und des Parlaments (National- und Ständerat). Das Parlamentsgebäude wurde 1902 vollendet.',1,1),
	(4,'Das Berner Münster',46.9472221,7.451202500000001,'Das Berner Münster\nDas Berner Münster ist der grösste Sakralbau der Schweiz. 1421 wurde mit dem Bau begonnen, und über Generationen hinweg arbeiteten Bauherren an diesem Meisterwerk. Der Turm wurde erst 1893 vollendet.\n\nEin herausragendes Merkmal ist das Portal, in welchem die Darstellung des Jüngsten Gerichts zu bewundern ist. 344 Stufen über dem Eingang befindet sich der Aussichtspunkt des Kunstwerkes: der 100 Meter hohe Münsterturm.\n\nVom höchsten Kirchenturm der Schweiz offenbart sich dem Besucher eine prachtvolle Aussicht über die Stadt bis weit ins Berner Mittelland und auf die Schneeberge des Berner Oberlands',1,1),
	(5,'Rosengarten',46.9515211,7.460307599999999,'Rosengarten\nDer Rosengarten ist ein grosszügig angelegter Park mit wunderschöner Aussicht auf die Altstadt und die Aareschlaufe. Im Park befinden sich 220 verschiedene Rosensorten, 200 Irisarten und Moorbeeten mit 28 verschiedenen Rhododendren.\n\nVon 1765 - 1877 diente der Rosengarten als Friedhof der unteren Stadt. Seit 1913 ist der Garten eine öffentliche Anlage mit einer üppigen Blütenpracht und einer Teichanlage. 1956 - 62 wurde der Park neu gestaltet und mit Rhododendren- und Azaleenpflanzungen sowie einem Irisgarten angelegt.',1,2),
	(6,'Einsteinhaus',46.9479194,7.449918099999999,'Einstein Haus\nDas Einstein Haus befindet sich im Zentrum der Altstadt, an der Kramgasse 49, etwa 200 Meter unterhalb des Zeitglockenturms (Zytglogge).\n\nAlbert Einstein hat die Wohnung von 1903 bis 1905 gemietet und lebte dort mit seiner Frau Mileva und Sohn Hans Albert. Die Wohnung im zweiten Stock zeigt Mobiliar aus jener Zeit sowie Bilder und Texte, präsentiert mit Hilfe moderner Ausstellungssysteme. ',1,3),
	(7,'Historisches Museum',46.9429532,7.449348799999999,'Bernisches Historisches Museum\nIn seinen Dauerausstellungen zeigt das Bernische Historische Museum Highlights aus den Sparten Geschichte, Ur- und Frühgeschichte sowie Ethnographie. Die präsentierten Stücke reichen von der Steinzeit bis zur Gegenwart und entstammen Kulturen aller Erdteile.\n\nDas integrierte Einstein Museum stellt das Leben und Werk des Physikers in packender Weise in den Kontext der Weltgeschichte. Animationsfilme und Experimente veranschaulichen die bahnbrechenden Theorien des Genies.',1,3),
	(8,'Zentrum Paul Klee',46.9488917,7.474098499999998,'Zentrum Paul Klee\nZum Zentrum Paul Klee gehören wechselnde Präsentationen der rund 4?000 Werke aus der weltweit bedeutendsten Klee-Sammlung - jeweils zu einem wechselnden Thema. \n\nDie multimediale Museumsstrasse dieses Paul Klee gewidmeten Zentrums lädt zum Flanieren, Kommunizieren und Verweilen ein.\n\nSonderausstellungen, ein breites Vermittlungsangebot für Kinder, Jugendliche und Erwachsene - insbesondere im Kindermuseum Creaviva - sowie Konzerte und Veranstaltungen ergänzen das Angebot des einzigartigen Museums.',1,3),
	(17,'Somewhere',46.9389913,7.467844800000001,NULL,NULL,NULL);

/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle user
# ------------------------------------------------------------

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `fbid`, `email`, `password`, `firstname`, `lastname`, `avatar`, `is_registered`, `created_at`, `location_id`)
VALUES
	(1,NULL,'jim','jim','jim',NULL,NULL,0,NULL,17);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

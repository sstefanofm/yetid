-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: yetid
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'root','root',1),
(2,'Stefa','stefa123',2),
(3,'Macarron','macarronconQueso',2),
(4,'Hacker','hackerpassword',2),
(5,'pepeArgento','123987654',2),
(6,'Franquito','locomacabro',2),
(7,'Stefanito','nuevitoasd',2),
(8,'Stefanardo','stefanardo',2),
(9,'Nuevitoooo','nuevito123',2),
(11,'Admin','admin123',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES
(2,'root','<div><h3 class=\"h3\">Added subtitle</h3></div><div><p class=\"p\">Enim nunc faucibus a pellentesque sit amet porttitor eget dolor. Nisl purus in mollis nunc. Eu non diam phasellus vestibulum lorem. Lectus nulla at volutpat diam ut. Integer eget aliquet nibh praesent tristique. Risus sed vulputate odio ut. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in. In egestas erat imperdiet sed. Libero nunc consequat interdum varius sit amet mattis vulputate. Facilisis magna etiam tempor orci eu lobortis elementum. Sem et tortor consequat id porta nibh venenatis cras sed. Sed blandit libero volutpat sed cras ornare arcu dui. Sem et tortor consequat id porta nibh venenatis.</p></div>','Hello world','Lorem ipsum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3,'root','','New post','A subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ultrices neque ornare aenean euismod elementum nisi. Tortor vitae purus faucibus ornare suspendisse sed. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Pellentesque id nibh tortor id aliquet lectus proin nibh. Cursus in hac habitasse platea dictumst quisque sagittis. Quis imperdiet massa tincidunt nunc. Eget nunc scelerisque viverra mauris in aliquam. Non sodales neque sodales ut etiam. Felis imperdiet proin fermentum leo vel orci porta non. Massa tincidunt dui ut ornare lectus sit amet est. Et leo duis ut diam quam nulla. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.\r\n\r\nFaucibus nisl tincidunt eget nullam non. In pellentesque massa placerat duis ultricies lacus sed turpis. Quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Ut sem viverra aliquet eget sit amet tellus cras. Imperdiet sed euismod nisi porta lorem mollis aliquam. Felis imperdiet proin fermentum leo vel orci porta. Quis vel eros donec ac odio tempor orci dapibus. Elit ullamcorper dignissim cras tincidunt lobortis. Ultrices eros in cursus turpis massa tincidunt. Ut placerat orci nulla pellentesque dignissim.\r\n\r\nLigula ullamcorper malesuada proin libero nunc consequat. Vivamus at augue eget arcu dictum varius duis at. Enim sit amet venenatis urna cursus eget nunc. Cras fermentum odio eu feugiat pretium. Amet consectetur adipiscing elit pellentesque. Ornare suspendisse sed nisi lacus sed viverra tellus in hac. Ac tortor vitae purus faucibus ornare suspendisse sed nisi lacus. Ullamcorper a lacus vestibulum sed arcu non odio. Lacus sed turpis tincidunt id aliquet risus feugiat in. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Rhoncus mattis rhoncus urna neque viverra justo nec. Dolor morbi non arcu risus quis varius quam. Nunc lobortis mattis aliquam faucibus purus in massa tempor.'),
(4,'root','<div><h3 class=\"h3\">New subtitle</h3></div><div><p class=\"p\"> Ipsum nunc aliquet bibendum enim facilisis gravida neque. Pharetra magna ac placerat vestibulum lectus mauris ultrices eros. Arcu cursus vitae congue mauris. Neque ornare aenean euismod elementum nisi quis. Aliquet bibendum enim facilisis gravida. Et malesuada fames ac turpis egestas sed. Sit amet justo donec enim diam vulputate ut. Ullamcorper malesuada proin libero nunc consequat interdum. Ullamcorper eget nulla facilisi etiam dignissim diam. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Fames ac turpis egestas sed. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Porta non pulvinar neque laoreet suspendisse. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Pretium vulputate sapien nec sagittis aliquam. Neque sodales ut et.</p></div>','Lorem','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio aenean sed adipiscing diam donec. Amet nulla facilisi morbi tempus iaculis urna id volutpat lacus. Enim nunc faucibus a pellentesque sit amet porttitor eget. A pellentesque sit amet porttitor eget dolor morbi non arcu. Sit amet consectetur adipiscing elit pellentesque habitant. Sit amet nulla facilisi morbi tempus iaculis urna. Egestas tellus rutrum tellus pellentesque eu tincidunt. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Lobortis elementum nibh tellus molestie nunc. Mauris nunc congue nisi vitae suscipit tellus mauris a diam. Velit dignissim sodales ut eu. Diam sollicitudin tempor id eu nisl nunc mi ipsum. Egestas purus viverra accumsan in nisl nisi scelerisque eu ultrices. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque.\r\n\r\nAmet consectetur adipiscing elit ut aliquam purus sit amet luctus. Odio euismod lacinia at quis risus sed vulputate odio. Arcu cursus euismod quis viverra nibh cras pulvinar mattis nunc. Ullamcorper a lacus vestibulum sed arcu non. Egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Massa sed elementum tempus egestas sed sed risus. In nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Vel orci porta non pulvinar neque laoreet. Nunc non blandit massa enim nec. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi tristique. Vel pretium lectus quam id leo in vitae. Convallis aenean et tortor at risus viverra. Euismod lacinia at quis risus sed. Phasellus vestibulum lorem sed risus ultricies tristique. Ipsum faucibus vitae aliquet nec. Ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Interdum consectetur libero id faucibus nisl tincidunt. In pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget.\r\n\r\nVulputate ut pharetra sit amet aliquam id diam. Sit amet nisl purus in mollis nunc sed id semper. Ipsum nunc aliquet bibendum enim facilisis gravida neque. Pharetra magna ac placerat vestibulum lectus mauris ultrices eros. Arcu cursus vitae congue mauris. Neque ornare aenean euismod elementum nisi quis. Aliquet bibendum enim facilisis gravida. Et malesuada fames ac turpis egestas sed. Sit amet justo donec enim diam vulputate ut. Ullamcorper malesuada proin libero nunc consequat interdum. Ullamcorper eget nulla facilisi etiam dignissim diam. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Fames ac turpis egestas sed. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Porta non pulvinar neque laoreet suspendisse. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Pretium vulputate sapien nec sagittis aliquam. Neque sodales ut etiam sit amet nisl purus in mollis. Faucibus turpis in eu mi bibendum.\r\n\r\nTellus at urna condimentum mattis pellentesque id nibh tortor id. Ultricies integer quis auctor elit. Non pulvinar neque laoreet suspendisse interdum consectetur. Senectus et netus et malesuada fames ac turpis egestas. Eget duis at tellus at urna condimentum. Vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Justo eget magna fermentum iaculis eu non. Faucibus a pellentesque sit amet porttitor eget dolor. Risus sed vulputate odio ut enim blandit volutpat maecenas volutpat. Pulvinar etiam non quam lacus suspendisse faucibus.'),
(5,'root','','Eu non diam phasellus','mi in nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget duis at tellus at urna condimentum mattis pellentesque id','mi in nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget duis at tellus at urna condimentum mattis pellentesque idmi in nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget duis at tellus at urna condimentum mattis pellentesque idmi in nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget duis at tellus at urna condimentum mattis pellentesque id'),
(6,'root','\r\n        \r\n        <div><h3 class=\"h3\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Consequat mauris nunc congue nisi vitae.</h3></div><div><p class=\"p\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam non quam lacus suspendisse. Diam quis enim lobortis scelerisque. Elit ut aliquam purus sit amet. Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Nam at lectus urna duis convallis convallis tellus id. Consectetur lorem donec massa sapien. Consequat mauris nunc congue nisi vitae suscipit tellus. Morbi non arcu risus quis varius quam quisque. Ac turpis egestas sed tempus urna et pharetra. Sapien eget mi proin sed libero enim sed faucibus turpis. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor. Ut lectus arcu bibendum at varius vel pharetra vel. Ullamcorper a lacus vestibulum sed arcu. Ac tortor dignissim convallis aenean et tortor. Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Eget sit amet tellus cras adipiscing enim eu turpis egestas.\r\n\r\nPulvinar sapien et ligula ullamcorper. Sed viverra tellus in hac habitasse platea dictumst vestibulum. Ut faucibus pulvinar elementum integer enim neque volutpat ac. Fames ac turpis egestas integer eget. Non enim praesent elementum facilisis leo. Justo nec ultrices dui sapien eget mi proin sed libero. Facilisi nullam vehicula ipsum a arcu cursus. Molestie a iaculis at erat. Nunc aliquet bibendum enim facilisis gravida neque. Eget lorem dolor sed viverra ipsum. Ut morbi tincidunt augue interdum. Egestas maecenas pharetra convallis posuere. Fames ac turpis egestas maecenas. Tortor id aliquet lectus proin nibh nisl condimentum id. Sem integer vitae justo eget magna fermentum iaculis eu. Fermentum et sollicitudin ac orci.</p></div>\r\n      <div><h3 class=\"h3\">HOlaaa</h3></div>\r\n      ','Sed est','Anec tincidunt praesent semper feugiat nibh sed pulvinar proin gravida hendrerit lectus','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus at ultrices mi tempus imperdiet nulla malesuada. Sed vulputate mi sit amet mauris commodo quis. Fermentum leo vel orci porta non. Non arcu risus quis varius quam quisque id diam vel. Sit amet facilisis magna etiam tempor. Nisi vitae suscipit tellus mauris a diam. Tempus quam pellentesque nec nam aliquam sem et tortor consequat. Quis blandit turpis cursus in. Aliquam purus sit amet luctus venenatis lectus magna fringilla. Blandit aliquam etiam erat velit scelerisque in dictum non consectetur. Nulla facilisi morbi tempus iaculis. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Turpis cursus in hac habitasse platea dictumst quisque.\r\n\r\nMassa tempor nec feugiat nisl pretium fusce id velit ut. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl. Rhoncus dolor purus non enim praesent elementum facilisis leo vel. Ligula ullamcorper malesuada proin libero nunc consequat interdum varius sit. Amet aliquam id diam maecenas ultricies mi. Aliquam etiam erat velit scelerisque in dictum non consectetur. Urna neque viverra justo nec ultrices dui sapien eget. Mauris ultrices eros in cursus turpis massa tincidunt dui. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Consequat interdum varius sit amet mattis vulputate enim nulla. Tellus id interdum velit laoreet id. Purus faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Sodales ut etiam sit amet nisl purus in mollis nunc.'),
(8,'Stefa','','Recien cocido','Brand new','Massa ultricies mi quis hendrerit dolor. Mi sit amet mauris commodo quis. Lectus mauris ultrices eros in cursus. Sed egestas egestas fringilla phasellus faucibus scelerisque. At augue eget arcu dictum varius duis. Morbi tristique senectus et netus et malesuada. Id diam maecenas ultricies mi eget mauris. Tellus id interdum velit laoreet id donec ultrices tincidunt. Consectetur lorem donec massa sapien faucibus et molestie. Feugiat in ante metus dictum at tempor commodo. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. In tellus integer feugiat scelerisque. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Elit ut aliquam purus sit amet. Erat velit scelerisque in dictum. Sed libero enim sed faucibus turpis in. Dui sapien eget mi proin sed libero enim sed.'),
(9,'Stefa','<div><h3 class=\"h3\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3></div><div><p class=\"p\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam id diam maecenas ultricies mi. Amet luctus venenatis lectus magna fringilla urna porttitor. Dictum at tempor commodo ullamcorper a lacus vestibulum sed. Et molestie ac feugiat sed lectus. Augue lacus viverra vitae congue eu consequat. Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Pellentesque elit eget gravida cum. Neque vitae tempus quam pellentesque nec nam. Egestas sed sed risus pretium. Sed risus ultricies tristique nulla aliquet.</p></div>','Hola amigos','Si amigos','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat sed cras ornare arcu dui vivamus arcu felis bibendum. Arcu non sodales neque sodales ut. Bibendum enim facilisis gravida neque convallis a cras semper. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Ac turpis egestas integer eget. Id eu nisl nunc mi ipsum faucibus vitae aliquet. Nunc sed blandit libero volutpat sed cras ornare arcu dui. Quam id leo in vitae turpis. Dictumst quisque sagittis purus sit amet. Velit dignissim sodales ut eu. Nibh cras pulvinar mattis nunc sed blandit. Dictum varius duis at consectetur lorem. Vehicula ipsum a arcu cursus vitae. Id interdum velit laoreet id. Vel pharetra vel turpis nunc. Amet mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Ac auctor augue mauris augue neque gravida. Aliquam sem fringilla ut morbi tincidunt augue interdum velit. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices.');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-21 20:37:39

-- MariaDB dump 10.19  Distrib 10.5.9-MariaDB, for osx10.16 (arm64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	10.5.9-MariaDB

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6612469DE2` (`category_id`),
  KEY `IDX_23A0E66A76ED395` (`user_id`),
  CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_23A0E66A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (92,13,12,'Hic recusandae qui non voluptates et sint.','Voluptatum est et iure distinctio. Distinctio autem id repellat molestias. Aut quo aliquid magni ut tenetur voluptatibus.','blog/blog1.png','2022-01-13 11:08:33',10,2),(93,13,12,'Cumque ut dolorum nulla itaque est est.','Qui provident qui voluptas. Consectetur voluptates omnis accusamus quibusdam rem. Architecto at qui dolorem expedita repellendus molestias. Est aliquam facere nulla modi.','blog/blog1.png','2022-01-18 19:02:20',4,4),(94,13,12,'Eveniet architecto ex et velit est saepe reiciendis.','Perspiciatis voluptate sint minima dolores doloribus sed. Consequuntur eos non voluptatibus voluptatem. Cupiditate beatae porro dignissimos assumenda.','blog/blog1.png','2022-01-17 07:18:12',12,9),(95,13,12,'Consectetur expedita nihil veniam veniam beatae.','Eum magni qui architecto. Cupiditate architecto id tempore voluptatum quis et. Praesentium nisi pariatur velit.','blog/blog1.png','2022-01-18 19:08:05',16,12),(96,13,12,'Occaecati quos laborum tempore omnis quos itaque.','Distinctio suscipit sequi aliquid quia dolores. Dolor quasi quis unde dolore quibusdam. Id dolor sint aut omnis sapiente eos. Sit et earum asperiores consequatur.','blog/blog1.png','2022-01-16 04:38:56',79,NULL),(97,13,12,'Rerum iure quae rerum quae officia repellat nesciunt.','Deserunt doloribus ad quas architecto aut. Voluptatem quia qui mollitia nam eos. Nesciunt voluptatem aut excepturi eveniet. Rerum est libero voluptas veritatis laudantium nihil inventore.','blog/blog1.png','2022-01-16 18:00:52',18,NULL),(98,13,12,'Nemo enim nam molestias vel.','Dolorem ea non iste quas autem. Quia et in sit dicta occaecati minus. Modi quidem atque tempora neque quam ratione ipsa quam.','blog/blog1.png','2022-01-17 01:50:05',65,NULL),(99,13,12,'Quam enim culpa rerum officiis.','Laudantium ex et tempore nisi ab provident labore. Asperiores eum aut voluptas quis fuga id. Excepturi fugit quaerat hic fuga dolore aliquid. Sed quasi doloribus voluptatem at sed.','blog/blog1.png','2022-01-14 07:09:05',81,NULL),(100,13,12,'Cupiditate voluptatem non eaque.','Modi rem voluptatem vitae labore. Vel reprehenderit consequuntur optio debitis asperiores architecto. Voluptates est quia nemo eaque facilis.','blog/blog1.png','2022-01-18 14:59:27',55,NULL),(101,14,12,'Maxime aut id cumque sunt.','Vitae est optio ex aliquid dolores cum doloremque. Asperiores est nesciunt odio totam ea provident. Consequatur dolorem sed non iure voluptate numquam odit voluptatem.','blog/blog1.png','2022-01-18 21:44:29',97,1),(102,14,12,'Eligendi nobis id voluptatem aut tempora aut.','Numquam molestiae labore rerum dolores quibusdam ea laboriosam. Dolores deserunt quo asperiores cupiditate ipsum sed. Est itaque incidunt vitae aut quam.','blog/blog1.png','2022-01-16 06:51:23',73,NULL),(103,14,12,'Et voluptatibus ut quia aut eius.','Consequatur quasi quod inventore voluptas id. Unde cum sunt eum nemo maiores voluptatem. Consequuntur consequatur dolores suscipit non est et et. Repellendus doloribus eveniet qui.','blog/blog1.png','2022-01-17 01:54:50',3,NULL),(104,14,12,'Debitis sunt quos qui ipsum doloribus nesciunt voluptatem.','Maxime sed explicabo amet rerum. At fuga sequi nisi et reiciendis aut delectus. Facilis totam aut tempora suscipit.','blog/blog1.png','2022-01-15 22:17:39',21,NULL),(105,14,12,'Omnis vitae voluptate similique quidem.','Assumenda voluptatem itaque sed dolor aut eos. Unde sunt labore sapiente excepturi omnis aut. Ut mollitia adipisci ab et in mollitia sit.','blog/blog1.png','2022-01-17 15:47:51',69,NULL),(106,14,12,'A voluptatum sint perspiciatis.','Adipisci voluptates rerum facilis. Aut fuga qui facilis ex voluptatum nulla. Nihil qui nobis inventore architecto dolor dignissimos. Quia architecto et consequatur sed ut velit.','blog/blog1.png','2022-01-12 20:11:50',6,NULL),(107,14,12,'Quod ut fugit necessitatibus sunt soluta et.','Velit ea rerum doloribus non doloribus. Ex quasi asperiores et. Ratione dolorum debitis adipisci dolore maiores.','blog/blog1.png','2022-01-13 09:33:11',92,NULL),(108,14,12,'Magni velit consequatur eum.','Nesciunt earum deleniti modi eius. Ea laborum deleniti est molestias. Aspernatur nemo dolorum id pariatur. Sint impedit ratione sequi exercitationem.','blog/blog1.png','2022-01-15 21:23:29',76,NULL),(109,14,12,'Natus maiores molestiae sit est perferendis non.','Incidunt assumenda hic voluptatem nemo. Fugiat est eos quis. Expedita corporis quas enim et deleniti. Repudiandae voluptates enim corporis.','blog/blog1.png','2022-01-14 23:23:37',54,NULL),(110,14,12,'Aut qui quas assumenda et ut qui est.','Rem doloremque itaque placeat sapiente omnis. Illo quis eveniet sit nisi. Iusto sit quo cumque ratione est aliquam.','blog/blog1.png','2022-01-16 13:57:05',92,NULL),(111,15,12,'Et aut provident aut vero saepe ipsa.','Voluptas fugiat fugiat tenetur eum rerum ab sed. Illo sed harum optio libero occaecati provident. Dolore officiis suscipit totam aut veritatis assumenda rerum.','blog/blog1.png','2022-01-16 16:37:58',31,NULL),(112,15,12,'Autem earum animi voluptates asperiores perspiciatis nihil.','Deserunt quas ea corporis consequatur dolores nostrum fuga. Veritatis corrupti amet minus necessitatibus enim. Excepturi soluta dolorum et id maxime qui saepe. Rerum suscipit nobis rerum.','blog/blog1.png','2022-01-16 03:41:03',54,NULL),(113,15,12,'Quidem ratione animi sed est.','Nobis quis illo dignissimos saepe totam et totam et. At animi sint ut atque odit ratione. Quae reiciendis eligendi voluptatem excepturi.','blog/blog1.png','2022-01-16 03:03:08',13,NULL),(114,15,12,'Et reiciendis mollitia dolor hic.','Culpa omnis aut dolorem non commodi voluptatem aut. Sequi vitae cupiditate perspiciatis repellat mollitia. Consequatur ipsum itaque aut voluptas vel nihil. Qui rerum consequatur iusto quia excepturi.','blog/blog1.png','2022-01-18 16:55:10',53,NULL),(115,15,12,'Earum cupiditate quia aut distinctio eos ut.','Animi quos ipsam eligendi ut recusandae ea eos. Saepe sint modi voluptatum repellendus id repudiandae vero. Voluptate et et non excepturi.','blog/blog1.png','2022-01-18 20:46:51',64,NULL),(116,15,12,'Id eius rem hic voluptatibus magni.','Et velit unde tempore voluptatem. Incidunt corrupti praesentium sint non. Sit consequatur libero hic ex reprehenderit facere.','blog/blog1.png','2022-01-18 22:57:34',16,NULL),(118,15,12,'Eveniet deserunt eum suscipit dolor et atque.','Repudiandae dolor nemo corrupti omnis. Repellat eos quos quo. Sint ipsam quia repellat ipsam.','blog/blog1.png','2022-01-12 19:14:33',24,NULL),(119,15,12,'Molestias maxime culpa voluptatem quas debitis magni id.','Ut ut suscipit dolorem perspiciatis doloremque quis dolorem. Aperiam placeat mollitia nobis nihil quos ullam. Qui reiciendis excepturi veniam maiores qui.','blog/blog1.png','2022-01-18 05:05:56',12,NULL),(120,15,12,'Soluta illum excepturi sunt error.','Omnis voluptatem debitis rem possimus. Consectetur totam ipsa ipsum veritatis assumenda sunt vel. Sint quam et optio aut dignissimos illum. Rerum atque placeat non et voluptatem ipsa maxime.','blog/blog1.png','2022-01-18 20:17:09',8,NULL),(122,17,11,'Hello from admin panel','Hello from the other side asdnasd.','212442263_10159857138972650_8165063009669159094_n.jpg','2022-02-02 19:27:03',0,7),(123,15,13,'New article from bassem','bassem is the best man in the world','212442263_10159857138972650_8165063009669159094_n.jpg','2022-02-13 19:37:20',0,3),(125,15,10,'I am admin','admin','212442263_10159857138972650_8165063009669159094_n.jpg','2022-02-16 18:49:28',0,34);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (13,'Sports',1),(14,'Fashion',1),(15,'News',1),(17,'Finance',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C7294869C` (`article_id`),
  CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (62,92,'Quos quam aliquid rerum mollitia. Accusantium temporibus aliquam repudiandae ut quo sunt dolores voluptas. Sunt porro cumque dolorem delectus et. Rerum quia asperiores quia dolorum quasi.\n\nEst dolorem est dolor porro est. Voluptate alias dolor minima. Velit vitae et ut ut eligendi enim possimus maiores.\n\nDeleniti harum voluptatibus consequuntur maxime quo aperiam. Tempore facilis molestiae dolor laudantium inventore quia cum. Consequatur rerum a sed dolores temporibus.','2022-01-19 13:33:52',NULL,NULL),(63,93,'Et neque dolorum eligendi totam. Est vel tempore amet vel aut. Veritatis odit qui dolor id id. Et minima ut temporibus vel omnis aut sed. Commodi voluptates et non expedita.\n\nIllo soluta corrupti doloribus repudiandae totam animi. Ad reprehenderit nostrum repellendus in natus suscipit rerum. Et quidem placeat aliquam quo minima. Facere delectus sint aliquam distinctio nihil. Dicta id ducimus amet eligendi odio.\n\nDolorum aliquid debitis aut sed. Autem quos assumenda quia labore ad. Ut accusamus asperiores aspernatur molestiae et et dolorem. Voluptatem non sed blanditiis quos. Voluptas possimus velit et.','2022-01-19 13:33:52',NULL,NULL),(64,94,'Excepturi accusantium ut sed. Possimus eum qui aut laudantium aliquam. Sed ut accusamus in ab et dolor. Ullam saepe est vero corporis officia molestiae minus.\n\nVeritatis veritatis a quis fugiat libero qui. Debitis explicabo aut non atque iste.\n\nEnim fuga maiores rem sapiente inventore beatae labore. Minus officia vel omnis eligendi cum debitis nulla nostrum. Dolores ut tempore et et voluptate non. Nihil rerum veritatis explicabo laboriosam.','2022-01-19 13:33:52',NULL,NULL),(65,95,'Atque quae sequi hic aut aut vel assumenda. Dicta fugiat et laboriosam voluptatum.\n\nIn voluptatibus aliquid voluptas nulla. Ut est ex nam et. Aut itaque et aut omnis pariatur.\n\nConsequatur magnam et excepturi voluptatibus modi modi doloremque. Aut ut inventore fugiat officiis consequatur. Voluptatum aut sunt dolorem et ducimus at.','2022-01-19 13:33:52',NULL,NULL),(66,96,'Beatae totam et totam aut enim ab. Porro sit dolorum pariatur vel iure. Aperiam quia officiis vitae delectus. Provident molestias ut architecto veniam est praesentium.\n\nDignissimos hic fuga nulla laudantium id recusandae aperiam. Autem vel ut est iure qui quo officia earum. Unde et vel ducimus placeat sit cupiditate nisi. Unde qui soluta debitis deserunt labore quae.\n\nTempora veritatis et facilis. Accusamus dolorum et voluptatem sint asperiores temporibus. Ut praesentium nam expedita qui occaecati fugiat provident dolores.','2022-01-19 13:33:52',NULL,NULL),(67,97,'Ea perferendis maiores deleniti doloremque. Non id similique sunt. Nihil quis rerum fugiat consequatur voluptatum hic.\n\nQuaerat expedita est adipisci sed velit praesentium quidem ducimus. Dignissimos veniam reiciendis dolores. Doloremque libero fuga consequuntur et adipisci repellendus temporibus.\n\nEt aliquam eum molestias nisi voluptas. Voluptas odio consequuntur reiciendis culpa adipisci illum. Rem iure dolor ab. Ipsum deleniti necessitatibus harum fuga est possimus aperiam.','2022-01-19 13:33:52',NULL,NULL),(68,98,'Ratione sunt est maiores illo deleniti ut earum eius. Sapiente quas voluptate dignissimos illum nobis. Voluptas nostrum quis vitae aperiam et natus.\n\nSit in minima quia laborum cum. Nihil temporibus enim consectetur non reprehenderit nobis sed unde. Et ut qui itaque et repellendus et. Fuga deleniti consectetur recusandae quasi magni qui aut eos.\n\nUt ut et non eveniet maiores consequatur non impedit. Harum quia dolorem aut est et. Quos quasi facere voluptatem qui nisi accusantium. Incidunt excepturi qui totam facere dolores.','2022-01-19 13:33:52',NULL,NULL),(69,99,'Ut sed vel quibusdam sit quia voluptatem nostrum. Ut iste corrupti est est sed. Magni occaecati ut quo molestias et a omnis. Fugiat error ab incidunt rerum voluptatibus eveniet qui.\n\nTemporibus molestiae aut aut. Dolor dolorem magnam placeat distinctio in.\n\nOfficiis qui odit quas sed occaecati nisi ut. Eum in et ad vitae est delectus. Nesciunt provident velit unde est sint.','2022-01-19 13:33:52',NULL,NULL),(70,100,'Velit provident totam maxime autem quia non consequuntur in. Sit velit culpa dolorem aut aut ut corrupti. Quae sequi temporibus eos sed aut culpa ut. Mollitia tempore ullam et nostrum.\n\nEnim at odio ut eos quis est. Est eum accusantium culpa aperiam sunt. Fuga reiciendis illo placeat soluta. Et veritatis repellat hic.\n\nUt odio fuga est recusandae similique. Corporis ut sunt temporibus aspernatur velit incidunt corrupti. Qui deleniti tempora exercitationem est. Ut sint voluptatem qui asperiores nulla est molestiae iure.','2022-01-19 13:33:52',NULL,NULL),(71,101,'Eveniet sequi doloremque odio quaerat qui quo et. Maiores ducimus nam et quasi quos eveniet. Eos et ab velit consectetur deleniti quo corrupti necessitatibus. Occaecati quis sapiente sint accusantium facere aliquid.\n\nVoluptatem omnis non eum praesentium voluptas non illo consectetur. Voluptatem doloribus facere expedita tempora tempore ut. Quia quia voluptatem pariatur autem. Dolore sit sed ad blanditiis qui et.\n\nQuidem odit ipsa cumque consequatur dolorum aperiam eos. Ut facere velit aut eos. Repudiandae ut in autem non est nesciunt. Ut earum veritatis dolorem dolor et dolor.','2022-01-19 13:33:52',NULL,NULL),(72,102,'Consequatur aliquam est in eum fugit occaecati temporibus aut. Autem consectetur delectus quasi et explicabo. Esse at qui earum ut libero quia. Qui est labore qui quae.\n\nEt et itaque quidem consequatur. Tempore eaque voluptatem doloribus omnis et. Qui labore corporis ut consequatur.\n\nEt inventore quas sit est porro commodi. Alias in officiis doloribus odit pariatur voluptatibus non. Et dicta quod et sunt a. Ad necessitatibus ut aut voluptas quisquam aspernatur velit distinctio.','2022-01-19 13:33:52',NULL,NULL),(73,103,'Nam et aut et porro asperiores tenetur quam. Enim sed ea doloremque qui. Autem ut fugiat voluptatibus voluptates aut dolorum. Voluptatem explicabo et est iure. Ut voluptatum sint omnis tempora aut.\n\nSuscipit pariatur doloribus quia labore fugit. Recusandae laborum deserunt magni corporis doloribus cum aliquid. Nesciunt vel culpa exercitationem sunt corporis quasi a ut. Non necessitatibus quidem debitis modi voluptatem.\n\nMaxime qui cum ut. Id dolores doloremque commodi pariatur impedit ut corporis blanditiis. Quis sed omnis vel qui. Reiciendis eos quidem repudiandae nihil voluptatem vel optio.','2022-01-19 13:33:52',NULL,NULL),(74,104,'Corrupti aut rem dolorum ullam ducimus. Et quibusdam eos ad et. Eaque perferendis qui est vero itaque explicabo ut maiores.\n\nId qui sed temporibus est voluptatibus. Quidem ipsam dolor ut fugiat perspiciatis laboriosam explicabo vel. Optio quia commodi repellendus est eveniet tenetur.\n\nLaboriosam tenetur dolores autem accusamus fuga natus. Tenetur officiis vitae voluptate adipisci.','2022-01-19 13:33:52',NULL,NULL),(75,105,'Aperiam eligendi laudantium atque sunt. Est cupiditate itaque dolor nisi. Eum necessitatibus occaecati voluptatem accusamus molestiae. Rem magnam facere quae et consequatur.\n\nAut provident sed veritatis beatae praesentium et perspiciatis. Architecto perspiciatis est repellendus rerum ut ullam. Qui voluptas quis omnis voluptatibus maxime molestiae ut. Enim maiores labore est quaerat et.\n\nVoluptatem atque vel voluptas. Minus libero sint maiores. Soluta blanditiis rerum voluptatem qui dolores.','2022-01-19 13:33:52',NULL,NULL),(76,106,'Quae consectetur in odit quia et similique optio. Et reiciendis at in omnis quos eum. Occaecati neque et impedit ratione quos error aut. Odio commodi corrupti sunt accusantium doloribus aut tempore perspiciatis.\n\nNihil sequi molestiae natus temporibus et nihil quo. Labore et quia facilis error nihil maiores. Et unde aliquam porro odit hic vitae.\n\nTenetur explicabo voluptatum eos ex a. Cum modi autem voluptatem. Laborum labore id accusamus.','2022-01-19 13:33:52',NULL,NULL),(77,107,'Odit et ut est est minus dolor vel. Esse tenetur ut deleniti est consectetur. Libero earum praesentium incidunt totam quo. Tempore dicta ut sed dolor vero nobis.\n\nCulpa et quia odio et debitis. Facere quia et illo sed saepe. Molestiae in placeat et nemo quibusdam eius.\n\nMollitia ea voluptatum aut ratione aut laboriosam. Dolores inventore esse omnis inventore repudiandae. Voluptas in et voluptas nulla tenetur beatae. Non minima optio qui dignissimos.','2022-01-19 13:33:52',NULL,NULL),(78,108,'Est iure ut laboriosam provident harum in qui. Labore voluptatem iusto voluptas quisquam omnis saepe ut. Quia rerum ut aut ducimus. Error eligendi facere distinctio qui explicabo.\n\nEt suscipit deleniti quibusdam maxime fugiat maiores dolorem recusandae. Nisi velit in aperiam et repudiandae porro. Facere mollitia aut sed vel praesentium quo. Atque sint corporis et et tenetur et labore praesentium.\n\nRepellendus eum quis facere nobis harum unde ea. Ut qui ea omnis ut molestiae. Fugiat et qui a ipsa eos ea.','2022-01-19 13:33:52',NULL,NULL),(79,109,'Tenetur et consequatur et accusantium assumenda ut. Corporis et quas praesentium accusamus saepe. Illum culpa esse nulla dolorem suscipit quis maxime earum.\n\nVoluptas alias molestiae aperiam deleniti. Nam molestiae ea qui sed. Voluptatem reiciendis quod ipsa autem tenetur officiis odit. Magnam fugiat velit enim repellat sequi est.\n\nAssumenda vero amet voluptatum hic qui et accusamus. Rerum unde aliquam voluptatem.','2022-01-19 13:33:52',NULL,NULL),(80,110,'Ut ipsam eos molestiae culpa accusantium dolor. Velit quo fuga inventore cupiditate. Voluptatibus cum nihil iusto eum vel aspernatur. Ea et magni ducimus et ducimus eos sequi. Dolores soluta accusamus ea officia.\n\nNumquam quod est qui. Enim nisi assumenda sunt est molestiae et. Enim est cum nam vitae error nostrum vero.\n\nA voluptatum necessitatibus voluptates non ut odio quis. Suscipit delectus commodi rerum optio cum maxime enim. In animi sed nam sint labore ullam sunt. Ea porro rem blanditiis pariatur accusantium doloribus.','2022-01-19 13:33:52',NULL,NULL),(81,111,'Qui aliquam recusandae architecto. Culpa et quas veritatis quae velit aut. Similique possimus ullam dolores omnis omnis quo soluta. At delectus consequatur corporis ea maiores distinctio. Temporibus excepturi ipsa enim distinctio.\n\nExcepturi praesentium laborum quaerat in accusantium labore tenetur. Ipsam natus assumenda quaerat mollitia laborum cum. Aliquid a amet quia fuga. Suscipit et sit rerum debitis.\n\nEnim incidunt qui aut iste quam deleniti. Dignissimos numquam dolor voluptas fuga repellendus. Ea consequatur commodi non qui.','2022-01-19 13:33:52',NULL,NULL),(82,112,'Cumque temporibus est aut id. Consequatur veniam ipsum odio dolores libero aut. Repudiandae assumenda adipisci quaerat exercitationem quis est.\n\nDoloribus eos aspernatur eveniet ut. Officia vel atque hic corrupti pariatur. Qui nihil dolorem exercitationem error.\n\nDolor ea accusantium iure id. Nihil vitae praesentium cum aut corporis explicabo. Et amet consequatur quod neque harum dolorem et.','2022-01-19 13:33:52',NULL,NULL),(83,113,'Numquam exercitationem ut tempora voluptate voluptas qui quaerat. Repellendus et deleniti rerum voluptas. Dolor recusandae laborum sequi aspernatur unde rem.\n\nVoluptatem cupiditate sapiente a mollitia. Tenetur minima voluptas excepturi recusandae earum repudiandae et. Hic iure voluptatem quisquam facilis quia. Accusamus id magni qui nam. Possimus non odit quia id dolorem iure beatae.\n\nQuibusdam quos veritatis qui error sunt eveniet. Enim nisi dolores facere ut eligendi mollitia. Dolorem debitis fugit enim similique cum explicabo dolores. Est corrupti ut architecto iste.','2022-01-19 13:33:52',NULL,NULL),(84,114,'Quia maiores reprehenderit ea assumenda. Facilis qui laboriosam nisi est. Quos ut itaque in et cum necessitatibus. Tempore consequatur aut sint ipsam error.\n\nIure quisquam consequuntur quae dolor ad est doloribus. Consequatur ea recusandae nam molestiae ipsam quia. Rerum dolore beatae reiciendis tenetur pariatur ut quas.\n\nExpedita cum qui ut qui ullam ullam impedit. Qui ullam aut nesciunt voluptas. Debitis dicta minus blanditiis itaque dolorem iure beatae.','2022-01-19 13:33:52',NULL,NULL),(85,115,'Saepe nostrum id similique repellat. Nam alias eaque voluptatem veniam ad sit animi. Autem sint necessitatibus optio praesentium laudantium nostrum nihil. Ad tempora id dolorum atque labore omnis laborum.\n\nQuam sit at distinctio velit. Nesciunt ad facilis corporis quasi non eaque animi voluptas. Laboriosam nulla optio tenetur porro perferendis. Debitis sunt accusantium sit tempore accusamus aliquam.\n\nVoluptates beatae fugiat consequatur dolorem ex. Sed deleniti iure expedita illum. Est et voluptate consequatur illo aspernatur est.','2022-01-19 13:33:52',NULL,NULL),(86,116,'Illum ut quasi optio fugiat et fugiat odio. Eos molestias veniam minus. Quia consequatur incidunt reprehenderit.\n\nVoluptas quibusdam reprehenderit eaque dolores ut corporis. Dolore tenetur aliquam laudantium magni dolores perferendis. Laborum totam accusantium commodi eius.\n\nExpedita quae qui reiciendis recusandae. Neque commodi eligendi quia est et cupiditate impedit facilis. Blanditiis suscipit porro aut officiis dolores qui sit. Cupiditate amet voluptates vero iste.','2022-01-19 13:33:52',NULL,NULL),(88,118,'Aperiam atque est sed repudiandae. Eligendi quo aut qui occaecati magni mollitia accusantium officia. Commodi officiis labore optio. Non nobis omnis commodi est quia et ex.\n\nEst explicabo sint accusantium excepturi. Et unde et odit eaque. Deserunt deserunt est voluptate ut dignissimos ut.\n\nNecessitatibus voluptatem vel odio nam qui atque assumenda. Quia possimus quo hic eligendi dolor deserunt. Quae aut porro molestiae ab rerum odio illo.','2022-01-19 13:33:52',NULL,NULL),(89,119,'Laboriosam odit assumenda culpa quisquam et soluta. Labore quia dolores et aut veritatis ipsum. Dolores ex alias quo voluptas exercitationem saepe facilis.\n\nEt quidem est voluptatibus numquam iusto. Iusto fugit saepe tenetur ea reiciendis eius saepe. Earum nam officia dolorem nihil dicta illo deserunt.\n\nAperiam itaque sit corporis veniam. Et illo architecto quia eum aut eos. Modi sit quas natus ea est cupiditate. Enim vitae sit aut veniam.','2022-01-19 13:33:52',NULL,NULL),(90,120,'Nesciunt aut quis dolor unde aperiam. Vel similique rem quia sint quasi sit dolor. Eos eligendi molestias maxime consectetur. Iusto sapiente non velit accusantium fuga. Sequi qui eveniet autem quia doloribus ut.\n\nDebitis placeat necessitatibus sequi optio consequatur numquam facilis nostrum. Nobis doloremque consequatur pariatur maiores unde voluptate quis. Natus nihil earum explicabo eos. Sit omnis eligendi itaque enim.\n\nMollitia vitae cumque non natus quibusdam et. Vitae saepe veniam deleniti nemo aliquam. Fugit cupiditate eum voluptatem dolor molestiae.','2022-01-19 13:33:52',NULL,NULL),(91,125,'comment','2022-02-27 20:49:58','asd@asd.com','bassem'),(92,125,'another commend to this article','2022-02-27 20:51:16','asd@asd.com','hamada');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220118204241','2022-01-18 20:43:56',306),('DoctrineMigrations\\Version20220118204524','2022-01-18 20:45:28',35),('DoctrineMigrations\\Version20220118204619','2022-01-18 20:46:21',34),('DoctrineMigrations\\Version20220118204757','2022-01-18 20:48:00',149),('DoctrineMigrations\\Version20220119165302','2022-01-19 16:53:27',48),('DoctrineMigrations\\Version20220213191249','2022-02-13 19:13:11',47),('DoctrineMigrations\\Version20220228190855','2022-02-28 00:00:00',11),('DoctrineMigrations\\Version20220301202320','2022-03-01 20:24:29',39);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
INSERT INTO `messenger_messages` VALUES (27,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:22:\\\"App\\\\Message\\\\NewsLetter\\\":1:{s:31:\\\"\\0App\\\\Message\\\\NewsLetter\\0content\\\";s:10:\\\"Hello Guys\\\";}}','[]','default','2022-04-02 09:12:47','2022-04-02 09:12:47',NULL),(28,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:22:\\\"App\\\\Message\\\\NewsLetter\\\":1:{s:31:\\\"\\0App\\\\Message\\\\NewsLetter\\0content\\\";s:10:\\\"Hello Guys\\\";}}','[]','default','2022-04-02 09:12:47','2022-04-02 09:12:47',NULL),(29,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:22:\\\"App\\\\Message\\\\NewsLetter\\\":1:{s:31:\\\"\\0App\\\\Message\\\\NewsLetter\\0content\\\";s:10:\\\"Hello Guys\\\";}}','[]','default','2022-04-02 09:24:43','2022-04-02 09:24:43',NULL),(30,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:22:\\\"App\\\\Message\\\\NewsLetter\\\":1:{s:31:\\\"\\0App\\\\Message\\\\NewsLetter\\0content\\\";s:10:\\\"Hello Guys\\\";}}','[]','default','2022-04-02 09:25:18','2022-04-02 09:25:18',NULL),(31,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:22:\\\"App\\\\Message\\\\NewsLetter\\\":1:{s:31:\\\"\\0App\\\\Message\\\\NewsLetter\\0content\\\";s:10:\\\"Hello Guys\\\";}}','[]','default','2022-04-02 09:33:28','2022-04-02 09:33:28',NULL);
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_letter`
--

DROP TABLE IF EXISTS `news_letter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_letter`
--

LOCK TABLES `news_letter` WRITE;
/*!40000 ALTER TABLE `news_letter` DISABLE KEYS */;
INSERT INTO `news_letter` VALUES (1,'basem@asd.com',1),(2,'asd@asd.com',1),(3,'asdasd@asd.com',1),(4,'hamada@ad.com',1),(5,'ali@asd.com',1),(6,'asd@asd.com',1),(7,'asda@asd.com',1),(8,'asd@asd.com',1);
/*!40000 ALTER TABLE `news_letter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'site_name','Sensive Blog'),(2,'about_us','This is about us content.'),(3,'twitter_url','https://twitter.com/BasemSamir211'),(4,'facebook_url','https://www.facebook.com/smsm.samir211/');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (249,'football','2022-01-19 13:33:52'),(250,'news','2022-01-19 13:33:52'),(251,'fashion','2022-01-19 13:33:52'),(252,'travel','2022-01-19 13:33:52'),(253,'life style','2022-01-19 13:33:52'),(254,'war','2022-01-19 13:33:52'),(255,'ill','2022-01-19 13:33:52'),(256,'covid','2022-01-19 13:33:52');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_article`
--

DROP TABLE IF EXISTS `tag_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_article` (
  `tag_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`,`article_id`),
  KEY `IDX_300B23CCBAD26311` (`tag_id`),
  KEY `IDX_300B23CC7294869C` (`article_id`),
  CONSTRAINT `FK_300B23CC7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_300B23CCBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_article`
--

LOCK TABLES `tag_article` WRITE;
/*!40000 ALTER TABLE `tag_article` DISABLE KEYS */;
INSERT INTO `tag_article` VALUES (249,92),(249,93),(249,94),(249,95),(249,96),(249,97),(249,98),(249,99),(249,100),(250,92),(250,93),(250,94),(250,95),(250,96),(250,97),(250,98),(250,99),(250,100),(250,122),(250,123),(250,125),(251,101),(251,102),(251,103),(251,104),(251,105),(251,106),(251,107),(251,108),(251,109),(251,110),(252,101),(252,102),(252,103),(252,104),(252,105),(252,106),(252,107),(252,108),(252,109),(252,110),(253,101),(253,102),(253,103),(253,104),(253,105),(253,106),(253,107),(253,108),(253,109),(253,110),(254,111),(254,112),(254,113),(254,114),(254,115),(254,116),(254,118),(254,119),(254,120),(255,111),(255,112),(255,113),(255,114),(255,115),(255,116),(255,118),(255,119),(255,120),(256,111),(256,112),(256,113),(256,114),(256,115),(256,116),(256,118),(256,119),(256,120);
/*!40000 ALTER TABLE `tag_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (10,'admin@admin.com','[\"ROLE_ADMIN\"]','$2y$13$Pa3qhkGnUP8OzvHeCpzTcOk.ueSX9OQ4RieP6fMqMTNlbX5Cv8X3q','admin','WhatsApp Image 2021-11-24 at 10.11.13 PM.jpg',1),(11,'asd@asd.com','{\"1\":\"ROLE_USER\"}','$2y$13$3f2VRz69DqYTr0Ol9zOaZ.W/8M3h/4JiXvccswH9.QVEW7miMHhpK','normal user',NULL,0),(12,'asd2@asd.com','{\"1\":\"ROLE_USER\"}','$2y$13$JlO9lQ2piy9.j6RaWMM4fukN41Qvryj68gJyaHis7sQwewQC93pnq','normal user 2',NULL,1),(13,'basem.samir211@yahoo.com','[]','$2y$13$mR3Fx6.OZ35/.cRhPQAlEucSBGqR3hkM3T9Uy6unrBJDx5b80w.Yu','bassem',NULL,1),(14,'asd','[]','$2y$13$x5M8vljOKGAy4AVfwzGEO.ucywTkdSoAXJI.eYajfm8jbjgy67PUC','basem.samir211@yahoo.com',NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-01 18:28:44

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2023 at 06:08 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Règles'),
(2, 'Peuples'),
(3, 'Capacités'),
(4, 'Maîtrises'),
(5, 'Magie'),
(6, 'Equipement'),
(7, 'Bestiaire'),
(8, 'Lieux'),
(9, 'Histoire'),
(10, 'Croyances'),
(11, 'Politique'),
(12, 'Protagonistes');

-- --------------------------------------------------------

--
-- Table structure for table `categories_has_pages`
--

DROP TABLE IF EXISTS `categories_has_pages`;
CREATE TABLE IF NOT EXISTS `categories_has_pages` (
  `categories_id` int NOT NULL,
  `pages_id` int NOT NULL,
  PRIMARY KEY (`categories_id`,`pages_id`),
  KEY `fk_categories_has_pages_pages1_idx` (`pages_id`),
  KEY `fk_categories_has_pages_categories1_idx` (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories_has_pages`
--

INSERT INTO `categories_has_pages` (`categories_id`, `pages_id`) VALUES
(2, 2),
(7, 3),
(8, 4),
(5, 7),
(1, 8),
(1, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img_name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `alt` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `type`, `alt`) VALUES
(1, 'Peheme_charadesign.png', 'png', 'Illustration d\'un Péhème'),
(2, 'Astem_steppes.jpg', 'jpg', 'Illustration de la Forêt de Gaëv'),
(3, 'kryni_inferno.jpg', 'jpg', 'Illustration d\'un Kryni'),
(11, 'magic.jpg', NULL, NULL),
(13, 'System.jpg', NULL, NULL),
(14, 'Masteries.jpg', NULL, NULL),
(15, 'Capacities.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `content`, `date_sent`) VALUES
(1, 'Ouverture du site', 'Coucou', '2023-08-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `images_id` int NOT NULL,
  PRIMARY KEY (`id`,`images_id`),
  KEY `fk_pages_images1_idx` (`images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `images_id`) VALUES
(2, 'Péhèmes', 'Les Péhèmes sont un peuple resté caché sur l’archipel tropical de Kerlo Uhan durant de nombreuses années. Il est composé de créatures ressemblant à des mantes religieuses mesurant en moyenne 1m30, avec une carapace allant du vert au brun foncé. Iels ont un goût prononcé pour la technologie et la philosophie, sont très maniérés et font attention à leur langage.\r\nIels sont un peuple de sédentaire qui vit sous terre, dans des cités à la technologie avancée, indépendantes les unes des autres politiquement. Iels n’ont pas de leader et prennent des décisions de manière collégiale au sein de chaque cité, élisant des représentants temporaires lorsqu’une affaire nécessite la concertation de plusieurs cités. Iels considèrent les pastèques comme des fruits sacrés, qui sont pour elleux la représentation de la vie, et ont un régime végétarien, se nourrissant en grande partie de cet aliment. \r\nLes Péhèmes sont très sociables et ont une grande aisance pour communiquer et s’adapter aux coutumes de leurs interlocuteurs·trices. Les Péhèmes ne s\'unissent pas en couple monogame, iels entretiennent en général des relations libres avec plusieurs partenaires, et les petits issus de ces relations sont confiés à des nurseries qui s’occupent de les éduquer en lieu et place des parents. Leur reproduction reste néanmoins sexuée, et c’est la femelle qui portera l\'œuf fécondé durant quelques jours avant de le pondre et le confier à la nurserie. \r\nCe peuple n’est pas sensible à la magie, mais possède une avance technologique considérable, qu’iels ont partagé aux autres peuples suite à la défaite des Démons.\r\n\r\nNoms des Péhèmes\r\nComme pour toute décision, les noms des Péhèmes sont décidés en conciliabule par l’ensemble des individus d’une ville. Les Péhèmes ne possèdent pas de nom de famille, et se présentent en incluant leur ville d’origine : “Prénom de Ville”.\r\nExemples : Baldric, Willy, Raleigh, Carl, Bess, Franklin, Jerred, Tamsen…\r\n\r\nMaîtrises innées\r\nEn tant que Péhème vous possédez de base les maîtrises suivantes :\r\n\r\nModerne : Vous connaissez bien la technologie, et êtes précurseur dans ce domaine, ce qui vous donne l’avantage pour reconnaître et utiliser les objets technologiques.\r\nPenseur : Vous aimez réfléchir au sens des choses, et ne vous contentez jamais d’une explication simpliste, ce qui vous donne l’avantage pour déceler lorsque quelqu’un essaye de vous duper.\r\n', 1),
(3, 'Kryni', 'Dragons-caméléons des montagnes Astrae, ce sont des magunas qui peuvent se camoufler comme les Coalts, ils sont vicieux et très féroces.', 3),
(4, 'Steppes d\'Astem', 'Les Steppes d\'Astem s\'étendent sur des centaines de kilomètres, bordées au nord par la chaîne de montagnes imposante des Monts du Kondrac, tandis que le désert d\'Esmel s\'étend au sud à perte de vue. Le sol aride et rocailleux est recouvert de courtes herbes et de buissons épineux, qui réussissent tout de même à survivre dans ces conditions difficiles. Il est constellé de formations rocheuses spectaculaires, témoignant de l\'érosion du temps. Les températures y sont très élevées en été, tandis que les hivers sont marqués par des vents violents et des tempêtes de sable.\r\n\r\nLes steppes sont traversées par plusieurs rivières qui prennent leur source dans les montagnes du nord et se jettent dans l\'océan à l\'est et à l\'ouest. Les berges de ces cours d\'eau offrent des oasis de verdure où il est possible de trouver un peu d\'ombre et d\'eau. Ces cours d’eau offrent un tracé pour plusieurs routes commerciales, qui relient les villes de la région entre elles et permettent aux caravanes de traverser la région dans une relative sécurité.\r\n\r\nMalgré l\'apparente désolation de la région, la faune y est plutôt riche. On peut y croiser des troupeaux de Valtins, des animaux élancés, dotés de longues pattes gracieuses et d\'une robe beige pâle tachetée de marron, qui parcourent les steppes d\'Astem en troupeaux serrés, cherchant leur nourriture dans l\'herbe rase, des Sablets, petits félins aux pattes agiles, aux griffes acérées, et au pelage roux-brun tacheté de noir leur permettant de se camoufler facilement dans le sable, qui se déplacent rapidement dans les dunes, à la recherche de proies faciles.\r\n\r\nLes plaines sont également connues pour la présence de grands prédateurs félins, tels que les Rokhos, au pelage doré et à la dentition acérée. Les nomades locaux chassent ces animaux sauvages pour se nourrir et se vêtir.\r\n\r\nMalgré la chaleur écrasante, la nuit apporte un certain répit, et les étoiles scintillant au-dessus des steppes offrent un spectacle enchanteur.', 2),
(7, 'Magie & Technologie', 'Le lien entre ces trois mondes est la Magie. En effet, celle-ci est présente dans tous les mondes. La Magie est ce qui compose l’univers, et qui se manifeste différemment selon les êtres, les peuples et les mondes qu’elle traverse et compose. Toute chose est imprégnée de magie, du plus petit caillou au plus grand Arpenteur. Et, alors que certains individus, voire même des peuples tout entiers n’arrivent pas à la percevoir, certains individus ont même la capacité de voir la magie. Ces individus sont appelés les Voyageurs. Il existe aussi des créatures sauvages chez qui la magie s\'exprime de façon unique, et qui sont communément appelées magunas.\r\n\r\nAinsi, chaque monde, et chaque peuple, possède son affinité propre à la Magie. Tant et si bien que des noms lui ont été donnés, et qu’elle a été catégorisée pour mieux distinguer ces différentes formes. La magie utilisée par les peuples connus est donc séparée en plusieurs domaines. \r\nLa magie élémentaire, la magie naturelle et la magie de contact s\'appuient toutes les trois sur les éléments primordiaux. Ces quatres éléments sont le Feu, la Terre, l’Air et l’Eau, et possèdent chacun un élément dérivé, qui est une déformation de leur essence primordial, aussi accessible à celleux qui le contrôlent. Ainsi l’élément dérivé du Feu est la Lumière, l’élément dérivé de la Terre est la Nature, l’élément dérivé de l’Air est la Foudre, et l’élément dérivé de l’Eau est la Glace.\r\nUn·e Arbon contrôlant la Terre pourra ainsi aussi contrôler la Nature. Ce sont les formes de magie les plus brutes, et qui se retrouvent le plus fréquemment dans les mondes connus. Ces trois types de magie ont chacun leurs particularités qui sont expliquées dans les sections dédiées.\r\n	La magie céleste est une forme de magie particulière qui agit sur l’essence de la matière pour en modifier les règles physiques. Elle permet ainsi à son utilisateur·ice de supprimer le poids ou la consistance d’un corps inerte, voir en de rares cas d’un être vivant, pour les faire léviter ou bien les rendre immatériels. Cette magie est l’apanage des Cellafians, qui sont les seul·es à la maîtriser, mais peut parfois se retrouver chez des magunas.\r\n	La magie primordiale est une forme de magie intimement liée à la trame de l’univers, qui permet de manipuler les dimensions et l’énergie magique ambiante. Un·e utilisateur·ice de magie primordiale pourra ainsi distordre la fine barrière entre les dimensions et créer l’espace d’un instant des passages entre les mondes, et pourra aussi manipuler l’énergie magique présente autours d’eux pour la condenser en objets tangibles qui persistent quelques instants avant de se dissoudre à nouveau dans la trame du monde. Les démons sont les seul·es à pouvoir utiliser cette forme de magie, à l’exception de rares magunas, qui leur a permis d’être le premier peuple à voyager entre les mondes.\r\n	La magie spirituelle est extrêmement rare et relativement incomprise dans les mondes connus. Seuls certain·es individu·es, appelés Voyageurs·euses, peuvent utiliser cette forme de magie. Les légendes laissent entendre qu’iels seraient les réincarnations des architectes des mondes, et qu’iels peuvent voir et interagir avec les âmes et l’énergie qui circule dans les mondes. Iels voient ainsi le monde en un camaïeu de lumières grises, où les seules couleurs sont les flammes représentant l’âme de chaque être vivant. La magie spirituelle permet de se détacher de son enveloppe corporelle pour s’incarner dans n’importe quel être vivant pour l’accompagner silencieusement ou bien en prendre le contrôle. Un·e Voyageur·euse comprendra aussi n’importe quel langage, et sera compris·e de tous·tes.\r\nUn·e membre de n’importe quel peuple peut devenir Voyageur·euse, mais cette magie est si puissante qu’elle supprime le lien aux autres domaines de magie, empêchant ainsi l’accès à l’individu·e au potentiel domaine de magie propre à son peuple.\r\n\r\n	Au-delà de cette manifestation naturelle de la magie, son étude théorique, et toutes les pratiques qui en découlent, est appelée Arcanisme. L’écriture arcanique, un alphabet de runes permettant de canaliser l\'énergie environnante, est ainsi utilisée pour enchanter des objets, des lieux, et parfois même des êtres vivants. Cette science de la magie est étudiée depuis maintenant bien longtemps, et on trouve nombre d’objets et lieux étranges de par le monde, transfigurés par des runes arcaniques.\r\nC’est aussi l’arcanisme qui a permis la découverte des soins magiques. En effet, puisqu’il est impossible de prodiguer des soins avec les magies que pratiquent les différents peuples, les chercheurs en magie ont mis beaucoup d’efforts dans la recherche médico-magique, et aujourd’hui de nombreuses potions alchimiques ou cristaux de soins, plus ou moins puissants, permettent de recouvrer de maladies et blessures en tout genre.\r\n\r\n	Mais la science mécanique à aussi bien sa place dans ces mondes. En effet, la découverte récente d’un procédé de condensation du Miza, une mousse luminescente qui emmagasine la lumière du soleil pour la restituer en énergie, permet dorénavant de stocker une quantité d\'énergie suffisante au développement d\'appareils autonomes. Cela a ouvert de nouveaux horizons technologiques, et les inventions d’appareils alimentés au Miza sont de plus en plus nombreuses.\r\nEn parallèle, des piles arcaniques commencent à être mises au point, permettant d’y insérer de l’énergie magique qu’elles peuvent restituer pour alimenter divers appareils. Certaines de ses piles possèdent par ailleurs la propriété de se recharger automatiquement en absorbant l’énergie environnante, mais elles sont rares et à utiliser avec prudence. \r\n', 11),
(8, 'Système de jeu', 'Les tests sont effectués avec un jet de D20 auquel on applique les modificateurs d’attributs, de maîtrises et d’environnement. Si le résultat après modification est supérieur au seuil de difficulté imposé ou au jet opposé par le MJ, c’est un succès. Dans le cas contraire, c\'est un échec. Le succès ou l’échec sont proportionnels à l’écart entre ces deux valeurs, à la discrétion du MJ.\r\nIl est parfois possible d’effectuer un jet avec un avantage ou un désavantage. L’avantage permet de lancer 2 dés et retenir la valeur la plus haute, alors que le désavantage retient la valeur la plus basse.\r\n\r\nLorsqu’un personnage utilise la Magie, il dépense un nombre de points d\'Énergie correspondant à l’ampleur du sort qu’il lance, et fait un test classique pour voir si le sort réussi. Les points d’énergie sont dépensés que le personnage réussisse ou non son action. Lorsqu’il n’a plus d’énergie, un personnage est épuisé, et applique un malus de -2 à tous ses jets. Un personnage récupère de l\'énergie en se reposant ou en se restaurant, selon le type de magie.\r\n\r\nLors d’un combat tous les membres d’un même groupe agissent en même temps, et c’est le groupe à l\'initiative du combat qui agit en premier. Au sein du groupe les membres choisissent l’ordre dans lequel ils veulent jouer à chaque tour, et cet ordre peut changer d’un tour à l’autre.\r\nChaque personnage possède une action ainsi qu’un déplacement par tour. Iel peut utiliser son action pour attaquer, utiliser une capacité, ou effectuer une action particulière (se préparer, se cacher, fuir, utiliser un objet, etc…). \r\nDe plus, chaque personnage possède une attaque d’opportunité par tour, lui permettant d’attaquer un·e ennemi·e qui quitte son corps à corps. \r\nSi un personnage, allié ou ennemi, est pris pour cible par plus de deux attaques dans un même tour iel est submergé·e, et subit un désavantage pour ses jets de défenses contre toutes les attaques après la deuxième.\r\n\r\nLorsqu’un personnage se fait attaquer, il peut choisir de parer ou d’esquiver. S’il pare il ajoute [Res] à son jet de défense, s’il esquive il ajoute [Dex]. Lorsqu’un personnage perd plus de la moitié de ses points de vie, il est blessé, et applique un malus de -2 sur tous ses jets.\r\nLorsqu’un personnage reçoit une blessure fatale, il doit lancer un D12. S’il fait 1 ou 12 une intervention divine permet au personnage de survivre, la plupart du temps en échange d’un service ou d’une mission qui lui sera confiée par la divinité.\r\n\r\nLes coups critiques sont des attaques ou des sorts puissants qui peuvent se déclencher dans diverses circonstances :\r\nLors d’un 20 pour une attaque ou un sort (au corps à corps ou à distance)\r\nLorsqu’un·e ennemi·e est pris·e par surprise, au sol, incapable de se défendre\r\nLors d’une attaque sur un point faible\r\nCes attaques infligent alors les dégâts maximum de l’attaque + les dégâts normaux de l’attaque. Par exemple une attaque faisant 1d8 dégâts fera 8+1d8 dégâts critiques.\r\n\r\nCertaines attaques peuvent avoir des effets particuliers, comme brûlant, empoisonné, assomme, paralysant, etc… Ces effets ne sont appliqués que si la différence entre le jet d’attaque et le jet de défense est d’au moins 5.\r\n\r\nIl existe deux types de repos, le repos court, qui consiste à se reposer pendant une heure dans un lieu sûr, et le repos long qui nécessite au moins 6 heures de repos ainsi qu’un repas. Lors d’un repos court, les personnages récupèrent la moitié de leurs points d’énergie totaux et ne se soignent pas. Lors d’un repos long les personnages récupèrent la totalité de leurs points d’énergie et peuvent récupérer la moitié de leurs points de vie maximums. \r\n\r\nPour soigner leurs blessures en dehors des moments de repos, les aventurier·es devront utiliser la médecine ou bien des objets arcaniques tels que les cristaux ou les potions de soin.', 13),
(9, 'Maîtrises', 'Les capacités et maîtrises reflètent les compétences d’un·e personnage dans un domaine donné. C’est leur somme qui fait de chaque personnage quelqu\'un·e d’unique, avec ses propres forces et faiblesses. Les maîtrises sont des talents utilisables de façon illimitée. Les capacités et maîtrises liées à la magie sont décrites dans l\'article “Magie”, car elles peuvent différer en fonction du type de magie.\r\nCette liste n’est pas exhaustive, et d’autres maîtrises ou capacités peuvent être créées en accord avec lea MJ.\r\n\r\nMaîtrises :\r\nMagie : Vous savez utiliser votre énergie pour dompter les éléments et utiliser la magie. (obligatoire pour pouvoir utiliser toute magie en dehors de la magie spirituelle)\r\nMagie spirituelle : Vous avez été choisis pour être un·e Voyageur·euse, et possédez la rare capacité d’utiliser la magie spirituelle. Vous comprenez aussi n’importe quel langage, et êtes compris·e de tous·tes. (obligatoire pour pouvoir utiliser la magie spirituelle, et retire toute autre forme de magie)\r\nMéditation : En dehors des combats vous pouvez récupérer 1d4+[Esp] points d’énergie si vous passez au moins 30 minutes à méditer.\r\nMaîtrise d’arme : Vous avez un avantage pour frapper avec un type d’arme au choix.\r\nAmbidextrie : Vous infligez 1.5x vos dégâts (arrondis au supérieur) si vous avez une arme dans chaque main, et pouvez transporter une arme supplémentaire parmi vos accessoires.\r\nArme fétiche : Votre arme fait partie de vous, et vous la connaissez si bien qu’elle ne vous fera jamais défaut. votre arme ne peut pas se casser, s’enrailler ou vous faire défaut de quelque sorte.\r\nArt martial : Vos attaques à mains nues infligent 1d6+(Lvl+[Dex]ou[For]/2) dégâts.\r\nOpportunisme : Vous pouvez effectuer un nombre illimité d’attaques d\'opportunités.\r\nAnti magie : Vous avez l’avantage pour résister à la magie.\r\nEn Hauteur : Vous avez l’avantage pour toucher quand vous êtes en hauteur par rapport à votre cible.\r\nTir mobile : Vous ne subissez pas de malus pour tirer en mouvement avec une arme à distance.\r\nDiversion : Vous attirez l’attention sur vous, ce qui vous donne plus de chances d\'être pris·e pour cible, et donne un bonus de +1 aux autres personnages pour attaquer quelqu’un·e à votre contact.\r\nTactique de groupe : Vous profitez de la distraction de vos adversaires et avez un bonus de +1 pour les attaquer s’ils sont déjà au contact d’un allié.\r\nProtecteur : Vous pouvez choisir d’encaisser une attaque destinée à un·e allié·e proche une fois par tour.\r\nInébranlable : Vous avez l’avantage pour résister aux chutes et aux étourdissements.\r\nCatapulte : Votre force transforme tout objet que vous lancez en arme, vous faites 1d6+[For] dégâts avec les objets lancés.\r\nImmunité : Vous avez l’avantage pour résister aux poisons et maladies.\r\nBricolage : Vous pouvez réparer les trucs cassés (y compris les armes, mais juste temporairement).\r\nUn outil pour chaque situation : Lorsque vous avez besoin d’un outil, vous l’avez sur vous.\r\nCompagnon mécanique : Vous possédez un·e compagnon mécanique du même niveau que vous.\r\nApothicaire : Avec le matériel nécessaire vous pouvez fabriquer diverses potions en vous basant sur [Esp].\r\nEnchanteur : Avec le matériel nécessaire vous pouvez enchanter des objets pour leur donner des caractéristiques particulières en vous basant [Esp].\r\nLogique : Vous avez l’avantage pour résoudre des problèmes logiques.\r\nÉrudit  : Vous avez l’avantage pour les jets associés à votre discipline d\'érudition.\r\nPsychologie : Vous avez l’avantage pour discerner lorsque quelqu’un vous ment.\r\nAutorité : Vous avez l’avantage pour intimider.\r\nPasser inaperçu : Les gens ne vous remarquent pas et vous avez l’avantage pour vous faire discret.\r\nVol à la tire : Vous avez l’avantage pour voler.\r\nCrochetage : Vous avez l’avantage pour crocheter des serrures.\r\nInsaisissable : Votre agilité naturelle fait de vous une cible difficile à toucher. Vous avez l’avantage pour esquiver.\r\nContorsionniste : Vous avez l’avantage pour vous échapper lorsque vous êtes entravé.\r\nPièges : Vous avez l’avantage pour tendre ou désamorcer des pièges.\r\nGuet Apen : Vous avez l’avantage pour tendre un guet-apen ou en déceler un.\r\nMédecine : En dehors des combats vous pouvez rendre 1d4+[Esp] points de vie à un personnage blessé en lui portant les premiers secours.\r\nVigilance : Vous ne pouvez pas être surpris par une attaque.\r\nPhytothérapie : Vous connaissez les plantes et comment en faire des remèdes.\r\nCompagnon animal : Vous possédez un·e compagnon animal·e du même niveau que vous.\r\nCommunication animale : Vous comprenez les intentions des animaux et savez leur en transmettre.\r\nDétective : Vous avez l’avantage pour investiguer et fouiller.\r\nHyperesthésie : L’un de vos sens est plus développé que la moyenne, vous avez l’avantage pour les jets d’observation avec ce sens.\r\nExploration : Vous êtes habitué·e à voyager et à visiter des lieux divers et variés, ce qui vous confère un avantage pour les jets d’observation en milieu sauvage.\r\nTraque : Vous avez l’avantage pour suivre une piste.\r\nUrbanisme : Vous êtes habitué·e à la ville, à son fourmillement et à ses activités, ce qui vous confère un avantage pour les jets d’observation en milieu urbain.\r\nPerformance : Vous avez l’avantage pour faire un spectacle ou une performance.\r\nCommerce : Vous avez l’habitude des transactions et savez tirer avantage de chaque échange, ce qui vous donne un avantage pour marchander.\r\nTout le monde a un prix : Vous avez l’avantage pour soudoyer un personnage.\r\nInnocent : Vous avez l’avantage pour convaincre que vous avez de bonnes intentions.\r\nBaratiner : Vous avez l’avantage pour bluffer.\r\nProtocole : Vous connaissez les us et coutumes de tous les peuples et savez comment vous comporter en société.\r\nLinguistique : Vous connaissez plusieurs langues et avez l’avantage pour déchiffrer des dialectes.\r\nDéguisement : Vous savez contrefaire votre apparence et avez ainsi un avantage pour vous faire passer pour ce que vous n’êtes pas.\r\nPropriétaire : Vous possédez un commerce, et recevez une partie de ses revenus régulièrement tant que l’affaire marche.\r\nChance : Augmente les chances de trouver des butins rares et d’avoir des événements favorables, et transforme les échecs critiques en échecs simples.\r\nFervent croyant :  Vous avez l’avantage pour tous les jets lorsque vous effectuez une action au nom de votre religion.', 14),
(10, 'Capacités', 'Les capacités et maîtrises reflètent les compétences d’un·e personnage dans un domaine donné. C’est leur somme qui fait de chaque personnage quelqu\'un·e d’unique, avec ses propres forces et faiblesses. Les capacités sont des tactiques de combat uniques pouvant être utilisées une fois chacune par combat.\r\nLes capacités et maîtrises liées à la magie sont décrites dans le chapitre “Magie”, car elles peuvent différer en fonction du type de magie.\r\nCette liste n’est pas exhaustive, et d’autres maîtrises ou capacités peuvent être créées en accord avec lea MJ.\r\n\r\nCapacités :\r\nAnalyse de l’ennemi [Esp] : Vous identifiez les points faibles d’un·e ennemi·e, ainsi que ses techniques de combat.\r\nFeinte [Esp] : Vous feintez un coup pour déstabiliser votre ennemi, et avez l\'avantage pour effectuer une attaque sur lui immédiatement.\r\nPrédiction [Esp] : Vous prévoyez les mouvements d\'un ennemi avec qui vous n\'êtes pas engagé au corps à corps. Si l\'ennemi se trouve là où vous l\'avez prédit au prochain tour vous réussissez automatiquement une attaque critique contre lui.\r\nCoup double [For] : Vous lancez deux attaques successives sur une cible unique avec une arme au corps à corps.\r\nCoup puissant [For] : Vous portez un coup violent à l’ennemi·e avec une arme au corps à corps, ce qui l\'étourdit pendant 1 tour.\r\nBalayage [For] : Vous faites un grand moulinet avec votre arme au corps à corps, touchant tous les personnages autour de vous, ennemi·es comme allié·es.\r\nFrappe chirurgicale [Dex] : Vous frappez dans une zone précise avec une arme au corps à corps sans subir de malus, et appliquez des effets supplémentaires à la cible en fonction de la zone choisie.\r\nBond [Dex] : Vous bondissez sur une cible en l’attaquant, et ne déclenchez pas d’attaque d’opportunité.\r\nRafale [Dex] : Vous tirez deux fois d’affilée dans une même action avec une arme à distance.\r\nTir précis [Dex] : Vous tirez dans une zone précise avec une arme à distance sans subir de malus, et appliquez des effets supplémentaires à la cible en fonction de la zone choisie.\r\nCharge [Res] : Vous foncez sur un·e ennemi·e pour lea percuter et lea déstabiliser, et ne déclenchez pas d’attaque d’opportunité.\r\nPosture défensive [Res] : Vous vous concentrez sur votre défense pour parer automatiquement la prochaine attaque, et obtenir l’avantage pour parer toutes les suivantes vous prenant pour cible pendant 1 tour. Vous gagnez une attaque d’opportunité supplémentaire.\r\nContre [Res] : Vous vous concentrez sur un·e ennemi·e pour obtenir un avantage pour parer ses attaques et riposter immédiatement pendant 2 tours.\r\nFurtivité [Per] : Vous vous dégagez du combat sans déclencher d’attaque d\'opportunité et vous fondez dans l’ombre et l’environnement pour disparaître.\r\nFaire le mort [Per] : Vous faites lea mort·e de façon convaincante.\r\nApaiser les bêtes [Per] : Vous apaisez une créature sauvage qui vous est hostile.\r\nInsulte [Cha] : Vous insultez un·e ennemi·e pour attirer son attention vers vous et devenir sa cible. Vous avez l’avantage pour parer ou esquiver ses attaques.\r\nHauts les cœurs [Cha] : Vous encouragez vos allié·es et leur donnez un bonus de +2 à toutes leurs actions pendant 1 tour.\r\nEncore [Cha] : Vous poussez un personnage, ennemi ou allié, à refaire la même action qu’au tour précédent, et ce même si cette action était une capacité.\r\n\r\nCapacités Ultimes :\r\nAssault [For] : Vous vous lancez dans un assaut effréné au dépend de votre propre sécurité. Vous lancez cinq attaques successives sur une cible unique avec une arme au corps à corps, mais ne pouvez pas vous défendre pendant 1 tour.\r\nDestruction [For] : Vous lancez une attaque destructrice occasionnant +1d8 dégâts et brisant l’arme ou l’armure de votre ennemi.\r\nMaelstrom furieux [Dex] : Vous virevoltez sur le champ de bataille, attaquant jusqu’à quatre cibles différentes à proximité sans déclencher d’attaques d’opportunité.\r\nPluie mortelle [Dex] : Vous tirez quatre fois d’affilée dans une même action avec une arme à distance.\r\nAbnégation [Res] : Vous défendez vos alliés au péril de votre vie. Vous pouvez bloquer toutes les attaques ciblant vos allié·es à proximité pendant 1 tour et ne subissez pas de malus de désavantage si vous êtes submergé·e.\r\nPilier [Res] : Vous établissez une défense imprenable et parez automatiquement toutes les prochaines attaques pendant 1 tour. A chaque attaque que vous parez, l’attaquant doit effectuer un test de force, et s’il échoue il perd l’équilibre à cause du recul.\r\nVue d’ensemble [Esp] : Votre expérience des combats vous permet de connaître les points faibles de tous les ennemis présents, ainsi que leur technique de combat, leurs motivations possibles et comment les mettre en déroute.\r\nMimétisme [Esp]: En analysant un ennemi vous découvrez ses points faibles et pouvez reproduire toutes ses techniques non magiques le temps du combat.\r\nProvocation générale [Cha] : Vous attirez l’attention sur vous en raillant tous les ennemis à la cantonade et en vous faisant remarquer. Tous les ennemis vous prennent pour cible s’ils le peuvent et vous avez l’avantage pour parer et esquiver leurs attaques.\r\nInspiration [Cha] : Vos encouragements inspirent vos alliés, qui gagnent +2 pour toutes leurs actions pour le reste du combat, et ignorent les malus de Blessé et Épuisé.\r\nOmbre [Per] : Après chaque attaque vous pouvez vous dégagez du combat sans subir d’attaque d’opportunité, et vous vous dissimulez automatiquement dans l’environnement direct. Vous pouvez déclencher cette capacité directement après une attaque.\r\n6ème sens [Per] : Vous ne pouvez pas être attaqué par surprise, et vous frappez automatiquement les points faibles de vos ennemis. Déclencher cette capacité n’utilise pas votre action. ', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `subscribed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `pseudo`, `password`, `birthdate`, `admin`, `subscribed`) VALUES
(1, 'Alice', 'Dahan', 'lilice@gmail.com', 'Lilice', '$2a$12$WzEtqYlU4LZ/81mz8lKxqOSNC1NIXOmVI.MPH.vfJimkPrNBzAo5C', '1993-02-18', 0, 0),
(2, 'Alex', 'Delporte', 'botling@yahoo.fr', 'Botling', '$2a$12$6QEaamuW5G3R7ECptmPbze2g6Rzuj.oU5kCevXvcUi24ZbeKdwop2', '1992-12-11', 0, 1),
(3, 'Mathieu', 'Sallé', 'sgoat@gmail.com', 'sgoat', '$2a$12$vfXYbyrs1KUxQqNePkDY5.mkC2kgA8gO9ziFImQ5cSRrOlDnZh07u', '1992-05-21', 0, 1),
(4, 'Quentin', 'Orias', 'rasen@gmail.com', 'Rasenti', '$2a$12$2F2KQZnxvWWaR3Q6UqTodeJPLPWFLuXOdMSPS1JLMxK4fuK9kpSIG', '1992-12-10', 1, 0),
(5, 'Yolo', 'Swagg', 'zoro@gmail.com', 'Zoro', '$2a$12$NYhFiHQDmi/Nv9WBEMJS5OQ9UT5D2Fw2aB2/W2YWDGaKPm37FtTyS', '1999-02-14', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_has_pages`
--
ALTER TABLE `categories_has_pages`
  ADD CONSTRAINT `fk_categories_has_pages_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_categories_has_pages_pages1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_images1` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

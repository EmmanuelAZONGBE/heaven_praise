-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 fév. 2025 à 10:58
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_heavenly`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualitecommentaires`
--

CREATE TABLE `actualitecommentaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` longtext NOT NULL,
  `actualite_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `banniere` varchar(255) NOT NULL,
  `publie` tinyint(1) NOT NULL DEFAULT 0,
  `vues` int(11) NOT NULL DEFAULT 0,
  `flash` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pays_id` int(10) UNSIGNED NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `titre`, `slug`, `details`, `banniere`, `publie`, `vues`, `flash`, `user_id`, `pays_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Winners Bracket Final Interview - Most Emotional Esports Interview', 'winners-bracket-final-interview-most-emotional-esports-interview', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p><p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will <strong>uncover many</strong> web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h2>Keep Reading (H2)</h2><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><h3>Some title(H3)</h3><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p><h4>Some title(H4)</h4><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><blockquote><p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p></blockquote><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Some title(H5)</p><p>Some title(H6)</p><p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><ul><li>Theme Forest</li><li>Graphic River</li><li>Audio Jungle</li><li>3D Ocean</li><li>Code Canayon</li></ul><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. <a href=\"http://volna.volkovdesign.com/article.html#\">Link</a> the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>', '16896118421.jpg', 0, 0, 0, 1, 1, 3, '2023-07-17 15:37:22', '2024-04-21 12:21:47'),
(2, 'Voyage sur Imeko pour vivre en live l\'Apothéose de la louange de l\'année 2023', 'voyage-sur-imeko-pour-vivre-en-live-l-apotheose-de-la-louange-de-l-annee-2023', '<p>Deux jours, consacrés à la louange, à l\'adoration, à la prière au DIEU du prophète SBJ OSCHOFFA...<br>On ne rate pas ce rendez-vous de l\'an :</p><p><strong>ALLER ET RETOUR</strong></p><ul><li>VOYAGE SIMPLE 10.000F&nbsp;</li><li>VOYAGE ET RESTAURATION 15.000F</li></ul><p><strong>DEPART:</strong> &nbsp;29 SEPTEMBRE 2023 à 14H</p><p><strong>RETOUR:</strong> &nbsp;01 OCTOBRE 2023 à 10H</p><p>Pour plus d\'informations, contactez le <i>+229 50000001</i> ou <i>+229 96559194</i></p>', '16943620211.jpg', 1, 0, 1, 12, 4, 3, '2023-09-10 16:07:01', '2024-04-22 11:56:36'),
(3, 'Nouveau clip vidéo du Chantre WILF ENIGHMA', 'nouveau-clip-video-du-chantre-wilf-enighma', '<p>Nous sommes ravis de vous annoncer que quelque chose de spécial arrive ce Vendredi 29 Mars! &nbsp;Préparez-vous à être éblouis, avec notre tout nouveau clip vidéo du Chantre <strong>WILF ENIGHMA</strong> dans GOHO .&nbsp;<br><br>Soyez parmi les premiers à découvrir cet aperçu captivant qui vous transportera dans un univers rempli de la présence du St Esprit . Restez à l\'affût, car vous ne voudrez pas manquer cette excitante avant-première !<br><br>Rendez-vous Vendredi pour un moment magique que vous n\'oublierez pas de sitôt !</p>', '17138122761.png', 1, 0, 0, 14, 4, 1, '2024-04-22 18:57:56', '2024-04-22 18:57:56'),
(4, 'Heavenly Praise Sponsor Officiel du Concert Back at Home de Sheyi Campos', 'heavenly-praise-sponsor-officiel-concert-back-at-home-sheyi-campos', '<p>Nous avons le plaisir d\'annoncer que notre label, Heavenly Praise, sera le sponsor officiel du prochain concert de l\'artiste gospel renommée Sheyi Campos, intitulé \"Back at Home\".</p><p>Sheyi Campos, avec sa voix puissante et son message inspirant, est une figure emblématique de la scène gospel. Son concert \"Back at Home\" promet d\'être un moment exceptionnel de louange et d\'adoration, rassemblant des fans de tous horizons pour célébrer la musique gospel et la foi.</p><p>En tant que sponsor officiel, Heavenly Praise est fier de soutenir cet événement qui met en avant des talents exceptionnels et promeut des valeurs de foi et de communauté. Nous croyons fermement en la puissance de la musique gospel pour toucher les cœurs et élever les esprits, et nous sommes honorés de pouvoir contribuer à la réalisation de ce concert.</p><p>Les pass pour assister à cet événement sont disponibles en appelant le +229 50000001 ou le +229 97 14 67 24. Assurez-vous de réserver vos places à l\'avance pour ne pas manquer cette soirée unique de louange et d\'adoration.</p><p><strong>Heavenly Praise - Sponsor Officiel</strong></p><p>Pour plus d\'informations sur le concert \"Back at Home\" et les autres événements à venir, suivez-nous sur nos réseaux sociaux et restez à l\'écoute de nos annonces.</p><p><strong>#BackAtHome #SheyiCampos #HeavenlyPraise #GospelConcert</strong></p>', '17198506681.jpg', 1, 0, 1, 14, 4, 1, '2024-07-01 16:17:48', '2024-07-01 16:17:48');

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `cover` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'En Attente',
  `masque` tinyint(1) NOT NULL DEFAULT 0,
  `recommanded` tinyint(1) DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`id`, `titre`, `slug`, `description`, `cover`, `statut`, `masque`, `recommanded`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mon Miracle', 'mon-miracle', 'C’est un album riche tant au niveau des textes que de la qualité. Les plus grands musiciens de Martinique ont joué là-dessus. Des artistes américains y sont intervenus aussi. L’album est riche en rythmes. Sous l’inspiration de Dieu, j’ai chanté dans ma langue, en français et en créole. La différence entre cet album et tous ce que j’ai fait par le passé est nette. C’est une œuvre à la gloire de Dieu. Et la main de l’Eternel est là-dessus.', '16947366021.jpg', 'En Ligne', 0, 1, 2, '2023-09-14 23:10:02', '2023-09-14 23:40:38');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Musique', 'musique', '2024-04-21 08:52:05', '2024-04-21 08:52:05'),
(2, 'People', 'people', '2024-04-21 10:08:52', '2025-02-12 09:44:26'),
(3, 'Concert', 'concert', '2024-04-21 10:09:02', '2024-04-21 10:22:14'),
(4, 'International', 'international', '2024-04-22 18:29:21', '2024-04-22 18:29:21');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `modedepaiement` varchar(255) DEFAULT NULL,
  `prix` varchar(255) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `montant` varchar(255) NOT NULL,
  `paye` tinyint(1) NOT NULL DEFAULT 0,
  `livre` tinyint(1) NOT NULL DEFAULT 0,
  `ticketevenement_id` int(10) UNSIGNED NOT NULL,
  `evenement_id` int(10) UNSIGNED NOT NULL,
  `livraison_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `reference`, `session_id`, `commentaire`, `modedepaiement`, `prix`, `qte`, `montant`, `paye`, `livre`, `ticketevenement_id`, `evenement_id`, `livraison_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1722000247Xud6iW', NULL, '', '5000', '4', '20000', 0, 0, 1, 7, NULL, NULL, '2024-07-26 13:24:07', '2024-07-26 13:24:07'),
(2, '2', '1722002987Y7rmTd', 'RAS', 'moov', '10000', '1', '10000', 1, 0, 2, 7, 1, 42, '2024-07-26 14:09:47', '2024-07-26 14:24:10'),
(3, '3', '1722782895s8SPIo', NULL, '', '5000', '1', '5000', 0, 0, 3, 8, NULL, NULL, '2024-08-04 14:48:15', '2024-08-04 14:48:15'),
(4, '4', '1725895598OHVCUi', NULL, '', '15000', '1', '15000', 0, 0, 7, 9, NULL, NULL, '2024-09-09 14:26:38', '2024-09-09 14:26:38'),
(5, '5', '1737386113bDiH5y', NULL, '', '15000', '01', '15000', 0, 0, 7, 9, NULL, NULL, '2025-01-20 14:15:13', '2025-01-20 14:15:13');

-- --------------------------------------------------------

--
-- Structure de la table `communautes`
--

CREATE TABLE `communautes` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `communautes`
--

INSERT INTO `communautes` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Église du Christianisme Céleste', '2023-07-12 15:14:19', '2023-07-12 15:18:17'),
(2, 'Église Catholique', '2023-07-12 15:14:42', '2023-07-12 15:14:42'),
(3, 'Église Protestante Méthodiste', '2023-07-12 15:14:49', '2025-02-12 09:44:47'),
(4, 'Église Évangélique', '2023-07-12 15:14:57', '2023-07-12 15:14:57');

-- --------------------------------------------------------

--
-- Structure de la table `ecoutes`
--

CREATE TABLE `ecoutes` (
  `id` int(11) NOT NULL,
  `single_id` int(10) UNSIGNED NOT NULL,
  `nombre_ecoutes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecoutes`
--

INSERT INTO `ecoutes` (`id`, `single_id`, `nombre_ecoutes`, `created_at`, `updated_at`) VALUES
(18, 44, 13, '2025-02-18 08:17:21', '2025-02-19 07:47:05'),
(19, 10, 8, '2025-02-18 08:20:55', '2025-02-19 06:40:02'),
(20, 65, 2, '2025-02-18 09:11:34', '2025-02-18 09:11:47'),
(21, 66, 1, '2025-02-18 09:12:00', '2025-02-18 09:12:00'),
(22, 62, 7, '2025-02-18 09:28:20', '2025-02-19 06:40:10'),
(23, 61, 2, '2025-02-18 09:28:38', '2025-02-18 22:45:18'),
(24, 60, 9, '2025-02-18 09:29:33', '2025-02-19 07:48:12'),
(25, 9, 2, '2025-02-18 11:18:33', '2025-02-18 11:19:53'),
(26, 56, 1, '2025-02-18 11:20:14', '2025-02-18 11:20:14'),
(27, 18, 1, '2025-02-18 13:02:53', '2025-02-18 13:02:53'),
(28, 58, 2, '2025-02-18 14:20:46', '2025-02-18 14:20:52'),
(29, 3, 2, '2025-02-18 14:43:22', '2025-02-18 21:52:32'),
(30, 68, 1, '2025-02-18 16:01:20', '2025-02-18 16:01:20'),
(31, 67, 4, '2025-02-18 16:01:29', '2025-02-18 21:47:21'),
(32, 53, 4, '2025-02-18 20:17:29', '2025-02-18 22:40:47'),
(33, 54, 6, '2025-02-18 20:17:34', '2025-02-19 06:40:16'),
(34, 52, 3, '2025-02-18 20:17:44', '2025-02-18 22:40:52'),
(35, 55, 1, '2025-02-18 20:17:48', '2025-02-18 20:17:48'),
(36, 57, 1, '2025-02-18 20:17:52', '2025-02-18 20:17:52'),
(37, 63, 2, '2025-02-18 20:19:49', '2025-02-18 22:43:19'),
(38, 64, 3, '2025-02-18 20:21:39', '2025-02-18 22:41:22'),
(39, 45, 1, '2025-02-18 21:43:09', '2025-02-18 21:43:09'),
(40, 46, 2, '2025-02-18 21:43:12', '2025-02-18 21:43:14'),
(41, 47, 1, '2025-02-18 21:43:17', '2025-02-18 21:43:17'),
(42, 48, 2, '2025-02-18 21:43:20', '2025-02-18 22:46:13'),
(43, 49, 2, '2025-02-18 21:43:24', '2025-02-18 22:46:11'),
(44, 50, 1, '2025-02-18 21:43:27', '2025-02-18 21:43:27'),
(45, 51, 1, '2025-02-18 21:43:31', '2025-02-18 21:43:31'),
(46, 59, 1, '2025-02-18 21:43:33', '2025-02-18 21:43:33'),
(47, 43, 1, '2025-02-18 21:44:52', '2025-02-18 21:44:52'),
(48, 42, 1, '2025-02-18 21:44:55', '2025-02-18 21:44:55'),
(49, 41, 1, '2025-02-18 21:44:57', '2025-02-18 21:44:57'),
(50, 40, 1, '2025-02-18 21:45:01', '2025-02-18 21:45:01'),
(51, 39, 1, '2025-02-18 21:45:03', '2025-02-18 21:45:03'),
(52, 36, 1, '2025-02-18 21:45:15', '2025-02-18 21:45:15'),
(53, 37, 4, '2025-02-18 21:45:18', '2025-02-19 06:40:27'),
(54, 4, 2, '2025-02-18 21:52:34', '2025-02-18 21:52:35'),
(55, 38, 1, '2025-02-18 21:58:40', '2025-02-18 21:58:40'),
(56, 34, 2, '2025-02-18 22:14:33', '2025-02-18 22:14:34'),
(57, 12, 2, '2025-02-18 22:45:44', '2025-02-18 22:45:45'),
(58, 11, 1, '2025-02-18 22:45:48', '2025-02-18 22:45:48'),
(59, 1, 2, '2025-02-18 22:45:53', '2025-02-18 22:45:54'),
(60, 13, 1, '2025-02-18 22:46:15', '2025-02-18 22:46:15'),
(61, 21, 1, '2025-02-19 06:40:33', '2025-02-19 06:40:33'),
(62, 31, 1, '2025-02-19 07:18:34', '2025-02-19 07:18:34'),
(63, 29, 1, '2025-02-19 07:31:36', '2025-02-19 07:31:36');

-- --------------------------------------------------------

--
-- Structure de la table `evenementcommentaires`
--

CREATE TABLE `evenementcommentaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` longtext NOT NULL,
  `evenement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `evenementcommentaires`
--

INSERT INTO `evenementcommentaires` (`id`, `nom`, `email`, `commentaire`, `evenement_id`, `created_at`, `updated_at`) VALUES
(1, 'Apporteur', 'jazongbe25@gmail.com', 'nnn', 2, '2025-01-29 06:21:49', '2025-01-29 06:21:49');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `banniere` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `gratuit` tinyint(1) NOT NULL DEFAULT 0,
  `billeterie` tinyint(1) NOT NULL DEFAULT 0,
  `flash` tinyint(1) NOT NULL DEFAULT 0,
  `vues` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pays_id` int(10) UNSIGNED NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `slug`, `description`, `lieu`, `date`, `banniere`, `statut`, `gratuit`, `billeterie`, `flash`, `vues`, `user_id`, `pays_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Événement Divin d\'Harmonie Gospel à Imeko', 'evenement-divin-d-harmonie-gospel-a-imeko', '<p>Joignez-vous à nous pour une célébration spirituelle extraordinaire au cœur d\'Imeko, Ogun State, Nigeria, lors de l\'Événement Divin d\'Harmonie Gospel les 29 et 30 septembre 2023. Préparez-vous à être transporté dans un monde de musique sacrée, de louange et d\'inspiration, où les voix des anges résonneront dans l\'atmosphère paisible de ce coin bénit de la terre.</p><p><strong>Pourquoi venir?</strong>:</p><ul><li>Une occasion de renouveler votre foi et de vous connecter avec la spiritualité.</li><li>Une expérience musicale exceptionnelle avec des talents gospel de renommée nationale.</li><li>Une atmosphère d\'amour, d\'unité et de fraternité.</li><li>L\'opportunité de découvrir la culture riche d\'Imeko et de soutenir l\'artisanat local.</li></ul><p><strong>Billets</strong>: Cet événement est gratuit et ouvert à tous. Aucun billet n\'est nécessaire. Venez avec votre famille, vos amis et votre enthousiasme pour la louange.</p><p><strong>Consignes de sécurité</strong>: Nous nous engageons à garantir la sécurité de tous les participants. Des mesures de distanciation sociale et des précautions sanitaires seront mises en place pour assurer un événement sécuritaire.</p><p>Ne manquez pas cette chance unique de célébrer la foi, la musique et la communauté à l\'Événement Divin d\'Harmonie Gospel à Imeko, Ogun State.&nbsp;</p><p>Rejoignez-nous et laissez la musique gospel élever vos âmes alors que nous nous réunissons pour chanter ensemble dans l\'harmonie de la grâce divine.</p><p>#FestivalDeLaGrâceDivine #ConcertGospel #Imeko2023</p><p><br>&nbsp;</p>', 'Imeko, Ogun State, Nigeria', '2023-09-29', '16895977831.jpeg', 'Publié', 1, 0, 1, 0, 1, 41, 3, '2023-07-17 11:43:03', '2024-04-22 11:50:49'),
(2, 'Grande Nuit de Délivrance et de Grâce', 'grande-nuit-de-delivrance-et-de-grace-un-rendez-vous-celeste-pour-le-nouvel-an', '<p>Nous sommes ravis de vous inviter à un événement extraordinaire qui marquera le passage vers une nouvelle année empreinte de bénédiction, de délivrance, et de grâce. Préparez-vous à vivre une expérience spirituelle inoubliable lors de la \"Grande Nuit de Délivrance et de Grâce\" organisée par le camp de prière céleste des Héritiers du Christ.</p><p><strong>Date et Heure :</strong> 31 Décembre 2023 à 22h</p><p><strong>Lieu :</strong> BAZOUNKPA 5eme von à gauche après Gazoduc, ruelle du collège Le Partage, 6e rue à droite</p><p><strong>Une Nuit Exceptionnelle en la Présence Divine</strong></p><p>Rejoignez-nous pour une nuit de louange fervente, d\'adoration profonde, et de prière puissante alors que nous nous rassemblons pour célébrer le passage vers une nouvelle année sous la grâce infinie de notre Seigneur.</p><p>Nous sommes impatients de vous accueillir pour cette nuit spéciale de délivrance et de grâce. Préparez-vous à vivre une rencontre céleste qui laissera des marques indélébiles dans vos vies.</p><p>Soyez bénis et à l\'année nouvelle !</p><p>Ensemble dans la foi,</p>', 'BAZOUNKPA 5eme von à gauche après Gazoduc, ruelle du collège Le Partage, 6e rue à droite', '2023-12-31', '17036948351.png', 'Publié', 1, 0, 0, 0, 14, 4, 3, '2023-12-27 15:52:40', '2024-04-21 12:07:27'),
(3, 'Concert 20ans de carrière musicale de Sam Sewedo', 'concert-20ans-de-carriere-musicale-de-sam-sewedo', '<p>Heavenly Praise (Louange Céleste) &amp; 2S Production vous invites à un événement exceptionnel pour les 20ans de carrière musicale et le lancement du double album de Sewedo Sam !</p><p>Que vous soyez en quête de réconfort, de joie ou de communion spirituelle, ce concert est fait pour vous. Venez ressentir l\'énergie et la magie d\'une célébration collective de foi et d\'espoir.</p><p>Ne manquez pas cette opportunité de vous connecter avec votre spiritualité et de partager des moments inoubliables avec votre communauté. Réservez votre place dès maintenant et préparez-vous à être transportés dans un voyage transcendantal de louange et d\'adoration avec les artistes : Sam SEWEDO, Johny Sourou Ahivodji, JAH BABA, Raphael Sheyi, Julios Adjaho, Aimee Isaac, Assy KIWAH, Pidi SYMPH ! WILF ENIGHMA et plein d’autres artistes…</p><ul><li>&nbsp;Date : 20 Avril 2024</li><li>&nbsp;Heure : 16h00</li><li>Lieu : Godomey-Salle de fete ‘’LA LUCIDE’’ (En face de la boulangerie St Daniel)</li></ul><p>Ensemble, élevons nos voix vers le ciel dans une communion de louange et de gratitude. Nous avons hâte de vous accueillir pour une soirée inoubliable !</p>', 'Godomey-Salle de fete ‘’LA LUCIDE’’', '2024-04-23', '17138116601.png', 'Publié', 0, 0, 0, 0, 14, 4, 3, '2024-04-22 18:47:40', '2024-04-22 18:47:40'),
(4, 'Jah Baba Career Celebration', 'jah-baba-career-celebration', '<p>Réservez votre place dès maintenant et préparez-vous à être transportés dans un voyage transcendantal avec JAH BABA et tous les artistes invités .</p><ul><li>Date : 27 Avril 2024</li><li>Heure : 20h00</li><li>Lieu : Africa sound city derrière le marché kindonou</li></ul><p>Venez ressentir l\'énergie et la magie d\'une célébration durant le weekend!</p>', 'Africa sound city', '2024-04-27', '17144058701.png', 'Publié', 0, 0, 0, 0, 14, 4, 3, '2024-04-29 15:51:10', '2024-04-29 15:51:10'),
(5, 'Ese Celebration : Une Soirée de Louange et d\'Adoration Inoubliable', 'ese-celebration-une-souiree-de-louange-et-d-adoration-inoubliable', '<p>Le label Heavenly Praise a le plaisir de vous inviter à \"Ese Celebration\", une soirée exceptionnelle de louange et d\'adoration. Cet événement unique rassemblera plusieurs artistes gospel de renommée pour un moment de gratitude et de célébration spirituelle.</p><p>Le concert gospel \"Ese Celebration\" se tiendra le <strong>samedi 17 août 2024</strong>, avec un début des festivités prévu à 17h00. Les pass pour y assister sont en vente et peuvent ê &nbsp;tre réservés en appelant le <strong>+229 50000001</strong> ou le <strong>+229 97 14 67 24</strong>. Assurez-vous de réserver vos places à l\'avance pour ne pas manquer cette soirée unique de louange et d\'adoration, parrainée par le label Heavenly Praise.</p><p><strong>Heavenly Praise - Sponsor Officiel</strong></p><p>Pour plus d\'informations, veuillez nous contacter aux numéros indiqués ci-dessus.</p><p><strong>#EseCelebration #GospelConcert #HeavenlyPraise #17Août2024</strong></p>', 'À venir', '2024-08-17', '17198493711.jpg', 'Publié', 0, 0, 1, 0, 14, 4, 3, '2024-07-01 15:56:11', '2024-07-01 15:56:11'),
(6, 'Concert à Venir de Sheyi Campos : \"Back at Home\"', 'sheyi-campos-back-at-home', '<p>Le label Heavenly Praise est fier d\'annoncer le prochain concert de l\'artiste gospel renommée Sheyi Campos, intitulé \"Back at Home\".</p><p>Sheyi Campos, figure emblématique de la musique gospel, prépare un événement exceptionnel qui promet une expérience unique de louange et d\'adoration. Son concert \"Back at Home\" sera l\'occasion de célébrer la foi à travers des chants inspirants et des messages puissants.</p><p>Restez connectés pour plus de détails sur cet événement à venir qui réunira les amateurs de musique gospel autour d\'une soirée mémorable de communion spirituelle.</p><p><strong>Heavenly Praise - Sponsor Officiel</strong></p><p>Pour les dernières informations sur le concert \"Back at Home\" de Sheyi Campos, suivez-nous sur nos réseaux sociaux et restez à l\'écoute de nos annonces.</p><p><strong>#BackAtHome #SheyiCampos #HeavenlyPraise #GospelConcert</strong></p>', 'À venir', '2024-07-02', '17198515431.jpg', 'Publié', 0, 0, 1, 0, 14, 4, 1, '2024-07-01 16:32:23', '2024-07-01 16:32:23'),
(7, 'Concert ESE CELEBRATION de Phiz Mensah [TIKETS EN VENTE]', 'concert-ese-celebration-de-phiz-mensah-ticket-en-vente', '<p>Le label Heavenly Praise et le chantre Phiz Mensah vous invitent à un événement exceptionnel <strong>Ese Celebration</strong>, prévu pour le 17 août 2024.</p><p>Préparez-vous à vivre <strong>un moment intense et unique avec Yahweh</strong> dans une atmosphère de louange et d\'adoration. Cet événement aura lieu à :</p><p><strong>Lieu : </strong>Bati Renov Akpakpa, Quartier JAK Dans l\'ancienne rue de la radio Capp FM</p><p>Les tickets pour cet événement sont déjà disponibles. Vous pouvez les commander en ligne et vous les faire livrer directement chez vous. Ne manquez pas cette occasion unique de vous joindre à nous pour une soirée inoubliable de communion spirituelle.</p><p><strong>Heavenly Praise - Sponsor Officiel</strong></p><p>Pour plus d\'informations et pour commander vos tickets, veuillez nous contacter ou visiter notre site web.</p><p><strong>#EseCelebration #HeavenlyPraise #GospelConcert #PhizMensah #17Août2024</strong></p>', 'Bati Renov Akpakpa, Quartier JAK Dans l\'ancienne rue de la radio Capp FM', '2024-08-17', '17205446311.jpg', 'Publié', 0, 1, 1, 0, 14, 4, 3, '2024-07-09 17:03:51', '2024-07-09 17:03:51'),
(8, 'Concert BACK AT HOME de Sheyi Campos [Billets Disponibles]', 'concert-back-at-home-sheyi-campos-billets-disponibles', '<p>Nous avons le plaisir de vous informer que les billets pour le concert très attendu de Sheyi Campos, intitulé <strong>\"BACK AT HOME\"</strong>, sont désormais disponibles à la vente. Organisé et sponsorisé par <strong>Heavenly Praise</strong>, cet événement exceptionnel se déroulera au <strong>Bâti Renov, Akpakpa Quartier JAK, dans l\'ancienne rue de la radio Capp FM</strong>.</p><p>Ne tardez pas à acquérir vos billets pour garantir votre place à ce concert unique. Vous pouvez acheter vos billets en ligne dès maintenant et bénéficier de l\'option de livraison pour les recevoir directement chez vous.</p><p>Rejoignez-nous pour une soirée mémorable de musique gospel en compagnie de Sheyi Campos. Venez nombreux pour célébrer et partager des moments de joie et de louange.</p><p>Nous vous attendons avec impatience !</p><p>Pour toute information complémentaire et pour acheter vos billets, veuillez contacter nos numéros infoline : <strong>(+229) 50000001 - (+229) 46947350 - (+229) 96559194 - (+233) 540185621</strong></p><p>&nbsp;</p>', 'Bâti Renov, Akpakpa Quartier JAK, dans l\'ancienne rue de la radio Capp FM', '2024-08-25', '17217541161.jpg', 'Publié', 0, 1, 0, 0, 14, 4, 3, '2024-07-23 17:01:56', '2024-07-23 17:06:05'),
(9, 'Seconde Édition du Concert Heavenly Praise à Imeko : 28-29 Septembre 2024', 'seconde-edition-du-concert-heavenly-praise-a-imeko', '<p>Nous avons le plaisir de vous annoncer la tenue de la seconde édition du concert <strong>Heavenly Praise</strong> à Imeko, au Nigeria, les 28 et 29 septembre 2024.</p><p>Cet événement spirituel de grande envergure rassemblera des adorateurs et des passionnés de musique gospel pour un week-end inoubliable de louanges, de prières et de communion fraternelle.</p><p><strong>Détails de l\'événement :</strong></p><ul><li><strong>Dates :</strong> Samedi 28 et Dimanche 29 Septembre 2024</li><li><strong>Lieu :</strong> Imeko, Nigeria</li><li><strong>Horaire :</strong><ul><li>Départ des bus : Samedi 28 Septembre à 9h00</li><li>Retour : Dimanche 29 Septembre à 10h00</li></ul></li></ul><p><strong>Transport et Restauration :</strong></p><p>Pour votre confort, des bus sont mis à disposition pour assurer le transport aller-retour à un tarif de 15 000 FCFA par personne, restauration incluse. C\'est l\'occasion idéale de voyager en groupe et de partager des moments conviviaux tout au long du trajet.</p><p><strong>Inscription :</strong></p><p>La date limite pour s\'inscrire est fixée au <strong>24 septembre 2024</strong>. Ne manquez pas cette opportunité de vivre un week-end de bénédiction et de louange dans la présence du Seigneur.</p><p><strong>Infoline : +229 50 00 00 01</strong></p><p>La date limite pour s\'inscrire est fixée au <strong>24 septembre 2024</strong>. Ne manquez pas cette opportunité de vivre un week-end de bénédiction et de louange dans la présence du Seigneur.</p><p><strong>Réservez dès maintenant votre place pour une expérience mémorable à Imeko !</strong></p>', 'Imeko, Nigéria', '2024-09-28', '17254468961.jpg', 'Publié', 1, 1, 0, 0, 14, 41, 3, '2024-09-04 10:48:16', '2024-09-04 10:48:16');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forumcommunautes`
--

CREATE TABLE `forumcommunautes` (
  `id` int(10) UNSIGNED NOT NULL,
  `lien` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 0,
  `communaute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forumparoisses`
--

CREATE TABLE `forumparoisses` (
  `id` int(10) UNSIGNED NOT NULL,
  `lien` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 0,
  `paroisse_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forumpays`
--

CREATE TABLE `forumpays` (
  `id` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 0,
  `pays_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forumpays`
--

INSERT INTO `forumpays` (`id`, `lien`, `actif`, `pays_id`, `created_at`, `updated_at`) VALUES
(1, 'https://chat.whatsapp.com/FtKgyevyfFmGnlJorVWjd6', 1, 4, '2023-09-14 14:07:39', '2023-09-14 14:07:45');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `libelle`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Blues', 'blues', NULL, '2023-07-13 14:10:09'),
(2, 'Classique', 'classique', NULL, NULL),
(3, 'Country Musique', 'country-musique', NULL, NULL),
(4, 'Hip-Hop/Rap', 'hip-hop-rap', NULL, NULL),
(5, 'Gospel', 'gospel', NULL, NULL),
(6, 'Jaaz', 'jaaz', NULL, NULL),
(7, 'R&B/Soul', 'rnb-soul', NULL, NULL),
(8, 'Rock', 'rock', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lives`
--

CREATE TABLE `lives` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `banniere` varchar(255) DEFAULT NULL,
  `lien` longtext NOT NULL,
  `encours` tinyint(1) NOT NULL DEFAULT 0,
  `publie` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `lives`
--

INSERT INTO `lives` (`id`, `titre`, `banniere`, `lien`, `encours`, `publie`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Concert Live IMEKO 2023 - Partie 1', '17080776781.jpg', 'https://www.facebook.com/v2.3/plugins/video.php?allowfullscreen=true&autoplay=true&container_width=800&href=https://fb.watch/nm-BQEwo1_/?mibextid=Nif5oz', 0, 1, NULL, '2024-02-16 09:01:19', '2024-02-16 09:30:35'),
(3, 'Concert Live IMEKO 2023 - Partie 2', '17080809961.jpg', 'https://www.facebook.com/v2.3/plugins/video.php?allowfullscreen=true&autoplay=true&container_width=800&href=https://fb.watch/qe_9EPtpqX/', 0, 1, NULL, '2024-02-16 09:56:36', '2024-02-16 09:56:36'),
(4, 'Concert Live IMEKO 2023 - Partie 3', '17080991101.jpg', 'https://www.facebook.com/v2.3/plugins/video.php?allowfullscreen=true&autoplay=true&container_width=800&hrefhttps://fb.watch/qffqG7w52z/', 0, 1, NULL, '2024-02-16 15:58:30', '2024-02-16 15:58:30'),
(5, 'Aimé Isaac 1/3 - Concert Live IMEKO 2023', '17081000891.jpg', 'https://www.youtube.com/watch?v=4b_ejw-E6nE', 0, 1, 16, '2024-02-16 16:14:49', '2024-02-16 16:14:49'),
(6, 'Aimé Isaac 2/3 - Concert Live IMEKO 2023', '17081006831.jpg', 'https://www.youtube.com/watch?v=KNXUN153i6g', 0, 1, 16, '2024-02-16 16:24:43', '2024-02-16 16:24:43'),
(7, 'Aimé Isaac 3/3 - Concert Live IMEKO 2023', '17081008841.jpg', 'https://www.youtube.com/watch?v=9v2IOYH0Hlg', 0, 1, 16, '2024-02-16 16:28:04', '2024-02-16 16:28:04'),
(8, 'Anna TEKO 1/4 - Concert Live IMEKO 2023', '17081013431.jpg', 'https://www.youtube.com/watch?v=PNEw9_MPHPs', 0, 1, 2, '2024-02-16 16:35:43', '2024-02-16 16:35:43'),
(9, 'Anna TEKO 2/4 - Concert Live IMEKO 2023', '17081020071.jpg', 'https://www.youtube.com/watch?v=CJEC2RcrDOA', 0, 1, 2, '2024-02-16 16:46:47', '2024-02-16 16:46:47'),
(10, 'Anna TEKO 3/4 - Concert Live IMEKO 2023', '17081022391.jpg', 'https://www.youtube.com/watch?v=-207Zw0k-rM', 0, 1, 2, '2024-02-16 16:50:40', '2024-02-16 16:50:40'),
(11, 'Anna TEKO 4/4 - Concert Live IMEKO 2023', '17081024131.jpg', 'https://www.youtube.com/watch?v=Uv5AvnqFb6M', 0, 1, 2, '2024-02-16 16:53:33', '2024-02-16 16:53:33'),
(12, 'AWINYAN AGUN WIWE OSHOFFA TON Officiel CLP 2023', '17126584791.png', 'https://www.youtube.com/watch?v=MTMHXTVSRDw', 0, 1, 30, '2024-04-09 10:27:59', '2024-04-09 10:34:23'),
(13, 'Djèli Djèli', '17126591291.png', 'https://www.youtube.com/watch?v=ruJ7r2Y2TEw', 0, 1, 16, '2024-04-09 10:38:49', '2024-04-09 10:38:49'),
(14, 'Raphael Sheyi 1/4-Concert Live IMEKO 2023', '17126602931.png', 'https://www.youtube.com/watch?v=0JiS65AmB5g', 0, 1, 5, '2024-04-09 10:58:13', '2024-04-09 10:58:13'),
(15, 'Raphael Sheyi 2/4-Concert Live IMEKO 2023', '17126604231.png', 'https://www.youtube.com/watch?v=8HFmF-7KcqQ', 0, 1, 5, '2024-04-09 11:00:23', '2024-04-09 11:00:23'),
(16, 'Raphael Sheyi 3/4-Concert Live IMEKO 2023', '17126605311.png', 'https://www.youtube.com/watch?v=Uk4bNJyvtF8', 0, 1, 5, '2024-04-09 11:02:11', '2024-04-09 11:03:30'),
(17, 'Sam KOUKPAKI 1/1 - Concert Live IMEKO 2023', '17131660421.png', 'https://www.youtube.com/watch?v=2g3gV99Q_oY', 0, 1, 6, '2024-04-15 07:27:22', '2024-04-15 07:27:22'),
(18, 'Raphael Sheyi 4/4-Concert Live IMEKO 2023', '17131663531.png', 'https://www.youtube.com/watch?v=bfa91lUPIiU', 0, 1, 5, '2024-04-15 07:32:33', '2024-04-15 07:32:33'),
(19, 'Concert Heavenly Praise 2023 à Imeko (Sheyi Campos) 1/3', '17157703381.png', 'https://www.youtube.com/watch?v=3aI2b7xbesI', 0, 1, 26, '2024-05-15 10:52:18', '2024-05-15 10:52:18'),
(20, 'Concert Heavenly Praise 2023 à Imeko (Sheyi Campos) 2/3', '17157704061.png', 'https://www.youtube.com/watch?v=V7j29Nbk-3M', 0, 1, 26, '2024-05-15 10:53:26', '2024-05-15 10:53:26'),
(21, 'Concert Heavenly Praise 2023 à Imeko (Sheyi Campos) 3/3', '17157704961.png', 'https://www.youtube.com/watch?v=RHz4tytd5Qc', 0, 1, 26, '2024-05-15 10:54:56', '2024-05-15 10:54:56'),
(22, 'Concert Heavenly Praise 2023 à Imeko (Tejumade Alabaster) 1/2', '17157707121.png', 'https://www.youtube.com/watch?v=rTos87Rqurs', 0, 1, 21, '2024-05-15 10:58:33', '2024-05-15 10:58:33');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `quartier` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `adresse`, `ville`, `quartier`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'C/1352, Maison KOUTOU', 'Cotonou', 'Missekple', 42, '2024-07-26 14:23:00', '2024-07-26 14:23:00'),
(2, 'Partout', 'Calavi', 'Aledjo', 43, '2025-02-06 10:01:56', '2025-02-06 10:01:56');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_06_30_111922_create_genres_table', 2),
(4, '2023_06_30_113749_create_albums_table', 3),
(5, '2023_06_30_114447_create_singles_table', 4),
(6, '2023_07_12_132957_create_pays_table', 5),
(7, '2023_07_12_154745_create_communautes_table', 5),
(9, '2023_07_12_163204_create_paroisses_table', 6),
(10, '2023_07_14_145242_create_forumpays_table', 7),
(11, '2023_07_14_151026_create_forumcommunautes_table', 7),
(12, '2023_07_14_151038_create_forumparoisses_table', 7),
(14, '2023_07_17_095644_create_evenements_table', 8),
(15, '2023_07_17_145521_create_actualites_table', 9),
(16, '2023_07_20_151651_create_playlists_table', 10),
(17, '2023_07_20_152424_create_singlesplaylists_table', 10);

-- --------------------------------------------------------

--
-- Structure de la table `paroisses`
--

CREATE TABLE `paroisses` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `communaute_id` int(10) UNSIGNED NOT NULL,
  `pays_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paroisses`
--

INSERT INTO `paroisses` (`id`, `libelle`, `communaute_id`, `pays_id`, `created_at`, `updated_at`) VALUES
(1, 'Paroisse de Cadjehoun', 1, 4, '2023-07-12 16:16:47', '2023-09-14 19:43:17'),
(2, 'Paroisse de Kpankpan', 1, 4, '2023-09-14 19:31:55', '2023-09-14 19:42:52'),
(3, 'Paroisse St Michel De Tanto Centre', 1, 4, '2023-09-14 19:34:41', '2023-09-14 19:34:41'),
(4, 'Paroisse Jehova Jire', 1, 4, '2023-09-14 19:40:38', '2023-09-14 19:40:38'),
(5, 'Paroisse d\'Akpakpa', 1, 4, '2023-09-14 19:45:36', '2023-09-14 19:45:36'),
(6, 'Paroisse Lengbokpokon', 1, 4, '2023-09-14 19:46:19', '2023-09-14 19:46:19'),
(7, 'Paroisse Cité de paix Fiyegnon Houta', 1, 4, '2023-09-14 19:46:55', '2023-09-14 19:46:55'),
(8, 'Paroisse St Emmanuel de Enagnon', 1, 4, '2023-09-14 19:47:41', '2023-09-14 19:47:41'),
(9, 'Paroisse Lokocoucoumey Centre', 1, 4, '2023-09-14 19:48:04', '2023-09-14 19:48:04'),
(10, 'Paroisse St Michel De Wloguede', 1, 4, '2023-09-14 19:48:43', '2023-09-14 19:48:43'),
(14, 'ngvrvrvr', 2, 1, '2025-02-07 08:36:23', '2025-02-07 08:36:23');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `indicatif` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `indicatif`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 27, 'Afrique du Sud', '2016-10-24 18:13:02', '2025-02-12 09:44:00'),
(2, 213, 'Algérie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(3, 244, 'Angola', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(4, 229, 'Bénin', '2016-10-24 18:13:02', '2023-09-14 13:31:23'),
(5, 267, 'Botswana', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(6, 226, 'Burkina Faso', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(7, 257, 'Burundi', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(8, 237, 'Cameroun', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(9, 238, 'Cap-Vert', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(10, 236, 'Centrafrique', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(11, 242, 'Congo', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(12, 243, 'Congo RDC', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(13, 225, 'Côte d\'Ivoire', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(14, 253, 'Le Djibouti', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(15, 226, 'Burkina Faso', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(16, 20, 'Egypte', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(17, 20, 'Egypte', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(18, 291, 'Erythrée', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(19, 251, 'Ethiopie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(20, 241, 'Gabon', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(21, 220, 'Gambie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(22, 233, 'Ghana', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(23, 224, 'Guinée', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(24, 240, 'Guinée équatoriale', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(25, 240, 'Guinée équatoriale', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(26, 245, 'Guinée-Bissau (Bissau)', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(27, 245, 'Guinée-Bissau (Bissau)', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(28, 254, 'Kenya  ', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(29, 245, 'Guinée-Bissau (Bissau)', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(30, 266, 'Lesotho', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(31, 245, 'Guinée-Bissau (Bissau)', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(32, 231, 'Libéria', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(33, 218, 'Libye', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(34, 261, 'Madagascar (Tananarive)', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(35, 265, 'Malawi', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(36, 223, 'Mali', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(37, 212, 'Maroc', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(38, 222, 'Mauritanie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(39, 264, 'Namibie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(40, 227, 'Niger', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(41, 234, 'Nigeria', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(42, 256, 'Ouganda', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(43, 250, 'Rwanda', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(44, 239, 'Sao Tomé-et-Principe', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(45, 221, 'Sénégal', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(46, 232, 'Sierra Leone', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(47, 252, 'Somalie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(48, 249, 'Soudan', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(49, 249, 'Sud-Soudan', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(50, 268, 'Swaziland', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(51, 255, 'Tanzanie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(52, 235, 'Tchad', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(53, 228, 'Togo', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(54, 216, 'Tunisie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(55, 260, 'Zambie', '2016-10-24 18:13:02', '2016-10-24 18:33:50'),
(56, 263, 'Zimbabwe', '2016-10-24 18:13:02', '2016-10-24 18:33:50');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `banniere` varchar(255) NOT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `actualite_id` int(10) UNSIGNED DEFAULT NULL,
  `evenement_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `position`, `banniere`, `lien`, `actualite_id`, `evenement_id`, `created_at`, `updated_at`) VALUES
(1, 'En-tête', '17163927821.jpeg', '', NULL, 1, '2024-05-22 14:46:22', '2024-05-22 14:46:22');

-- --------------------------------------------------------

--
-- Structure de la table `singles`
--

CREATE TABLE `singles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `audio` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'En Attente',
  `masque` varchar(255) NOT NULL DEFAULT '0',
  `genre_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `album_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre_ecoutes` int(11) DEFAULT 0,
  `is_recommended` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `singles`
--

INSERT INTO `singles` (`id`, `titre`, `cover`, `audio`, `statut`, `masque`, `genre_id`, `user_id`, `album_id`, `created_at`, `updated_at`, `nombre_ecoutes`, `is_recommended`) VALUES
(1, 'Okpe', '16947264661.jpg', 'Okpe-1694726466.mp3', 'En Ligne', '0', 5, 5, NULL, '2023-09-14 20:21:06', '2023-09-14 20:33:25', 0, 1),
(2, 'Au pied de ta croix', '16947366021.jpg', 'Au pied de ta croix-1694738805.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-14 23:46:45', '2023-09-14 23:47:14', 0, 1),
(3, 'Digne es tu seigneur', '16947366021.jpg', 'Digne es tu seigneur-1694771353.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-15 08:49:13', '2023-09-15 08:58:42', 0, 1),
(4, 'Ce n\'est pas par la force', '16947366021.jpg', 'Ce n\'est pas par la force-1694771761.mp3', 'En Ligne', '0', 2, 2, 1, '2023-09-15 08:56:01', '2023-09-15 08:58:46', 0, 1),
(5, 'Avant que le monde soit', '16947366021.jpg', 'Avant que le monde soit-1694771861.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-15 08:57:41', '2023-09-15 08:58:50', 0, 1),
(8, 'Oh Yes', '16947817591.jpg', 'Oh Yes-1694781759.mp3', 'En Ligne', '0', 5, 6, NULL, '2023-09-15 12:42:39', '2023-09-15 12:47:34', 0, 1),
(9, 'Kpa Mahou', '16947852021.jpg', 'Kpa Mahou-1694785202.mp3', 'En Ligne', '0', 5, 13, NULL, '2023-09-15 13:40:02', '2023-09-15 13:40:39', 0, 1),
(10, 'Au soir de sa vie', '16955622281.jpg', 'Au soir de sa vie-1695562228.mp3', 'En Ligne', '0', 5, 5, NULL, '2023-09-24 13:30:28', '2023-09-24 13:39:18', 0, 0),
(11, 'Gbedotô ft Sessime', '16955627311.jpg', 'Gbedotô ft Sessime-1695562731.mp3', 'En Ligne', '0', 5, 5, NULL, '2023-09-24 13:38:51', '2023-09-24 13:39:40', 0, 1),
(12, 'Adjalonnon (Adoration)', '16955632281.jpg', 'Adjalonnon ft Chroral El-morijah (Adoration)-1695563228.mp3', 'En Ligne', '0', 5, 5, NULL, '2023-09-24 13:47:08', '2023-09-24 13:47:22', 0, 1),
(13, 'Vobodou', '16955655951.jpg', 'Vobodou-1695565595.mp3', 'En Ligne', '0', 5, 7, NULL, '2023-09-24 14:26:35', '2023-09-24 14:27:01', 0, 1),
(14, 'Biguine pou jézi', '16947366021.jpg', 'Biguine pou jézi-1695572725.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 16:25:25', '2023-09-24 16:44:12', 0, 1),
(15, 'Il est temps de changer', '16947366021.jpg', 'Il est temps de changer-1695573783.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 16:43:03', '2023-09-24 16:44:22', 0, 1),
(16, 'Lamentation d\'Anna', '16947366021.jpg', 'Lamentation d\'Anna-1695574085.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 16:48:05', '2023-09-24 16:50:07', 0, 1),
(17, 'Tu n\'a pas raison', '16947366021.jpg', 'Tu n\'a pas raison-1695574278.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 16:51:18', '2023-09-24 16:51:34', 0, 1),
(18, 'Quand j\'élève ma voix', '16947366021.jpg', 'Quand j\'élève ma voix-1695574578.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 16:56:18', '2023-09-24 17:01:38', 0, 1),
(19, 'Seigneur fais moi voir ta gloire', '16947366021.jpg', 'Seigneur fais moi voir ta gloire-1695574793.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 16:59:53', '2023-09-24 17:01:42', 0, 1),
(20, 'Seul', '16947366021.jpg', 'Seul-1695575192.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 17:06:32', '2023-09-24 17:10:18', 0, 1),
(21, 'Medley igwé', '16947366021.jpg', 'Medley igwé-1695575289.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 17:08:09', '2023-09-24 17:10:23', 0, 1),
(22, 'Tu n\'a pas raison (Version compas - Bonus Track)', '16947366021.jpg', 'Tu n\'a pas raison (Version compas - Bonus Track)-1695575394.mp3', 'En Ligne', '0', 5, 2, 1, '2023-09-24 17:09:54', '2023-09-24 17:10:29', 0, 1),
(28, 'AU PIED DE TA CROIX D\'ANNA TEKO', '16959794361.png', 'AU PIED DE TA CROIX D\'ANNA TEKO-1695979436.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:23:57', '2023-09-29 10:36:02', 0, 1),
(29, 'Avant que le monde', '16959796881.png', 'Avant que le monde-1695979688.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:28:08', '2023-09-29 10:35:48', 0, 1),
(30, 'UN SI GRAND AMOUR', '16959798681.png', 'UN SI GRAND AMOUR-1695979868.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:31:08', '2023-09-29 10:35:30', 0, 1),
(31, 'Fais moi voir ta gloire', '16959808581.png', 'Fais moi voir ta gloire-1695980858.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:47:38', '2023-09-29 10:35:10', 0, 1),
(32, 'Unis pour la vie', '16959809671.png', 'Unis pour la vie-1695980967.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:49:27', '2023-09-29 10:34:48', 0, 1),
(33, 'Roi Mystérieux', '16959810441.png', 'Roi Mystérieux-1695981044.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:50:44', '2023-09-29 10:34:24', 0, 1),
(34, 'IL EST MERVEILLEUX', '16959813121.png', 'IL EST MERVEILLEUX-1695981312.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 09:55:13', '2023-09-29 10:34:02', 0, 1),
(36, 'Medley bon bon bon', '16959819011.png', 'Medley bon bon bon-1695981901.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 10:05:01', '2023-09-29 10:28:10', 0, 1),
(37, 'OTO CHE', '16959819591.png', 'OTO CHE-1695981959.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 10:05:59', '2023-09-29 10:27:50', 0, 1),
(38, 'MON ÂME DIT OUI', '16959820811.png', 'MON ÂME DIT OUI-1695982081.mp3', 'En Ligne', '0', 5, 2, NULL, '2023-09-29 10:08:01', '2023-09-29 10:26:22', 0, 1),
(39, 'LÈVÔDJÔ : Repentance', '16959823191.png', 'LÈVÔDJÔ : Repentance-1695982319.mp3', 'En Ligne', '0', 5, 19, NULL, '2023-09-29 10:11:59', '2023-09-29 10:26:08', 0, 1),
(40, 'OGANN', '16959826641.png', 'OGANN-1695982664.mp3', 'En Ligne', '0', 5, 16, NULL, '2023-09-29 10:17:44', '2023-09-29 10:25:55', 0, 1),
(41, 'Les vrais hommes', '16959828341.png', 'Les vrais hommes-1695982834.mp3', 'En Ligne', '0', 5, 16, NULL, '2023-09-29 10:20:34', '2023-09-29 10:25:15', 0, 1),
(42, 'VINKPINYOYO', '16959829951.png', 'VINKPINYOYO-1695982995.mp3', 'En Ligne', '0', 5, 16, NULL, '2023-09-29 10:23:15', '2023-09-29 10:24:56', 0, 1),
(43, 'Agbankpinhoun', '16959832891.png', 'Agbankpinhoun-1695983289.mp3', 'En Ligne', '0', 5, 18, NULL, '2023-09-29 10:28:09', '2023-09-29 10:28:39', 0, 1),
(44, 'RAPHAEL SHEYI - DAGBÉWATÔ', '16959839381.png', 'RAPHAEL SHEYI - DAGBÉWATÔ-1695983938.mp3', 'En Ligne', '0', 5, 5, NULL, '2023-09-29 10:38:58', '2023-09-29 10:39:24', 0, 0),
(45, 'AGBARA', '16959845801.png', 'AGBARA-1695984580.mp3', 'En Ligne', '0', 5, 6, NULL, '2023-09-29 10:49:40', '2023-09-29 10:51:58', 0, 1),
(46, 'OHYES', '16959849101.png', 'OHYES-1695984910.mp3', 'En Ligne', '0', 5, 6, NULL, '2023-09-29 10:55:10', '2023-09-29 11:19:51', 0, 1),
(47, 'Libre', '16959849821.png', 'Libre-1695984982.mp3', 'En Ligne', '0', 5, 6, NULL, '2023-09-29 10:56:22', '2023-09-29 11:19:43', 0, 1),
(48, 'Vobodouu', '16959853791.png', 'Vobodouu-1695985379.mp3', 'En Ligne', '0', 5, 7, NULL, '2023-09-29 11:02:59', '2023-09-29 11:19:35', 0, 1),
(49, 'Jowo Baba', '16959856331.png', 'Jowo Baba-1695985633.mp3', 'En Ligne', '0', 5, 7, NULL, '2023-09-29 11:07:14', '2023-09-29 11:19:27', 0, 1),
(50, 'Je peux le dire', '16959859461.png', 'Je peux le dire-1695985946.mp3', 'En Ligne', '0', 5, 16, NULL, '2023-09-29 11:12:26', '2023-09-29 11:19:19', 0, 1),
(51, 'Levodjo', '16959861071.png', 'Levodjo-1695986107.mp3', 'En Ligne', '0', 5, 16, NULL, '2023-09-29 11:15:07', '2023-09-29 11:19:12', 0, 1),
(52, 'Lèblanou Towé Basinaminto', '16959870721.png', 'Lèblanou Towé Basinaminto-1695987072.mp3', 'En Ligne', '0', 5, 9, NULL, '2023-09-29 11:31:12', '2023-09-29 11:47:07', 0, 1),
(53, 'Papa Oschoffa', '16959874381.png', 'Papa Oschoffa-1695987438.mp3', 'En Ligne', '0', 5, 9, NULL, '2023-09-29 11:37:18', '2023-09-29 11:47:15', 0, 1),
(54, 'Yisénon', '16959877781.png', 'Yisénon-1695987778.mp3', 'En Ligne', '0', 5, 9, NULL, '2023-09-29 11:42:58', '2023-09-29 11:47:26', 0, 1),
(55, 'Esin', '16959886921.png', 'Esin-1695988692.mp3', 'En Ligne', '0', 5, 10, NULL, '2023-09-29 11:58:12', '2023-09-29 13:25:09', 0, 1),
(56, 'Quelqu’un dans ta vie', '16959901001.png', 'Quelqu’un dans ta vie-1695990100.mp3', 'En Ligne', '0', 5, 13, NULL, '2023-09-29 12:21:41', '2023-09-29 13:24:54', 0, 1),
(57, 'Ne lâche pas', '16959913731.png', 'Ne lâche pas-1695991373.mp3', 'En Ligne', '0', 5, 24, NULL, '2023-09-29 12:42:54', '2023-09-29 13:24:46', 0, 1),
(58, 'Alôdé', '16959917071.png', 'Alôdé-1695991707.mp3', 'En Ligne', '0', 5, 26, NULL, '2023-09-29 12:48:27', '2023-09-29 13:24:37', 0, 1),
(59, 'Strong and powerfull', '16959918911.png', 'Strong and powerfull-1695991891.mp3', 'En Ligne', '0', 5, 26, NULL, '2023-09-29 12:51:31', '2023-09-29 13:24:28', 0, 1),
(60, 'Dansaki Re', '16959956841.png', 'Dansaki Re-1695995684.mp3', 'En Ligne', '0', 5, 21, NULL, '2023-09-29 13:54:44', '2023-09-29 15:46:50', 0, 1),
(61, 'Jesu Olubaso Okan Mi', '16959960201.png', 'Jesu Olubaso Okan Mi-1695996020.mp3', 'En Ligne', '0', 5, 21, NULL, '2023-09-29 14:00:21', '2023-09-29 15:47:00', 0, 1),
(62, 'Esin Oluwa', '16959962691.png', 'Esin Oluwa-1695996269.mp3', 'En Ligne', '0', 5, 21, NULL, '2023-09-29 14:04:30', '2023-09-29 15:47:10', 0, 1),
(63, 'Emi Mimo Adaba Orun', '16959964931.png', 'Emi Mimo Adaba Orun-1695996493.mp3', 'En Ligne', '0', 5, 21, NULL, '2023-09-29 14:08:13', '2023-09-29 15:47:39', 0, 1),
(64, 'Pese Fun Wa', '16959966771.png', 'Pese Fun Wa-1695996677.mp3', 'En Ligne', '0', 5, 21, NULL, '2023-09-29 14:11:18', '2023-09-29 15:46:26', 0, 1),
(65, 'Otiwo', '16959971091.png', 'Otiwo-1695997109.mp3', 'En Ligne', '0', 5, 20, NULL, '2023-09-29 14:18:29', '2023-09-29 15:46:38', 0, 1),
(66, 'Tan Imole Re', '16959972591.png', 'Tan Imole Re-1695997259.mp3', 'En Ligne', '0', 5, 20, NULL, '2023-09-29 14:21:00', '2023-09-29 15:47:31', 0, 1),
(67, 'Awinyan Akpo Ho De We', '16959978041.png', 'Awinyan Akpo Ho De We-1695997804.mp3', 'En Ligne', '0', 5, 30, NULL, '2023-09-29 14:30:04', '2023-09-29 15:47:20', 0, 1),
(68, 'Dèdagbé', '16959978961.png', 'Dèdagbé-1695997896.mp3', 'En Ligne', '0', 5, 30, NULL, '2023-09-29 14:31:36', '2023-09-29 15:46:07', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `singlesplaylists`
--

CREATE TABLE `singlesplaylists` (
  `id` int(10) UNSIGNED NOT NULL,
  `single_id` int(10) UNSIGNED NOT NULL,
  `playlist_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ticketevenements`
--

CREATE TABLE `ticketevenements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 1,
  `evenement_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ticketevenements`
--

INSERT INTO `ticketevenements` (`id`, `libelle`, `prix`, `nombre`, `disponible`, `evenement_id`, `created_at`, `updated_at`) VALUES
(1, 'Standard', '5000', '100', 1, 7, '2024-07-22 14:21:37', '2024-07-22 14:21:37'),
(2, 'VIP', '10000', '100', 1, 7, '2024-07-22 14:21:48', '2024-07-22 14:21:48'),
(3, 'Standard', '5000', '100', 1, 8, '2024-07-23 17:04:04', '2024-07-23 17:04:04'),
(4, 'VIP', '10000', '100', 1, 8, '2024-07-23 17:04:14', '2024-07-23 17:04:14'),
(5, 'VVIP', '30000', '100', 1, 8, '2024-07-23 17:04:38', '2024-07-23 17:04:38'),
(7, 'Standard', '15000', '100', 1, 9, '2024-09-04 11:04:21', '2024-09-04 11:04:21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `heavenid` int(11) NOT NULL,
  `sessionid` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `nomartiste` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `valide` varchar(255) NOT NULL DEFAULT 'oui',
  `restreint` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `communaute_id` int(10) UNSIGNED DEFAULT NULL,
  `paroisse_id` int(10) UNSIGNED DEFAULT NULL,
  `pays_id` int(10) UNSIGNED NOT NULL DEFAULT 4,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `heavenid`, `sessionid`, `nom`, `email`, `telephone`, `role`, `nomartiste`, `description`, `valide`, `restreint`, `avatar`, `password`, `communaute_id`, `paroisse_id`, `pays_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1168, NULL, 'Anna TEKO', 'annateko@gmail.com', '000000', 'Artiste', 'Anna TEKO', 'Anna Tèko, née le 15 septembre 1982 à Lokossa au Bénin, est une auteure-compositrice-interprète béninoise d\'afro-gospel. \r\nElle chante depuis l\'âge de 4 ans aussi bien sur scène que sur diverses productions musicales du Bénin dans les années 1986.\r\n\r\nAnna Teko,  compte à  son palmarès trois albums. Ta douce voix sorti en août 2010,  » Mon miracle » sorti en Septembre 2012, et « Totale adoration  » en septembre 2014. A la différence des deux premiers, celui-ci est voué totalement à l’adoration et produit au Bénin.\r\n\r\nDepuis 2000, Anna Teko a joué essentiellement dans des comédies musicales. Elle a même été la vedette d’un documentaire intitulé « Anna l’enchantée » réalisé par Monique PHOBA et sélectionné en compétition au FESPACO 200.\r\n\r\nA son actif, on remarquera aussi de nombreux singles dont un featuring avec le chanteur Kalamoulaye,  « Le chemin du Bénin ».', 'oui', 0, '16942133281.jpg', '123456', 2, 1, 4, 'fNHPzS4mTyCglOA8YpoKJjX6CYDk3ZIc86UAEJzNDwqM3SESEOmJHEpSseul', '2023-06-13 16:38:47', '2023-09-20 15:53:53'),
(5, 1171, NULL, 'Raphaël SHEYI', 'raphaelsheyi@gmail.com', '0000001', 'Artiste', 'Raphaël SHEYI', 'Musicien de scènes et événements les plus grands au Bénin et ailleurs. Il est né un 26 octobre au Nigéria.', 'oui', 0, '16942145951.jpg', '$2y$10$VopaUne8KgOPCoGqa.cug.6NcC5KbPzJxE3dB6RLSgAUfzYz.KQ7W', 1, 1, 4, 'sxgVKK5DH5rNF1ZuXfhjZ09rOfOOSLDG6Z9Yoy9DOpc4OrRFetDWQHP5ovLS', '2023-09-08 23:02:33', '2023-09-14 19:58:52'),
(6, 1172, NULL, 'Samuel KOUKPAKI', 'samkoukpaki@gmail.com', '0000002', 'Artiste', 'Sam KOUKPAKI', 'Auteur compositeur arrangeur Directeur artistique, pianiste flûtiste (entre autre), chanteur émérite et ses aptitudes de coach vocal lui ont valu le fait que plusieurs grandes voix de la musique béninoise connues et peu connues passent entre ses mains.', 'oui', 0, '16942154521.jpg', '$2y$10$F3SRBJF3oXNJqJyNIzVS2.DG9FnRnulz/2BIGBm3OFjegFhJWfd3C', 1, 1, 4, 't997rNQgzu8Ep96a3maAYtMPYlZgqNTmfO0qiqM29GXEQyFRsZhpZCRBLxmA', '2023-09-08 23:23:48', '2023-09-08 23:25:01'),
(7, 1173, NULL, 'Samuel HESSOU', 'sasewedo@gmail.com', '0000003', 'Artiste', 'Sam Sèwèdo', 'Multi-instrumentiste, Sam Sèwèdo, de son vrai nom Samuel Hessou, n\'en n\'est pas moins un grand chanteur avec son style qui mêle musique traditionnelle de son pays, le Bénin, à des notes plus actuelles.\r\nSam Sewedo a formé son groupe musical Whango, qui est une des rencontres des meilleurs musiciens au Bénin.', 'oui', 0, '16942162741.jpg', '$2y$10$Z8pU4KtzKoStt0AW/erKxeqcOh776xTlU6xpfWiIyQ8LVFX0..Wea', 1, 1, 4, 'oupUfnu0fZd9BbEO27aHIdPYliwFRdIlFtURfCsqZ1QcpiXnqgG6KE5hI70U', '2023-09-08 23:37:33', '2023-09-08 23:39:02'),
(8, 1174, NULL, 'Mike ALABI', 'mikealabi@gmail.com', '0000004', 'Artiste', 'Mike Alabi', 'Mike Alabi est un chanteur ivoirien de musique Gospel urbaine.', 'oui', 0, '16942167981.jpg', '$2y$10$0HE6umIHiQ8PNfKnv9fx1.407IEM7ep.NxDQDUOEh.470iK.o4dBG', NULL, 1, 4, 'TsiSmf8DbzE1nPPCb8YnNTpiIzVnLVSgKu3cRCLTS2qaa5nypZFUDV6qMrFm', '2023-09-08 23:46:09', '2023-09-14 13:44:56'),
(9, 1175, NULL, 'Emile TODJINOU', 'emiletodjinou@gmail.com', '0000005', 'Artiste', 'Lècokpon', 'Jeune artiste chanteur et compositeur, Lècokpon a tiré sa maturité musicale en tant\r\nque percussionniste dans la chorale dès son bas âge. Ce qui lui confère plus tard la qualité de percussionniste professionnel puis tromboniste du groupe FANFARE CÉLESTE de AKPAKPA CENTRE.\r\nSon dévouement, sa justesse sur les notes et sa peine à connaître, lui ont permis de faire ses preuves de musicien tromboniste dans plusieurs chorales du Benin, sur plusieurs festivals nationaux, et sur assez de scènes musicales. \r\nDevenu, artiste, Il a également prêté sa suave voix aux chœurs de plusieurs chantres.\r\nInspiré des vécus de la vie, les chansons de LÊCOKPON sont le reflet d’un travail spirituel, musical, intense et passionné aux cotés des sommités comme : Sam Sèwèdo, Christ Félix, Samuel KOUKPAKI, Raphael Sheyi… pour ne citer que ceux-là.', 'oui', 0, '16943550601.jpg', '$2y$10$Esw7SeZT6/qdNFlc1hyrwuSPQt7Fm0s9NVfhfsTlS1b46xKOdz.Re', NULL, 1, 4, 'Cn6Jw3TU2h65Zf2CH8noMqMlrh54R7DD2mXuCxLlBwMrNbgiMVKDIgI6BXNo', '2023-09-10 14:09:59', '2023-09-10 14:15:19'),
(10, 1176, NULL, 'Abel Moïse Mahugnon NAGBO', 'abelnagbo@gmail.com', '0000006', 'Artiste', 'Godmyel', 'Abel Moïse Mahugnon NAGBO appartiens à la grande famille des chantres de l\'église du christianisme céleste. En 2004 j\'ai été lauréat sur le concours Collecte des stars; en 2014 le vice lauréat du concours Acapella ; en 2015 lauréat sur le concours BRS (Bénin Révélation Star); en 2016 lauréat sur Gospel Voice et King Voice de King Mensah; j\'ai aussi réalisé un single qui a pour titre Baba étant Moïse Myel toujours en 2016; en 2017 lauréat sur Pâque en Louange ; En 2019, lauréat sur Festival Africain Gospel.\r\nÀ travers ma musique, je désire ramener les âmes perdu à Christ pour qu\'un jour nous soyons ensemble dans la sainte demeure de notre Seigneur Jésus-Christ et assise à la même table que Lui.', 'oui', 0, '16943667891.jpg', '$2y$10$8gF8lxy9eauGIWawMdES8uWCpHggfY8s8JDPdamFddKKagownyT6u', NULL, 1, 4, 'WdCni9Vn7vhwAh9KiVqcZIg7ak4ofdHE4FoCVi6J43ZChsEwGvpujKVIGt7r', '2023-09-10 17:26:04', '2023-09-10 17:27:18'),
(11, 1177, NULL, 'Fadjogbé Juste Sodansou', 'justesodansou@gmail.com', '0000007', 'Artiste', 'Djidjoho', 'Djidjoho puisque c’est de lui qu’il s’agit est un artiste musicien instrumentiste et chantre. \r\nDjidjoho comme nom d’artiste parce qu’une voix a voulue que ce soit ainsi.', 'oui', 0, '16943680561.jpg', '$2y$10$rYrT7EuY1Xw9XidSMeTQ4ORaLp0LXGT95cgE5PeCwGekooQjRBTGa', NULL, 1, 4, 'WVznAtFCEV8jHR1oL8Rg7ac8vceGq32sOEG3rrCkcH5ddqvh4eKwPFdvByCX', '2023-09-10 17:47:10', '2023-09-10 17:50:09'),
(12, 1178, NULL, 'Tokpe Odjo', 'tokpeodjo@gmail.com', '0000008', 'Artiste', 'Tokpè Odjo', 'Artiste chanteur, percussionniste, Pratiquant du style musical Nigérian appeller Juju Gospel .', 'oui', 0, '16943688921.jpg', '$2y$10$gmqsjdXOTFqsk7qtLVc6b.D0y4Vao6Qb6X/1v0P6H46SIX.b5w73K', NULL, 1, 4, 'yp0HS2cdFO8eas1yFZoNa1jsfBMua0J3zFMFINC4ML3KLmPvkNs2v0X4znyM', '2023-09-10 17:59:30', '2023-09-10 18:01:32'),
(13, 1179, NULL, 'MENSAH Olphiz Abraham', 'mensaholphiz@gmail.com', '0000009', 'Artiste', 'Phiz Mensah', 'Artiste Chanteur - Musicien Benino-Ghanéen.\r\nLa puissance vocale qu\'il développe sur des scènes (concerts, festivals...) lui a permi de gagner certaines collaborations avec de grands musiciens comme Magloire AHOUANDJINOU, Drac Miel, Mermoz, Fradoïc Gnahoui, Sansan pitch, Christ Félix, Femi Elcoutino, Mika Laleye, Jah baba etc...', 'oui', 0, '16943696191.jpg', '$2y$10$E7noSTpe4PGuRB19SavUheMp36HEFxe4lJ09Hp6mt4m9dYCLMVrni', NULL, 1, 4, 'dRgtIXejjTIKIvbruoaHF3WFWxBbeB4Cu4SvB1LA01XeSBYbtg4vQXdncP2V', '2023-09-10 18:08:12', '2023-09-10 18:13:39'),
(14, 1180, NULL, 'ADMIN HeavenlyP', 'admin@heavenly-praise.com', NULL, 'Adm', NULL, NULL, 'oui', 0, NULL, '$2y$10$7Ta9z13zu4tV9tgLIKyaRuD6BqTylRPv.qbzldwK1tYo58kcu/f7.', NULL, NULL, 4, 'Jmx4CHBODL3gNDuF9hHJI7Nnskpkal4ACZ6LdJtSlJHZlRKcX0730txFaCfd', '2023-09-14 13:12:20', '2023-09-14 13:12:20'),
(16, 1181, NULL, 'GOULOLE Codjo Isaac', 'gouloleisaac@gmail.com', '50000001', 'Artiste', 'Aimé Isaac', 'Né au Bénin, AIMÉ-ISAAC a réussi à fusionner les influences musicales locales avec une perspective internationale, créant ainsi un son qui parle à toutes les âmes. Sa musique transcende les frontières linguistiques, touchant les francophones du monde entier, et son message d\'amour et d\'unité résonne profondément dans le cœur de l\'Afrique et au-delà.\r\nAIMÉ-ISAAC (Sé Wéwé), surnommé \"Le rocher blanc\" a façonné son identité musicale avec une passion et une dévotion rares. Ses mélodies transcendantes et ses paroles profondément spirituelles ont touché des milliers de cœurs, apportant la paix, l\'espoir et l\'amour à ceux qui l\'écoutent. Sa voix puissante est une invitation à la réflexion, à la méditation et à la connexion spirituelle.', 'oui', 0, '16953735051.png', '$2y$10$5rgpI4klpvtCKNShJefE4.QKMmdpL5X3LvF3lBkLqm63l1Fa8f4Jm', 1, 5, 4, 'JERpunVCkPYJQBsvuZawvjE7A1egAT0Pr2g8G3gehk3rrysxpx32YkSTrGFs', '2023-09-22 08:36:09', '2023-09-22 09:05:14'),
(17, 1182, NULL, 'Eljus', 'eljuseljus4@gmail.com', NULL, 'Artiste', 'Eljus', 'Tout pour Jéésus', 'oui', 0, NULL, '$2y$10$mH1eU90VJlpTyN8VoRUQYOPD48lquJDL0I4gXqF2HP4oD08P1B.GK', 1, 4, 4, 'EUXxYWyRM37t4fNiZTiyMwRG71llfMboTWPXWecI6dzPY1QbHdzCGkhluP1r', '2023-09-22 10:53:41', '2023-09-22 10:58:03'),
(18, 1183, NULL, 'BRASS BAND Ayessi', 'ayessibrassbandbenin@gmail.com', '96944482', 'Artiste', 'Ayessi BRASS BAND', 'Maîtrise parfaite de la percussion, des cuivres et des instruments à vent en général. Entre tradition et modernité, Ayessi Brass Band puise dans la richesse culturelle du Bénin pour offrir une galette musicale bien digeste pour l’ouïe des mélomanes. Du lead vocal, Paul Hounkonnou, au chœur, en passant par les cris, l’orchestration et l’harmonie étaient parfaites. Et Gangbé Brass Band doit en être fier. D’ailleurs, leur coaching n’est pas vain sur la chanson puisque les jeunes de Ayessi ont reçu le coup de main des maîtres. C’est justement pour cela que le single “Agban kpin houn” leur rend un hommage bien mérité.\r\nComposé uniquement de jeunes (09 membres), Ayessi Brass Band se veut positif. Leur devise “semer la joie dans les cœurs”', 'oui', 0, '16953952251.png', '$2y$10$MwIVhJRXMedFRgLPM38HVum4.XShRsS8G/eNejSTPR6TQ1TbSXhRO', 1, 5, 4, '826hRFfVK5jlJTnQrpXHQPihp8koNaE6e1Fves3Wg2biRPOgmGOtMVKbgqmA', '2023-09-22 14:42:48', '2023-09-22 15:07:47'),
(19, 1184, NULL, 'Vidécon Faustin ATCHO', 'maitreavifat@gmail.com', '+225 88 37 34 07', 'Artiste', 'Maître AVIFAT', 'Artiste compositeur et chantre', 'oui', 0, '16957250771.png', '$2y$10$xkQhh2kxoI2yBLh0uhA7VeEFYyZa64iMl/SbKZdf0eiGK1YcO934O', 1, 5, 13, '1UIPqdwYHenUbXRbQ2QuxyCehzN9SPRsfXuXTj5tvHveMgUBtH5FWEbX5MPb', '2023-09-26 10:27:46', '2023-09-26 10:44:37'),
(20, 1185, NULL, 'Oluseyi SOLAGBADE', 'oluseyisolagbade@gmail.com', '50000002', 'Artiste', 'Seyi Solagbade', 'Artiste compositeur, chanteur', 'oui', 0, '16957306891.png', '$2y$10$BlUxFSPf6NP/l0oV6w8nGurW1fNOgCX6DPGA7a9xFlhaOEOxZMP06', 1, 5, 41, 'aF4FRO2quUyypojNKERv5pC5aiaFh8MQ5fA18MyUsucEmxHELyfzD2q8axlT', '2023-09-26 12:17:19', '2023-09-26 12:24:31'),
(21, 1186, NULL, 'Tejumade ALABASTER', 'tejumadealabaster@gmail.com', '50000003', 'Artiste', 'Tejumade Alabaster', 'Artiste chanteuse, compositeur', 'oui', 0, '16957319321.png', '$2y$10$Rh4R1clifCE5KcNGSanHRecKdOBrMAa3Wdh/jd56s/l5mVP2ZeeH2', 1, 5, 41, 'kJkK2tPm55onJWgRlKTW7wmOA3hOnYt6JHMDfJJcjM07xzPTJBZtiJAYhhdO', '2023-09-26 12:37:56', '2023-09-26 12:39:45'),
(22, 1187, NULL, 'Emmanuel APOSTLE NEO', 'apostleneo@gmail.com', '50000004', 'Artiste', 'Apostle Neo', 'Artiste chanteur et compositeur. Chantre', 'oui', 0, '16957422701.png', '$2y$10$Yts.wKDrBefZw.3nTdeUzOfV/HaB7hmJlPZOgtpLWoYT45Apdoj2u', 1, 5, 41, 'WqbOSGHaK7O1ICtlnyhbwFYOiaHam391gHAEKY6omdtIpFCjmGfNgIW8O6VZ', '2023-09-26 15:17:33', '2023-09-26 15:32:28'),
(23, 1188, NULL, 'Abass', 'abass@gmail.com', '50000005', 'Artiste', 'Abass', 'Artiste chanteur et compositeur', 'oui', 0, NULL, '$2y$10$ZrlZjCOQN5AWiP3GCh8El.o6ohWGaxikcP7kwT4EeTQ113kaNl1Pu', 1, 5, 4, 'TQRle3V0CQxvPTotMvTudavWA0k4kEznNKt62UfbbTNRjmm7yI3JiEnoRAu1', '2023-09-26 16:01:12', '2023-09-26 16:02:33'),
(24, 1189, NULL, 'Djidjoho PG Choir', 'djidjoho@gmail.com', '50000006', 'Artiste', 'Djidjoho', 'Artiste chanteur, compositeur', 'oui', 0, '16957469001.png', '$2y$10$AYsZ.a3gKSIpwZsXXqJV9OHRCKnB5IDEvLc.kkqKuU1wkC35SZ/lG', 1, 5, 4, 'mawy2KQWfNnutbb3fm4MN5a42I5Z6pwHxOf4zYbwjwLuA5GT3kAn8wGpsRw9', '2023-09-26 16:43:30', '2023-09-29 11:58:08'),
(25, 1190, NULL, 'King Esther', 'kingesther@gmail.com', NULL, 'Artiste', NULL, NULL, 'oui', 0, NULL, '$2y$10$wokKQnPkfmg1tTEp40IyJehzl.V5On/gRigUcQtleUfeZ2.hOIc/m', NULL, NULL, 53, 'rRLGry5VL6plbNl5bPggvLmIU7LEGBQUJYd16J5adIJtnTJKqs2Ym0WNyVUs', '2023-09-26 16:53:39', '2023-09-26 16:53:39'),
(26, 1191, NULL, 'Sheyi Campos', 'sheyicampos@gmail.com', '50000007', 'Artiste', 'Sheyi Campos', 'Artiste chanteuse', 'oui', 0, '16959806551.png', '$2y$10$CnzJhknWoktWq7YdtaLkLudCoVouSZMhWEE9SrmY4db3LE2YAECui', 1, 5, 22, '4BRrL4K7xBL1JWBjMG7WlMO7XyORpxXj4Zo0zVasW0MuXyTiVih2V1jGeaIE', '2023-09-29 09:12:59', '2023-09-29 09:44:53'),
(27, 1192, NULL, 'TODJINOU Jonas', 'todjinoujonas@gmail.com', '+225 0171620382', 'Artiste', 'Douaholou Jonas', 'Artiste chanteur et compositeur', 'oui', 0, '16959795661.png', '$2y$10$E2KYGSqTKD4Uoft.FoP3uuOtl4lWsIOHTwJ6tpa1aLvyd7y8ROpn6', 1, 5, 13, 'Pnd3yI0g8qKSgXdE5NSA0NsJQrk3ARieMzjiDUNJrrDNMWnHpVlj7KhSQ03n', '2023-09-29 09:19:09', '2023-09-29 09:26:18'),
(28, 1193, NULL, 'Shegun', 'shegun@gmail.com', '50000008', 'Artiste', 'Shegun', 'Artiste chanteur compositeur', 'oui', 0, '16959964171.png', '$2y$10$90Cc2KPLahlIYolyv3eXSe4YkYfs5vv5CCb43S75..3uQlEu1gGsq', 1, 10, 4, 'yOu5Otm12NwFL25scDxt6RiOTL03qTYdrN1I7n1NuYsWjn0JoheReaQ8ro1B', '2023-09-29 14:02:51', '2023-09-29 14:07:38'),
(29, 1194, NULL, 'Daniel Oluwaseun', 'danieloluwaseun@gmail.com', '50000009', 'Artiste', 'Daniel Oluwaseun', 'Artiste chanteur, compositeur', 'oui', 0, '16959968251.png', '$2y$10$Z/u8s8PBWbUuWn69hae49uNFRAUhdsB8/leH8abYlroSy7MdR6wZu', 1, 2, 4, 'wVyrHdUQaIV6ndQ6vAEwzCLaJRhXsBtXEfBDCEAHroshpYK4fiO2I1QMsE1q', '2023-09-29 14:11:05', '2023-09-29 14:14:19'),
(30, 1195, NULL, 'Awinyan', 'awinyan@gmail.com', '50000010', 'Artiste', 'Awinyan', 'Artiste chanteur, compositeur', 'oui', 0, '16959973061.png', '$2y$10$dmzO9L3KsqZ8W.SxGiFW5ut1fbJ46X2YQg6wyfdd.deJls9Bc1nZG', 1, 4, 4, 'tLvaATHYfJ45t7S5EDQCZbDWZsL5tyztcDpOQx67gxbMs1U475MeDkmvsV1t', '2023-09-29 14:18:55', '2023-09-29 14:21:52'),
(31, 1196, NULL, 'Serge AMOUZOUN', 'amouzounserge218@gmail.com', NULL, 'Artiste', NULL, NULL, 'oui', 0, NULL, '$2y$10$7vM1NQtnPljsBppkuMocyuTZRiginh0vTmXLUjKwm.L1zKpDpYyDO', NULL, NULL, 4, '01Y9zZRAAE6uDjtQT8H5wS4nK2SEERwcrBMikIYCqLyAVkJhdqmorFrYuqnL', '2023-11-21 07:09:44', '2023-11-21 07:09:44'),
(42, 1197, '1722002987Y7rmTd', 'KOUTOU Joel', 'cedrickjoel2707@gmail.com', '67290389', 'Auditeur', NULL, NULL, 'oui', 0, NULL, '$2y$10$dsNAk5uxevh0SEMRcEUxveZreuB2rRP/rJY3NOS/XlHLMnHoC5bIC', NULL, NULL, 4, NULL, '2024-07-26 14:22:59', '2024-07-26 14:22:59'),
(49, 1198, NULL, 'Emmanuel Jesugo', 'jazongbe25@gmail.com', NULL, 'Artiste', 'AZONGBE', NULL, 'oui', 0, NULL, '$2y$10$KTKc2YfKmSHX24T5Vs7EeeYtLKDqlJBWAMe8/ruWNvLrzYAKaG4pe', NULL, NULL, 4, '2GdizTXzLY3aCXPJV6X9K6eOI0MJgNBkqgmNyuw5Zlbv7yPXrWQf7CipTE25', '2025-02-12 09:48:04', '2025-02-12 09:48:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualitecommentaires`
--
ALTER TABLE `actualitecommentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `communautes`
--
ALTER TABLE `communautes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecoutes`
--
ALTER TABLE `ecoutes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenementcommentaires`
--
ALTER TABLE `evenementcommentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `forumparoisses`
--
ALTER TABLE `forumparoisses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forumpays`
--
ALTER TABLE `forumpays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lives`
--
ALTER TABLE `lives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paroisses`
--
ALTER TABLE `paroisses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `singles`
--
ALTER TABLE `singles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticketevenements`
--
ALTER TABLE `ticketevenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualitecommentaires`
--
ALTER TABLE `actualitecommentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `communautes`
--
ALTER TABLE `communautes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ecoutes`
--
ALTER TABLE `ecoutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `evenementcommentaires`
--
ALTER TABLE `evenementcommentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forumparoisses`
--
ALTER TABLE `forumparoisses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `forumpays`
--
ALTER TABLE `forumpays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `lives`
--
ALTER TABLE `lives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paroisses`
--
ALTER TABLE `paroisses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `singles`
--
ALTER TABLE `singles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `ticketevenements`
--
ALTER TABLE `ticketevenements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

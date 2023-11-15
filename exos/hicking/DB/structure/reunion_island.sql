-- ATTENTION créer d'abord la database et ensuite insérer les données en bas du fichier

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `becode`
CREATE DATABASE reunion_island;
--

-- --------------------------------------------------------

USE reunion_island;

--
-- Structure de la table `hiking`
--

CREATE TABLE `hiking` (
    `id` int(11) NOT NULL,
    `name` varchar(400) NOT NULL,
    `difficulty` char(30) NOT NULL,
    `distance` int(11) NOT NULL,
    `duration` time NOT NULL,
    `height_difference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hiking`
--
ALTER TABLE `hiking`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hiking`
--
ALTER TABLE `hiking`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;





--
-- INSERER DES données
--
INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
VALUES 
(
    'La montée au Piton des Neiges depuis le Bloc à Cilaos',
    'Difficile',
    16,
    '08:30:00',
    1730
),
(
    'La Boucle et la Cascade du Bras Rouge depuis Cilaos',
    'Difficile',
    14,
    '05:30:00',
    900
),
(
    "De la Rivière des Galets à l'Ilet Natte par Deux Bras",
    'Moyen',
    24,
    '08:00:00',
    330
),
(
    "Le sentier du point de vue du Piton Marmite",
    'Facile',
    1,
    '00:30:00',
    70
),
(
    "Une boucle au Volcan par le Sentier de Découverte",
    'Très facile',
    5,
    '02:00:00',
    220
)

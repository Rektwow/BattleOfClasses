-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220626.78b2c1f4eb
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 10:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbd5204_ybm`
--

-- --------------------------------------------------------

--
-- Table structure for table `battle`
--

CREATE TABLE `battle` (
  `id_battle` int(11) NOT NULL,
  `name_class` varchar(255) NOT NULL,
  `img_class` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ability1` varchar(255) NOT NULL,
  `ability2` varchar(255) NOT NULL,
  `ability3` varchar(255) NOT NULL,
  `health` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `offense` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `battle`
--

INSERT INTO `battle` (`id_battle`, `name_class`, `img_class`, `description`, `ability1`, `ability2`, `ability3`, `health`, `armor`, `offense`, `defense`, `speed`, `color`) VALUES
(1, 'DeathKnight', 'deathknight.jpg', 'Death Knights engage their foes up-close, supplementing swings of their weapons with dark magic that renders enemies vulnerable or damages them with unholy power. They drag foes into one-on-one conflicts, compelling them to focus their attacks away from weaker companions. To prevent their enemies from fleeing their grasp, death knights must remain mindful of the power they call forth from runes, and pace their attacks appropriately.', 'Blood Shield', 'Frozen Heart', 'Dreadblade', 1890, 945, 540, 344, 140, '#C41E3A'),
(2, 'DemonHunter', 'demonhunter.jpg', 'Forgoing heavy armor, Demon Hunters capitalize on speed, closing the distance quickly to strike enemies with one-handed weapons. However, Illidari must also use their agility defensively to ensure that battles end favorably.', 'Demonic Presence', 'Fel Blood', 'Legion', 1890, 473, 540, 344, 260, '#A330C9'),
(3, 'Druid', 'druid.jpg', 'Druids harness the vast powers of nature to preserve balance and protect life. With experience, druids can unleash nature’s raw energy against their enemies, raining celestial fury on them from a great distance, binding them with enchanted vines, or ensnaring them in unrelenting cyclones.', 'Total Razor Eclipse Claws', 'Nature\'s Guardian', 'Harmony', 1890, 473, 540, 420, 220, '#FF7C0A'),
(4, 'Hunter', 'hunter.jpg', 'From an early age the call of the wild draws some adventurers from the comfort of their homes into the unforgiving primal world outside. Those who endure become hunters. Masters of their environment, they are able to slip like ghosts through the trees and lay traps in the paths of their enemies.', 'Master of Beasts', 'Sniper Training', 'Spirit Bond', 1890, 630, 756, 189, 230, '#AAD372'),
(5, 'Mage', 'mage.jpg', 'Students gifted with a keen intellect and unwavering discipline may walk the path of the mage. The arcane magic available to magi is both great and dangerous, and thus is revealed only to the most devoted practitioners. To avoid interference with their spellcasting, magi wear only cloth armor, but arcane shields and enchantments give them additional protection. To keep enemies at bay, magi can summon bursts of fire to incinerate distant targets and cause entire areas to erupt, setting groups of foes ablaze.', 'Savant', 'Ignite', 'Icicles', 1890, 378, 756, 189, 190, '#3FC7EB'),
(6, 'Monk', 'monk.jpg', 'When the pandaren were subjugated by the mogu centuries ago, it was the monks that brought hope to a seemingly dim future. Restricted from using weapons by their slave masters, these pandaren instead focused on harnessing their chi and learning weaponless combat. When the opportunity for revolution struck, they were well-trained to throw off the yoke of oppression.', 'Elusive Brawler', 'Gust of Mists', 'Combo Strikes', 1890, 473, 540, 420, 250, '#00FF98'),
(7, 'Paladin', 'paladin.jpg', 'This is the call of the paladin: to protect the weak, to bring justice to the unjust, and to vanquish evil from the darkest corners of the world. These holy warriors are equipped with plate armor so they can confront the toughest of foes, and the blessing of the Light allows them to heal wounds and, in some cases, even restore life to the dead.', 'Lightbringer', 'Divine Bulwark', 'Hand of Light', 1890, 945, 540, 420, 180, '#F48CBA'),
(8, 'Priest', 'priest.jpg', 'Priests are devoted to the spiritual, and express their unwavering faith by serving the people. For millennia they have left behind the confines of their temples and the comfort of their shrines so they can support their allies in war-torn lands. In the midst of terrible conflict, no hero questions the value of the priestly orders.', 'Grace', 'Echo of Light', 'Shadow Weaving', 1890, 378, 540, 344, 170, '#FFFFFF'),
(9, 'Rogue', 'rogue.jpg', 'For rogues, the only code is the contract, and their honor is purchased in gold. Free from the constraints of a conscience, these mercenaries rely on brutal and efficient tactics. Lethal assassins and masters of stealth, they will approach their marks from behind, piercing a vital organ and vanishing into the shadows before the victim hits the ground.', 'Potent Assassin', 'Main Gauche', 'Executioner', 1890, 473, 756, 189, 240, '#FFF468'),
(10, 'Shaman', 'shaman.jpg', 'Shaman are spiritual guides and practitioners, not of the divine, but of the very elements. Unlike some other mystics, shaman commune with forces that are not strictly benevolent. The elements are chaotic, and left to their own devices, they rage against one another in unending primal fury. It is the call of the shaman to bring balance to this chaos. Acting as moderators among earth, fire, water, and air, shaman summon totems that focus the elements to support the shaman’s allies or punish those who threaten them.', 'Elemental Overload', 'Enhanced Elements', 'Deep Healing', 1890, 630, 540, 344, 210, '#0070DD'),
(11, 'Warlock', 'warlock.jpg', 'In the face of demonic power, most heroes see death. Warlocks see only opportunity. Dominance is their aim, and they have found a path to it in the dark arts. These voracious spellcasters summon demonic minions to fight beside them. At first, they command only the service of imps, but as a warlock’s knowledge grows, seductive succubi, loyal voidwalkers, and horrific felhunters join the dark sorcerer’s ranks to wreak havoc on anyone who stands in their master’s way.', 'Potent Afflictions', 'Master Demonologist', 'Chaotic Energies', 1890, 378, 756, 189, 150, '#8788EE'),
(12, 'Warrior', 'warrior.jpg', 'For as long as war has raged, heroes from every race have aimed to master the art of battle. Warriors combine strength, leadership, and a vast knowledge of arms and armor to wreak havoc in glorious combat. Some protect from the front lines with shields, locking down enemies while allies support the warrior from behind with spell and bow. Others forgo the shield and unleash their rage at the closest threat with a variety of deadly weapons.', 'Deep Wounds', 'Unshackled Fury', 'Critical Block', 1890, 945, 540, 344, 160, '#C69B6D'),
(13, 'Evoker', 'evoker.jpg', 'Every dracthyr is an expert soldier. Whatever weyrn they serve, they use their talents to defend dragonkind in obedience to the Earth-Warder. Yet even among such illustrious ranks, there are a select few who transcend the skills of their kin. Who are able to master the specialties of all weyrns and shift between roles at will. These are the evokers. The best of the best, finest of the finest.', 'Giantkiller', 'Life-Binder', 'Dragonflight', 1890, 630, 540, 344, 200, '#33937F');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id_class` int(11) NOT NULL,
  `name_class` varchar(255) NOT NULL,
  `spec_class` varchar(255) NOT NULL,
  `role_class` varchar(255) NOT NULL,
  `img_class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id_class`, `name_class`, `spec_class`, `role_class`, `img_class`) VALUES
(1, 'Death Knight', 'Blood', 'Tank', 'blood.jpg'),
(2, 'Death Knight', 'Frost', 'Dps (Melee)', 'frostdk.jpg'),
(3, 'Death Knight', 'Unholy', 'Dps (Melee)', 'unholy.jpg'),
(4, 'Demon Hunter', 'Havoc', 'Dps (Melee)', 'havoc.jpg'),
(5, 'Demon Hunter', 'Vengeance', 'Tank', 'vengeance.jpg'),
(6, 'Druid', 'Restoration', 'Heal', 'restodruid.jpg'),
(7, 'Druid', 'Guardian', 'Tank', 'guardian.jpg'),
(8, 'Druid', 'Feral', 'Dps (Melee)', 'feral.jpg'),
(9, 'Druid', 'Balance', 'Dps (Ranged)', 'balance.jpg'),
(10, 'Hunter', 'Beast Mastery', 'Dps (Ranged)', 'bm.jpg'),
(11, 'Hunter', 'Marksmanship', 'Dps (Ranged)', 'mm.jpg'),
(12, 'Hunter', 'Survival', 'Dps (Melee)', 'surv.jpg'),
(13, 'Mage', 'Arcane', 'Dps (Ranged)', 'arcane.jpg'),
(14, 'Mage', 'Fire', 'Dps (Ranged)', 'fire.jpg'),
(15, 'Mage', 'Frost', 'Dps (Ranged)', 'frostmage.jpg'),
(16, 'Monk', 'Brewmaster', 'Tank', 'brew.jpg'),
(17, 'Monk', 'Mistweaver', 'Heal', 'mistweaver.jpg'),
(18, 'Monk', 'Windwalker', 'Dps (Melee)', 'ww.jpg'),
(19, 'Paladin', 'Holy', 'Heal', 'holypal.jpg'),
(20, 'Paladin', 'Protection', 'Tank', 'protpal.jpg'),
(21, 'Paladin', 'Retribution', 'Dps (Melee)', 'ret.jpg'),
(22, 'Priest', 'Discipline', 'Heal', 'disc.jpg'),
(23, 'Priest', 'Holy', 'Heal', 'holypriest.jpg'),
(24, 'Priest', 'Shadow', 'Dps (Ranged)', 'shadow.jpg'),
(25, 'Rogue', 'Assassination', 'Dps (Melee)', 'assa.jpg'),
(26, 'Rogue', 'Outlaw', 'Dps (Melee)', 'outlaw.jpg'),
(27, 'Rogue', 'Subtlety', 'Dps (Melee)', 'sub.jpg'),
(28, 'Shaman', 'Elemental', 'Dps (Ranged)', 'elem.jpg'),
(29, 'Shaman', 'Enhancement', 'Dps (Melee)', 'enhan.jpg'),
(30, 'Shaman', 'Restoration', 'Heal', 'restosham.jpg'),
(31, 'Warlock', 'Affliction', 'Dps (Ranged)', 'affli.jpg'),
(32, 'Warlock', 'Demonology', 'Dps (Ranged)', 'demo.jpg'),
(33, 'Warlock', 'Destruction', 'Dps (Ranged)', 'destro.jpg'),
(34, 'Warrior', 'Arms', 'Dps (Melee)', 'arms.jpg'),
(35, 'Warrior', 'Fury', 'Dps (Melee)', 'fury.jpg'),
(36, 'Warrior', 'Protection', 'Tank', 'protwar.jpg'),
(37, 'Evoker', 'Devastation', 'Dps (Ranged)', 'devastation.jpg'),
(38, 'Evoker', 'Preservation', 'Heal', 'preservation.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `player` varchar(255) NOT NULL,
  `enemy` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id_score`, `username`, `player`, `enemy`, `result`) VALUES
(1, 'saeuser', 'war', 'lock', 'defeaut'),
(2, 'saeuser', 'war', 'lock', 'victory'),
(4, 'saeuser', 'test', 'last', 'victory'),
(5, 'ybenmustapha', 'DeathKnight', 'DemonHunter', 'Victory/Defeat'),
(6, 'ybenmustapha', 'DeathKnight', 'DemonHunter', 'Victory/Defeat'),
(7, 'ybenmustapha', 'Monk', 'Paladin', 'Victory/Defeat'),
(9, 'saeuser', 'Warlock', 'Mage', 'Victory/Defeat'),
(10, 'saeuser', 'Warlock', 'Monk', 'Victory/Defeat'),
(11, 'saeuser', 'Rogue', 'Monk', 'Victory/Defeat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `faction` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_hash` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `faction`, `first_name`, `last_name`, `username`, `email`, `email_hash`, `password`, `date`, `status`) VALUES
(1, 'horde', 'sae', 'user', 'saeuser', 'sae@user.com', 'ml63566182085202.10627642', '$2y$10$3vkB/Iv0RSY3Pop75dk.WOaVQTPsIiiueHlSkWSGz/d5I61FTtEHC', '2022-10-24 11:57:23', 'verified'),
(2, 'alliance', 'mail', 'mial', 'mailmial', 'mail@mial.com', 'ml6356643c52c980.56778206', '$2y$10$6ile6GtIpFifZXr1lmDWEuz1gCcxF/PMuoSPrbw6YUaSr.ObGiTRu', '2022-10-24 12:09:02', 'verified'),
(3, 'horde', 'yassine', 'Ben', 'ybm', 'givrefeu@hotmail.fr', 'ml63599f541c6f68.25405351', '$2y$10$EqE6JJkyFz5qUy.8N3X5nO31.7xWDib6COpwwY8i5ToBlbzRHqR/S', '2022-10-26 22:57:56', 'pending'),
(4, 'horde', 'Yessin', 'hph', 'ybenmustapha', 'eded@hotmail.com', 'ml635b0e911f04b7.57448473', '$2y$10$PfbnyvcGkGJsvTvM58yyHu1CJLATxS9RV7bmxXywvSrmy5J36E0fm', '2022-10-28 01:04:49', 'pending'),
(5, 'horde', 'mial', 'Ben', 'WDD321', 'user@user.com', 'ml635c2c489ff927.94970529', '$2y$10$AAyqbuchEqpFW6LOjM9l1ulq75Gf1SslGqCY.WW5RNdCr4b7cJ3b6', '2022-10-28 21:23:57', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battle`
--
ALTER TABLE `battle`
  ADD PRIMARY KEY (`id_battle`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `battle`
--
ALTER TABLE `battle`
  MODIFY `id_battle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




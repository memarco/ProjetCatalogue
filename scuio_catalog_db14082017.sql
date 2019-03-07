-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Août 2017 à 13:52
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `scuio_catalog_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1e76c06e5b82f73b5032c693c8b0ceb8', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 1502718512, 'a:9:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:4:"name";s:12:"Marc Mefoung";s:5:"email";s:5:"admin";s:6:"avatar";s:15:"assassin_avatar";s:7:"tagline";s:42:"They see me mowin...<br/>...my front lawn.";s:7:"isAdmin";s:1:"1";s:6:"teamId";s:1:"1";s:10:"isLoggedIn";b:1;}'),
('713220a327b62ea95353e833ac936dc4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/', 1501022355, 'a:9:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:4:"name";s:12:"Marc Mefoung";s:5:"email";s:5:"admin";s:6:"avatar";s:15:"assassin_avatar";s:7:"tagline";s:42:"They see me mowin...<br/>...my front lawn.";s:7:"isAdmin";s:1:"1";s:6:"teamId";s:1:"1";s:10:"isLoggedIn";b:1;}');

-- --------------------------------------------------------

--
-- Structure de la table `composante`
--

CREATE TABLE `composante` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `mail1` varchar(150) NOT NULL,
  `mail2` varchar(150) NOT NULL,
  `sigle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `composante`
--

INSERT INTO `composante` (`id`, `nom`, `mail1`, `mail2`, `sigle`) VALUES
(1, 'École supérieure d\'informatique appliquée à la gestion', 'baip-esiag@u-pec.fr', '', 'ESIAG'),
(2, 'École supérieure du professorat et de l\'éducation', '', '', 'ESPE'),
(3, 'École Montsouris', '', '', 'ESM'),
(4, 'Faculté d\'Administration et échanges internationaux', 'baip-aei@u-pec.fr', '', 'AEI'),
(5, 'Faculté de Droit', 'baip-droitu-pecfr', '', 'FD'),
(6, 'Faculté des lettres, langues et sciences humaines', 'baip-lsh@u-pec.fr', '', 'LLSH'),
(7, 'Faculté de médecine', 'paces@u-pec.fr', 'baip-medecine@u-pec.fr', ''),
(8, 'Faculté des sciences de l\'éducation, sciences sociales et STAPS', 'baip-sess-staps@u-pec.fr', '', 'SESS/STAPS'),
(9, 'Faculté des sciences et technologie', 'baip-sciences@u-pec.fr', '', 'FST'),
(10, 'Faculté des sciences économiques et de gestion', 'baip-scienceseco@u-pec.fr', '', 'FSEG'),
(11, 'Institut d\'administration des entreprises', 'baip-iae@u-pec.fr', '', 'IAE'),
(12, 'Institut de formation en ergothérapie', 'ife@u-pec.fr', '', 'IFE'),
(13, 'Institut de préparation à l\'administration générale', '', '', 'IPAG'),
(14, 'Institut d\'urbanisme de Paris', 'baip-iup@u-pec.fr', '', 'IUP'),
(15, 'IUT de Créteil / Vitry', 'scol-iutcv@u-pec.fr', 'baip-iutcv@u-pec.fr', 'IUT CV'),
(16, 'IUT de Sénart / Fontainebleau', 'scola77f@u-pec.fr', 'baip-iutsf@u-pec.fr', 'IUT SF'),
(17, 'Institut Supérieur de BioSciences', 'baip-isbs@u-pec.fr', '', 'ISBS');

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `diplome`
--

INSERT INTO `diplome` (`id`, `nom`, `id_niveau`) VALUES
(1, 'MASTER', 6),
(2, 'M1', 6),
(3, 'M2', 7),
(5, 'DI', 0),
(6, '2', 0),
(7, '3', 0),
(8, '4', 0),
(9, 'D1', 0),
(10, 'D2', 0),
(11, 'LICENCE PROFFESSIONNELLE', 5),
(12, 'L1', 3),
(13, 'L2', 4),
(14, 'L3', 5),
(15, 'C', 0),
(16, 'LICENCE', 5),
(17, 'DUT', 0),
(18, 'DL', 0),
(19, 'DAEU A', 0),
(20, 'DEUST', 0),
(21, 'DAEU B', 0);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom`) VALUES
(1, 'Droit, économie, gestion'),
(2, 'Sciences humaines et sociales'),
(3, 'Sciences, technologies, santé'),
(4, 'Arts, lettres, langues'),
(5, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `fa`
--

CREATE TABLE `fa` (
  `id` int(11) NOT NULL,
  `id_rythme` int(11) NOT NULL,
  `nbre_entreprise` int(11) NOT NULL DEFAULT '0',
  `nbre_ecole` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fi`
--

CREATE TABLE `fi` (
  `id` int(11) NOT NULL,
  `nbre_semaine` int(11) NOT NULL,
  `debut_stage` varchar(150) NOT NULL,
  `fin_stage` varchar(150) NOT NULL,
  `id_type_stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fi`
--

INSERT INTO `fi` (`id`, `nbre_semaine`, `debut_stage`, `fin_stage`, `id_type_stage`) VALUES
(4700, 0, '', '', 0),
(4701, 0, '', '', 0),
(4702, 0, '', '', 0),
(4703, 0, '', '', 0),
(4704, 0, '', '', 0),
(4705, 0, '', '', 0),
(4706, 0, '', '', 0),
(4707, 0, '', '', 0),
(4708, 0, '', '', 0),
(4709, 0, '', '', 0),
(4710, 0, '', '', 0),
(4711, 0, '', '', 0),
(4712, 0, '', '', 0),
(4713, 0, '', '', 0),
(4714, 0, '', '', 0),
(4715, 0, '', '', 0),
(4716, 0, '', '', 0),
(4717, 0, '', '', 0),
(4718, 0, '', '', 0),
(4719, 0, '', '', 0),
(4720, 0, '', '', 0),
(4721, 0, '', '', 0),
(4722, 0, '', '', 0),
(4723, 0, '', '', 0),
(4724, 0, '', '', 0),
(4725, 0, '', '', 0),
(4726, 0, '', '', 0),
(4727, 0, '', '', 0),
(4728, 0, '', '', 0),
(4729, 0, '', '', 0),
(4730, 0, '', '', 0),
(4731, 0, '', '', 0),
(4732, 0, '', '', 0),
(4733, 0, '', '', 0),
(4734, 0, '', '', 0),
(4735, 0, '', '', 0),
(4736, 0, '', '', 0),
(4737, 0, '', '', 0),
(4738, 0, '', '', 0),
(4739, 0, '', '', 0),
(4740, 0, '', '', 0),
(4741, 0, '', '', 0),
(4742, 0, '', '', 0),
(4743, 0, '', '', 0),
(4744, 0, '', '', 0),
(4745, 0, '', '', 0),
(4746, 0, '', '', 0),
(4747, 0, '', '', 0),
(4748, 0, '', '', 0),
(4749, 0, '', '', 0),
(4750, 0, '', '', 0),
(4751, 0, '', '', 0),
(4752, 0, '', '', 0),
(4753, 0, '', '', 0),
(4754, 0, '', '', 0),
(4755, 0, '', '', 0),
(4756, 0, '', '', 0),
(4757, 0, '', '', 0),
(4758, 0, '', '', 0),
(4759, 0, '', '', 0),
(4760, 0, '', '', 0),
(4761, 0, '', '', 0),
(4762, 0, '', '', 0),
(4763, 0, '', '', 0),
(4764, 0, '', '', 0),
(4765, 0, '', '', 0),
(4766, 0, '', '', 0),
(4767, 0, '', '', 0),
(4768, 0, '', '', 0),
(4769, 0, '', '', 0),
(4770, 0, '', '', 0),
(4771, 0, '', '', 0),
(4772, 0, '', '', 0),
(4773, 0, '', '', 0),
(4774, 0, '', '', 0),
(4775, 0, '', '', 0),
(4776, 0, '', '', 0),
(4777, 0, '', '', 0),
(4778, 0, '', '', 0),
(4779, 0, '', '', 0),
(4780, 0, '', '', 0),
(4781, 0, '', '', 0),
(4782, 0, '', '', 0),
(4783, 0, '', '', 0),
(4784, 0, '', '', 0),
(4785, 0, '', '', 0),
(4786, 0, '', '', 0),
(4787, 0, '', '', 0),
(4788, 0, '', '', 0),
(4789, 0, '', '', 0),
(4790, 0, '', '', 0),
(4791, 0, '', '', 0),
(4792, 0, '', '', 0),
(4793, 0, '', '', 0),
(4794, 0, '', '', 0),
(4795, 0, '', '', 0),
(4796, 0, '', '', 0),
(4797, 0, '', '', 0),
(4798, 0, '', '', 0),
(4799, 0, '', '', 0),
(4800, 0, '', '', 0),
(4801, 0, '', '', 0),
(4802, 0, '', '', 0),
(4803, 0, '', '', 0),
(4804, 0, '', '', 0),
(4805, 0, '', '', 0),
(4806, 0, '', '', 0),
(4807, 0, '', '', 0),
(4808, 0, '', '', 0),
(4809, 0, '', '', 0),
(4810, 0, '', '', 0),
(4811, 0, '', '', 0),
(4812, 0, '', '', 0),
(4813, 0, '', '', 0),
(4814, 0, '', '', 0),
(4815, 0, '', '', 0),
(4816, 0, '', '', 0),
(4817, 0, '', '', 0),
(4818, 0, '', '', 0),
(4819, 0, '', '', 0),
(4820, 0, '', '', 0),
(4821, 0, '', '', 0),
(4822, 0, '', '', 0),
(4823, 0, '', '', 0),
(4824, 0, '', '', 0),
(4825, 0, '', '', 0),
(4826, 0, '', '', 0),
(4827, 0, '', '', 0),
(4828, 0, '', '', 0),
(4829, 0, '', '', 0),
(4830, 0, '', '', 0),
(4831, 0, '', '', 0),
(4832, 0, '', '', 0),
(4833, 0, '', '', 0),
(4834, 0, '', '', 0),
(4835, 0, '', '', 0),
(4836, 0, '', '', 0),
(4837, 0, '', '', 0),
(4838, 0, '', '', 0),
(4839, 0, '', '', 0),
(4840, 0, '', '', 0),
(4841, 0, '', '', 0),
(4842, 0, '', '', 0),
(4843, 0, '', '', 0),
(4844, 0, '', '', 0),
(4845, 0, '', '', 0),
(4846, 0, '', '', 0),
(4847, 0, '', '', 0),
(4848, 0, '', '', 0),
(4849, 0, '', '', 0),
(4850, 0, '', '', 0),
(4851, 0, '', '', 0),
(4852, 0, '', '', 0),
(4853, 0, '', '', 0),
(4854, 0, '', '', 0),
(4855, 0, '', '', 0),
(4856, 0, '', '', 0),
(4857, 0, '', '', 0),
(4858, 0, '', '', 0),
(4859, 0, '', '', 0),
(4860, 0, '', '', 0),
(4861, 0, '', '', 0),
(4862, 0, '', '', 0),
(4863, 0, '', '', 0),
(4864, 0, '', '', 0),
(4865, 0, '', '', 0),
(4866, 0, '', '', 0),
(4867, 0, '', '', 0),
(4868, 0, '', '', 0),
(4869, 0, '', '', 0),
(4870, 0, '', '', 0),
(4871, 0, '', '', 0),
(4872, 0, '', '', 0),
(4873, 0, '', '', 0),
(4874, 0, '', '', 0),
(4875, 0, '', '', 0),
(4876, 0, '', '', 0),
(4877, 0, '', '', 0),
(4878, 0, '', '', 0),
(4879, 0, '', '', 0),
(4880, 0, '', '', 0),
(4881, 0, '', '', 0),
(4882, 0, '', '', 0),
(4883, 0, '', '', 0),
(4884, 0, '', '', 0),
(4885, 0, '', '', 0),
(4886, 0, '', '', 0),
(4887, 0, '', '', 0),
(4888, 0, '', '', 0),
(4889, 0, '', '', 0),
(4890, 0, '', '', 0),
(4891, 0, '', '', 0),
(4892, 0, '', '', 0),
(4893, 0, '', '', 0),
(4894, 0, '', '', 0),
(4895, 0, '', '', 0),
(4896, 0, '', '', 0),
(4897, 0, '', '', 0),
(4898, 0, '', '', 0),
(4899, 0, '', '', 0),
(4900, 0, '', '', 0),
(4901, 0, '', '', 0),
(4902, 0, '', '', 0),
(4903, 0, '', '', 0),
(4904, 0, '', '', 0),
(4905, 0, '', '', 0),
(4906, 0, '', '', 0),
(4907, 0, '', '', 0),
(4908, 0, '', '', 0),
(4909, 0, '', '', 0),
(4910, 0, '', '', 0),
(4911, 0, '', '', 0),
(4912, 0, '', '', 0),
(4913, 0, '', '', 0),
(4914, 0, '', '', 0),
(4915, 0, '', '', 0),
(4916, 0, '', '', 0),
(4917, 0, '', '', 0),
(4918, 0, '', '', 0),
(4919, 0, '', '', 0),
(4920, 0, '', '', 0),
(4921, 0, '', '', 0),
(4922, 0, '', '', 0),
(4923, 0, '', '', 0),
(4924, 0, '', '', 0),
(4925, 0, '', '', 0),
(4926, 0, '', '', 0),
(4927, 0, '', '', 0),
(4928, 0, '', '', 0),
(4929, 0, '', '', 0),
(4930, 0, '', '', 0),
(4931, 0, '', '', 0),
(4932, 0, '', '', 0),
(4933, 0, '', '', 0),
(4934, 0, '', '', 0),
(4935, 0, '', '', 0),
(4936, 0, '', '', 0),
(4937, 0, '', '', 0),
(4938, 0, '', '', 0),
(4939, 0, '', '', 0),
(4940, 0, '', '', 0),
(4941, 0, '', '', 0),
(4942, 0, '', '', 0),
(4943, 0, '', '', 0),
(4944, 0, '', '', 0),
(4945, 0, '', '', 0),
(4946, 0, '', '', 0),
(4947, 0, '', '', 0),
(4948, 0, '', '', 0),
(4949, 0, '', '', 0),
(4950, 0, '', '', 0),
(4951, 0, '', '', 0),
(4952, 0, '', '', 0),
(4953, 0, '', '', 0),
(4954, 0, '', '', 0),
(4955, 0, '', '', 0),
(4956, 0, '', '', 0),
(4957, 0, '', '', 0),
(4958, 0, '', '', 0),
(4959, 0, '', '', 0),
(4960, 0, '', '', 0),
(4961, 0, '', '', 0),
(4962, 0, '', '', 0),
(4963, 0, '', '', 0),
(4964, 0, '', '', 0),
(4965, 0, '', '', 0),
(4966, 0, '', '', 0),
(4967, 0, '', '', 0),
(4968, 0, '', '', 0),
(4969, 0, '', '', 0),
(4970, 0, '', '', 0),
(4971, 0, '', '', 0),
(4972, 0, '', '', 0),
(4973, 0, '', '', 0),
(4974, 0, '', '', 0),
(4975, 0, '', '', 0),
(4976, 0, '', '', 0),
(4977, 0, '', '', 0),
(4978, 0, '', '', 0),
(4979, 0, '', '', 0),
(4980, 0, '', '', 0),
(4981, 0, '', '', 0),
(4982, 0, '', '', 0),
(4983, 0, '', '', 0),
(4984, 0, '', '', 0),
(4985, 0, '', '', 0),
(4986, 0, '', '', 0),
(4987, 0, '', '', 0),
(4988, 0, '', '', 0),
(4989, 0, '', '', 0),
(4990, 0, '', '', 0),
(4991, 0, '', '', 0),
(4992, 0, '', '', 0),
(4993, 0, '', '', 0),
(4994, 0, '', '', 0),
(4995, 0, '', '', 0),
(4996, 0, '', '', 0),
(4997, 0, '', '', 0),
(4998, 0, '', '', 0),
(4999, 0, '', '', 0),
(5000, 0, '', '', 0),
(5001, 0, '', '', 0),
(5002, 0, '', '', 0),
(5003, 0, '', '', 0),
(5004, 0, '', '', 0),
(5005, 0, '', '', 0),
(5006, 0, '', '', 0),
(5007, 0, '', '', 0),
(5008, 0, '', '', 0),
(5009, 0, '', '', 0),
(5010, 0, '', '', 0),
(5011, 0, '', '', 0),
(5012, 0, '', '', 0),
(5013, 0, '', '', 0),
(5014, 0, '', '', 0),
(5015, 0, '', '', 0),
(5016, 0, '', '', 0),
(5017, 0, '', '', 0),
(5018, 0, '', '', 0),
(5019, 0, '', '', 0),
(5020, 0, '', '', 0),
(5021, 0, '', '', 0),
(5022, 0, '', '', 0),
(5023, 0, '', '', 0),
(5024, 0, '', '', 0),
(5025, 0, '', '', 0),
(5026, 0, '', '', 0),
(5027, 0, '', '', 0),
(5028, 0, '', '', 0),
(5029, 0, '', '', 0),
(5030, 0, '', '', 0),
(5031, 0, '', '', 0),
(5032, 0, '', '', 0),
(5033, 0, '', '', 0),
(5034, 0, '', '', 0),
(5035, 0, '', '', 0),
(5036, 0, '', '', 0),
(5037, 0, '', '', 0),
(5038, 0, '', '', 0),
(5039, 0, '', '', 0),
(5040, 0, '', '', 0),
(5041, 0, '', '', 0),
(5042, 0, '', '', 0),
(5043, 0, '', '', 0),
(5044, 0, '', '', 0),
(5045, 0, '', '', 0),
(5046, 0, '', '', 0),
(5047, 0, '', '', 0),
(5048, 0, '', '', 0),
(5049, 0, '', '', 0),
(5050, 0, '', '', 0),
(5051, 0, '', '', 0),
(5052, 0, '', '', 0),
(5053, 0, '', '', 0),
(5054, 0, '', '', 0),
(5055, 0, '', '', 0),
(5056, 0, '', '', 0),
(5057, 0, '', '', 0),
(5058, 0, '', '', 0),
(5059, 0, '', '', 0),
(5060, 0, '', '', 0),
(5061, 0, '', '', 0),
(5062, 0, '', '', 0),
(5063, 0, '', '', 0),
(5064, 0, '', '', 0),
(5065, 0, '', '', 0),
(5066, 0, '', '', 0),
(5067, 0, '', '', 0),
(5068, 0, '', '', 0),
(5069, 0, '', '', 0),
(5070, 0, '', '', 0),
(5071, 0, '', '', 0),
(5072, 0, '', '', 0),
(5073, 0, '', '', 0),
(5074, 0, '', '', 0),
(5075, 0, '', '', 0),
(5076, 0, '', '', 0),
(5077, 0, '', '', 0),
(5078, 0, '', '', 0),
(5079, 0, '', '', 0),
(5080, 0, '', '', 0),
(5081, 0, '', '', 0),
(5082, 0, '', '', 0),
(5083, 0, '', '', 0),
(5084, 0, '', '', 0),
(5085, 0, '', '', 0),
(5086, 0, '', '', 0),
(5087, 0, '', '', 0),
(5088, 0, '', '', 0),
(5089, 0, '', '', 0),
(5090, 0, '', '', 0),
(5091, 0, '', '', 0),
(5092, 0, '', '', 0),
(5093, 0, '', '', 0),
(5094, 0, '', '', 0),
(5095, 0, '', '', 0),
(5096, 0, '', '', 0),
(5097, 0, '', '', 0),
(5098, 0, '', '', 0),
(5099, 0, '', '', 0),
(5100, 0, '', '', 0),
(5101, 0, '', '', 0),
(5102, 0, '', '', 0),
(5103, 0, '', '', 0),
(5104, 0, '', '', 0),
(5105, 0, '', '', 0),
(5106, 14, 'Janvier', 'Octobre', 3);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `nbre_modif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`id`, `nom`, `nbre_modif`) VALUES
(1, '1er degré, professeur des écoles', 1),
(2, 'Ethique', 0),
(3, 'Humanités médicales', 0),
(4, 'Dynamiques des milieux et risques (DYNARISK)', 0),
(5, 'Espaces, societés, territoires', 0),
(6, 'Géomarketing et stratégies territoriales des entreprises et des institutions publiques ', 0),
(7, 'Géomarketing et stratégies territoriales des entreprises et des institutions publiques  ', 0),
(8, 'Santé, territoires, et environnement', 0),
(9, 'Histoire', 0),
(10, 'Histoire Publique', 0),
(11, 'Histoire européenne comparée', 0),
(12, 'Histoire et médias, conservation et documentation de l\'image et du son', 0),
(13, '2nd degré, parcours histoire - géographie (CAPES)', 0),
(14, '2nd degré, parcours lettres, histoire, géographie - anglais, lettres (CAPLP)', 0),
(15, 'Communication politique et publique en France et en europe', 0),
(16, 'Expertise, ingénierie et projets internationaux', 0),
(17, 'Intervention et sociale', 0),
(18, 'Animation et éducation populaire', 0),
(19, 'Insertion, formation', 0),
(20, 'Direction d\'établissement et des services pour personnes âgées ', 0),
(21, 'Ingénierie et conduite de projets évènementiels', 0),
(22, 'Sport et sciences sociales\n', 0),
(23, 'Conseiller Principal d\'Education', 0),
(24, 'Cadre en éducation', 0),
(25, '2nd degré, parcours documentation (CAPES)', 0),
(26, 'formation de formateurs conseil en formation pédagogique accompagnement pédagogique', 0),
(27, 'Ingénierie pédagogique formation de formatuers autres qu\'enseignants', 0),
(28, 'Management du sport Dynamiques Métropolitaines et logiques d\'Acteurs', 0),
(29, 'Préparation mentale et accompagnement de la performance', 0),
(30, 'Vidéo-Analyste de la performance', 0),
(31, '2nd degré, parcours EPS (CAPES)', 0),
(32, 'Biologie, nutrition, santé', 0),
(33, 'Alternative urbaine, démarche expérimentale et Espaces publics', 0),
(34, 'Environnements urbains : stratégies et projets', 0),
(35, 'Maîtrise d\'ouvrage des projets urbains', 0),
(36, 'Programmation, projet et management urbain', 0),
(37, 'Urbanisme et expertise internationale', 0),
(38, 'Développement et territoire : ressources, politiques et stratégies', 0),
(39, 'Développement urbain intégré : stratégies, projets, services', 0),
(40, 'Habitat et renouvellement urbain', 0),
(41, 'Transport et mobilité', 0),
(42, 'Commerce électronique', 0),
(43, 'International business', 0),
(44, 'Management des PME et mondialisation', 0),
(45, 'Relations sociales, négocations et mondialisation', 0),
(46, 'Négociations internationales des projets commerciaux ', 0),
(47, 'Action humanitaire internationale', 0),
(48, 'Action publique', 0),
(49, 'Administration internationale de projets territoriaux', 0),
(50, 'Administration publique et gestion des collectivités locales', 0),
(51, 'Commerce international et monde chinois', 0),
(52, 'Commerce international et monde des Amériques', 0),
(53, 'Commerce international et monde européen', 0),
(54, 'Globalization and international trade', 0),
(55, 'Droit de la construction et de l\'urbanisme', 0),
(56, 'Droit des assurances', 0),
(57, 'Protection de la personne vulnérable', 0),
(58, 'Droit public des activités économiques', 0),
(59, 'Droit des assurances ', 0),
(60, 'Droit de la propriéte intellectuelle appliquée ', 0),
(61, 'Contrats commerciaux', 0),
(62, 'Droit de la régulation et des contrats publics', 0),
(63, 'Fiscalité appliquée', 0),
(64, 'Juriste d\'affaires', 0),
(65, 'Pratique du droit pénal des affaires ', 0),
(66, 'Droit des affaires', 0),
(67, 'Systèmes juridiques européens', 0),
(68, 'Common law et tradition civiliste', 0),
(69, 'Droit européen des affaires', 0),
(70, 'Droit du système de santé', 0),
(71, 'Général Protection de la personne vulnérable', 0),
(72, 'Carrières juridiques et affaires publiques ', 0),
(73, 'Droit de la bioéthique', 0),
(74, 'Droit des contentieux et de l\'execution', 0),
(75, 'Droit notarial', 0),
(76, 'Droit privé des personnes et des patrimoines', 0),
(77, 'Droit et informatique', 0),
(78, 'Banque et marchés financiers', 0),
(79, 'Métiers bancaires', 0),
(80, 'Ingénierie immobilière', 0),
(81, 'Economie Internationale', 0),
(82, 'Méthodes appliquées de la statistique et de l\'économétrie pour la recherche, l\'analyse et le traitement de l\'information (MASERATI)', 0),
(83, 'Economie de la santé', 0),
(84, '2nd degré, parcours sciences économiques et sociales (CAPES)', 0),
(85, 'Innovation et création d\'entreprises', 0),
(86, 'Management des organisations', 0),
(87, 'MIAGE', 0),
(88, 'Ingénierie des systèmes d\'information d\'aide à la décision', 0),
(89, '2nd degré, parcours économie - gestion (CAPET)', 0),
(90, '2nd degré, parcours économie - gestion (CAPLP)', 0),
(91, 'Comptabilité, contrôle, audit', 0),
(92, 'Finance', 0),
(93, 'Ingénierie financière', 0),
(94, 'Gestion de patrimoine', 0),
(95, 'Gestion de portefeuille', 0),
(96, 'Conseil, études et recherche', 0),
(97, 'International master in business management (IMBM)', 0),
(98, 'Conseil, études et recherche en management ', 0),
(99, 'Management de la responsabilité sociale de l\'entreprise', 0),
(100, 'Contrôle de gestion et aide à la décision', 0),
(101, 'Développement et management des universités (DMU)', 0),
(102, 'Gestion des ressources humaines dans les multinationales', 0),
(103, 'Logistique et achats internationaux', 0),
(104, 'Management et santé', 0),
(105, 'Management des établissement de santé', 0),
(106, 'Management des organisations soignantes', 0),
(107, 'Marketing et vente', 0),
(108, 'Marketing, chef de produit', 0),
(109, 'Ingénieur d\'affaires', 0),
(110, 'Management opérationnel des réseaux commerciaux', 0),
(111, 'Systèmes d\'information', 0),
(112, 'Biologie, santé', 0),
(113, 'Biologie, physiologie et pharmacologie de la circulation et de la respiration', 0),
(114, 'Biothérapies tissulaires, cellulaires et géniques', 0),
(115, 'Immunologie', 0),
(116, 'Surveillance épidémiologique des maladies humaines et animales', 0),
(117, 'Toxicologie, environnement, santé', 0),
(118, 'Santé publique-recherche clinique', 0),
(119, 'Sciences chirurgicales', 0),
(120, 'Bio-ingénierie pour la santé (MBIOS)', 0),
(121, 'Vaccinologie', 0),
(122, 'Neuro-Moteurs', 0),
(123, 'Biologie-bioressources', 0),
(124, 'Analyse des risques liés à l\'alimentation (ARSA)', 0),
(125, 'Ingénierie biologique pour l\'environnement (IBE)', 0),
(126, '2nd degré, parcours sciences de la vie et de la terre (CAPES)', 0),
(127, 'Chimie-matériaux', 0),
(128, 'Chimie des Molécules Bioactives', 0),
(129, 'Physico-Chimie Moléculaire et Applications', 0),
(130, 'Matériaux avancés et nanomatériaux (MAN)', 0),
(131, 'Polymères fonctionnels', 0),
(132, 'Analyse et assurance qualité en chimie et biochimie (AAQCB)', 0),
(133, '2nd degré, parcours biotechnologie (CAPET)', 0),
(134, '2nd degré, parcours mathématiques (CAPES)', 0),
(135, '2nd degré, parcours mathématiques - sciences (CAPLP)', 0),
(136, '2nd degré, parcours physique - chimie (CAPES)', 0),
(137, '2nd degré, parcours sciences industrielles de l\'ingénieur (CAPET)', 0),
(138, '2nd degré, parcours sciences industrielles, parcours métiers de l\'automobile (CAPLP)', 0),
(139, '2nd degré, parcours sciences industrielles, parcours métiers de la construction dans le BTP (CAPLP)', 0),
(140, '2nd degré, parcours sciences industrielles, parcours métiers de la mécanique, de l\'électrotechnique et de l\'énergie (CAPLP)', 0),
(141, 'Informatique', 0),
(142, 'Sécurité des systèmes informatiques', 0),
(143, 'Logiciels', 0),
(144, 'Instrumentation de la pollution atmosphérique (IPA)\n', 0),
(145, 'Modélisation et Simulatiob en Mécanique des Solides (M2S)', 0),
(146, 'Analyse et applications', 0),
(147, 'Bézout', 0),
(148, 'Probabilités et Statistiques des nouvelles données', 0),
(149, 'Sciences et génie de l\'environnement', 0),
(150, 'Atmosphères Intérieures et Extérieures (Air)', 0),
(151, 'Management de l\'environnement, des collectivités et des entreprises (MECE)', 0),
(152, 'Sytèmes aquatiques et gestion de l\'eau (SAGE)', 0),
(153, 'Matériaux du patrimoine dans l\'environnement (MAPE)', 0),
(154, 'Sciences pour l\'ingénieur', 0),
(155, 'Maintenance et maîtrise des risques industriels (MMRI)', 0),
(156, 'Systèmes distribués et technologies des réseaux (SDTR)', 0),
(157, 'Signaux et images en médecine', 0),
(158, 'Systémes cyber-physiques, technologies de l\'information, de l\'intelligence et du contrôle (SCTIC)', 0),
(159, 'International biométrie ', 0),
(160, 'DFASM1', 0),
(161, 'DCEM3', 0),
(162, 'DCEM4', 0),
(163, 'Diplôme d\'études spécialisées de médecine générale', 0),
(164, 'Diplôme d\'études spécialisées complémentaires', 0),
(165, '1ere année', 0),
(166, '2ème année', 0),
(167, '3ème année', 0),
(168, 'Marchés anglophones', 0),
(169, 'Marchés hispanophones', 0),
(170, 'Marchés PECO (Pays d\'Europe Centrale et Orientale)', 0),
(171, 'Littératures, discours, francophonies', 0),
(172, 'Métiers de la rédaction-traduction', 0),
(173, '1er degré, parcours professeur des écoles', 0),
(174, '2nd degré, parcours allemand (CAPES)', 0),
(175, '2nd degré, parcours espagnol (CAPES)', 0),
(176, '2nd degré, parcours anglais (CAPES)', 0),
(177, '2nd degré, parcours lettres (CAPES)', 0),
(178, 'Langues et civilisations étrangères: aires anglophones', 0),
(179, 'langues et civilisations étrangères: aires hispanophones', 0),
(180, 'langues et civilisations étrangères: études hispaniques et hispano-américaines', 0),
(181, 'langues et civilisations étrangères: aires germanophones', 0),
(182, 'Techniques de commercialisation', 0),
(183, 'Management du point de vente', 0),
(184, 'Activités immobilières', 0),
(185, 'Conseiller - chargé de clientèle', 0),
(186, 'Gestion comptable et financière ', 0),
(187, 'Gestion et management des organisations', 0),
(188, 'Gestion des Ressources humaines', 0),
(189, 'Contrôle de gestion', 0),
(190, 'Distribution : mention management de rayon - DISTRISUP', 0),
(191, 'E-commerce et marketing numérique', 0),
(192, 'Management hôtelier', 0),
(193, 'Marketing et management de la vente directe', 0),
(194, 'Assistant/Chargé ressources humaines', 0),
(195, 'Gestionnaire paie et administration du personnel', 0),
(196, 'Responsable d\'exploitation', 0),
(197, 'Métiers de l\'entrepreunariat', 0),
(198, 'International business - 2 langues - LV1 angl et LV2 esp - all - ital - port - mand - FLE', 0),
(199, 'Administration et gestion des entreprises - 2 ou 3  langues - LV1 angl, LV2 all et LV3 : esp - ital - port - mand\n', 0),
(200, 'Administration et gestion des entreprises - 2 ou 3  langues - LV1 angl, LV2 all et LV3 esp - ital - port - mand', 0),
(201, 'Commerce international - 2 ou 3  langues - LV1 angl, LV2 all et LV3 esp - ital - port - mand', 0),
(202, 'Commerceinternational - 2 ou 3  langues - LV1 angl, LV2 all et LV3 esp - ital - port - mand', 0),
(203, 'Ressources humaines - 2 ou 3  langues - LV1 angl, LV2 all et LV3 esp - ital - port - mand', 0),
(204, 'Parcours Europe: 3 langues obligatoires - LV1 angl, LV2/LV3 all - esp (castillan) - ital - port (LV3 port et ital gd débutant)\n', 0),
(205, 'Parcours Shanghaï: 3 langues obligatoires - LV1 angl, LV2 mand (débutant ou avancé) et LV3  all - esp - ital - port', 0),
(206, 'Parcours Amériques: 3 langues obligatoires - LV1 angl, LV2 esp (Amérique latine) - port (brésilien) -et LV3 esp - port - all - ital', 0),
(207, 'Sciences politiques à l\'international: 3 langues obligatoires - LV1 angl, LV2/LV3: all - esp - ital - mand - port (LV3 ital - port en gd débutant)\n', 0),
(208, 'Sciences politiques', 0),
(209, 'Concours de la fonction publique et territoires', 0),
(210, 'Concours de la fonction publique et politiques publiques\n', 0),
(211, 'Capacité en droit (deux ans études )', 0),
(212, 'Général', 0),
(213, 'Carrières publiques', 0),
(214, 'Droit européen  - filière Jean Monnet - 2 langues LV1 angl et LV2 all - esp - ital \n', 0),
(215, 'Juriste international droit anglais, droit espagol', 0),
(216, 'Montage et gestion du logement locatif social', 0),
(217, 'Gestion éco-patrimoniale de l\'immeuble', 0),
(218, 'Administration de biens', 0),
(219, 'Management international 2 langues LV1 angl et LV2 esp - all ', 0),
(220, 'Informatique et management (MIAGE)', 0),
(221, 'Informatique et management', 0),
(222, 'Gestion des entreprises', 0),
(223, 'Marchés européens', 0),
(224, 'Marchés méditerranéens', 0),
(225, 'Marchés d\'Afrique et de l\'Océan indien', 0),
(226, 'Animation sociale et socio-culturelle', 0),
(227, 'Coordination et développement de projets pour les territoires', 0),
(228, 'Management des associations', 0),
(229, 'Education et prévention', 0),
(230, 'Chargé de communication des collectivités territoriales et des associations', 0),
(231, 'Aménagement/environnement', 0),
(232, 'Sociétés et territoires', 0),
(233, 'Enseignement du 1er dégré', 0),
(234, 'Enseignement du 2nd degré', 0),
(235, 'Sciences de l\'Information et de la Communication', 0),
(236, 'Analyse spatiale et géomarketing', 0),
(237, 'Aménagement des territoires urbains', 0),
(238, 'Histoire - Aménagement/environnement', 0),
(239, 'Histoire - Anglais', 0),
(240, 'Histoire - Espagnol', 0),
(241, 'Professorat des écoles', 0),
(242, 'Philosophie', 0),
(243, 'Histoire - Allemand', 0),
(244, 'Histoire - Lettres', 0),
(245, 'Education et enseignement', 0),
(246, 'Intervention sociale insertion formation', 0),
(247, 'Espace sociaux du travail', 0),
(248, 'Préparation au diplôme d\'Etat de la jeunesse, de l\'éducation populaire et des sports', 0),
(249, 'Préparation au Certificat d\'aptitude aux fonctions d\'encadrement et de responsable unités d\'intervention sociale', 0),
(250, 'Concepteur et animateur formateur d\'insertion et de dispositifs de formation', 0),
(251, 'Coordination d\'établissements et de services pour personnes âgées', 0),
(252, 'Tourisme et événementiel ', 0),
(253, 'Education et motricité', 0),
(254, 'Entrainement sportif', 0),
(255, 'Management du sport', 0),
(256, 'Santé, vieillissement et activités physiques adaptées', 0),
(257, 'Chimie-Chimie analytique et de systèmes', 0),
(258, 'Réseaux et télécommunications', 0),
(259, 'Analyses biologiques et biochimiques', 0),
(260, 'Industries agroalimentaires et biologiques', 0),
(261, 'Diététique', 0),
(262, 'Mesures physiques', 0),
(263, 'Génie électrique et informatique industrielle', 0),
(264, 'Sécurité des aliments, assurance qualité', 0),
(265, 'Métrologie, diagnostic, contrôle énergetiques des bâtiments', 0),
(266, 'Administration et sécurité des réseaux (ASUR)', 0),
(267, 'Administration des réseaux multimédia (ARM)', 0),
(268, 'Système et composants en télémédecine (STC)', 0),
(269, 'Réseaux informatiques, Mobilité, Sécurité (RIMS)', 0),
(270, 'Commercialisation des produits et services industriels', 0),
(271, 'Métiers de l\'indistrie : mécatronique, robotique', 0),
(272, 'Métrologie, qualité des matériaux et des objets finis', 0),
(273, 'Chimie et physique des matériaux: traitement des métaux et alliages', 0),
(274, 'Chimie-analyse et contrôle des matières premières et des produits formulés', 0),
(275, 'Développement du médicament: santé humaine et animale', 0),
(276, 'Bâtiment communicant', 0),
(277, 'Génie industriel et maintenance', 0),
(278, 'Systèmes automatisés et réseaux  et informatique industrielle ', 0),
(279, 'Gestion rationnelle de l\'énergie électrique (GRENEL)', 0),
(280, 'Energies et transports', 0),
(281, 'Analyse d\'exploitation', 0),
(282, 'Conception et maintenance des logiciles libres', 0),
(283, 'Sécurité des données', 0),
(284, 'Chargé d\'affaires bâtiments', 0),
(285, 'Réseaux entreprises', 0),
(286, 'Chargé d\'affaires en contrôle électrique', 0),
(287, 'Maintenance nucléaire', 0),
(288, 'Techniques avancées en maintenance', 0),
(289, 'Portail MISIPC', 0),
(290, 'Chimie - biologie', 0),
(291, 'Chimie - biologie - international ( anglais)', 0),
(292, 'Mathématiques et intéractions', 0),
(293, 'Mathématiques et informatique)', 0),
(294, 'Mathématiques et informatique', 0),
(295, 'Portail', 0),
(296, 'Electronique et génie informatique', 0),
(297, 'Maintenance des systèmes industriels', 0),
(298, 'Mécanique', 0),
(299, 'Biologie-Santé', 0),
(300, 'Biologie environnement', 0),
(301, 'Biologie-Géologie enseignement', 0),
(302, 'Biologie santé Parcours international', 0),
(303, 'Chimie-Biologie', 0),
(304, 'Chimie-Biologie Pracours international', 0),
(305, 'Biologie générale et sciences de la terre - enseignement secondaire', 0),
(306, 'Littéraire', 0),
(307, 'Anglais - allemand - affaires internationales', 0),
(308, 'Anglais - espagnol - affaires internationales', 0),
(309, 'Enseignement du 1er degré', 0),
(310, 'Traduction', 0),
(311, 'Enseignemen du 1er degré', 0),
(312, 'Enseignemen du 2nd degré', 0),
(313, 'Lettres modernes', 0),
(314, 'Médiation culturelle', 0),
(315, 'Rédaction professionnelle et communication multimédia', 0),
(316, 'Métiers de la forme', 0),
(317, 'Scientifique', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `id_composante` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_type_formation` int(11) NOT NULL,
  `id_diplome` int(11) NOT NULL,
  `niveau` varchar(150) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `est_alternance` varchar(11) DEFAULT NULL,
  `recrutement_particulier` varchar(11) DEFAULT NULL,
  `detail_stage` varchar(150) DEFAULT NULL,
  `regex_stage` varchar(150) DEFAULT NULL,
  `regex_alternance` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `libelle`, `id_composante`, `id_filiere`, `id_type_formation`, `id_diplome`, `niveau`, `id_domaine`, `id_site`, `est_alternance`, `recrutement_particulier`, `detail_stage`, `regex_stage`, `regex_alternance`) VALUES
(4700, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 1, 5, 1, '1', 2, 6, '0', '1', 'Stages MEEF', '', ''),
(4701, 'Philosophie', 6, 2, 5, 1, '1', 2, 1, '0', '1', '24 sem au premier ou deuxième semestre', '', ''),
(4702, 'Philosophie', 6, 3, 5, 1, '1', 2, 1, '0', '1', '24 sem au premier ou deuxième semestre', '', ''),
(4703, 'Géographie et aménagement ', 6, 4, 5, 2, '2', 2, 1, '0', '1', '24 sem - fév à juill', '', ''),
(4704, 'Géographie et aménagement ', 6, 4, 5, 3, '3', 2, 1, '0', '1', '24 sem - fév à juill', '', ''),
(4705, 'Géographie et aménagement ', 6, 5, 5, 2, '2', 2, 1, '0', '1', '24 sem - fév à juill', '', ''),
(4706, 'Géographie et aménagement ', 6, 5, 5, 3, '3', 2, 1, '0', '1', '24 sem - fév à juill', '', ''),
(4707, 'Géographie et aménagement ', 11, 6, 5, 2, '2', 2, 12, '1', '1', '3 mois - fév à juin', '', ''),
(4708, 'Géographie et aménagement ', 11, 7, 5, 3, '3', 2, 12, '1', '1', '5-6 mois - fév à juil', '', ''),
(4709, 'Géographie et aménagement ', 6, 8, 5, 2, '2', 2, 1, '0', '1', '24 sem - fév à juill', '', ''),
(4710, 'Géographie et aménagement ', 6, 8, 5, 3, '3', 2, 1, '0', '1', '24 sem - fév à juill', '', ''),
(4711, 'Histoire', 6, 9, 5, 2, '2', 2, 1, '0', '1', '', '', ''),
(4712, 'Histoire', 6, 10, 5, 3, '3', 2, 1, '0', '1', '22 sem - fév à juin', '', ''),
(4713, 'Histoire', 6, 11, 5, 3, '3', 2, 1, '0', '1', '21 sem - fév à juil', '', ''),
(4714, 'Histoire', 6, 12, 5, 3, '3', 2, 1, '0', '1', '26 sem - fév à sept', '', ''),
(4715, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 13, 5, 1, '1', 2, 1, '0', '1', 'Stages MEEF', '', ''),
(4716, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 14, 5, 1, '1', 2, 10, '0', '1', 'Stages MEEF', '', ''),
(4717, 'Information-communication', 6, 15, 5, 1, '1', 2, 3, '0', '1', '16 sem min - nov à fév en 2ème année', '', ''),
(4718, 'Sciences de l\'Education ', 8, 16, 5, 1, '1', 2, 3, '0', '1', 'M1 - 14 sem - mars à juin\nM2 - 14 sem - mars à juin', '', ''),
(4719, 'Sciences de l\'Education ', 8, 17, 5, 1, '1', 2, 3, '0', '1', 'M1 - 6 sem - mars à avr\nM2 - 16 sem - févr à juin', '', ''),
(4720, 'Sciences de l\'Education ', 8, 18, 5, 1, '1', 2, 3, '', '1', 'M1 - 6 sem - mars à avr\nM2 - 16 sem - févr à juin', '', ''),
(4721, 'Sciences de l\'Education ', 8, 19, 5, 1, '1', 2, 3, '', '1', 'M1 - 6 sem - mars à avr\nM2 - 16 sem - févr à juin', '', ''),
(4722, 'Intervention et développement social', 8, 20, 5, 1, '1', 2, 3, '1', '1', '', '', ''),
(4723, 'Intervention et développement social', 8, 21, 5, 1, '1', 2, 3, '1', '1', '', '', ''),
(4724, 'Sciences sociales ', 8, 22, 5, 1, '1', 2, 2, '0', '', '16 sem - févr à juin', '', ''),
(4725, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 23, 5, 1, '1', 2, 6, '0', '1', 'Stages MEEF', '', ''),
(4726, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 24, 5, 1, '1', 2, 6, '1', '1', 'Stages MEEF', '', ''),
(4727, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF) 2nd degré', 8, 25, 5, 1, '1', 2, 3, '0', '1', 'Stages MEEF', '', ''),
(4728, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF) Pratique et ingénieurie de formation', 8, 26, 5, 1, '1', 2, 6, '0', '1', 'Stages MEEF', '', ''),
(4729, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF) Pratique et ingénieurie de formation', 2, 27, 5, 1, '1', 2, 6, '1', '1', 'Stages MEEF', '', ''),
(4730, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 28, 5, 1, '1', 2, 0, '0', '1', 'M1 - 12 sem -  févr à mai\nM2 - 23 sem janv à juil', '', ''),
(4731, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 29, 5, 1, '1', 2, 2, '0', '1', 'M1 - 8 sem janv-mars\nM2 - stage filé de 126 hres min', '', ''),
(4732, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 30, 5, 3, '3', 2, 2, '0', '1', '2-3 mois - janv à avril', '', ''),
(4733, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 8, 31, 5, 1, '1', 2, 2, '0', '1', 'Stages MEEF', '', ''),
(4734, 'Sciences du sport et entrainement', 8, 32, 5, 1, '1', 3, 2, '0', '1', 'M1 -20 sem - janv à juin\nM2 - 19 sem -  janv à juin', '', ''),
(4735, 'Urbanisme et aménagement', 14, 33, 5, 1, '1', 2, 13, '0', '1', 'Stage de 4 à 6 mois - mais à août', '', ''),
(4736, 'Urbanisme et aménagement', 14, 34, 5, 1, '1', 2, 13, '0', '1', 'Stage de 4 à 6 mois - sept à avril', '', ''),
(4737, 'Urbanisme et aménagement', 14, 35, 5, 1, '1', 2, 13, '0', '1', '', '', ''),
(4738, 'Urbanisme et aménagement', 14, 36, 5, 1, '1', 2, 13, '0', '1', 'Stage de 4 à 6 mois dès avril', '', ''),
(4739, 'Urbanisme et aménagement', 14, 37, 5, 1, '1', 2, 13, '0', '', 'Stage de 4 à 6 mois dès avril', '', ''),
(4740, 'Urbanisme et aménagement', 14, 38, 5, 1, '1', 2, 13, '0', '1', 'Stage de 4 à 6 mois dès avril', '', ''),
(4741, 'Urbanisme et aménagement', 14, 39, 5, 1, '1', 2, 13, '1', '1', 'Stage de 4 à 6 mois dès avril', '', ''),
(4742, 'Urbanisme et aménagement', 14, 40, 5, 1, '1', 2, 13, '1', '1', '', '', ''),
(4743, 'Urbanisme et aménagement', 14, 41, 5, 3, '3', 2, 13, '0', '1', '4 à 6 mois mars à sept', '', ''),
(4744, 'Administration et échanges internationaux', 4, 42, 5, 1, '1', 1, 1, '1', '1', '4-7 mois fév à sept', '', ''),
(4745, 'Administration et échanges internationaux', 4, 43, 5, 1, '1', 1, 1, '0', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4746, 'Administration et échanges internationaux', 4, 44, 5, 1, '1', 1, 1, '1', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4747, 'Administration et échanges internationaux', 4, 45, 5, 1, '1', 1, 1, '1', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4748, 'Administration et échanges internationaux', 4, 46, 5, 1, '1', 1, 1, '0', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4749, 'Politiques publiques', 4, 47, 5, 1, '1', 1, 1, '0', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4750, 'Politiques publiques', 4, 48, 5, 1, '1', 1, 1, '0', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4751, 'Management international des territoires Gestion des territoires et développement local', 4, 49, 5, 1, '1', 1, 1, '0', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4752, 'Management international des territoires Gestion des territoires et et développement local', 4, 50, 5, 1, '1', 1, 1, '0', '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', ''),
(4753, 'Management et commerce international', 4, 51, 5, 1, '1', 1, 1, '0', '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', ''),
(4754, 'Management et commerce international', 4, 52, 5, 1, '1', 1, 1, '0', '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', ''),
(4755, 'Management et commerce international', 4, 53, 5, 1, '1', 1, 1, '0', '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', ''),
(4756, 'Management et commerce international', 4, 54, 5, 1, '1', 1, 1, '0', '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', ''),
(4757, 'Droit des affaires', 5, 55, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4758, 'Droit des affaires', 5, 56, 5, 2, '2', 1, 17, '1', '1', '4 mois - fév à juin', '', ''),
(4759, 'Droit des affaires', 5, 57, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4760, 'Droit des affaires', 5, 58, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4761, 'Droit des affaires', 5, 59, 5, 3, '3', 1, 17, '1', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4762, 'Droit des affaires', 5, 60, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4763, 'Droit des affaires', 5, 61, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4764, 'Droit des affaires', 5, 62, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4765, 'Droit des affaires', 5, 63, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4766, 'Droit des affaires', 5, 64, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4767, 'Droit des affaires', 5, 65, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4768, 'Droit des affaires', 5, 55, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4769, 'Droit international et européen', 5, 66, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4770, 'Droit international et europén', 5, 67, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4771, 'Droit privé', 5, 68, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin', '', ''),
(4772, 'Droit international et européen', 5, 69, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin', '', ''),
(4773, 'Droit public et droit privé', 5, 70, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4774, 'Droit public et droit privé', 5, 71, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4775, 'Droit public et droit privé', 5, 72, 5, 2, '2', 1, 17, '0', '1', '4 mois - fév à juin', '', ''),
(4776, 'Droit public et droit privé', 5, 73, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4777, 'Droit public et droit privé', 5, 70, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4778, 'Droit public et droit privé', 5, 74, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4779, 'Droit public et droit privé', 5, 75, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4780, 'Droit privé', 5, 76, 5, 3, '3', 1, 17, '0', '1', '3 mois - avril à juin ou juin à août', '', ''),
(4781, 'Droit du numérique', 5, 77, 5, 1, '1', 1, 17, '0', '1', '6 mois- avril à oct', '', ''),
(4782, 'Banque et marchés financiers', 10, 78, 5, 2, '2', 1, 18, '0', '1', '6 mois - mars à août', '', ''),
(4783, 'Banque et marchés financiers', 10, 79, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4784, 'Banque et marchés financiers', 10, 80, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4785, 'Expertise économique', 10, 81, 5, 2, '2', 1, 18, '0', '1', '', '', ''),
(4786, 'Expertise économique', 10, 82, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4787, 'Expertise économique', 10, 83, 5, 3, '3', 1, 18, '0', '1', '6 mois - avril à septembre', '', ''),
(4788, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 10, 84, 5, 1, '1', 1, 18, '0', '1', 'Stages MEEF', '', ''),
(4789, 'Entrepreunariat et management de projets', 10, 85, 5, 1, '1', 1, 18, '1', '1', '', '', ''),
(4790, 'Management et administration des entreprises', 10, 86, 5, 1, '1', 1, 18, '0', '1', '4 mois minimum - janv à avril', '', ''),
(4791, 'Méthodes informatiques appliquées à la gestion des entreprises (MIAGE)', 1, 87, 5, 2, '2', 1, 15, '1', '1', '6 mois mars-août', '', ''),
(4792, 'Méthodes informatiques appliquées à la gestion des entreprises (MIAGE)', 1, 88, 5, 3, '3', 1, 15, '1', '1', '6 mois mars-août', '', ''),
(4793, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 89, 5, 1, '1', 1, 10, '0', '1', 'Stages MEEF', '', ''),
(4794, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 90, 5, 1, '1', 1, 10, '0', '1', 'Stages MEEF', '', ''),
(4795, 'Comptabilité, contrôle, audit', 11, 91, 5, 1, '1', 1, 18, '1', '1', 'M1 - 4 mois janv à avr\nM2 - 6 mois janv à juin', '', ''),
(4796, 'Finance', 11, 92, 5, 2, '2', 1, 18, '1', '1', '5 mois avril à août', '', ''),
(4797, 'Finance', 11, 93, 5, 3, '3', 1, 18, '0', '1', 'M1 : 5 mois - avril à août', '', ''),
(4798, 'Finance', 11, 94, 5, 3, '3', 1, 18, '1', '1', 'M1 : 5 mois - avril à août', '', ''),
(4799, 'Finance', 11, 95, 5, 3, '3', 1, 18, '1', '1', 'M1 : 5 mois - avril à août', '', ''),
(4800, 'Management et conseil', 11, 96, 5, 2, '2', 1, 18, '0', '1', '5 mois - avril à août', '', ''),
(4801, 'Management et conseil', 11, 97, 5, 2, '2', 1, 18, '0', '1', '3 mois min -  mai à juil', '', ''),
(4802, 'Management et conseil', 11, 98, 5, 3, '3', 1, 18, '0', '1', '4-5 mois - mars à juin', '', ''),
(4803, 'Management et conseil', 11, 99, 5, 3, '3', 1, 18, '1', '1', '4-6 mois - mars à juin', '', ''),
(4804, 'Management et conseil', 11, 100, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4805, 'Management et conseil', 11, 101, 5, 3, '3', 1, 18, '0', '1', '', '', ''),
(4806, 'Management et conseil', 11, 102, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4807, 'Management et conseil', 11, 103, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4808, 'Management et santé', 3, 104, 5, 2, '2', 1, 18, '1', '1', '', '', ''),
(4809, 'Management et santé', 3, 105, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4810, 'Management et santé', 3, 106, 5, 1, '1', 1, 3, '0', '1', 'uniquement en formation continue', '', ''),
(4811, 'Marketing et vente', 11, 107, 5, 2, '2', 1, 18, '1', '1', '3 mois - mai à juil', '', ''),
(4812, 'Marketing et vente', 11, 108, 5, 3, '3', 1, 18, '1', '1', 'M1 : 5 mois - avril à août\nM2 : 6 mois - janv à juin', '', ''),
(4813, 'Marketing et vente', 11, 109, 5, 3, '3', 1, 18, '1', '1', 'M1 : 4 mois - avril à juill', '', ''),
(4814, 'Marketing et vente', 11, 110, 5, 3, '3', 1, 18, '1', '1', '', '', ''),
(4815, 'Diplôme d\'ingenieur en économie et gestion', 1, 111, 5, 5, '5', 3, 15, '1', '', '', '', ''),
(4816, 'Biologie santé', 7, 112, 5, 2, '2', 3, 14, '0', '0', '2 mois - janv à mars ou juill à août', '', ''),
(4817, 'Biologie santé', 7, 113, 5, 3, '3', 3, 14, '0', '0', '8 à 10 mois (Septembre-Février) puis (Janvier-Octobre)', '', ''),
(4818, 'Biologie santé', 7, 114, 5, 3, '3', 3, 4, '0', '0', '6 mois janv à juin', '', ''),
(4819, 'Biologie santé', 7, 115, 5, 3, '3', 3, 14, '0', '0', '6 mois janv à juin', '', ''),
(4820, 'Biologie santé', 7, 116, 5, 3, '3', 3, 14, '0', '0', '6 mois janv à août', '', ''),
(4821, 'Biologie santé', 7, 117, 5, 3, '3', 3, 4, '0', '0', '6 mois janv à juill', '', ''),
(4822, 'Biologie santé', 7, 118, 5, 3, '3', 3, 14, '0', '0', '6 mois janv à juin', '', ''),
(4823, 'Biologie santé', 7, 119, 5, 3, '3', 3, 4, '0', '0', '9 à 12 mois - nov à oct', '', ''),
(4824, 'Biologie santé', 7, 120, 5, 3, '3', 3, 0, '0', '0', '26 sem - fèv à juill', '', ''),
(4825, 'Biologie santé', 7, 121, 5, 3, '3', 3, 0, '0', '0', '', '', ''),
(4826, 'Biologie santé', 7, 122, 5, 3, '3', 3, 1, '0', '', '25 sem - janv à juin', '', ''),
(4827, 'Biologie-bioressources', 9, 123, 5, 2, '2', 3, 1, '0', '0', '8 sem - avril à mai', '', ''),
(4828, 'Biologie-bioressources', 9, 124, 5, 3, '3', 3, 1, '0', '0', '24 sem - fév à juil', '', ''),
(4829, 'Biologie-bioressources', 9, 125, 5, 3, '3', 3, 1, '0', '0', '23 sem - fév à juil', '', ''),
(4830, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 9, 126, 5, 1, '1', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(4831, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 1, 5, 1, '1', 3, 6, '0', '0', 'Stages MEEF', '', ''),
(4832, 'Chimie-matériaux', 9, 127, 5, 2, '2', 3, 1, '0', '0', '', '', ''),
(4833, 'Chimie-matériaux', 9, 128, 5, 3, '3', 3, 1, '0', '0', '27 sem - janv à juill', '', ''),
(4834, 'Chimie-matériaux', 9, 129, 5, 1, '1', 3, 1, '0', '0', '', '', ''),
(4835, 'Chimie-matériaux', 9, 130, 5, 3, '3', 3, 1, '0', '0', '20 sem - févr à juin', '', ''),
(4836, 'Chimie-matériaux', 9, 131, 5, 3, '3', 3, 1, '0', '0', '21 sem - févr à juin', '', ''),
(4837, 'Chimie-matériaux', 9, 132, 5, 3, '3', 3, 1, '1', '0', '', '', ''),
(4838, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 133, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4839, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 9, 134, 5, 1, '1', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(4840, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 135, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4841, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 136, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4842, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 137, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4843, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 138, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4844, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 139, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4845, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 140, 5, 1, '1', 3, 10, '0', '0', 'Stages MEEF', '', ''),
(4846, 'Informatique', 9, 141, 5, 2, '2', 3, 1, '0', '0', '', '', ''),
(4847, 'Informatique', 9, 142, 5, 3, '3', 3, 1, '1', '0', '19 sem - févr à juill', '', ''),
(4848, 'Informatique', 9, 143, 5, 3, '3', 3, 1, '0', '', '', '', ''),
(4849, 'Traitement du signal et des images ', 9, 144, 5, 3, '3', 3, 1, '0', '', '', '', ''),
(4850, 'Mécanique', 9, 145, 5, 3, '3', 3, 1, '0', '', '', '', ''),
(4851, 'Mathématiques et applications', 9, 146, 5, 3, '3', 3, 1, '0', '0', '3 à 6 mois avr à juill', '', ''),
(4852, 'Mathématiques et applications', 9, 147, 5, 1, '1', 3, 1, '0', '', '', '', ''),
(4853, 'Mathématiques et applications', 9, 92, 5, 1, '1', 3, 1, '0', '', '', '', ''),
(4854, 'Mathématiques et applications', 9, 148, 5, 1, '1', 3, 1, '0', '', '', '', ''),
(4855, 'Sciences et génie de l\'environnement', 9, 149, 5, 2, '2', 3, 1, '0', '0', '', '', ''),
(4856, 'Sciences et génie de l\'environnement', 9, 150, 5, 3, '3', 3, 1, '1', '0', '17 sem - févr à juin', '', ''),
(4857, 'Sciences et génie de l\'environnement', 9, 151, 5, 3, '3', 3, 1, '1', '0', '', '', ''),
(4858, 'Sciences et génie de l\'environnement', 9, 152, 5, 3, '3', 3, 1, '0', '0', '21 sem - mars à juill', '', ''),
(4859, 'Sciences et génie de l\'environnement', 9, 153, 5, 3, '3', 3, 1, '0', '0', '26 sem - janv à juill ', '', ''),
(4860, 'Sciences pour l\'ingénieur', 9, 154, 5, 2, '2', 3, 1, '0', '0', '', '', ''),
(4861, 'Sciences pour l\'ingénieur', 9, 155, 5, 3, '3', 3, 16, '1', '0', '21 sem - févr à juin', '', ''),
(4862, 'Sciences pour l\'ingénieur', 9, 156, 5, 3, '3', 3, 1, '1', '0', '18 sem - janv à juin', '', ''),
(4863, 'Sciences pour l\'ingénieur', 9, 157, 5, 3, '3', 3, 1, '0', '0', '18 sem - févr à juin', '', ''),
(4864, 'Sciences pour l\'ingénieur', 9, 158, 5, 3, '3', 3, 1, '0', '0', '22 sem - mars à sept', '', ''),
(4865, 'Sciences pour l\'ingénieur', 9, 159, 5, 3, '3', 3, 1, '0', '0', '5 mois', '', ''),
(4866, '2ème cycle des études médicales', 7, 160, 5, 6, '6', 3, 14, '1', '0', 'sept à août', '', ''),
(4867, '2ème cycle des études médicales', 7, 161, 5, 7, '7', 3, 14, '1', '0', 'sept à août', '', ''),
(4868, '2ème cycle des études médicales', 7, 162, 5, 8, '8', 3, 14, '1', '0', 'sept à avril et de juin à août', '', ''),
(4869, '3ème cycle (3 à 5 ans)', 7, 163, 5, 0, '#N/A', 3, 14, '0', '', 'nc', '', ''),
(4870, '3ème cycle (3 à 5 ans)', 7, 164, 5, 0, '#N/A', 3, 14, '0', '', 'nc', '', ''),
(4871, 'Diplôme d\'ingénieur en biosciences', 17, 165, 5, 5, '5', 3, 14, '1', '0', '8 sem - juin à août', '', ''),
(4872, 'Diplôme d\'ingénieur en biosciences', 17, 166, 5, 5, '5', 3, 14, '1', '0', '15 sem - mai à août', '', ''),
(4873, 'Diplôme d\'ingénieur en biosciences', 17, 167, 5, 5, '5', 3, 14, '1', '0', '29 sem - févr à sept', '', ''),
(4874, 'Management international trilingue', 6, 168, 5, 1, '1', 4, 1, '0', '0', 'M1 - 13 sem - mai à juill en France et à l\'international\nM2 - 26 sem - févr à août', '', ''),
(4875, 'Management international trilingue', 6, 169, 5, 1, '1', 4, 1, '0', '0', 'M1 - 13 sem - mai à juill en France et à l\'international\nM2 - 26 sem - févr à août', '', ''),
(4876, 'Management international trilingue', 6, 170, 5, 1, '1', 4, 1, '0', '0', 'M1 - 13 sem - mai à juill en France et à l\'international\nM2 - 26 sem - févr à août', '', ''),
(4877, 'Lettres', 6, 171, 5, 3, '3', 4, 1, '0', '0', 'optionnel ', '', ''),
(4878, 'Lettres', 6, 172, 5, 3, '3', 4, 1, '0', '0', '18 sem min - avril à sept', '', ''),
(4879, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 173, 5, 1, '1', 4, 6, '0', '0', 'Stages MEEF', '', ''),
(4880, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 174, 5, 1, '1', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(4881, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 175, 5, 1, '1', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(4882, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 176, 5, 1, '1', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(4883, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 177, 5, 1, '1', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(4884, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 14, 5, 1, '1', 4, 10, '0', '1', 'Stages MEEF', '', ''),
(4885, 'Langues et cultures étrangères', 6, 178, 5, 2, '2', 4, 1, '0', '0', '', '', ''),
(4886, 'Langues et cultures étrangères', 6, 179, 5, 2, '2', 4, 1, '0', '0', '', '', ''),
(4887, 'Langues et cultures étrangères', 6, 179, 5, 3, '3', 4, 1, '0', '0', '', '', ''),
(4888, 'Langues et cultures étrangères', 6, 180, 5, 3, '3', 4, 1, '0', '0', '', '', ''),
(4889, 'Langues et cultures étrangères', 6, 181, 5, 2, '2', 4, 1, '0', '0', '', '', ''),
(4890, 'Langues et cultures étrangères', 6, 181, 5, 3, '3', 4, 1, '0', '0', '', '', ''),
(4891, 'Techniques de commercialisation', 15, 182, 5, 9, '9', 1, 1, '1', '0', '3 sem - avril', '', ''),
(4892, 'Techniques de commercialisation', 15, 182, 5, 10, '10', 1, 1, '1', '0', '8 sem - avril à mai', '', ''),
(4893, 'Techniques de commercialisation', 16, 182, 5, 9, '9', 1, 11, '1', '0', '3 sem - avril', '', ''),
(4894, 'Techniques de commercialisation', 16, 182, 5, 10, '10', 1, 11, '1', '0', '8 sem - avril à mai', '', ''),
(4895, 'Techniques de commercialisation', 16, 182, 5, 9, '9', 1, 16, '1', '0', '2 sem - avril', '', ''),
(4896, 'Techniques de commercialisation', 16, 182, 5, 10, '10', 1, 16, '1', '0', '8 sem - avril à août', '', ''),
(4897, 'Commerce : marketing et commercialisation', 15, 183, 5, 11, '11', 1, 1, '1', '0', '', '', ''),
(4898, 'Finance, banque, assurance', 15, 184, 5, 11, '11', 1, 1, '1', '0', '', '', ''),
(4899, 'Finance, banque, assurance', 15, 185, 5, 11, '11', 1, 1, '1', '0', '', '', ''),
(4900, 'Finance, banque, assurance', 16, 185, 5, 11, '11', 1, 16, '1', '0', '', '', ''),
(4901, 'Gestion des entreprises et des administrations', 16, 186, 5, 9, '9', 1, 16, '1', '0', '', '', ''),
(4902, 'Gestion des entreprises et des administrations', 16, 186, 5, 10, '10', 1, 16, '1', '0', '11 sem - mars à juin', '', ''),
(4903, 'Gestion des entreprises et des administrations', 16, 186, 5, 9, '9', 1, 11, '1', '0', '', '', ''),
(4904, 'Gestion des entreprises et des administrations', 16, 186, 5, 10, '10', 1, 11, '1', '0', '11 sem - mars à juin', '', ''),
(4905, 'Gestion des entreprises et des administrations', 16, 187, 5, 9, '9', 1, 16, '0', '0', '', '', ''),
(4906, 'Gestion des entreprises et des administrations', 16, 187, 5, 10, '10', 1, 16, '1', '0', '11 sem - mars à juin', '', ''),
(4907, 'Gestion des entreprises et des administrations', 16, 187, 5, 9, '9', 1, 11, '0', '0', '', '', ''),
(4908, 'Gestion des entreprises et des administrations', 16, 187, 5, 10, '10', 1, 11, '1', '0', '11 sem - mars à juin', '', ''),
(4909, 'Gestion des entreprises et des administrations', 16, 188, 5, 9, '9', 1, 16, '0', '0', '', '', ''),
(4910, 'Gestion des entreprises et des administrations', 16, 188, 5, 10, '10', 1, 16, '1', '0', '11 sem - mars à juin', '', ''),
(4911, 'Gestion des entreprises et des administrations', 16, 188, 5, 9, '9', 1, 11, '0', '0', '', '', ''),
(4912, 'Gestion des entreprises et des administrations', 16, 188, 5, 10, '10', 1, 11, '0', '0', '11 sem - mars à juin', '', ''),
(4913, 'Métiers de la comptabilité et de la gestion', 16, 189, 5, 11, '11', 1, 11, '1', '0', '', '', ''),
(4914, 'Commerce : marketing et commercialisation', 16, 190, 5, 11, '11', 1, 16, '1', '0', '', '', ''),
(4915, 'Commerce : marketing et commercialisation', 16, 183, 5, 11, '11', 1, 16, '1', '0', '', '', ''),
(4916, 'Commerce : marketing et commercialisation', 16, 183, 5, 11, '11', 1, 11, '1', '0', '', '', ''),
(4917, 'E-commerce et marketing numérique', 16, 191, 5, 11, '11', 1, 16, '1', '', '', '', ''),
(4918, 'Organisation et gestion des établissements hôteliers et de la restauration', 16, 192, 5, 11, '11', 1, 16, '0', '', '', '', ''),
(4919, 'Métiers du marketing opérationnel', 16, 193, 5, 11, '11', 1, 1, '1', '', '', '', ''),
(4920, 'Gestion des ressources humaines', 16, 194, 5, 11, '11', 1, 16, '1', '0', '26 sem - mars à août', '', ''),
(4921, 'Gestion des ressources humaines', 16, 195, 5, 11, '11', 1, 16, '1', '0', '20 sem - mars à août', '', ''),
(4922, 'Logistiques', 16, 196, 5, 11, '11', 1, 16, '0', '0', '16 sem - mars à juin', '', ''),
(4923, 'Management de la qualité dans les organisations', 16, 197, 5, 11, '11', 1, 16, '1', '0', '', '', ''),
(4924, 'Administration et échanges internationaux', 4, 198, 5, 12, '12', 1, 1, '0', '0', '', '', ''),
(4925, 'Administration et échanges internationaux', 4, 198, 5, 13, '13', 1, 1, '0', '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', ''),
(4926, 'Administration et échanges internationaux', 4, 199, 5, 13, '13', 1, 1, '0', '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', ''),
(4927, 'Administration et échanges internationaux', 4, 200, 5, 14, '14', 1, 1, '0', '0', '3 à 4 mois mai à sept ', '', ''),
(4928, 'Administration et échanges internationaux', 4, 201, 5, 13, '13', 1, 1, '0', '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', ''),
(4929, 'Administration et échanges internationaux', 4, 202, 5, 14, '14', 1, 1, '0', '0', '3 à 4 mois mai à sept ', '', ''),
(4930, 'Administration et échanges internationaux', 4, 203, 5, 13, '13', 1, 1, '0', '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', ''),
(4931, 'Administration et échanges internationaux', 4, 203, 5, 14, '14', 1, 1, '0', '0', '3 à 4 mois mai à sept ', '', ''),
(4932, 'Administration et échanges internationaux', 4, 204, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept en L3', '', ''),
(4933, 'Administration et échanges internationaux', 4, 205, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept en L3', '', ''),
(4934, 'Administration et échanges internationaux', 4, 206, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept en L3', '', ''),
(4935, 'Administration et échanges internationaux', 4, 207, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept en L3', '', ''),
(4936, 'Administration et échanges internationaux', 4, 208, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept en L3', '', ''),
(4937, 'Administration publique', 13, 209, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept ', '', ''),
(4938, 'Administration publique', 13, 210, 5, 14, '14', 1, 1, '0', '1', '3 à 4 mois mai à sept ', '', ''),
(4939, 'Droit', 5, 211, 5, 15, '15', 1, 17, '0', '0', '', '', ''),
(4940, 'Droit', 5, 212, 5, 16, '16', 1, 17, '0', '0', '16 sem', '', ''),
(4941, 'Droit', 5, 213, 5, 16, '16', 1, 17, '0', '1', '16 sem', '', ''),
(4942, 'Droit', 5, 214, 5, 16, '16', 1, 17, '0', '1', '16 sem', '', ''),
(4943, 'Droit', 5, 215, 5, 16, '16', 1, 17, '0', '0', '', '', ''),
(4944, 'Activités juridiques', 5, 216, 5, 11, '11', 1, 17, '1', '0', '16 sem - janv à août', '', ''),
(4945, 'Activités juridiques', 5, 217, 5, 11, '11', 1, 11, '1', '0', '12 sem', '', ''),
(4946, 'Activités juridiques', 5, 218, 5, 11, '11', 1, 11, '0', '0', '', '', ''),
(4947, 'Economie et gestion', 10, 212, 5, 13, '13', 1, 18, '0', '0', 'stage facultatif filé le nom de l\'année universitaire', '', ''),
(4948, 'Economie et gestion', 11, 219, 5, 16, '16', 1, 16, '0', '1', '3 mois', '', ''),
(4949, 'Economie et gestion', 11, 219, 5, 16, '16', 1, 1, '0', '1', '', '', ''),
(4950, 'Economie et gestion', 10, 220, 5, 12, '12', 1, 18, '1', '1', '', '', ''),
(4951, 'Economie et gestion', 10, 221, 5, 13, '13', 1, 18, '1', '1', '', '', ''),
(4952, 'Economie et gestion', 11, 91, 5, 14, '14', 1, 18, '1', '1', '8 sem - de fév à avril', '', ''),
(4953, 'Economie et gestion', 11, 222, 5, 14, '14', 1, 18, '1', '1', '8 sem min à partir de avril', '', ''),
(4954, 'Commerce international', 16, 223, 5, 11, '11', 1, 16, '1', '', '20 sem - mars à août', '', ''),
(4955, 'Commerce international', 16, 224, 5, 11, '11', 1, 16, '1', '', '20 sem - mars à août', '', ''),
(4956, 'Commerce international', 16, 225, 5, 11, '11', 1, 16, '1', '', '20 sem - mars à août', '', ''),
(4957, 'Carrières sociales', 16, 226, 5, 17, '17', 2, 16, '1', '1', '12 sem -  mars à juin en 2ème année', '', ''),
(4958, 'Intervention sociale', 16, 227, 5, 11, '11', 2, 16, '1', '1', '', '', ''),
(4959, 'Intervention sociale', 16, 227, 5, 11, '11', 2, 3, '0', '1', '16 sem', '', ''),
(4960, 'Gestion des Organisations de l\'Economie Solciale et Solidaire', 16, 228, 5, 11, '11', 1, 11, '0', '1', '4 et 12 sem - du 13 au 28 févr et du 17 mars au 20 juin', '', ''),
(4961, 'Intervention sociale : accompagnement social', 2, 229, 5, 11, '11', 2, 16, '0', '', '30 sem - sept à juin', '', ''),
(4962, 'Métiers de la communication : Chargé de communication', 6, 230, 5, 11, '11', 2, 3, '1', '', '', '', ''),
(4963, 'Géographie et aménagement', 6, 231, 5, 16, '16', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4964, 'Géographie et aménagement', 6, 232, 5, 14, '14', 2, 1, '0', '1', 'Stage filé le long de l\'année (optionnel)', '', ''),
(4965, 'Géographie et aménagement', 6, 233, 5, 16, '16', 2, 1, '0', '0', 'Stages MEEF', '', ''),
(4966, 'Géographie et aménagement', 6, 234, 5, 16, '16', 2, 1, '0', '0', '', '', ''),
(4967, 'Géographie et aménagement', 6, 235, 5, 16, '16', 2, 1, '0', '0', '', '', ''),
(4968, 'Géographie et aménagement', 6, 236, 5, 16, '16', 2, 1, '0', '0', 'Stage optionnel en L2 ou L3 : soit entre L2 et L3, soit sous forme de stage filé en L3. Pour les parcours optionnels enseignement du 1er et du 2nd deg', '', ''),
(4969, 'Géographie et aménagement', 6, 237, 5, 11, '11', 2, 1, '0', '', '17 sem - avril à juill', '', ''),
(4970, 'Double licence Histoire-Géographie', 6, 238, 5, 16, '16', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4971, 'Double licence Histoire-Anglais', 6, 239, 5, 16, '16', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4972, 'Double licence Histoire-Espagnol', 6, 240, 5, 16, '16', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4973, 'Histoire', 6, 9, 5, 16, '16', 2, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4974, 'Histoire', 6, 233, 5, 16, '16', 2, 1, '0', '0', 'Stages MEEF', '', ''),
(4975, 'Histoire', 6, 234, 5, 16, '16', 2, 1, '0', '0', '', '', ''),
(4976, 'Histoire', 6, 241, 5, 16, '16', 2, 1, '0', '0', 'Stages MEEF', '', ''),
(4977, 'Philosophie', 6, 242, 5, 16, '16', 2, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4978, 'Philosophie', 6, 233, 5, 16, '16', 2, 1, '0', '0', 'Stages MEEF', '', ''),
(4979, 'Philosophie', 6, 235, 5, 16, '16', 2, 1, '0', '0', '', '', ''),
(4980, 'Double licence Histoire-Philosophie', 6, 244, 5, 16, '16', 2, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4981, 'Double licence Médecine-Philosophie', 6, 244, 5, 16, '16', 2, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4982, 'Histoire', 6, 243, 5, 18, '18', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4983, 'Histoire', 6, 239, 5, 18, '18', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4984, 'Histoire', 6, 240, 5, 18, '18', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4985, 'Double licence Histoire - Lettres', 6, 244, 5, 18, '18', 2, 1, '0', '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(4986, 'Sciences de l\'éducation', 8, 212, 5, 12, '12', 2, 3, '0', '0', '', '', ''),
(4987, 'Sciences de l\'éducation', 8, 245, 5, 16, '16', 2, 3, '0', '0', 'Stages MEEF', '', ''),
(4988, 'Sciences de l\'éducation', 8, 246, 5, 13, '13', 2, 3, '0', '0', '', '', ''),
(4989, 'Sciences de l\'éducation', 8, 246, 5, 14, '14', 2, 3, '0', '0', '6 sem - mars à avr', '', ''),
(4990, 'Sciences de l\'éducation', 8, 247, 5, 16, '16', 2, 1, '0', '', '', '', ''),
(4991, 'Sciences de l\'éducation', 8, 248, 5, 16, '16', 2, 1, '0', '', '', '', ''),
(4992, 'Sciences de l\'éducation', 8, 249, 5, 16, '16', 2, 1, '0', '', '', '', ''),
(4993, 'Sciences de l\'éducation', 8, 250, 5, 16, '16', 2, 1, '0', '', '', '', ''),
(4994, 'Sciences de l\'éducation', 8, 251, 5, 14, '14', 2, 3, '1', '0', '', '', ''),
(4995, 'Sciences de l\'éducation', 8, 252, 5, 14, '14', 2, 3, '1', '0', '', '', ''),
(4996, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 12, '12', 2, 2, '0', '0', 'projet d\'étude filé (semestre 2)', '', ''),
(4997, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 12, '12', 2, 16, '0', '0', 'projet d\'étude filé (semestre 2)', '', ''),
(4998, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 13, '13', 2, 2, '0', '0', 'stage filé nov-avril', '', ''),
(4999, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 13, '13', 2, 16, '0', '0', 'stage filé nov-avril', '', ''),
(5000, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 253, 5, 14, '14', 2, 2, '0', '0', 'stage filé nov-avril', '', ''),
(5001, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 254, 5, 14, '14', 2, 2, '0', '1', 'stage filé oct-mars', '', ''),
(5002, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 255, 5, 14, '14', 2, 16, '0', '1', '8 sem mars-mai', '', ''),
(5003, 'Santé', 8, 256, 5, 11, '11', 2, 2, '0', '1', '8 sem - mars à mai / projet tutoré filé de oct à mars ', '', ''),
(5004, 'Chimie', 15, 257, 5, 9, '9', 3, 20, '1', '1', '', '', ''),
(5005, 'Chimie', 15, 257, 5, 10, '10', 3, 20, '1', '1', '11 sem - avril à juin', '', ''),
(5006, 'Réseaux et télécommunications', 15, 258, 5, 9, '9', 3, 20, '1', '1', '', '', ''),
(5007, 'Réseaux et télécommunications', 15, 258, 5, 10, '10', 3, 20, '1', '1', '10 sem - avril à juin', '', ''),
(5008, 'Génie biologique', 15, 259, 5, 17, '17', 3, 1, '0', '1', '10 sem - avril à juin en 2ème année', '', ''),
(5009, 'Génie biologique', 15, 260, 5, 17, '17', 3, 1, '0', '1', '10 sem - avril à juin en 2ème année', '', ''),
(5010, 'Génie biologique', 15, 261, 5, 17, '17', 3, 1, '0', '1', '21 sem - avril à août en 2ème année', '', ''),
(5011, 'Mesures physiques', 15, 262, 5, 9, '9', 3, 1, '0', '1', '', '', ''),
(5012, 'Mesures physiques', 15, 262, 5, 10, '10', 3, 1, '1', '1', '10 sem - avril à juin', '', ''),
(5013, 'Génie électrique et informatique industrielle', 15, 263, 5, 9, '9', 3, 1, '0', '1', '', '', ''),
(5014, 'Génie électrique et informatique industrielle', 15, 263, 5, 10, '10', 3, 1, '1', '1', '10 sem - avril à juin', '', ''),
(5015, 'Industrie agroalimentaires : gestion, production et valorisation', 15, 264, 5, 11, '11', 3, 1, '1', '1', '', '', ''),
(5016, 'Métiers de l\'énergetique, de l\'environnement et du génie climatique ', 15, 265, 5, 11, '11', 3, 1, '1', '1', '', '', ''),
(5017, 'Réseaux et télécommunications', 15, 266, 5, 11, '11', 3, 20, '1', '1', '17 sem - fév à juin', '', ''),
(5018, 'Réseaux et télécommunications', 15, 267, 5, 11, '11', 3, 20, '1', '1', '17 sem - fév à juin', '', ''),
(5019, 'Réseaux et télécommunications', 15, 268, 5, 11, '11', 3, 1, '1', '1', '', '', ''),
(5020, 'Réseaux et télécommunications', 15, 269, 5, 11, '11', 3, 20, '1', '1', '17 sem - fév à juin', '', ''),
(5021, 'Commerce : marketing et commercialisation', 15, 270, 5, 11, '11', 1, 1, '1', '1', '', '', ''),
(5022, 'Electricité et électronique', 15, 271, 5, 11, '11', 3, 1, '1', '1', '', '', ''),
(5023, 'Production industrielle', 15, 272, 5, 11, '11', 3, 1, '1', '1', '', '', ''),
(5024, 'Transformation des métaux', 15, 273, 5, 11, '11', 3, 20, '1', '1', '', '', ''),
(5025, 'Industries chimiques, cosmétiques et pharmaceutiques', 15, 274, 5, 11, '11', 3, 20, '1', '1', '16 sem - fév à juin', '', ''),
(5026, 'Industries chimiques, cosmétiques et pharmaceutiques', 15, 275, 5, 11, '11', 3, 1, '1', '1', '', '', ''),
(5027, 'Domotique, Immotique et Autonomie', 15, 276, 5, 11, '11', 3, 1, '1', '', '', '', ''),
(5028, 'Génie électrique et informatique industrielle', 16, 263, 5, 9, '9', 3, 16, '0', '1', '', '', ''),
(5029, 'Génie électrique et informatique industrielle', 16, 263, 5, 10, '10', 3, 16, '1', '1', '10 sem - avril à juin', '', ''),
(5030, 'Génie industriel et maintenance', 16, 277, 5, 9, '9', 3, 16, '1', '1', '', '', ''),
(5031, 'Génie industriel et maintenance', 16, 277, 5, 10, '10', 3, 16, '1', '1', '10 sem - avril à juin', '', ''),
(5032, 'Informatique', 16, 141, 5, 9, '9', 3, 11, '1', '1', '', '', ''),
(5033, 'Informatique', 16, 141, 5, 10, '10', 3, 11, '1', '1', '10 sem - mars à juin', '', ''),
(5034, 'Automatique et informatique industrielle', 16, 278, 5, 11, '11', 3, 16, '1', '1', '16 sem -  fév à juin', '', ''),
(5035, 'Automatique et informatique industrielle', 16, 279, 5, 11, '11', 3, 16, '1', '1', '17 sem -  fév à juin', '', ''),
(5036, 'Maîtrise de l\'énergie, électricité et développement durable', 15, 280, 5, 11, '11', 3, 1, '1', '', '', '', ''),
(5037, 'Métiers de l\'informatique: administration et sécurité des systèmes et des réseaux', 16, 281, 5, 11, '11', 3, 11, '1', '', '', '', ''),
(5038, 'Métiers de l\'informatique: conception, développement et tests logiciels', 16, 282, 5, 11, '11', 3, 11, '1', '', '', '', ''),
(5039, 'Métiers de l\'informatique: conception, développement et tests logiciels', 16, 283, 5, 11, '11', 3, 11, '1', '', '', '', ''),
(5040, 'Métiers du BTP : Bâtiment et construction', 16, 284, 5, 11, '11', 3, 16, '1', '1', '7 à 8 sem - janv à févr et avr à mai', '', ''),
(5041, 'Administration et sécurité des systèmes et des réseaux', 16, 285, 5, 11, '11', 3, 16, '1', '1', '16 sem - févr à juin (en formation continue)', '', ''),
(5042, 'Electricité et électronique', 16, 286, 5, 11, '11', 3, 16, '1', '1', '', '', ''),
(5043, 'Maintenance et technologie : systèmes pluritechniques', 16, 287, 5, 11, '11', 3, 16, '0', '1', '17 sem - fév à juin', '', ''),
(5044, 'Maintenance et technologie : systèmes pluritechniques', 16, 288, 5, 11, '11', 3, 16, '1', '1', '17 sem - fév à juin', '', ''),
(5045, 'Chimie', 9, 289, 5, 12, '12', 3, 1, '0', '0', '', '', ''),
(5046, 'Chimie', 9, 212, 5, 13, '13', 3, 1, '0', '0', '', '', ''),
(5047, 'Chimie', 9, 212, 5, 14, '14', 3, 1, '0', '0', '8 sem - avril à juin', '', ''),
(5048, 'Chimie', 9, 241, 5, 13, '13', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5049, 'Chimie', 9, 241, 5, 14, '14', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5050, 'Chimie ', 9, 290, 5, 16, '16', 3, 1, '0', '0', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5051, 'Chimie ', 9, 291, 5, 16, '16', 3, 1, '0', '1', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5052, 'Mathématiques', 9, 292, 5, 13, '13', 3, 1, '0', '0', '', '', ''),
(5053, 'Mathématiques', 9, 292, 5, 14, '14', 3, 1, '0', '0', '8 sem - de mars à avril et de mai à juin', '', ''),
(5054, 'Mathématiques', 9, 241, 5, 13, '13', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5055, 'Mathématiques', 9, 241, 5, 14, '14', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5056, 'Mathématiques et informatique', 9, 293, 5, 18, '18', 3, 1, '0', '1', '8 sem - avril à juin en 3ème année', '', ''),
(5057, 'Mathématiques et physique', 9, 294, 5, 18, '18', 3, 1, '0', '1', '8 sem - avril à juin en 3ème année', '', ''),
(5058, 'Informatique', 9, 295, 5, 12, '12', 3, 1, '0', '0', '', '', ''),
(5059, 'Informatique', 9, 212, 5, 13, '13', 3, 1, '0', '0', '', '', ''),
(5060, 'Informatique', 9, 212, 5, 14, '14', 3, 1, '0', '0', '8 sem - avril à juin', '', ''),
(5061, 'Informatique', 9, 241, 5, 13, '13', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5062, 'Informatique', 9, 241, 5, 14, '14', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5063, 'Sciences pour l\'ingénieur', 9, 289, 5, 12, '12', 3, 1, '0', '0', '', '', ''),
(5064, 'Sciences pour l\'ingénieur', 9, 212, 5, 13, '13', 3, 1, '0', '0', '', '', ''),
(5065, 'Sciences pour l\'ingénieur', 9, 212, 5, 14, '14', 3, 1, '1', '0', '8 sem - avril à juin ', '', ''),
(5066, 'Sciences pour l\'ingénieur', 9, 296, 5, 14, '14', 3, 1, '1', '0', '8 sem - avril à juin ', '', ''),
(5067, 'Sciences pour l\'ingénieur', 9, 297, 5, 14, '14', 3, 1, '1', '0', '8 sem - avril à juin ', '', ''),
(5068, 'Sciences pour l\'ingénieur', 9, 298, 5, 14, '14', 3, 1, '1', '0', '8 sem - avril à juin ', '', ''),
(5069, 'Physique', 9, 212, 5, 13, '13', 3, 1, '0', '0', '', '', ''),
(5070, 'Physique', 9, 212, 5, 14, '14', 3, 1, '0', '0', '8 sem - avril à juin ', '', ''),
(5071, 'Physique', 9, 241, 5, 13, '13', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5072, 'Physique', 9, 241, 5, 14, '14', 3, 1, '0', '0', 'Stages MEEF', '', ''),
(5073, 'Sciences de la vie et de la terre', 9, 299, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5074, 'Sciences de la vie et de la terre', 9, 300, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5075, 'Sciences de la vie et de la terre', 9, 301, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5076, 'Sciences de la vie et de la terre', 9, 302, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5077, 'Sciences de la vie et de la terre', 9, 303, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5078, 'Sciences de la vie et de la terre', 9, 304, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5079, 'Sciences de la vie et de la terre', 9, 305, 5, 16, '16', 3, 1, '0', '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', ''),
(5080, 'Diplôme d\'accès aux études universitaires ', 6, 306, 5, 19, '19', 4, 1, '0', '1', '', '', ''),
(5081, 'Diplôme d\'accès aux études universitaires ', 16, 306, 5, 19, '19', 4, 16, '0', '1', '', '', ''),
(5082, 'Langues étrangères appliquées (LEA)', 6, 307, 5, 16, '16', 4, 1, '0', '0', '13 sem min en L3 - mai à juil', '', ''),
(5083, 'Langues étrangères appliquées (LEA)', 6, 308, 5, 16, '16', 4, 1, '0', '0', '13 sem min en L3 - mai à juil', '', ''),
(5084, 'Langues étrangères appliquées (LEA)', 6, 308, 5, 16, '16', 4, 16, '0', '0', '13 sem min en L3 - mai à juil', '', ''),
(5085, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 212, 5, 16, '16', 4, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5086, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 235, 5, 16, '16', 4, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5087, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 309, 5, 16, '16', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(5088, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 234, 5, 16, '16', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(5089, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 6, 212, 5, 16, '16', 4, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5090, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 0, 235, 5, 16, '16', 4, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5091, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 0, 309, 5, 16, '16', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(5092, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 6, 234, 5, 16, '16', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(5093, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - ANGLAIS', 6, 310, 5, 16, '16', 4, 0, '0', '0', '', '', ''),
(5094, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 212, 5, 16, '16', 4, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5095, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 235, 5, 16, '16', 4, 0, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5096, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 311, 5, 16, '16', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(5097, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 312, 5, 16, '16', 4, 0, '0', '0', '', '', ''),
(5098, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 310, 5, 16, '16', 4, 0, '0', '0', '', '', ''),
(5099, 'Lettres', 6, 313, 5, 16, '16', 4, 1, '0', '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', ''),
(5100, 'Lettres', 6, 235, 5, 16, '16', 4, 0, '', '', '', '', ''),
(5101, 'Lettres', 6, 309, 5, 16, '16', 4, 1, '0', '0', 'Stages MEEF', '', ''),
(5102, 'Lettres', 6, 314, 5, 14, '14', 4, 1, '0', '1', '12 sem - mars à juin', '', ''),
(5103, 'Lettres', 6, 315, 5, 14, '14', 4, 1, '0', '1', '12 sem - mars à juin', '', ''),
(5104, 'Métiers de la forme', 8, 316, 5, 20, '20', 2, 2, '0', '1', 'stage filé 200h par an oct à mai', '', ''),
(5105, 'Diplôme d\'accès aux études universitaires ', 9, 317, 5, 21, '21', 3, 1, '0', '1', '', '', ''),
(5106, '0', 1, 233, 4, 19, 'Annee 1', 4, 18, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historique_t`
--

CREATE TABLE `historique_t` (
  `id_histo` int(11) NOT NULL,
  `id_entity` int(11) NOT NULL,
  `old_value` varchar(150) NOT NULL,
  `new_value` varchar(150) DEFAULT NULL,
  `nom_table` varchar(150) NOT NULL,
  `nom_champ` varchar(150) NOT NULL,
  `date_modif` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique_t`
--

INSERT INTO `historique_t` (`id_histo`, `id_entity`, `old_value`, `new_value`, `nom_table`, `nom_champ`, `date_modif`, `id_user`) VALUES
(24, 1, '1er degré, professeur des écolesqsdfqsdf', '1er degré, professeur des écoles', 'filiere', 'nom', '2017-07-23 00:00:00', 1),
(23, 1, '1', NULL, 'filiere', 'id', '2017-07-23 00:00:00', 1),
(22, 1, '0', NULL, 'filiere', 'nbre_modif', '2017-07-23 00:00:00', 1),
(21, 1, '1er degré, professeur des écoles', '1er degré, professeur des écolesqsdfqsdf', 'filiere', 'nom', '2017-07-23 00:00:00', 1),
(20, 4702, '1', '16', 'formation', 'id_diplome', '2017-07-23 00:00:00', 1),
(19, 4702, 'Philosophiedqsf', 'Philosophie', 'formation', 'libelle', '2017-07-23 00:00:00', 1),
(18, 4702, 'Philosophiedqsf', 'Philosophie', 'formation', 'libelle', '2017-07-23 00:00:00', 1),
(17, 4702, 'Philosophiedqsf', 'Philosophie', 'formation', 'libelle', '2017-07-23 00:00:00', 1),
(16, 4702, 'Philosophie', 'Philosophiedqsf', 'formation', 'libelle', '2017-07-23 00:00:00', 1),
(25, 1, '1er degré, professeur des écoles', '1er degré, professeur des écolesfqdsfef', 'filiere', 'nom', '2017-07-23 00:00:00', 1),
(26, 1, '1er degré, professeur des écolesfqdsfef', '1er degré, professeur des écoles', 'filiere', 'nom', '2017-07-23 00:00:00', 1),
(27, 4702, '16', '1', 'formation', 'id_diplome', '2017-07-23 02:35:29', 1),
(28, 4702, '4|SEM|1&2|OPT', '4|SEM|1&2|OBL', 'formation', 'regex_stage', '2017-07-23 02:43:10', 1),
(29, 4704, '3', '0', 'formation', 'niveau', '2017-07-23 02:49:20', 1),
(30, 4704, '5', '4', 'formation', 'id_type_formation', '2017-07-23 02:49:20', 1),
(31, 4704, '3', '0', 'formation', 'niveau', '2017-07-23 02:54:09', 1),
(32, 4704, '5', '4', 'formation', 'id_type_formation', '2017-07-23 02:54:09', 1),
(33, 4704, '3', '0', 'formation', 'niveau', '2017-07-23 02:55:04', 1),
(34, 4704, '5', '4', 'formation', 'id_type_formation', '2017-07-23 02:55:04', 1),
(35, 4700, '5', '4', 'formation', 'id_type_formation', '2017-07-23 11:15:28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `nom_niveau` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id`, `nom_niveau`) VALUES
(0, 'NON DEFINI'),
(3, 'Bac+1'),
(4, 'Bac+2'),
(5, 'Bac+3'),
(6, 'Bac+4'),
(7, 'Bac+5'),
(8, 'Bac+6'),
(9, 'Bacc+7'),
(10, 'Bacc+8');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `userId` varchar(45) DEFAULT NULL,
  `body` varchar(320) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rd_formation`
--

CREATE TABLE `rd_formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `id_composante` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_type_formation` int(11) NOT NULL,
  `id_diplome` int(11) NOT NULL,
  `niveau` varchar(150) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `id_rythme` int(11) NOT NULL,
  `nbre_entreprise` int(11) NOT NULL DEFAULT '0',
  `nbre_ecole` int(11) NOT NULL DEFAULT '0',
  `nbre_semaine` int(11) NOT NULL DEFAULT '0',
  `debut_stage` varchar(150) DEFAULT NULL,
  `fin_stage` varchar(150) DEFAULT NULL,
  `id_type_stage` int(11) DEFAULT '0',
  `est_alternance` int(11) DEFAULT NULL,
  `recrutement_particulier` varchar(150) DEFAULT NULL,
  `detail_stage` varchar(150) DEFAULT NULL,
  `detail_alt` varchar(150) NOT NULL,
  `regex_alternance` varchar(150) DEFAULT NULL,
  `regex_stage` varchar(150) DEFAULT NULL,
  `nbre_modif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rd_formation`
--

INSERT INTO `rd_formation` (`id`, `libelle`, `id_composante`, `id_filiere`, `id_type_formation`, `id_diplome`, `niveau`, `id_domaine`, `id_site`, `id_rythme`, `nbre_entreprise`, `nbre_ecole`, `nbre_semaine`, `debut_stage`, `fin_stage`, `id_type_stage`, `est_alternance`, `recrutement_particulier`, `detail_stage`, `detail_alt`, `regex_alternance`, `regex_stage`, `nbre_modif`) VALUES
(0, 'Philosophietezqsdf', 6, 3, 5, 1, '0', 2, 1, 0, 0, 0, 0, 'Janvier', 'Avril', 0, 0, '1', '24 sem au premier ou deuxième semestre', '', '', '4|SEM|1&2|OPT', 0),
(4700, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 1, 4, 1, '0', 2, 6, 0, 0, 0, 0, '', '', 0, 0, '1', 'Stages MEEF', '', '', '', 1),
(4702, 'Philosophie', 6, 3, 5, 1, '0', 2, 1, 0, 0, 0, 0, 'Janvier', 'Avril', 0, 0, '1', '24 sem au premier ou deuxième semestre', '', '', '4|SEM|1&2|OBL', 4),
(4703, 'Géographie et aménagement ', 6, 4, 5, 2, '2', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '24 sem - fév à juill', '', '', '', 0),
(4704, 'Géographie et aménagement ', 6, 4, 4, 3, '0', 2, 1, 0, 0, 0, 0, '', '', 0, 0, '1', '24 sem - fév à juill', '', '', '', 6),
(4705, 'Géographie et aménagement ', 6, 5, 5, 2, '2', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '24 sem - fév à juill', '', '', '', 0),
(4706, 'Géographie et aménagement ', 6, 5, 5, 3, '3', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '24 sem - fév à juill', '', '', '', 0),
(4707, 'Géographie et aménagement ', 11, 6, 5, 2, '2', 2, 12, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '3 mois - fév à juin', '', '', '', 0),
(4708, 'Géographie et aménagement ', 11, 7, 5, 3, '3', 2, 12, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '5-6 mois - fév à juil', '', '', '', 0),
(4709, 'Géographie et aménagement ', 6, 8, 5, 2, '2', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '24 sem - fév à juill', '', '', '', 0),
(4710, 'Géographie et aménagement ', 6, 8, 5, 3, '3', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '24 sem - fév à juill', '', '', '', 0),
(4711, 'Histoire', 6, 9, 5, 2, '2', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(4712, 'Histoire', 6, 10, 5, 3, '3', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '22 sem - fév à juin', '', '', '', 0),
(4713, 'Histoire', 6, 11, 5, 3, '3', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '21 sem - fév à juil', '', '', '', 0),
(4714, 'Histoire', 6, 12, 5, 3, '3', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '26 sem - fév à sept', '', '', '', 0),
(4715, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 13, 5, 1, '1', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4716, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 14, 5, 1, '1', 2, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4717, 'Information-communication', 6, 15, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '16 sem min - nov à fév en 2ème année', '', '', '', 0),
(4718, 'Sciences de l\'Education ', 8, 16, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 - 14 sem - mars à juin\nM2 - 14 sem - mars à juin', '', '', '', 0),
(4719, 'Sciences de l\'Education ', 8, 17, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 - 6 sem - mars à avr\nM2 - 16 sem - févr à juin', '', '', '', 0),
(4720, 'Sciences de l\'Education ', 8, 18, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 - 6 sem - mars à avr\nM2 - 16 sem - févr à juin', '', '', '', 0),
(4721, 'Sciences de l\'Education ', 8, 19, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 - 6 sem - mars à avr\nM2 - 16 sem - févr à juin', '', '', '', 0),
(4722, 'Intervention et développement social', 8, 20, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4723, 'Intervention et développement social', 8, 21, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4724, 'Sciences sociales ', 8, 22, 5, 1, '1', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '16 sem - févr à juin', '', '', '', 0),
(4725, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 23, 5, 1, '1', 2, 6, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4726, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 24, 5, 1, '1', 2, 6, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'Stages MEEF', '', '', '', 0),
(4727, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF) 2nd degré', 8, 25, 5, 1, '1', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4728, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF) Pratique et ingénieurie de formation', 8, 26, 5, 1, '1', 2, 6, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4729, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF) Pratique et ingénieurie de formation', 2, 27, 5, 1, '1', 2, 6, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'Stages MEEF', '', '', '', 0),
(4730, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 28, 5, 1, '1', 2, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 - 12 sem -  févr à mai\nM2 - 23 sem janv à juil', '', '', '', 0),
(4731, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 29, 5, 1, '1', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 - 8 sem janv-mars\nM2 - stage filé de 126 hres min', '', '', '', 0),
(4732, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 30, 5, 3, '3', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '2-3 mois - janv à avril', '', '', '', 0),
(4733, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 8, 31, 5, 1, '1', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4734, 'Sciences du sport et entrainement', 8, 32, 5, 1, '1', 3, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 -20 sem - janv à juin\nM2 - 19 sem -  janv à juin', '', '', '', 0),
(4735, 'Urbanisme et aménagement', 14, 33, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stage de 4 à 6 mois - mais à août', '', '', '', 0),
(4736, 'Urbanisme et aménagement', 14, 34, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stage de 4 à 6 mois - sept à avril', '', '', '', 0),
(4737, 'Urbanisme et aménagement', 14, 35, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(4738, 'Urbanisme et aménagement', 14, 36, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stage de 4 à 6 mois dès avril', '', '', '', 0),
(4739, 'Urbanisme et aménagement', 14, 37, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '', 'Stage de 4 à 6 mois dès avril', '', '', '', 0),
(4740, 'Urbanisme et aménagement', 14, 38, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stage de 4 à 6 mois dès avril', '', '', '', 0),
(4741, 'Urbanisme et aménagement', 14, 39, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'Stage de 4 à 6 mois dès avril', '', '', '', 0),
(4742, 'Urbanisme et aménagement', 14, 40, 5, 1, '1', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4743, 'Urbanisme et aménagement', 14, 41, 5, 3, '3', 2, 13, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 à 6 mois mars à sept', '', '', '', 0),
(4744, 'Administration et échanges internationaux', 4, 42, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '4-7 mois fév à sept', '', '', '', 0),
(4745, 'Administration et échanges internationaux', 4, 43, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4746, 'Administration et échanges internationaux', 4, 44, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4747, 'Administration et échanges internationaux', 4, 45, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4748, 'Administration et échanges internationaux', 4, 46, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4749, 'Politiques publiques', 4, 47, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4750, 'Politiques publiques', 4, 48, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4751, 'Management international des territoires Gestion des territoires et développement local', 4, 49, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4752, 'Management international des territoires Gestion des territoires et et développement local', 4, 50, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M 1 - 4-6 mois janv à sept\nM2 - 2-3 mois nov à janv et 5-6 mois juin à déc', '', '', '', 0),
(4753, 'Management et commerce international', 4, 51, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', '', '', 0),
(4754, 'Management et commerce international', 4, 52, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', '', '', 0),
(4755, 'Management et commerce international', 4, 53, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', '', '', 0),
(4756, 'Management et commerce international', 4, 54, 5, 1, '1', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 : février à décembre (4 à 6 mois)\nM2 : novembre à janvier (2 à 3 mois) et juin à décembre (5 à 6 mois maximum)', '', '', '', 0),
(4757, 'Droit des affaires', 5, 55, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4758, 'Droit des affaires', 5, 56, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '4 mois - fév à juin', '', '', '', 0),
(4759, 'Droit des affaires', 5, 57, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4760, 'Droit des affaires', 5, 58, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4761, 'Droit des affaires', 5, 59, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4762, 'Droit des affaires', 5, 60, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4763, 'Droit des affaires', 5, 61, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4764, 'Droit des affaires', 5, 62, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4765, 'Droit des affaires', 5, 63, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4766, 'Droit des affaires', 5, 64, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4767, 'Droit des affaires', 5, 65, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4768, 'Droit des affaires', 5, 55, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4769, 'Droit international et européen', 5, 66, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4770, 'Droit international et europén', 5, 67, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4771, 'Droit privé', 5, 68, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin', '', '', '', 0),
(4772, 'Droit international et européen', 5, 69, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin', '', '', '', 0),
(4773, 'Droit public et droit privé', 5, 70, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4774, 'Droit public et droit privé', 5, 71, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4775, 'Droit public et droit privé', 5, 72, 5, 2, '2', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois - fév à juin', '', '', '', 0),
(4776, 'Droit public et droit privé', 5, 73, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4777, 'Droit public et droit privé', 5, 70, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4778, 'Droit public et droit privé', 5, 74, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4779, 'Droit public et droit privé', 5, 75, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4780, 'Droit privé', 5, 76, 5, 3, '3', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois - avril à juin ou juin à août', '', '', '', 0),
(4781, 'Droit du numérique', 5, 77, 5, 1, '1', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '6 mois- avril à oct', '', '', '', 0),
(4782, 'Banque et marchés financiers', 10, 78, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '6 mois - mars à août', '', '', '', 0),
(4783, 'Banque et marchés financiers', 10, 79, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4784, 'Banque et marchés financiers', 10, 80, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4785, 'Expertise économique', 10, 81, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(4786, 'Expertise économique', 10, 82, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4787, 'Expertise économique', 10, 83, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '6 mois - avril à septembre', '', '', '', 0),
(4788, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 10, 84, 5, 1, '1', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4789, 'Entrepreunariat et management de projets', 10, 85, 5, 1, '1', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4790, 'Management et administration des entreprises', 10, 86, 5, 1, '1', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 mois minimum - janv à avril', '', '', '', 0),
(4791, 'Méthodes informatiques appliquées à la gestion des entreprises (MIAGE)', 1, 87, 5, 2, '2', 1, 15, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '6 mois mars-août', '', '', '', 0),
(4792, 'Méthodes informatiques appliquées à la gestion des entreprises (MIAGE)', 1, 88, 5, 3, '3', 1, 15, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '6 mois mars-août', '', '', '', 0),
(4793, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 89, 5, 1, '1', 1, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4794, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 90, 5, 1, '1', 1, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4795, 'Comptabilité, contrôle, audit', 11, 91, 5, 1, '1', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M1 - 4 mois janv à avr\nM2 - 6 mois janv à juin', '', '', '', 0),
(4796, 'Finance', 11, 92, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '5 mois avril à août', '', '', '', 0),
(4797, 'Finance', 11, 93, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'M1 : 5 mois - avril à août', '', '', '', 0),
(4798, 'Finance', 11, 94, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M1 : 5 mois - avril à août', '', '', '', 0),
(4799, 'Finance', 11, 95, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M1 : 5 mois - avril à août', '', '', '', 0),
(4800, 'Management et conseil', 11, 96, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '5 mois - avril à août', '', '', '', 0),
(4801, 'Management et conseil', 11, 97, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois min -  mai à juil', '', '', '', 0),
(4802, 'Management et conseil', 11, 98, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4-5 mois - mars à juin', '', '', '', 0),
(4803, 'Management et conseil', 11, 99, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '4-6 mois - mars à juin', '', '', '', 0),
(4804, 'Management et conseil', 11, 100, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4805, 'Management et conseil', 11, 101, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(4806, 'Management et conseil', 11, 102, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4807, 'Management et conseil', 11, 103, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4808, 'Management et santé', 3, 104, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4809, 'Management et santé', 3, 105, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4810, 'Management et santé', 3, 106, 5, 1, '1', 1, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'uniquement en formation continue', '', '', '', 0),
(4811, 'Marketing et vente', 11, 107, 5, 2, '2', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '3 mois - mai à juil', '', '', '', 0),
(4812, 'Marketing et vente', 11, 108, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M1 : 5 mois - avril à août\nM2 : 6 mois - janv à juin', '', '', '', 0),
(4813, 'Marketing et vente', 11, 109, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', 'M1 : 4 mois - avril à juill', '', '', '', 0),
(4814, 'Marketing et vente', 11, 110, 5, 3, '3', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4815, 'Diplôme d\'ingenieur en économie et gestion', 1, 111, 5, 5, '5', 3, 15, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(4816, 'Biologie santé', 7, 112, 5, 2, '2', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '2 mois - janv à mars ou juill à août', '', '', '', 0),
(4817, 'Biologie santé', 7, 113, 5, 3, '3', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 à 10 mois (Septembre-Février) puis (Janvier-Octobre)', '', '', '', 0),
(4818, 'Biologie santé', 7, 114, 5, 3, '3', 3, 4, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '6 mois janv à juin', '', '', '', 0),
(4819, 'Biologie santé', 7, 115, 5, 3, '3', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '6 mois janv à juin', '', '', '', 0),
(4820, 'Biologie santé', 7, 116, 5, 3, '3', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '6 mois janv à août', '', '', '', 0),
(4821, 'Biologie santé', 7, 117, 5, 3, '3', 3, 4, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '6 mois janv à juill', '', '', '', 0),
(4822, 'Biologie santé', 7, 118, 5, 3, '3', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '6 mois janv à juin', '', '', '', 0),
(4823, 'Biologie santé', 7, 119, 5, 3, '3', 3, 4, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '9 à 12 mois - nov à oct', '', '', '', 0),
(4824, 'Biologie santé', 7, 120, 5, 3, '3', 3, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '26 sem - fèv à juill', '', '', '', 0),
(4825, 'Biologie santé', 7, 121, 5, 3, '3', 3, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4826, 'Biologie santé', 7, 122, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '25 sem - janv à juin', '', '', '', 0),
(4827, 'Biologie-bioressources', 9, 123, 5, 2, '2', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 sem - avril à mai', '', '', '', 0),
(4828, 'Biologie-bioressources', 9, 124, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '24 sem - fév à juil', '', '', '', 0),
(4829, 'Biologie-bioressources', 9, 125, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '23 sem - fév à juil', '', '', '', 0),
(4830, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 9, 126, 5, 1, '1', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4831, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 1, 5, 1, '1', 3, 6, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4832, 'Chimie-matériaux', 9, 127, 5, 2, '2', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4833, 'Chimie-matériaux', 9, 128, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '27 sem - janv à juill', '', '', '', 0),
(4834, 'Chimie-matériaux', 9, 129, 5, 1, '1', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4835, 'Chimie-matériaux', 9, 130, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '20 sem - févr à juin', '', '', '', 0),
(4836, 'Chimie-matériaux', 9, 131, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '21 sem - févr à juin', '', '', '', 0),
(4837, 'Chimie-matériaux', 9, 132, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4838, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 133, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4839, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 9, 134, 5, 1, '1', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4840, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 135, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4841, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 136, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4842, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 137, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4843, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 138, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4844, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 139, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4845, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 140, 5, 1, '1', 3, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4846, 'Informatique', 9, 141, 5, 2, '2', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4847, 'Informatique', 9, 142, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '19 sem - févr à juill', '', '', '', 0),
(4848, 'Informatique', 9, 143, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4849, 'Traitement du signal et des images ', 9, 144, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4850, 'Mécanique', 9, 145, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4851, 'Mathématiques et applications', 9, 146, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '3 à 6 mois avr à juill', '', '', '', 0),
(4852, 'Mathématiques et applications', 9, 147, 5, 1, '1', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4853, 'Mathématiques et applications', 9, 92, 5, 1, '1', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4854, 'Mathématiques et applications', 9, 148, 5, 1, '1', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4855, 'Sciences et génie de l\'environnement', 9, 149, 5, 2, '2', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4856, 'Sciences et génie de l\'environnement', 9, 150, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '17 sem - févr à juin', '', '', '', 0),
(4857, 'Sciences et génie de l\'environnement', 9, 151, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4858, 'Sciences et génie de l\'environnement', 9, 152, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '21 sem - mars à juill', '', '', '', 0),
(4859, 'Sciences et génie de l\'environnement', 9, 153, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '26 sem - janv à juill ', '', '', '', 0),
(4860, 'Sciences pour l\'ingénieur', 9, 154, 5, 2, '2', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4861, 'Sciences pour l\'ingénieur', 9, 155, 5, 3, '3', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '21 sem - févr à juin', '', '', '', 0),
(4862, 'Sciences pour l\'ingénieur', 9, 156, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '18 sem - janv à juin', '', '', '', 0),
(4863, 'Sciences pour l\'ingénieur', 9, 157, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '18 sem - févr à juin', '', '', '', 0),
(4864, 'Sciences pour l\'ingénieur', 9, 158, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '22 sem - mars à sept', '', '', '', 0),
(4865, 'Sciences pour l\'ingénieur', 9, 159, 5, 3, '3', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '5 mois', '', '', '', 0),
(4866, '2ème cycle des études médicales', 7, 160, 5, 6, '6', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', 'sept à août', '', '', '', 0),
(4867, '2ème cycle des études médicales', 7, 161, 5, 7, '7', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', 'sept à août', '', '', '', 0),
(4868, '2ème cycle des études médicales', 7, 162, 5, 8, '8', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', 'sept à avril et de juin à août', '', '', '', 0),
(4869, '3ème cycle (3 à 5 ans)', 7, 163, 5, 0, '#N/A', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '', 'nc', '', '', '', 0),
(4870, '3ème cycle (3 à 5 ans)', 7, 164, 5, 0, '#N/A', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 0, '', 'nc', '', '', '', 0),
(4871, 'Diplôme d\'ingénieur en biosciences', 17, 165, 5, 5, '5', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - juin à août', '', '', '', 0),
(4872, 'Diplôme d\'ingénieur en biosciences', 17, 166, 5, 5, '5', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '15 sem - mai à août', '', '', '', 0),
(4873, 'Diplôme d\'ingénieur en biosciences', 17, 167, 5, 5, '5', 3, 14, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '29 sem - févr à sept', '', '', '', 0),
(4874, 'Management international trilingue', 6, 168, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'M1 - 13 sem - mai à juill en France et à l\'international\nM2 - 26 sem - févr à août', '', '', '', 0),
(4875, 'Management international trilingue', 6, 169, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'M1 - 13 sem - mai à juill en France et à l\'international\nM2 - 26 sem - févr à août', '', '', '', 0),
(4876, 'Management international trilingue', 6, 170, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'M1 - 13 sem - mai à juill en France et à l\'international\nM2 - 26 sem - févr à août', '', '', '', 0),
(4877, 'Lettres', 6, 171, 5, 3, '3', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'optionnel ', '', '', '', 0),
(4878, 'Lettres', 6, 172, 5, 3, '3', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '18 sem min - avril à sept', '', '', '', 0),
(4879, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 173, 5, 1, '1', 4, 6, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4880, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 174, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4881, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 175, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4882, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 176, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4883, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 6, 177, 5, 1, '1', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4884, 'Métiers de l\'enseignement, de l\'éducation et de la formation (MEEF)', 2, 14, 5, 1, '1', 4, 10, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stages MEEF', '', '', '', 0),
(4885, 'Langues et cultures étrangères', 6, 178, 5, 2, '2', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4886, 'Langues et cultures étrangères', 6, 179, 5, 2, '2', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4887, 'Langues et cultures étrangères', 6, 179, 5, 3, '3', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4888, 'Langues et cultures étrangères', 6, 180, 5, 3, '3', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4889, 'Langues et cultures étrangères', 6, 181, 5, 2, '2', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4890, 'Langues et cultures étrangères', 6, 181, 5, 3, '3', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4891, 'Techniques de commercialisation', 15, 182, 5, 9, '9', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '3 sem - avril', '', '', '', 0),
(4892, 'Techniques de commercialisation', 15, 182, 5, 10, '10', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à mai', '', '', '', 0),
(4893, 'Techniques de commercialisation', 16, 182, 5, 9, '9', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '3 sem - avril', '', '', '', 0),
(4894, 'Techniques de commercialisation', 16, 182, 5, 10, '10', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à mai', '', '', '', 0),
(4895, 'Techniques de commercialisation', 16, 182, 5, 9, '9', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '2 sem - avril', '', '', '', 0),
(4896, 'Techniques de commercialisation', 16, 182, 5, 10, '10', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à août', '', '', '', 0),
(4897, 'Commerce : marketing et commercialisation', 15, 183, 5, 11, '11', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4898, 'Finance, banque, assurance', 15, 184, 5, 11, '11', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4899, 'Finance, banque, assurance', 15, 185, 5, 11, '11', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4900, 'Finance, banque, assurance', 16, 185, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4901, 'Gestion des entreprises et des administrations', 16, 186, 5, 9, '9', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4902, 'Gestion des entreprises et des administrations', 16, 186, 5, 10, '10', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '11 sem - mars à juin', '', '', '', 0),
(4903, 'Gestion des entreprises et des administrations', 16, 186, 5, 9, '9', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4904, 'Gestion des entreprises et des administrations', 16, 186, 5, 10, '10', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '11 sem - mars à juin', '', '', '', 0),
(4905, 'Gestion des entreprises et des administrations', 16, 187, 5, 9, '9', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4906, 'Gestion des entreprises et des administrations', 16, 187, 5, 10, '10', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '11 sem - mars à juin', '', '', '', 0),
(4907, 'Gestion des entreprises et des administrations', 16, 187, 5, 9, '9', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4908, 'Gestion des entreprises et des administrations', 16, 187, 5, 10, '10', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '11 sem - mars à juin', '', '', '', 0),
(4909, 'Gestion des entreprises et des administrations', 16, 188, 5, 9, '9', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4910, 'Gestion des entreprises et des administrations', 16, 188, 5, 10, '10', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '11 sem - mars à juin', '', '', '', 0),
(4911, 'Gestion des entreprises et des administrations', 16, 188, 5, 9, '9', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4912, 'Gestion des entreprises et des administrations', 16, 188, 5, 10, '10', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '11 sem - mars à juin', '', '', '', 0),
(4913, 'Métiers de la comptabilité et de la gestion', 16, 189, 5, 11, '11', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4914, 'Commerce : marketing et commercialisation', 16, 190, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4915, 'Commerce : marketing et commercialisation', 16, 183, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4916, 'Commerce : marketing et commercialisation', 16, 183, 5, 11, '11', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4917, 'E-commerce et marketing numérique', 16, 191, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(4918, 'Organisation et gestion des établissements hôteliers et de la restauration', 16, 192, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4919, 'Métiers du marketing opérationnel', 16, 193, 5, 11, '11', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(4920, 'Gestion des ressources humaines', 16, 194, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '26 sem - mars à août', '', '', '', 0),
(4921, 'Gestion des ressources humaines', 16, 195, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '20 sem - mars à août', '', '', '', 0),
(4922, 'Logistiques', 16, 196, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '16 sem - mars à juin', '', '', '', 0),
(4923, 'Management de la qualité dans les organisations', 16, 197, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4924, 'Administration et échanges internationaux', 4, 198, 5, 12, '12', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4925, 'Administration et échanges internationaux', 4, 198, 5, 13, '13', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', '', '', 0),
(4926, 'Administration et échanges internationaux', 4, 199, 5, 13, '13', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', '', '', 0),
(4927, 'Administration et échanges internationaux', 4, 200, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '3 à 4 mois mai à sept ', '', '', '', 0),
(4928, 'Administration et échanges internationaux', 4, 201, 5, 13, '13', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', '', '', 0),
(4929, 'Administration et échanges internationaux', 4, 202, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '3 à 4 mois mai à sept ', '', '', '', 0),
(4930, 'Administration et échanges internationaux', 4, 203, 5, 13, '13', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage optionnel 2 à 3 mois - de mi-janv à sept', '', '', '', 0),
(4931, 'Administration et échanges internationaux', 4, 203, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '3 à 4 mois mai à sept ', '', '', '', 0),
(4932, 'Administration et échanges internationaux', 4, 204, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept en L3', '', '', '', 0),
(4933, 'Administration et échanges internationaux', 4, 205, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept en L3', '', '', '', 0),
(4934, 'Administration et échanges internationaux', 4, 206, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept en L3', '', '', '', 0),
(4935, 'Administration et échanges internationaux', 4, 207, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept en L3', '', '', '', 0),
(4936, 'Administration et échanges internationaux', 4, 208, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept en L3', '', '', '', 0),
(4937, 'Administration publique', 13, 209, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept ', '', '', '', 0),
(4938, 'Administration publique', 13, 210, 5, 14, '14', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 à 4 mois mai à sept ', '', '', '', 0),
(4939, 'Droit', 5, 211, 5, 15, '15', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4940, 'Droit', 5, 212, 5, 16, '16', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '16 sem', '', '', '', 0),
(4941, 'Droit', 5, 213, 5, 16, '16', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '16 sem', '', '', '', 0),
(4942, 'Droit', 5, 214, 5, 16, '16', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '16 sem', '', '', '', 0),
(4943, 'Droit', 5, 215, 5, 16, '16', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4944, 'Activités juridiques', 5, 216, 5, 11, '11', 1, 17, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '16 sem - janv à août', '', '', '', 0),
(4945, 'Activités juridiques', 5, 217, 5, 11, '11', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '12 sem', '', '', '', 0),
(4946, 'Activités juridiques', 5, 218, 5, 11, '11', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4947, 'Economie et gestion', 10, 212, 5, 13, '13', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage facultatif filé le nom de l\'année universitaire', '', '', '', 0),
(4948, 'Economie et gestion', 11, 219, 5, 16, '16', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '3 mois', '', '', '', 0),
(4949, 'Economie et gestion', 11, 219, 5, 16, '16', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(4950, 'Economie et gestion', 10, 220, 5, 12, '12', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4951, 'Economie et gestion', 10, 221, 5, 13, '13', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4952, 'Economie et gestion', 11, 91, 5, 14, '14', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '8 sem - de fév à avril', '', '', '', 0),
(4953, 'Economie et gestion', 11, 222, 5, 14, '14', 1, 18, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '8 sem min à partir de avril', '', '', '', 0),
(4954, 'Commerce international', 16, 223, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '20 sem - mars à août', '', '', '', 0),
(4955, 'Commerce international', 16, 224, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '20 sem - mars à août', '', '', '', 0),
(4956, 'Commerce international', 16, 225, 5, 11, '11', 1, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '20 sem - mars à août', '', '', '', 0),
(4957, 'Carrières sociales', 16, 226, 5, 17, '17', 2, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '12 sem -  mars à juin en 2ème année', '', '', '', 0),
(4958, 'Intervention sociale', 16, 227, 5, 11, '11', 2, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(4959, 'Intervention sociale', 16, 227, 5, 11, '11', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '16 sem', '', '', '', 0),
(4960, 'Gestion des Organisations de l\'Economie Solciale et Solidaire', 16, 228, 5, 11, '11', 1, 11, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '4 et 12 sem - du 13 au 28 févr et du 17 mars au 20 juin', '', '', '', 0),
(4961, 'Intervention sociale : accompagnement social', 2, 229, 5, 11, '11', 2, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '30 sem - sept à juin', '', '', '', 0),
(4962, 'Métiers de la communication : Chargé de communication', 6, 230, 5, 11, '11', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(4963, 'Géographie et aménagement', 6, 231, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4964, 'Géographie et aménagement', 6, 232, 5, 14, '14', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'Stage filé le long de l\'année (optionnel)', '', '', '', 0),
(4965, 'Géographie et aménagement', 6, 233, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4966, 'Géographie et aménagement', 6, 234, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4967, 'Géographie et aménagement', 6, 235, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4968, 'Géographie et aménagement', 6, 236, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stage optionnel en L2 ou L3 : soit entre L2 et L3, soit sous forme de stage filé en L3. Pour les parcours optionnels enseignement du 1er et du 2nd deg', '', '', '', 0),
(4969, 'Géographie et aménagement', 6, 237, 5, 11, '11', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '17 sem - avril à juill', '', '', '', 0),
(4970, 'Double licence Histoire-Géographie', 6, 238, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4971, 'Double licence Histoire-Anglais', 6, 239, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4972, 'Double licence Histoire-Espagnol', 6, 240, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4973, 'Histoire', 6, 9, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4974, 'Histoire', 6, 233, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4975, 'Histoire', 6, 234, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4976, 'Histoire', 6, 241, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4977, 'Philosophie', 6, 242, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4978, 'Philosophie', 6, 233, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4979, 'Philosophie', 6, 235, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4980, 'Double licence Histoire-Philosophie', 6, 244, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4981, 'Double licence Médecine-Philosophie', 6, 244, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4982, 'Histoire', 6, 243, 5, 18, '18', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4983, 'Histoire', 6, 239, 5, 18, '18', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4984, 'Histoire', 6, 240, 5, 18, '18', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4985, 'Double licence Histoire - Lettres', 6, 244, 5, 18, '18', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(4986, 'Sciences de l\'éducation', 8, 212, 5, 12, '12', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4987, 'Sciences de l\'éducation', 8, 245, 5, 16, '16', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(4988, 'Sciences de l\'éducation', 8, 246, 5, 13, '13', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(4989, 'Sciences de l\'éducation', 8, 246, 5, 14, '14', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '6 sem - mars à avr', '', '', '', 0),
(4990, 'Sciences de l\'éducation', 8, 247, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4991, 'Sciences de l\'éducation', 8, 248, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4992, 'Sciences de l\'éducation', 8, 249, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4993, 'Sciences de l\'éducation', 8, 250, 5, 16, '16', 2, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(4994, 'Sciences de l\'éducation', 8, 251, 5, 14, '14', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4995, 'Sciences de l\'éducation', 8, 252, 5, 14, '14', 2, 3, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '', '', '', '', 0),
(4996, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 12, '12', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'projet d\'étude filé (semestre 2)', '', '', '', 0),
(4997, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 12, '12', 2, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'projet d\'étude filé (semestre 2)', '', '', '', 0),
(4998, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 13, '13', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage filé nov-avril', '', '', '', 0),
(4999, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 212, 5, 13, '13', 2, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage filé nov-avril', '', '', '', 0),
(5000, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 253, 5, 14, '14', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stage filé nov-avril', '', '', '', 0),
(5001, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 254, 5, 14, '14', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stage filé oct-mars', '', '', '', 0),
(5002, 'Sciences et techniques des activités physiques et sportives (STAPS)', 8, 255, 5, 14, '14', 2, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '8 sem mars-mai', '', '', '', 0),
(5003, 'Santé', 8, 256, 5, 11, '11', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '8 sem - mars à mai / projet tutoré filé de oct à mars ', '', '', '', 0),
(5004, 'Chimie', 15, 257, 5, 9, '9', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5005, 'Chimie', 15, 257, 5, 10, '10', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '11 sem - avril à juin', '', '', '', 0),
(5006, 'Réseaux et télécommunications', 15, 258, 5, 9, '9', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5007, 'Réseaux et télécommunications', 15, 258, 5, 10, '10', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '10 sem - avril à juin', '', '', '', 0),
(5008, 'Génie biologique', 15, 259, 5, 17, '17', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '10 sem - avril à juin en 2ème année', '', '', '', 0),
(5009, 'Génie biologique', 15, 260, 5, 17, '17', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '10 sem - avril à juin en 2ème année', '', '', '', 0),
(5010, 'Génie biologique', 15, 261, 5, 17, '17', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '21 sem - avril à août en 2ème année', '', '', '', 0),
(5011, 'Mesures physiques', 15, 262, 5, 9, '9', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(5012, 'Mesures physiques', 15, 262, 5, 10, '10', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '10 sem - avril à juin', '', '', '', 0),
(5013, 'Génie électrique et informatique industrielle', 15, 263, 5, 9, '9', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(5014, 'Génie électrique et informatique industrielle', 15, 263, 5, 10, '10', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '10 sem - avril à juin', '', '', '', 0),
(5015, 'Industrie agroalimentaires : gestion, production et valorisation', 15, 264, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5016, 'Métiers de l\'énergetique, de l\'environnement et du génie climatique ', 15, 265, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5017, 'Réseaux et télécommunications', 15, 266, 5, 11, '11', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '17 sem - fév à juin', '', '', '', 0),
(5018, 'Réseaux et télécommunications', 15, 267, 5, 11, '11', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '17 sem - fév à juin', '', '', '', 0),
(5019, 'Réseaux et télécommunications', 15, 268, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5020, 'Réseaux et télécommunications', 15, 269, 5, 11, '11', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '17 sem - fév à juin', '', '', '', 0),
(5021, 'Commerce : marketing et commercialisation', 15, 270, 5, 11, '11', 1, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5022, 'Electricité et électronique', 15, 271, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5023, 'Production industrielle', 15, 272, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5024, 'Transformation des métaux', 15, 273, 5, 11, '11', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5025, 'Industries chimiques, cosmétiques et pharmaceutiques', 15, 274, 5, 11, '11', 3, 20, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '16 sem - fév à juin', '', '', '', 0),
(5026, 'Industries chimiques, cosmétiques et pharmaceutiques', 15, 275, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5027, 'Domotique, Immotique et Autonomie', 15, 276, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(5028, 'Génie électrique et informatique industrielle', 16, 263, 5, 9, '9', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(5029, 'Génie électrique et informatique industrielle', 16, 263, 5, 10, '10', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '10 sem - avril à juin', '', '', '', 0),
(5030, 'Génie industriel et maintenance', 16, 277, 5, 9, '9', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5031, 'Génie industriel et maintenance', 16, 277, 5, 10, '10', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '10 sem - avril à juin', '', '', '', 0),
(5032, 'Informatique', 16, 141, 5, 9, '9', 3, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5033, 'Informatique', 16, 141, 5, 10, '10', 3, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '10 sem - mars à juin', '', '', '', 0),
(5034, 'Automatique et informatique industrielle', 16, 278, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '16 sem -  fév à juin', '', '', '', 0),
(5035, 'Automatique et informatique industrielle', 16, 279, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '17 sem -  fév à juin', '', '', '', 0),
(5036, 'Maîtrise de l\'énergie, électricité et développement durable', 15, 280, 5, 11, '11', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(5037, 'Métiers de l\'informatique: administration et sécurité des systèmes et des réseaux', 16, 281, 5, 11, '11', 3, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(5038, 'Métiers de l\'informatique: conception, développement et tests logiciels', 16, 282, 5, 11, '11', 3, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(5039, 'Métiers de l\'informatique: conception, développement et tests logiciels', 16, 283, 5, 11, '11', 3, 11, 0, 0, 0, 0, NULL, NULL, 0, 1, '', '', '', '', '', 0),
(5040, 'Métiers du BTP : Bâtiment et construction', 16, 284, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '7 à 8 sem - janv à févr et avr à mai', '', '', '', 0),
(5041, 'Administration et sécurité des systèmes et des réseaux', 16, 285, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '16 sem - févr à juin (en formation continue)', '', '', '', 0),
(5042, 'Electricité et électronique', 16, 286, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '', '', '', '', 0),
(5043, 'Maintenance et technologie : systèmes pluritechniques', 16, 287, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '17 sem - fév à juin', '', '', '', 0);
INSERT INTO `rd_formation` (`id`, `libelle`, `id_composante`, `id_filiere`, `id_type_formation`, `id_diplome`, `niveau`, `id_domaine`, `id_site`, `id_rythme`, `nbre_entreprise`, `nbre_ecole`, `nbre_semaine`, `debut_stage`, `fin_stage`, `id_type_stage`, `est_alternance`, `recrutement_particulier`, `detail_stage`, `detail_alt`, `regex_alternance`, `regex_stage`, `nbre_modif`) VALUES
(5044, 'Maintenance et technologie : systèmes pluritechniques', 16, 288, 5, 11, '11', 3, 16, 0, 0, 0, 0, NULL, NULL, 0, 1, '1', '17 sem - fév à juin', '', '', '', 0),
(5045, 'Chimie', 9, 289, 5, 12, '12', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5046, 'Chimie', 9, 212, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5047, 'Chimie', 9, 212, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 sem - avril à juin', '', '', '', 0),
(5048, 'Chimie', 9, 241, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5049, 'Chimie', 9, 241, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5050, 'Chimie ', 9, 290, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5051, 'Chimie ', 9, 291, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5052, 'Mathématiques', 9, 292, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5053, 'Mathématiques', 9, 292, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 sem - de mars à avril et de mai à juin', '', '', '', 0),
(5054, 'Mathématiques', 9, 241, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5055, 'Mathématiques', 9, 241, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5056, 'Mathématiques et informatique', 9, 293, 5, 18, '18', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '8 sem - avril à juin en 3ème année', '', '', '', 0),
(5057, 'Mathématiques et physique', 9, 294, 5, 18, '18', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '8 sem - avril à juin en 3ème année', '', '', '', 0),
(5058, 'Informatique', 9, 295, 5, 12, '12', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5059, 'Informatique', 9, 212, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5060, 'Informatique', 9, 212, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 sem - avril à juin', '', '', '', 0),
(5061, 'Informatique', 9, 241, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5062, 'Informatique', 9, 241, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5063, 'Sciences pour l\'ingénieur', 9, 289, 5, 12, '12', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5064, 'Sciences pour l\'ingénieur', 9, 212, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5065, 'Sciences pour l\'ingénieur', 9, 212, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à juin ', '', '', '', 0),
(5066, 'Sciences pour l\'ingénieur', 9, 296, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à juin ', '', '', '', 0),
(5067, 'Sciences pour l\'ingénieur', 9, 297, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à juin ', '', '', '', 0),
(5068, 'Sciences pour l\'ingénieur', 9, 298, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 1, '0', '8 sem - avril à juin ', '', '', '', 0),
(5069, 'Physique', 9, 212, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5070, 'Physique', 9, 212, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '8 sem - avril à juin ', '', '', '', 0),
(5071, 'Physique', 9, 241, 5, 13, '13', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5072, 'Physique', 9, 241, 5, 14, '14', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5073, 'Sciences de la vie et de la terre', 9, 299, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5074, 'Sciences de la vie et de la terre', 9, 300, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5075, 'Sciences de la vie et de la terre', 9, 301, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5076, 'Sciences de la vie et de la terre', 9, 302, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5077, 'Sciences de la vie et de la terre', 9, 303, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5078, 'Sciences de la vie et de la terre', 9, 304, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5079, 'Sciences de la vie et de la terre', 9, 305, 5, 16, '16', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '8 sem - avril à juin en 3ème année, à l\'étranger', '', '', '', 0),
(5080, 'Diplôme d\'accès aux études universitaires ', 6, 306, 5, 19, '19', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(5081, 'Diplôme d\'accès aux études universitaires ', 16, 306, 5, 19, '19', 4, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(5082, 'Langues étrangères appliquées (LEA)', 6, 307, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '13 sem min en L3 - mai à juil', '', '', '', 0),
(5083, 'Langues étrangères appliquées (LEA)', 6, 308, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '13 sem min en L3 - mai à juil', '', '', '', 0),
(5084, 'Langues étrangères appliquées (LEA)', 6, 308, 5, 16, '16', 4, 16, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '13 sem min en L3 - mai à juil', '', '', '', 0),
(5085, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 212, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5086, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 235, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5087, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 309, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5088, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Allemand', 6, 234, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5089, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 6, 212, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5090, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 0, 235, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5091, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 0, 309, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5092, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Anglais', 6, 234, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5093, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - ANGLAIS', 6, 310, 5, 16, '16', 4, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5094, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 212, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5095, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 235, 5, 16, '16', 4, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5096, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 311, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5097, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 312, 5, 16, '16', 4, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5098, 'Langues, littératures et civilisations étrangères et régionales (LLCER) - Espagnol', 6, 310, 5, 16, '16', 4, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', '', '', '', '', 0),
(5099, 'Lettres', 6, 313, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'stages optionnels : 4 sem entre la L2 et  la L3 ou stage filé en L3', '', '', '', 0),
(5100, 'Lettres', 6, 235, 5, 16, '16', 4, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', 0),
(5101, 'Lettres', 6, 309, 5, 16, '16', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '0', 'Stages MEEF', '', '', '', 0),
(5102, 'Lettres', 6, 314, 5, 14, '14', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '12 sem - mars à juin', '', '', '', 0),
(5103, 'Lettres', 6, 315, 5, 14, '14', 4, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '12 sem - mars à juin', '', '', '', 0),
(5104, 'Métiers de la forme', 8, 316, 5, 20, '20', 2, 2, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', 'stage filé 200h par an oct à mai', '', '', '', 0),
(5105, 'Diplôme d\'accès aux études universitaires ', 9, 317, 5, 21, '21', 3, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, '1', '', '', '', '', 0),
(5106, 'test', 1, 233, 4, 19, 'Annee 1', 4, 18, 0, 0, 0, 14, 'Janvier', 'Octobre', 3, NULL, NULL, NULL, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `cp_site` varchar(128) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`id`, `nom`, `cp_site`, `adresse`, `ville`) VALUES
(1, 'Campus Centre', '94000', '61 avenue du Général De Gaulle', ' Créteil'),
(2, 'Centre Duvauchelle', '94000 ', '27 avenue Magellan', ' Créteil'),
(3, 'Centre La Pyramide', '94000 ', '80  avenue du Général De Gaulle', 'Créteil'),
(4, 'CHU Mondor', '94000', '51 avenue du Maréchal du Lattre de Tassigny', ' Créteil'),
(5, 'École Supérieure Montsouris', '94000 ', '2 rue Antoine Etex', ' Créteil'),
(6, 'ESPE Bonneuil (siège social)', '94860 ', 'rue Jean Macé', ' Bonneuil-sur-Marne'),
(7, 'ESPE Créteil', '94000', '12 rue Georges Enesco', ' Créteil'),
(8, 'ESPE Livry-Gargan', '93891', '45 avenue Jean Zay', ' Livry-Gargan'),
(9, 'ESPE Melun', '77007', '3 rue Belle Ombre', ' Melun'),
(10, 'ESPE Saint-Denis', '93200 ', 'place du 8 mai 1945', ' Saint-Denis'),
(11, 'Fontainebeau', '77300', 'route Hurtault', ' Fontainebleau'),
(12, 'Institut d\'administration des entreprises', '94000', 'Place de la porte des Champs', ' Créteil'),
(13, 'IUP', '77447', 'Bâtiment Bienvenüe - Aile A - 14-20 boulevard Newton - Cité Descartes - Champs-sur-Marne', ' Marne-La-Vallée'),
(14, 'Médecine', '94000 ', '8 rue du général Sarrail', ' Créteil'),
(15, 'Saint-Simon', '94000', '71 rue Saint-Simon', ' Créteil'),
(16, 'Sénart', '77567 ', '36-37 rue Georges Charpack', ' Lieusaint'),
(17, 'Site André Boulle', '94000 ', '83-85 avenue du Général De Gaulle', ' Créteil'),
(18, 'Site du Mail des Mèches', '94000 ', 'Route de Choisy', ' Créteil'),
(19, 'Torcy', '77200 ', '2 avenue Salvador Allende', ' Torcy'),
(20, 'Vitry', '94400', '122 rue Paul Armangot', ' Vitry-sur-Seine');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE `type_formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_formation`
--

INSERT INTO `type_formation` (`id`, `nom`) VALUES
(3, 'Formation continue'),
(4, 'Formation en alternance'),
(5, 'Formation initiale');

-- --------------------------------------------------------

--
-- Structure de la table `type_periode`
--

CREATE TABLE `type_periode` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_periode`
--

INSERT INTO `type_periode` (`id`, `nom`) VALUES
(0, 'AUCUN'),
(3, 'Semaine'),
(4, 'Mois'),
(5, 'Jour');

-- --------------------------------------------------------

--
-- Structure de la table `type_stage`
--

CREATE TABLE `type_stage` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_stage`
--

INSERT INTO `type_stage` (`id`, `nom`) VALUES
(0, 'AUCUN'),
(3, 'Filé'),
(4, 'A l\'étranger'),
(5, 'MEEF');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `teamId` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `avatar`, `tagline`, `teamId`, `isAdmin`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Marc', 'Mefoung', 'assassin_avatar', 'They see me mowin...<br/>...my front lawn.', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Index pour la table `composante`
--
ALTER TABLE `composante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fa`
--
ALTER TABLE `fa`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historique_t`
--
ALTER TABLE `historique_t`
  ADD UNIQUE KEY `id_histo_2` (`id_histo`),
  ADD KEY `id_histo` (`id_histo`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rd_formation`
--
ALTER TABLE `rd_formation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`cp_site`);

--
-- Index pour la table `type_formation`
--
ALTER TABLE `type_formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_periode`
--
ALTER TABLE `type_periode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_stage`
--
ALTER TABLE `type_stage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `composante`
--
ALTER TABLE `composante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5107;
--
-- AUTO_INCREMENT pour la table `historique_t`
--
ALTER TABLE `historique_t`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `type_periode`
--
ALTER TABLE `type_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `type_stage`
--
ALTER TABLE `type_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

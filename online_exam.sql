-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 09:10 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapterid` int(11) NOT NULL COMMENT 'TRIAL',
  `chaptername` longtext NOT NULL COMMENT 'TRIAL',
  `classid` int(11) NOT NULL COMMENT 'TRIAL',
  `subjectid` int(11) NOT NULL COMMENT 'TRIAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='TRIAL';

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapterid`, `chaptername`, `classid`, `subjectid`) VALUES
(1, '01 SET THEORY AND RELATION', 1, 1),
(2, '02.LOGARITHM,INDICES SURDS,PARTIAL FRACTION', 1, 1),
(3, '03.PROGRESSIONS', 1, 1),
(4, '04. COMPLEX NUMBER', 1, 1),
(5, '05.QUADRATIC EQUATION & INEQUATIONS', 1, 1),
(6, '06.PERMUTATION & COMBINATION', 1, 1),
(7, '07.BINOMIAL THEORAM & INDUCTION', 1, 1),
(8, '08.EXPONENTIAL & LOGARITHM SERIES', 1, 1),
(9, '09. DETERMINANTS & MATRICES', 1, 1),
(10, '10.TRIGONOMETIC RATIOS &FUNCTION', 1, 1),
(11, '11.TRIGNO.EQN. & INEQUATION, S.O.T.', 1, 1),
(12, '12.INVERSE TRIGNO. FUNCTION', 1, 1),
(13, '13. HYPERBOLIC FUNCTION', 1, 1),
(14, '14. POINT (CO-ORDINATE GEOMETRY)', 1, 1),
(15, '01.SOME BASIC CONCEPT OF CHEMISTRY', 1, 3),
(16, '1.LIVING WORLD', 1, 4),
(17, '2.BIOLOGYCAL CLASSIFICATION', 1, 4),
(18, '3.PLANT KINGDOM', 1, 4),
(19, '15.STRAIGHT LINE', 1, 1),
(20, '16.PAIR OF STRAIGHT LINE', 1, 1),
(21, '17.CIRCLE & SYSTEM OF CIRCLE', 1, 1),
(22, '04.ANIMAL KINGDOM', 1, 4),
(23, '05.MORPHOLOGY OF FLOWRING PLANT', 1, 4),
(24, '06.ANATOMY OF FLOWERING PLANT', 1, 4),
(25, '07.STUCTURAL ORGANIZATION IN ANIMAL', 1, 4),
(26, '18. CONIC SECTION', 1, 1),
(27, '19. VECTOR ALGEBRA', 1, 1),
(28, '20. 3-D GEOMETRY', 1, 1),
(29, '8.CELL THE UNIT OF LIFE', 1, 4),
(30, '9.BIOMOLICULES', 1, 4),
(31, '10.CELL CYCLE AND CELL DIVISION', 1, 4),
(32, '11.TRANSPORT IN PLANTS', 1, 4),
(33, '12.MINERAL NUTRITION', 1, 4),
(34, '13.PHOTOSYNTHESIS IN HIGHER PLANT', 1, 4),
(35, '14.RESPIRATION IN PLANTS', 1, 4),
(36, '15.PLANT GROWTH AND DEVELOPMENT', 1, 4),
(37, '16.DIGESTION AND ABSORPTION ', 1, 4),
(38, '17.BREATHING AND EXCHANGES OF GAS', 1, 4),
(39, '18.BODY FUILD AND CIRCULATION', 1, 4),
(40, '19.EXCRETORY', 1, 4),
(41, '20.LOCOMONTION AND MOVEMENT', 1, 4),
(42, '21.NATURAL CONTROL AND COORDINATE', 1, 4),
(43, '22.CHEMICAL COORD. & INTEGRATION', 1, 4),
(44, '23.REPRODUCTION IN ORGANISMS', 1, 4),
(45, '24.SEXUAL REPRODUCTION IN FLOWERS', 1, 4),
(46, '25.HUMAN REPRODUCTION', 1, 4),
(47, '26.REPRODUCTIVE HEALTH', 1, 4),
(48, '27.PRINCIPLE OF INHERIT. & VARIATION', 1, 4),
(49, '28.MOLECULAR BASIS OF INHERITANCE', 1, 4),
(50, '29.EVOLUTION (ORIGIN OF LIFE)', 1, 4),
(51, '30.HUMAN HEALTH DISEASE', 1, 4),
(52, '31.STRATEGIES FOR ENHAN. IN FOOD PRODUCTION', 1, 4),
(53, '32.MICROBES IN HUMAN WELFARE', 1, 4),
(54, '21.FUNCTION,LIMITS ,CONT. & DIFF.', 1, 1),
(55, '22. DIFFERENTIATION & AOD', 1, 1),
(56, '23.INDEFINITE INTEGRAL', 1, 1),
(57, '24.DEFINITE INTEGRAL & AUC', 1, 1),
(58, '25.DIFFERENTIAL EQUATION', 1, 1),
(59, '33.BIOTECHNOLOGY PRINCIPAL & PROCESS', 1, 4),
(60, '34.BIOTECHNOLOGY AND ITS APPLICATION', 1, 4),
(61, '35.ORGANISM AND POPULATION', 1, 4),
(62, '36.ECOSYSTEM', 1, 4),
(63, '37.BIODIVERSITY & CONSERVATION', 1, 4),
(64, '38.ENVIRONMENTAL ISSUE', 1, 4),
(65, '26.PROBABILITY', 1, 1),
(66, '27.MEASURE OG CENTRAL TENDENCY & DISPERSION', 1, 1),
(67, '28.CORRELATION AND REGRESSION', 1, 1),
(68, '29.MATHEMATICAL LOGIC & BOOLEAN ALGEBRA', 1, 1),
(69, '30.MISCELLANEOUS', 1, 1),
(70, '02. STRUCTURE OF ATOM', 1, 3),
(71, '03.CLASSIFICATION OF ELEMENT & PERIODIC TABLE', 1, 3),
(72, '04.CHEMICAL BONDING & MOLECULAR STRUCTURE', 1, 3),
(73, '05.STATE OF MATTER(GASIOUS STATE)', 1, 3),
(74, '06.THERMODYNAMICS', 1, 3),
(75, '07.IONIC EQUILIBRUM', 1, 3),
(76, '08.CHEMICAL EQUILIBRIUM', 1, 3),
(77, '09.REDOX REACTIONS', 1, 3),
(78, '10.HYDROGEN ITS COMPOUND', 1, 3),
(79, '11.THE S-BLOCK ELEMENTS', 1, 3),
(80, '12.THE P-BLOCK ELEMENTS', 1, 3),
(81, '13.(A) GENERAL ORGANIC CHEMISTRY', 1, 3),
(82, '13.(B) PURIFICATION,CLASSIFICATION', 1, 3),
(83, '13.(C) ISOMERISM (GOC)', 1, 3),
(84, '14.HYDROCARBONS', 1, 3),
(85, '15.ENVIRONMENTAL CHEMISTRY', 1, 3),
(86, '16. THE SOLID STATE', 1, 3),
(87, '17.SOLUTIONS & COLLIGATIVE PROPERTY', 1, 3),
(88, '18. ELECTROCHEMISTRY', 1, 3),
(89, '19.CHEMICAL KINETICS', 1, 3),
(90, '20.SURFACE CHEMISTRY', 1, 3),
(91, '21.GENERAL PRINCIPLES & PROCESS OF ISOLATION OF ELEMENTS', 1, 3),
(92, '22.THE D & F BLOCK ELEMENTS', 1, 3),
(93, '23.COORDINATIONS COMPOUNDS', 1, 3),
(94, '24.HALOALKANES & HALOARENES', 1, 3),
(95, '25.ALCOHOLES,PHENOLS & ETHER', 1, 3),
(96, '26.ALDEHYDES,KETONES & CARBOXYLIC ACID', 1, 3),
(97, '27.AMINES (NITROGEN CONTANING ORGANIC COMPOUNDS )', 1, 3),
(98, '28.BIOMOLECULES', 1, 3),
(99, '29.POLYMERS', 1, 3),
(100, '30.CHEMISTRY IN EVERYDAY LIFE', 1, 3),
(101, '31.NUCLEAR CHEMISTRY', 1, 3),
(102, '01.PHYSICSL WORLD', 1, 2),
(103, '02.UNIT AND MEASURENMENT', 1, 2),
(104, '03.MOTION IN A STRAIGHT LINE', 1, 2),
(105, '04.MOTION IN PLANE', 1, 2),
(106, '05.NEWTON\'S LOW OF MOTION', 1, 2),
(107, '06.WORK,POWER,ENERGY,COLLISION', 1, 2),
(108, '07.SYSTEM OF PARTICAL & ROTATIONAL MOTION', 1, 2),
(109, '08.GRAVITATION', 1, 2),
(110, '09.MECHANICAL PROPERTIES OF SOLID', 1, 2),
(111, '10.MECHANICAL PROPERTIES OF FLUIDES', 1, 2),
(112, '11.THERMAL PROPERTIES OF MATTER', 1, 2),
(113, '12.THERMODYNAMICS', 1, 2),
(114, '13.KINETIC THEORY', 1, 2),
(115, '14.OSCILLATION', 1, 2),
(116, '15.WAVES', 1, 2),
(117, '16.ELECTRIC CHARGES AND FIELDS', 1, 2),
(118, '17.ELECTROSTATIC POTENTIAL & CAPACITANCE', 1, 2),
(119, '18.CURRENT ELECTRICITY', 1, 2),
(120, '19.MOVING CHARGES & MAGNETISM', 1, 2),
(121, '20.MAGNETISM & MATTER', 1, 2),
(122, '21.ELECTROMAGNETIC INDUCTION', 1, 2),
(123, '22.ALTERNATING CURRENT', 1, 2),
(124, '23.ELECTROMAGNETIC WAVES', 1, 2),
(125, '24.RAY OPTICS & OPTICAL INSTRUMENTS', 1, 2),
(126, '25.WAVE OPTICS', 1, 2),
(127, '26.DUAL NATURE OF RADIATION & MATTER', 1, 2),
(128, '27.ATOMS', 1, 2),
(129, '28.NUCLEI', 1, 2),
(130, '29.SEMICONDUCTOR ELECTRONICS MATERIALS', 1, 2),
(131, '30.COMMUNICATION SYSTEM', 1, 2),
(132, '31.VECTOR', 1, 2),
(133, '32.HEATING & CHEMICAL EFFECT OF CURRENT', 1, 2),
(134, '33.SURFACE TENSION', 1, 2),
(135, '34.TRANSMISSION OF HEAT', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `check_register`
--

CREATE TABLE `check_register` (
  `id` int(11) NOT NULL,
  `couponcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classid` int(11) NOT NULL COMMENT 'TRIAL',
  `classname` longtext NOT NULL COMMENT 'TRIAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='TRIAL';

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `classname`) VALUES
(1, 'JEE Main + NEET + JEE Advance'),
(2, '11TH BOARD'),
(3, '12TH BOARD');

-- --------------------------------------------------------

--
-- Table structure for table `curr_exam`
--

CREATE TABLE `curr_exam` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_info`
--

CREATE TABLE `exam_info` (
  `name` text NOT NULL,
  `number` int(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_live`
--

CREATE TABLE `exam_live` (
  `questionid` int(11) NOT NULL,
  `answer` int(20) NOT NULL,
  `mark` int(10) NOT NULL,
  `ques_pic` longblob NOT NULL,
  `sol_pic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id` int(11) NOT NULL,
  `questionid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_record`
--

CREATE TABLE `exam_record` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `examname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `marks` int(255) NOT NULL,
  `correct` int(255) NOT NULL,
  `wrong` int(255) NOT NULL,
  `notattemted` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `neg_marks`
--

CREATE TABLE `neg_marks` (
  `neg` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionmaster`
--

CREATE TABLE `questionmaster` (
  `questionid` int(11) NOT NULL,
  `classid` int(20) NOT NULL,
  `subjectid` int(20) NOT NULL,
  `chapterid` int(20) NOT NULL,
  `questiontype` int(20) NOT NULL,
  `answer` int(20) NOT NULL,
  `mark` int(10) NOT NULL,
  `ques_pic` longblob NOT NULL,
  `sol_pic` longblob NOT NULL,
  `language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `branch` text NOT NULL,
  `percentage` double NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`fullname`, `email`, `password`) VALUES
('Ferin Patel', 'ferinpatel79@gmail.com', '0079');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` int(11) NOT NULL COMMENT 'TRIAL',
  `classid` int(11) NOT NULL COMMENT 'TRIAL',
  `subjectname` longtext NOT NULL COMMENT 'TRIAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='TRIAL';

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `classid`, `subjectname`) VALUES
(1, 1, 'MATHS'),
(2, 1, 'PHYSICS'),
(3, 1, 'CHEMISTRY'),
(4, 1, 'BIOLOGY'),
(5, 3, 'MATHS'),
(6, 2, 'CHEMISTRY'),
(7, 2, 'MATHS'),
(8, 2, 'BIOLOGY'),
(9, 2, 'PHYSICS'),
(10, 3, 'Physics'),
(11, 3, 'Chemistry'),
(12, 3, 'Biology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapterid`);

--
-- Indexes for table `check_register`
--
ALTER TABLE `check_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `curr_exam`
--
ALTER TABLE `curr_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_live`
--
ALTER TABLE `exam_live`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_record`
--
ALTER TABLE `exam_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionmaster`
--
ALTER TABLE `questionmaster`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapterid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL', AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `check_register`
--
ALTER TABLE `check_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `curr_exam`
--
ALTER TABLE `curr_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_live`
--
ALTER TABLE `exam_live`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_record`
--
ALTER TABLE `exam_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionmaster`
--
ALTER TABLE `questionmaster`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TRIAL', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 08:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assignment_sub_id` int(11) NOT NULL,
  `assignment_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `assignment_name`, `assignment_sub_id`, `assignment_created`) VALUES
(1, 'Write a program to implement matrix multiplication using Strassen\'s method. (Divide and\r\nConquer).\r\n', 2, '2022-02-13 16:16:37'),
(2, 'Implement program to find minimum and maximum element from given list using Divide and \r\nConquer.\r\n', 2, '2022-02-13 16:16:37'),
(3, 'Write a program to implement optimal storage tape using greedy approach.\r\n', 2, '2022-02-13 16:17:26'),
(4, 'Write a program to implement longest common subsequence (Dynamic Programming) and verify the \r\ncomplexity.\r\n', 2, '2022-02-13 16:17:26'),
(5, 'Write a program to print shortest path and cost for the directed graph using Bellman Ford \r\nalgorithm (Dynamic Programming) and verify the complexity.', 2, '2022-02-13 16:18:03'),
(6, 'Write a recursive program to find the solution of placing n queens on chess board so that no\r\nqueen takes each other (backtracking).\r\n', 2, '2022-02-13 16:18:03'),
(7, 'Write a non-recursive program to check whether Hamiltonian path exists in undirected graph \r\nor\r\nnot. If exists print it. (backtracking).', 2, '2022-02-13 16:18:28'),
(8, 'Write a program to solve the travelling salesman problem. Print the path and the cost. (Branch\r\nand Bound).\r\n', 2, '2022-02-13 16:18:28'),
(9, 'Study and Configure Hadoop for Big Data.\r\n', 4, '2022-02-13 16:26:40'),
(10, 'Study of NoSQL Databases such as Hive/Hbase/Cassendra/DynamoDB.', 4, '2022-02-13 16:26:40'),
(11, 'Design Data Model using NoSQL Databases such as Hive/Hbase/Cassendra/DynamoDB.\r\n', 4, '2022-02-13 16:27:09'),
(12, 'Implement any one Partitioning technique in Parallel Databases.', 4, '2022-02-13 16:27:09'),
(13, 'Implement Two Phase commit protocol in Distributed Databases.\r\n', 4, '2022-02-13 16:27:36'),
(14, 'Design Persistent Objects using JDO and implement min 10 queries on objects using JDOQL \r\nin\r\nObjectDB NOSQL DATABASE', 4, '2022-02-13 16:27:36'),
(15, 'Create XML, XML schemas , DTD for any database application and implement min 10 \r\nqueries\r\nusing XQuery FLOWR expression and XPath.\r\n', 4, '2022-02-13 16:28:16'),
(16, 'Design database schemas and implement min 10 queries using Hive/ Hbase/ Cassendra \r\ncolumn\r\nbased databases\r\n', 4, '2022-02-13 16:28:16'),
(17, 'Design database schemas and implement min 10 queries using DynamoDBkeyValue based\r\ndatabases', 4, '2022-02-13 16:28:41'),
(18, 'Implement any one machine learning algorithm for classification / clustering task in BIG data\r\nAnalytics.\r\n', 4, '2022-02-13 16:28:41'),
(19, 'Design and Implement social web mining application using NoSQL databases, machine \r\nlearning\r\nalgorithm, Hadoop and Java/.Net.', 4, '2022-02-13 16:28:57'),
(20, 'Write program in C++ or Java to implement RSA algorithm for key generation and cipher \r\nverification', 7, '2022-02-13 16:39:20'),
(21, 'Develop and program in C++ or Java based on number theory such as Chinese remainder or \r\nExtended Euclidean algorithm. ( Or any other to illustrate number theory for security)\r\n', 7, '2022-02-13 16:39:20'),
(22, 'Write program in C++ or Java to implement Diffie Hellman key exchange algorithm.\r\n', 7, '2022-02-13 16:39:45'),
(23, 'Write a program in C++, C# or Java to implement RSA algorithm using Libraries (API).', 7, '2022-02-13 16:39:45'),
(24, 'Write a program in C++, C# or Java to implement SHA-1 algorithm using Libraries (API)\r\n', 7, '2022-02-13 16:40:06'),
(25, 'Configure and demonstrate the use of IDS tool such as snort.', 7, '2022-02-13 16:40:06'),
(26, 'Configure and demonstrate use of vulnerability assessment tool such as NESSUS', 7, '2022-02-13 16:40:32'),
(27, 'Implement web security with Open SSL tool kit\r\n', 7, '2022-02-13 16:40:32'),
(28, 'Installation and setup of java development kit(JDK),setup android SDK, setup eclipse IDE, \r\nsetup android development tools (ADT) plugins, create android virtual device.\r\n', 10, '2022-02-13 16:47:43'),
(29, 'Create “Hello World” application. That will display “Hello World” in the middle of the screen \r\nusing TextView Widget in the red color', 10, '2022-02-13 16:47:43'),
(30, 'Create application for demonstration of android activity life cycle 2 Create Registration page \r\nto demonstration of Basic widgets available in android.', 10, '2022-02-13 16:48:06'),
(31, 'Create sample application with login module.(Check username and password) On successful login, \r\nChnage TextView “Login Sucessful”. And on failing login, alert user using Toast “Login fail”\r\n', 10, '2022-02-13 16:48:06'),
(32, 'Create login application where you will have to validate usename and passwords Till the \r\nusername and password is not validated , login button should remain disabled.', 10, '2022-02-13 16:48:36'),
(33, 'Create and Login application as above. Validate login data and display Error to user using \r\nsetError() method. Create an application for demonstration of Relative and Table Layout in \r\nandroid.\r\n', 10, '2022-02-13 16:48:36'),
(34, 'Create an application for demonstration of Scroll view in android 2 Create an application for \r\ndemonstration of Explicitly Starting New Activity using Intent.', 10, '2022-02-13 16:49:06'),
(35, 'Create an application that will pass two number using TextView to the next screen , and on the \r\nnext screen display sum of that number.\r\n', 10, '2022-02-13 16:49:06'),
(36, 'Create spinner with strings taken from resource folder (res >> value folder). On changing \r\nspinner value, change background of screen.\r\n', 10, '2022-02-13 16:49:29'),
(37, 'Create an application that will get the Text Entered in Edit Text and display that Text using \r\ntoast (Message).', 10, '2022-02-13 16:49:29'),
(38, 'Create an application that will Demonstrate Button onClick() Event and change the TextView\r\nColor based on button Clicked.', 10, '2022-02-13 16:49:58'),
(39, 'Create an UI such that, one screen have list of all the types of cars. On selecting of any car \r\nname, next screen should show Car details like: name, launched date, company name.\r\n', 10, '2022-02-13 16:49:58'),
(40, 'Create an application that will Demonstrate Dialog Box Control In Android 4.', 10, '2022-02-13 16:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_category` varchar(50) NOT NULL,
  `file_cat_name` varchar(255) NOT NULL,
  `file_sub` varchar(50) NOT NULL,
  `file_uploaded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_category`, `file_cat_name`, `file_sub`, `file_uploaded`) VALUES
(3, 'anvay1.jpg', 'Unit', 'Parallel And Distributed Databases', 'ADBMS', '2022-02-16 15:56:41'),
(4, 'anvay2.jpg', 'Unit', 'Parallel And Distributed Databases', 'ADBMS', '2022-02-16 15:56:51'),
(7, '331059_INS_Assignment No.2.pdf', 'Assignment', 'Develop and program in C++ or Java based on number theory such as Chinese remainder or \r\nExtended Euclidean algorithm. ( Or any other to illustrate number theory for security)\r\n', 'INS Lab', '2022-02-17 21:11:34'),
(8, '331059_INS_Assignment No.2.docx', 'Assignment', 'Develop and program in C++ or Java based on number theory such as Chinese remainder or \r\nExtended Euclidean algorithm. ( Or any other to illustrate number theory for security)\r\n', 'INS Lab', '2022-02-17 21:11:40'),
(9, 'QB ADBMS.docx', 'Unit', 'Parallel And Distributed Databases', 'ADBMS', '2022-05-28 13:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_desc` text NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `subject_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_desc`, `sub_category`, `subject_created`) VALUES
(1, 'DAA', 'Design and Analysis of Algorithm help to design the algorithms for solving different types of problems in Computer Science. It also helps to design and analyze the logic on how the program will work before developing the actual code for a program.', 'Theory', '2022-02-13 13:17:09'),
(2, 'DAA Lab', 'Design and Analysis of Algorithm help to design the algorithms for solving different types of problems in Computer Science. It also helps to design and analyze the logic on how the program will work before developing the actual code for a program.', 'Lab', '2022-02-13 15:57:24'),
(3, 'ADBMS', 'Advanced DataBase Management System, is much different when compared to DBMS, which was more of basic. ADBMS has more of theory when compared with the older one. Here, the concepts are really interesting. People who have interest in DBMS will definitely love Data Warehousing and Data Mining along with OLAP concepts. ', 'Theory', '2022-02-13 15:59:45'),
(4, 'ADBMS Lab', 'Advanced DataBase Management System, is much different when compared to DBMS, which was more of basic. ADBMS has more of theory when compared with the older one. Here, the concepts are really interesting. People who have interest in DBMS will definitely love Data Warehousing and Data Mining along with OLAP concepts. ', 'Lab', '2022-02-13 15:59:56'),
(5, 'SP', 'Software programming is the act of writing computer code that enables computer software to function. The computer technology field often has overlapping terminology that can be confusing to discern. Software programming is not the same as software development. Development is the actual design of a program while programming is the carrying out of the instructions of development. People who program software are called computer programmers.', 'Theory', '2022-02-13 16:00:27'),
(6, 'INS', 'Information and Network Security consists of the policies, processes and practices adopted to prevent, detect and monitor unauthorized access, misuse, modification, or denial of a computer network and network-accessible resources.', 'Theory', '2022-02-13 16:01:19'),
(7, 'INS Lab', 'Information and Network Security consists of the policies, processes and practices adopted to prevent, detect and monitor unauthorized access, misuse, modification, or denial of a computer network and network-accessible resources.', 'Lab', '2022-02-13 16:01:32'),
(8, 'ICS', 'Computer security, cybersecurity, or information technology security is the protection of computer systems and networks from information disclosure, theft of or damage to their hardware, software, or electronic data, as well as from the disruption or misdirection of the services they provide.', 'Theory', '2022-02-13 16:02:14'),
(9, 'ES(Mob. App Development)', 'Mobile App Development is the act or process by which a mobile app is developed for mobile devices, such as personal digital assistants, enterprise digital assistants or mobile phones. These software applications are designed to run on mobile devices, such as a smartphone or tablet computer.', 'Theory', '2022-02-13 16:03:10'),
(10, 'ES Lab', 'Mobile App Development is the act or process by which a mobile app is developed for mobile devices, such as personal digital assistants, enterprise digital assistants or mobile phones. These software applications are designed to run on mobile devices, such as a smartphone or tablet computer.', 'Lab', '2022-02-13 16:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_desc` text NOT NULL,
  `unit_sub_id` int(11) NOT NULL,
  `unit_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `unit_desc`, `unit_sub_id`, `unit_created`) VALUES
(1, 'Introduction of Design and Analysis of Algorithm', 'Analysis of Algorithm, Efficiency- Analysis framework, asymptotic notations – big O, theta and \r\nomega. Analysis of Non-recursive and recursive algorithms, Amortized Analysis. Solving Recurrence \r\nEquations (Homogeneous and non-homogeneous) Proof Techniques: Minimum 2 examples of each: \r\nContradiction, Mathematical Induction – Tiling Problem, Direct proofs, Proof by counterexample, \r\nProof by contraposition', 1, '2022-02-13 16:07:31'),
(2, 'Divide and Conquer and Greedy', 'Divide & Conquer: General method, Control abstraction, Merge sort, Quick Sort – Worst, Best and\r\naverage case. Binary search, Large integer Multiplication, Strassen’s Matrix multiplication. (for all \r\nabove\r\nalgorithms analysis to be done with recurrence)\r\nGreedy Method: General method and characteristics, Prim’s method for MST , Kruskal method for \r\nMST\r\n(using nlogn complexity), Dijkstra’s Algorithm, Huffman Trees ( nlogn complexity), Fraction \r\nKnapsack\r\nproblem, Job Sequencing.\r\n', 1, '2022-02-13 16:07:55'),
(3, 'Dynamic Programming', 'General strategy, Principle of optimality, Warshal’s and Floyd’s Algorithm , Optimal Binary Search \r\nTrees,\r\n0/1 knapsack Problem, Travelling Salesman Problem, multistage GraphProblem, longest common \r\nsubsequence.', 1, '2022-02-13 16:08:21'),
(4, 'Backtracking', 'General method, Recursive backtracking algorithm, iterative backtracking method. 8- queens problem,\r\nSum of subsets, Graph coloring, Hamiltonian Cycle , 0/1 Knapsack Problem\r\n', 1, '2022-02-13 16:08:51'),
(5, 'Branch and Bound', 'The method, Control abstractions for Least Cost Search, Bounding, FIFO branch and bound, LC \r\nbranch\r\nand bound, 0/1 Knapsack problem – LC branch and bound and FIFO branch and bound solution,\r\nTraveling sales person problem.', 1, '2022-02-13 16:09:20'),
(6, 'Computational Complexities and Parallel Algorithms', 'Non Deterministic algorithms, The classes P, NP, NP Complete, NP hard Proofs for NP Complete \r\nProblems: Clique, Vertex Cover\r\nParallel Algorithms: Introduction, models for parallel computing, computing with complete binary tree,\r\nPointer doubling algorithm', 1, '2022-02-13 16:09:48'),
(7, 'Parallel And Distributed Databases', 'Parallel Database: Introduction, Architectures, Interquery and Intraquery Parallelism, Parallelism on \r\nMulticore processor, Parallel Query Optimization,\r\nDistributed Database: Introduction, Data Storage, Distributed Transactions, Commit Protocol, \r\nConcurrency control, Distributed Recovery.\r\n', 3, '2022-02-13 16:19:41'),
(8, 'Object-Based Database', 'Overview, Complex databases, Structured data types, operations on structured and unstructured data. \r\nEncapsulation and ADTs. Inheritance, Objects, OIDs and Reference types, Database Design, \r\nORDBMS Implementation challenges-Storage and Access methods, Query Optimization, ODMSObject model. NOSQL object database-ObjectDB (JDO), JDO Data Model.', 3, '2022-02-13 16:21:58'),
(9, 'Big Databases-I', 'Introduction to Big Data, NoSQL database system – Column based and key value based Column based Database ( Cassandra ) : Architecture, Managing data, Data Caching, Tuning,\r\nData backup, Cassandra Query Language, CQL Data Model, Indexing\r\nKey Value based Database (DynamoDB): Data Model, Operations, Data Access, Indexing.\r\n', 3, '2022-02-13 16:22:51'),
(10, 'Big Databases-II', 'Graph Databases (Neo4j): vGraphs are the Future, Why Data Relationships Matter, Data Modeling \r\nBasics, Data Modeling Pitfalls to Avoid, Why a Database Query Language Matters, Imperative vs. \r\nDeclarative Query Languages, Graph Theory & Predictive Modeling.\r\n', 3, '2022-02-13 16:23:15'),
(11, 'Big Data Analytics', 'Introduction to data mining and analytics: Data Streams mining, Stream data management systems: \r\nIssues and solutions, Stream frequent pattern analysis, Stream classification, Stream cluster analysis, \r\nGraph based database, graph mining, Methods for Mining Frequent Sub graphs Mining Variant and \r\nConstrained Substructure Patterns, Social Network Analysis, Models of social network generation, \r\nmining on social network, Apache Flume NG – Microsoft StreamInsight as tools for Complex Event \r\nProcessing (CEP) applications.', 3, '2022-02-13 16:23:47'),
(12, 'Current Trends In Advanced Databases', 'Deductive Databases: Introduction, Semantics, Fix point operator, Safe data log programmers, Least \r\nModel, Least fixed point, Query Processing, Query Evaluation, Prototypes, and Deductive Vs RDBMS. \r\nMultimedia Database, Cloud Databases, Spatial Databases, Temporal Databases.', 3, '2022-02-13 16:24:23'),
(13, 'Introduction To Systems Programming And Assemblers', 'Introduction: Need of System Software, Components of System Software, Language Processing \r\nActivities, Fundamentals of Language Processing.\r\nAssemblers: Elements of Assembly Language Programming, A simple Assembly Scheme, Pass \r\nstructure of Assemblers, Design of Two Pass Assembler.\r\n', 5, '2022-02-13 16:30:10'),
(14, 'Macroprocessors, Loaders And Linkers', 'Macro Processor: Macro Definition and call, Macro Expansion, Nested Macro Calls and definition, \r\nAdvanced Macro Facilities, Design of two-pass Macro Processor.\r\nLoaders: Loader Schemes, Compile and Go, General Loader Scheme, Absolute Loader Scheme, \r\nSubroutine Linkages, Relocation and linking concepts, Self-relocating programs, Relocating Loaders, \r\nDirect Linking Loaders, Overlay Structure, Linkers.', 5, '2022-02-13 16:30:32'),
(15, 'Introduction To Compilers', 'Phase structure of Compiler and entire compilation process.\r\nLexical Analyzer: The Role of the Lexical Analyzer, Input Buffering. Specification of Tokens, \r\nRecognition Tokens, Design of Lexical Analyzer using Uniform Symbol Table, Lexical Errors.\r\nLEX: LEX Specification, Generation of Lexical Analyzer by LEX.', 5, '2022-02-13 16:31:24'),
(16, 'Parsers', 'Role of parsers, Classification of Parsers: Top down parsers- recursive descent parser and predictive \r\nparser (LL parser), Bottom up Parsers – Shift Reduce parser, LR parser. \r\nYACC specification and Automatic construction of Parser (YACC).\r\n', 5, '2022-02-13 16:31:24'),
(17, 'Semantic Analysis And Storage Allocation', 'Need, Syntax Directed Translation, Syntax Directed Definitions, Translation of assignment Statements, \r\niterative statements, Boolean expressions, conditional statements, Type Checking and Type conversion.\r\nIntermediate Code Formats: Postfix notation, Parse and syntax tress, Three address code,\r\nquadruples and triples.\r\nStorage Allocation: Storage organization and allocation strategies.\r\n', 5, '2022-02-13 16:32:06'),
(18, 'Code Generation And Optimization', 'Code Generation: Code generation Issues. Basic blocks and flow graphs, A Simple Code Generator.\r\nCode Optimization: Machine Independent: Peephole optimizations: Common Sub-expression \r\nelimination, Removing of loop invariants, Induction variables and Reduction in strengths, use of\r\nmachine idioms, Dynamic Programming Code Generation.\r\nMachine dependent Issues: Assignment and use of registers', 5, '2022-02-13 16:32:06'),
(19, 'Security Basics', 'Introduction, Terminology, Attacks, Security Goals : Authentication, Authorization, Cipher \r\nTechniques: Substitution and Transposition, One Time Pad, Modular Arithmetic, GCD, Euclid’s \r\nAlgorithms, Chinese Remainder Theorem, Discrete Logarithm, Fermat Theorem, Block Ciphers, \r\nStream Ciphers. Secret Splitting and Sharing.', 6, '2022-02-13 16:34:26'),
(20, 'Stream ciphers, block ciphers, Multiple encryption and triple DES\n', 'Stream ciphers and block ciphers, Block Cipher structure, Data Encryption standard (DES) with \r\nexample, strength of DES, Design principles of block cipher, AES with structure, its transformation \r\nfunctions, key expansion, example and implementation.\r\nMultiple encryption and triple DES, Electronic Code Book, Cipher Block Chaining Mode, Cipher \r\nFeedback mode, Output Feedback mode, Counter mode\r\n', 6, '2022-02-13 16:34:26'),
(21, 'Public Key Cryptosystems', 'Public Key Cryptosystems with Applications, Requirements and Cryptanalysis, RSA algorithm, its \r\ncomputational aspects and security, Diffie-Hillman Key Exchange algorithm, Man-in-Middle attack\r\nCryptographic Hash Functions\r\nCryptographic Hash Functions, their applications, Simple hash functions, its requirements and \r\nsecurity, Hash functions based on Cipher Block Chaining, Secure Hash Algorithm (SHA)\r\n', 6, '2022-02-13 16:38:00'),
(22, 'Message Authentication Codes', 'Message Authentication Codes, its requirements and security, MACs based on Hash Functions, \r\nMacs based on Block Ciphers\r\nDigital Signature, its properties\r\nDigital Signature, its properties, requirements and security, various digital signature schemes \r\n(Elgamal and Schnorr), NIST digital Signature algorithm', 6, '2022-02-13 16:38:00'),
(23, 'Key management and distribution', 'Key management and distribution, symmetric key distribution using symmetric and asymmetric \r\nencryptions, distribution of public keys, X.509 certificates, Public key infrastructure.\r\nRemote user authentication with symmetric and asymmetric encryption, Kerberos', 6, '2022-02-13 16:38:47'),
(24, 'Web Security threats and approaches', 'Web Security threats and approaches, SSL architecture and protocol, Transport layer security, \r\nHTTPS and SSH', 6, '2022-02-13 16:38:47'),
(25, 'Security Basics and Introduction to cryptography', 'Introduction, Elements of Information Security, Understanding concepts: threat, exploit, privacy, \r\nvulnerability and policy, Types of Attacks, Operational Model of Network Security, Cryptography, \r\nSubstitution Ciphers, Transposition Ciphers, Stenography applications and limitations', 8, '2022-02-13 16:42:40'),
(26, 'Symmetric Key Cryptography\r\n', 'Introduction, Encryption Methods: Symmetric, Asymmetric, Block Ciphers and methods of\r\nOperations, Data Encryption Standard (DES), Advance Encryption Standard (AES).', 8, '2022-02-13 16:42:40'),
(27, 'Asymmetric Key Cryptography', 'Public Key Cryptography, RSA Algorithm: Working, Key length, Security, Key Distribution, DeffieHellman Key Exchange, Authentication methods, Message Digest, Kerberos, X.509 Authentication \r\nservice.\r\nDigital Signatures: Implementation, Algorithms, Standards (DSS), Authentication Protocol.\r\n', 8, '2022-02-13 16:43:28'),
(28, 'Network Layer Security', 'IP Security: IPSec protocols, and Operations, AH Protocol, ESP Protocol, ISAKMP Protocol, Oakkey \r\ndetermination Protocol, VPN. \r\nWEB Security: Introduction, Secure Socket Layer (SSL), SSL Session and Connection, SSL Record \r\nProtocol, Change Cipher Spec Protocol, Alert Protocol, Handshake Protocol. \r\nElectronic Mail Security: Introduction, Pretty Good Privacy, MIME, S/MIME, Comparison. Secure \r\nElectronic Transaction(SET)', 8, '2022-02-13 16:43:28'),
(29, 'Firewall And Intrusion', 'Introduction, Computer Intrusions. Firewall Introduction, Characteristics and types, Benefits and \r\nlimitations. Firewall architecture, Trusted Systems, Access Control. \r\nIntrusion detection, IDS: Need, Methods, Types of IDS, Password Management, Limitations and \r\nChallenges.', 8, '2022-02-13 16:44:12'),
(30, 'Introduction to OWASP', 'Introduction, Top 10 Vulnerabilities, understanding Top 10 Vulnerabilities.\r\n', 8, '2022-02-13 16:44:12'),
(31, 'Introduction to Android', 'Overview of Android: What does Android run On – Android Internals? Android for mobile apps \r\ndevelopment Environment setup for Android apps Development Framework - Android- SDK, Eclipse \r\nEmulators – What is an emulator Android AVD? Android Emulation – Creation and set up First \r\nAndroid Application', 9, '2022-02-13 16:46:14'),
(32, 'Android Activities and GUI Design Concepts\r\n', 'Design criteria for Android Application : Hardware Design Consideration, Design Demands For \r\nAndroid application, Intent, Activity, Activity Lifecycle and Manifest Creating Application and new \r\nActivities Simple UI -Layouts and Layout properties :Introduction to Android UI Design, Introducing \r\nLayouts XML Introduction to GUI objects viz.: Push Button , Text / Labels , EditText, ToggleButton , \r\nPadding \r\n', 9, '2022-02-13 16:46:14'),
(33, 'Advanced UI Programming', 'Event driven Programming in Android (Text Edit, Button clicked etc.) Activity Lifecycle of Android', 9, '2022-02-13 16:46:54'),
(34, 'Toast, Menu, Dialog, List and Adapters ', 'Menu: Basics, Custom v/s System Menus, Create and Use Handset menu Button (Hardware) Dialog : \r\nCreating and Altering Dialogs , Toast : List & Adapters Demo Application Development and \r\nLaunching Basic operation of SQLite Database 5.6 Android Application Priorities\r\n', 9, '2022-02-13 16:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `user_created`) VALUES
(1, 'Ajinkya', 'Shelke', 'ajinkya@gmail.com', '$2y$10$1Pvz3NC0NLjR.ooA/.84.ePtbYGT3Xtg1W./TSDXSx4qEuSq399o.', '2022-02-13 12:43:40'),
(2, 'Anvay', 'Landge', 'anvay@gmail.com', '$2y$10$Tqq3ztgfa4vISpqnkehZi.6TmZCHtTBfnCyAb3tVc/FoTaioMuu2u', '2022-02-13 12:44:06'),
(3, 'Sujata', 'Landge', 'sujata@gmail.com', '$2y$10$y85L8bLNN7cWnv3uYfZ.WOOXluCTZUssBoj.XZEATnkuwbSx2MZs6', '2022-02-13 12:45:33'),
(4, 'Swati', 'Shelke', 'swati@gmail.com', '$2y$10$CYBCJPbF/VNqRo3qdAQ1seBJRVXhuO98SLxClBFEgnT.WckGpUNqO', '2022-02-17 14:14:46'),
(8, 'Omkar', 'Jagtap', 'omkar@gmail.com', '$2y$10$QkyH52DyYEgjuAZ.G8MAQ.19/XpTcmhfFBn9q.InSFHS9kOKyEyJa', '2022-05-28 13:35:53'),
(9, 'Chaitanya', 'Shelke', 'Chaitanya@gmail.com', '$2y$10$PjZiq/kZm4D1TI6EluOFVeFIbO7GhYk4doTD/.BOadfxlX.T9zgSe', '2022-06-06 20:56:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD UNIQUE KEY `assignment_name` (`assignment_name`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `file_name` (`file_name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_name` (`unit_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 06:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `question`, `answer`) VALUES
(0, 'you,u,go,life,everything', 'Everything is going well. How about you?'),
(1, 'hello,greetings,greeting,hey,hi,howdy,hiya,salutations,salutation,yo,whats up,good day', 'Hello'),
(2, 'please,explain,purpose,describe,behind,design,share,objective,existence,clarify,aim,accomplish,elaborate,serve,user,discuss,role,assist,people,detail,function,fulfill,contribute,task,hand,highlight,way,useful,outline,goal,strive,achieve', '\r\nThe purpose of the MIT chatbot for the college is to provide a convenient and efficient way for students;faculty and staff to access information and receive assistance related to various aspects of college life. The chatbot serves as a virtual assistant;offering support and guidance in real-time.\r\n\r\nOne of the primary goals of the MIT chatbot is to enhance the overall user experience by providing quick and accurate responses to inquiries. Whether it\'s obtaining information about course schedules; campus events; academic resources; or administrative procedures; the chatbot strives to deliver relevant and up-to-date information.\r\n\r\nMoreover; the chatbot is designed to assist with common tasks and provide guidance on various topics. It can help students navigate through the course registration process; locate important campus facilities; access online resources; and provide general information about departments and programs.\r\n\r\nBy leveraging artificial intelligence and natural language processing; the MIT chatbot aims to understand and interpret user queries effectively. It adapts to different conversational styles and provides personalized responses; ensuring that users feel engaged and supported throughout their interactions.\r\n\r\nOverall; the purpose of the MIT chatbot is to serve as a reliable and accessible resource; augmenting the college experience by providing timely assistance; information; and guidance to the entire college community.'),
(3, 'mit,locate,address,campus', 'MIT Rd-->Radha Nagar--->Chromepet-->Chennai-->Tamil Nadu-->600044-->\r\nMadras Institute of Technology-->Anna University.'),
(4, 'madras,institute,technology,mit,establish,found', 'The Madras Institute of Technology (MIT) was established in 1949 by Chinnaswami Rajam.'),
(5, 'college,mission,vision,statement,provide,official,core,value,guide,principle,reflect,commitment,student,success,give,example,put,practice,align,current,educational,trend,future,goal,recently,update,revise,communicate,faculty,community,specific,initiative,program,demonstrate,diversity,inclusion,influence,decision-making,strategic,plan,mit', 'The Vision of the Department of Automobile Engineering is\r\n\r\n“To be a premier department in Automobile engineering and reach the highest academic level in the field of Automobile Engineering by imparting knowledge, continuously enhancing Research & Development activities, supporting industries through consultancy programme and providing the nation with high quality engineers”\r\n\r\n \r\n\r\nThe Mission of the Department of Automobile engineering is\r\n\r\nTo prepare students excel in their chosen professions by offering high quality education in automobile engineering with fundamental knowledge, interdisciplinary problem solving skills and confidence required.\r\nTo provide supportive and diverse environment that encourage students to achieve the best of their abilities to be innovators or job providers.\r\nTo maintain constant and active partnership with industries for technology development and transfer through consultancy projects.'),
(6, 'tell,faculty,qualification,expertise,member,college,provide,information,academic,background,credential,s,educational,professional,professor,experience,knowledgeable,instructor,teach,expert,respective,field,degree,certification,hold,example,research,industry,actively,engage,scholarly,activity,note,achievement,accolade', 'All the staffs and faculties in MIT are completed the specific degree in their field. All the staffs in the MIT campus are as brainy as IIT professors.'),
(16, ',,,you,tell,madras,institute,technology,,mit,,,,,,madras,institute,technology,,mit,,,,,,you,provide,information,mit,,madras,institute,technology,,,,,,i,m,curious,mit,,madras,institute,technology,,,you,explain,,,,,mit,,represent,context,education,,,,,tell,educational,institution,known,madras,institute,technology,,mit,,,,,,you,describe,madras,institute,technology,,mit,,brief,,,,,i,ve,heard,mit,,i,m,sure,refers,,you,clarify,,,,,type,institution,madras,institute,technology,,mit,,,,,,,i,d,like,organization,called,mit,,madras,institute,technology,,,you,,,,,,courses,programs,mit,,madras,institute,technology,,offer,,,,,,you,give,overview,madras,institute,technology,,mit,,,,,,,sets,madras,institute,technology,,mit,,apart,other,educational,institutions,,,,,,you,please,elaborate,background,purpose,madras,institute,technology,,mit,,,,,,,significance,madras,institute,technology,,mit,,field,education,,,,,,you,define,role,madras,institute,technology,,mit,,academic,landscape,,,,,,key,features,characteristics,madras,institute,technology,,mit,,,,,,,you,provide,details,establishment,history,madras,institute,technology,,mit,,,,,,,i,m,interested,learning,madras,institute,technology,,mit,,,i,,,,,,tell,educational,opportunities,available,madras,institute,technology,,mit,,', 'Certainly! Madras Institute of Technology (MIT) is an esteemed technical educational institution located in Chennai, Tamil Nadu, India. It was established in 1949 and initially functioned as a constituent college under the University of Madras. In 1978, the college became a part of Anna University, one of the most renowned technical universities in India.  MIT is known for its excellence in providing quality education and producing skilled engineers and technologists. The institute offers a wide range of undergraduate, postgraduate, and doctoral programs in various fields of engineering and technology. Some of the popular disciplines include Aerospace Engineering, Automobile Engineering, Computer Science and Engineering, Electronics and Communication Engineering, and many others.  The institute has a sprawling campus equipped with state-of-the-art facilities and modern infrastructure. It boasts well-equipped laboratories, libraries with an extensive collection of books and journals, advanced computer centers, and research facilities to support students and faculty in their academic pursuits and research endeavors.  MIT has a strong focus on research and innovation. Faculty members and students actively engage in research projects across various domains, contributing to advancements in science and technology. The institute collaborates with industries, research organizations, and international institutions to foster research partnerships and provide students with exposure to real-world challenges.  One of the key strengths of MIT is its placement record. The institute has a dedicated training and placement cell that facilitates interactions between students and potential employers. Reputed companies from diverse sectors visit the campus to recruit talented graduates, making MIT a preferred choice for many recruiters.  The institute also emphasizes extracurricular activities and offers various clubs, societies, and events that enrich the overall campus life and foster the holistic development of students. Moreover, MIT encourages students to participate in national and international competitions, conferences, and symposiums to showcase their skills and talents.  Over the years, MIT has nurtured a strong alumni network, with its graduates making significant contributions to various industries and fields, both in India and abroad.  Overall, Madras Institute of Technology (MIT) stands as a symbol of academic excellence, research prowess, and holistic development, making it a prestigious institution for technical education in the country.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

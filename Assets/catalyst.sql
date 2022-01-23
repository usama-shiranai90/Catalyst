SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalyst`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--


CREATE TABLE `assessment`
(
    `assessmentCode`    int(11)     NOT NULL,
    `sectionCode`       int(11)     NOT NULL,
    `courseCode`        varchar(10) NOT NULL,
    `assessmentType`    varchar(20) NOT NULL,
    `assessmentSubType` varchar(30) DEFAULT NULL,
    `title`             varchar(50) NOT NULL,
    `totalMarks`        int(11)     NOT NULL,
    `weightage`         int(11)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessmentCode`, `sectionCode`, `courseCode`, `assessmentType`, `assessmentSubType`, `title`,
                          `totalMarks`, `weightage`)
VALUES (1, 4, 'SEN-32', 'Sessional', 'Quiz ', 'Firebase', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentquestion`
--

CREATE TABLE `assessmentquestion`
(
    `questionCode`       int(11)      NOT NULL,
    `assessmentCode`     int(11)      NOT NULL,
    `cloCode`            int(11)      NOT NULL,
    `detail`             varchar(500) NOT NULL,
    `totalQuestionMarks` int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `assessmentquestion`
--

INSERT INTO `assessmentquestion` (`questionCode`, `assessmentCode`, `cloCode`, `detail`, `totalQuestionMarks`)
VALUES (1, 1, 1, 'ABC', 10);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentquestionstudentmarks`
--

CREATE TABLE `assessmentquestionstudentmarks`
(
    `studentRegCode` varchar(30) NOT NULL,
    `questionCode`   int(11)     NOT NULL,
    `obtainedMarks`  float       NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `assessmentquestionstudentmarks`
--

INSERT INTO `assessmentquestionstudentmarks` (`studentRegCode`, `questionCode`, `obtainedMarks`)
VALUES ('F18-BCSE-018', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentstudentmarks`
--

CREATE TABLE `assessmentstudentmarks`
(
    `studentRegCode`     varchar(30) NOT NULL,
    `assessmentCode`     int(11)     NOT NULL,
    `totalObtainedMarks` int(11)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `assessmentstudentmarks`
--

INSERT INTO `assessmentstudentmarks` (`studentRegCode`, `assessmentCode`, `totalObtainedMarks`)
VALUES ('F18-BCSE-018', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch`
(
    `batchCode`      int(11) NOT NULL,
    `curriculumCode` int(11) NOT NULL,
    `programCode`    int(11) NOT NULL,
    `year`           year(4) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchCode`, `curriculumCode`, `programCode`, `year`)
VALUES (1, 1, 1, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `clo`
--

CREATE TABLE `clo`
(
    `CLOCode`        int(11)      NOT NULL,
    `curriculumCode` int(11)      NOT NULL,
    `programCode`    int(11)      NOT NULL,
    `courseCode`     varchar(10)  NOT NULL,
    `cloName`        varchar(10)  NOT NULL,
    `description`    varchar(500) NOT NULL,
    `domain`         varchar(30)  NOT NULL,
    `btLevel`        varchar(20)  NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `clo`
--

INSERT INTO `clo` (`CLOCode`, `curriculumCode`, `programCode`, `courseCode`, `cloName`, `description`, `domain`,
                   `btLevel`)
VALUES (1, 1, 1, 'SEN-32', 'CLO-1', 'Handwriting', 'ABC', '4'),
       (2, 1, 1, 'SEN-32', 'CLO-2', 'Speaking', 'DEF', '2'),
       (3, 1, 1, 'SEN-33', 'CLO-1', 'Listening', 'ABC', '2');

-- --------------------------------------------------------

--
-- Table structure for table `clotoplomapping`
--

CREATE TABLE `clotoplomapping`
(
    `PLOCode` int(11) NOT NULL,
    `CLOCode` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `clotoplomapping`
--

INSERT INTO `clotoplomapping` (`PLOCode`, `CLOCode`)
VALUES (1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course`
(
    `courseCode`  varchar(10) NOT NULL,
    `programCode` int(11)     NOT NULL,
    `courseTitle` varchar(40) NOT NULL,
    `creditHours` int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `programCode`, `courseTitle`, `creditHours`)
VALUES ('SEN-30', 1, 'Artificial Intelligence', 3),
       ('SEN-31', 1, 'Programming Fundamentals', 3),
       ('SEN-32', 1, 'Data Structures', 3),
       ('SEN-33', 1, 'Discrete Mathematics', 3);

-- --------------------------------------------------------

--
-- Table structure for table `courseallocation`
--

CREATE TABLE `courseallocation`
(
    `allocationCode` int(11) NOT NULL,
    `batchCode`      int(11) NOT NULL,
    `courseCode`     varchar(30) DEFAULT NULL,
    `seasonCode`     int(11) NOT NULL,
    `offeringCode`   int(11) NOT NULL,
    `monthModified`  date    NOT NULL,
    `programCode`    int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseallocation`
--

INSERT INTO `courseallocation` (`allocationCode`, `batchCode`, `courseCode`, `seasonCode`, `offeringCode`,
                                `monthModified`, `programCode`)
VALUES (1, 1, 'SEN-30', 1, 1, '2021-01-20', 1),
       (2, 1, 'SEN-31', 1, 1, '2021-01-20', 1),
       (4, 1, 'SEN-32', 2, 2, '2021-09-20', 1),
       (5, 1, 'SEN-33', 2, 2, '2021-09-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseoffered`
--

CREATE TABLE `courseoffered`
(
    `offeringCode` int(11) NOT NULL,
    `courseCode`   varchar(10) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseoffered`
--

INSERT INTO `courseoffered` (`offeringCode`, `courseCode`)
VALUES (1, 'SEN-30'),
       (1, 'SEN-31'),
       (2, 'SEN-32'),
       (2, 'SEN-33');

-- --------------------------------------------------------

--
-- Table structure for table `courseoffering`
--

CREATE TABLE `courseoffering`
(
    `offeringCode`   int(11) NOT NULL,
    `semesterCode`   int(11) NOT NULL,
    `curriculumCode` int(11) NOT NULL,
    `batchCode`      int(11) NOT NULL,
    `seasonCode`     int(11) NOT NULL,
    `monthModified`  date    NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseoffering`
--

INSERT INTO `courseoffering` (`offeringCode`, `semesterCode`, `curriculumCode`, `batchCode`, `seasonCode`,
                              `monthModified`)
VALUES (1, 1, 1, 1, 1, '2022-01-20'),
       (2, 2, 1, 1, 2, '2021-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `courseprofile`
--

CREATE TABLE `courseprofile`
(
    `courseProfileCode`   int(11)      NOT NULL,
    `courseCode`          varchar(10)  NOT NULL,
    `programCode`         int(11)      NOT NULL,
    `batchCode`           int(11)      NOT NULL,
    `courseTitle`         varchar(40)  NOT NULL,
    `creditHours`         int(11)      NOT NULL,
    `semester`            int(11)      NOT NULL,
    `programName`         varchar(50)  NOT NULL,
    `programLevel`        varchar(20)  NOT NULL,
    `coordinatingUnit`    varchar(30)  NOT NULL,
    `teachingMethodology` varchar(100) NOT NULL,
    `courseModel`         varchar(50)  NOT NULL,
    `recommendedBooks`    varchar(200) DEFAULT NULL,
    `referenceBooks`      varchar(200) DEFAULT NULL,
    `courseDescription`   varchar(500) NOT NULL,
    `otherReferences`     varchar(200) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseprofile`
--

INSERT INTO `courseprofile` (`courseProfileCode`, `courseCode`, `programCode`, `batchCode`, `courseTitle`,
                             `creditHours`, `semester`, `programName`, `programLevel`, `coordinatingUnit`,
                             `teachingMethodology`, `courseModel`, `recommendedBooks`, `referenceBooks`,
                             `courseDescription`, `otherReferences`)
VALUES (1, 'SEN-31', 1, 1, 'Programming Fundamentals', 3, 2, 'BCSE', 'Undergraduate', 'ABC', 'ABc', 'XYZ',
        'Programming Fundamental 2', 'Programming Fundamental 2', 'ABC', 'Programming Fundamental 2');

-- --------------------------------------------------------

--
-- Table structure for table `courseprofileassessmentinstruments`
--

CREATE TABLE `courseprofileassessmentinstruments`
(
    `courseProfileCode`   int(11) NOT NULL,
    `quizWeightage`       int(11) NOT NULL,
    `assignmentWeightage` int(11) NOT NULL,
    `projectWeightage`    int(11) NOT NULL,
    `midtermWeightage`    int(11) NOT NULL,
    `finalExamWeightage`  int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseprofileassessmentinstruments`
--

INSERT INTO `courseprofileassessmentinstruments` (`courseProfileCode`, `quizWeightage`, `assignmentWeightage`,
                                                  `projectWeightage`, `midtermWeightage`, `finalExamWeightage`)
VALUES (1, 5, 10, 10, 25, 50);

-- --------------------------------------------------------

--
-- Table structure for table `courseprofileinstructordetail`
--

CREATE TABLE `courseprofileinstructordetail`
(
    `courseProfileCode` int(11) NOT NULL,
    `instructorName`    varchar(40)  DEFAULT NULL,
    `designation`       varchar(30)  DEFAULT NULL,
    `qualification`     varchar(150) DEFAULT NULL,
    `specialization`    varchar(50)  DEFAULT NULL,
    `contactNumber`     varchar(20)  DEFAULT NULL,
    `personalEmail`     varchar(30)  DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseprofileinstructordetail`
--

INSERT INTO `courseprofileinstructordetail` (`courseProfileCode`, `instructorName`, `designation`, `qualification`,
                                             `specialization`, `contactNumber`, `personalEmail`)
VALUES (1, 'M.Asif', 'Professor', 'Phd', 'Android Application Development', '0312-2547861', 'masif@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE `courseregistration`
(
    `courseRegistrationCode` int(11)     NOT NULL,
    `studentRegCode`         varchar(30) NOT NULL,
    `semesterCode`           int(11)     NOT NULL,
    `offeringCode`           int(11)     NOT NULL,
    `totalCredits`           int(11)     NOT NULL,
    `freshCredits`           int(11)     NOT NULL,
    `remarks`                varchar(30) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`courseRegistrationCode`, `studentRegCode`, `semesterCode`, `offeringCode`,
                                  `totalCredits`, `freshCredits`, `remarks`)
VALUES (1, 'F18-BCSE-011', 2, 2, 10, 6, 'Excellent'),
       (2, 'F18-BCSE-018', 2, 2, 12, 6, 'Excellent'),
       (3, 'F18-BCSE-011', 1, 1, 8, 8, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum`
(
    `curriculumCode` int(11) NOT NULL,
    `curriculumYear` year(4) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculumCode`, `curriculumYear`)
VALUES (1, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department`
(
    `departmentCode` int(11)     NOT NULL,
    `departmentName` varchar(30) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentCode`, `departmentName`)
VALUES (1, 'Engineering and IT'),
       (2, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty`
(
    `facultyCode`              varchar(30)  NOT NULL,
    `name`                     varchar(40)  NOT NULL,
    `CNIC`                     varchar(20)  NOT NULL,
    `officialEmail`            varchar(30)  NOT NULL,
    `personalEmail`            varchar(30) DEFAULT NULL,
    `address`                  varchar(150) NOT NULL,
    `contactNumber`            varchar(20)  NOT NULL,
    `picture`                  blob         NOT NULL,
    `designation`              varchar(30) DEFAULT NULL,
    `additionalResponsibility` varchar(30) DEFAULT NULL,
    `password`                 varchar(30)  NOT NULL,
    `departmentCode`           int(11)     DEFAULT NULL,
    `showEmail`                tinyint(1)  DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyCode`, `name`, `CNIC`, `officialEmail`, `personalEmail`, `address`, `contactNumber`,
                       `picture`, `designation`, `additionalResponsibility`, `password`, `departmentCode`, `showEmail`)
VALUES ('FUI-FURC-056', 'Dr. M. Aqeel Iqbal', '37401-5859968-5', 'maqeelIqbal@fui.edu.pk', 'maqeelIqbal@hotmail.com',
        'Somewhere on earth', '0312-4589635', 0xefbbbf, 'Assistant Professor', NULL, '123456789', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facultyallocations`
--

CREATE TABLE `facultyallocations`
(
    `facultyCode`            varchar(30) NOT NULL,
    `allocationCode`         int(11)     NOT NULL,
    `monthModified`          date        NOT NULL,
    `seasonCode`             int(11) DEFAULT NULL,
    `sectionCode`            int(11)     NOT NULL,
    `facultyAllocationsCode` int(11)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `facultyallocations`
--

INSERT INTO `facultyallocations` (`facultyCode`, `allocationCode`, `monthModified`, `seasonCode`, `sectionCode`,
                                  `facultyAllocationsCode`)
VALUES ('FUI-FURC-056', 1, '2021-01-20', 1, 2, 1),
       ('FUI-FURC-056', 2, '2021-01-20', 1, 2, 2),
       ('FUI-FURC-056', 4, '2021-09-20', 2, 4, 3),
       ('FUI-FURC-056', 5, '2021-09-19', 2, 5, 4),
       ('FUI-FURC-056', 5, '2021-09-19', 2, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `plo`
--

CREATE TABLE `plo`
(
    `PLOCode`        int(11)      NOT NULL,
    `curriculumCode` int(11)      NOT NULL,
    `programCode`    int(11)      NOT NULL,
    `ploName`        varchar(10)  NOT NULL,
    `ploDescription` varchar(500) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `plo`
--

INSERT INTO `plo` (`PLOCode`, `curriculumCode`, `programCode`, `ploName`, `ploDescription`)
VALUES (1, 1, 1, 'PLO-2', 'ADF');

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE `prerequisites`
(
    `courseCode`       varchar(10) NOT NULL,
    `preRequisiteName` varchar(40) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`courseCode`, `preRequisiteName`)
VALUES ('SEN-30', 'Object Oriented');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program`
(
    `programCode`    int(11)     NOT NULL,
    `curriculumCode` int(11)     NOT NULL,
    `departmentCode` int(11)     NOT NULL,
    `programName`    varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programCode`, `curriculumCode`, `departmentCode`, `programName`)
VALUES (1, 1, 1, 'Bachelors of Computer in Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `registeredcourses`
--

CREATE TABLE `registeredcourses`
(
    `courseRegistrationCode` int(11)     NOT NULL,
    `courseCode`             varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `registeredcourses`
--

INSERT INTO `registeredcourses` (`courseRegistrationCode`, `courseCode`)
VALUES (1, 'SEN-30'),
       (3, 'SEN-32'),
       (3, 'SEN-31'),
       (2, 'SEN-33'),
       (2, 'SEN-32'),
       (1, 'SEN-33');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season`
(
    `seasonCode` int(11)     NOT NULL,
    `seasonName` varchar(20) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`seasonCode`, `seasonName`)
VALUES (2, 'FA-21'),
       (1, 'SP-21');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section`
(
    `sectionCode`  int(11)     NOT NULL,
    `semesterCode` int(11)     NOT NULL,
    `sectionName`  varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionCode`, `semesterCode`, `sectionName`)
VALUES (1, 1, 'A'),
       (2, 1, 'B'),
       (3, 1, 'C'),
       (4, 2, 'A'),
       (5, 2, 'B'),
       (6, 2, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester`
(
    `semesterCode` int(11)     NOT NULL,
    `batchCode`    int(11)     NOT NULL,
    `semesterName` varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterCode`, `batchCode`, `semesterName`)
VALUES (1, 1, '1'),
       (2, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student`
(
    `studentRegCode` varchar(30) NOT NULL,
    `sectionCode`    int(11)      DEFAULT NULL,
    `name`           varchar(50) NOT NULL,
    `fatherName`     varchar(50)  DEFAULT NULL,
    `contactNumber`  varchar(20) NOT NULL,
    `officialEmail`  varchar(30)  DEFAULT NULL,
    `personalEmail`  varchar(30)  DEFAULT NULL,
    `bloodGroup`     varchar(15)  DEFAULT NULL,
    `address`        varchar(150) DEFAULT NULL,
    `dateOfBirth`    date         DEFAULT NULL,
    `password`       varchar(30) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentRegCode`, `sectionCode`, `name`, `fatherName`, `contactNumber`, `officialEmail`,
                       `personalEmail`, `bloodGroup`, `address`, `dateOfBirth`, `password`)
VALUES ('F18-BCSE-011', 4, 'Fatima', 'Rahim', '0315-2376814', 'fatima2@gmail.com', 'fatima2@gmail.com', 'A',
        'Tench bhatta Rwp', '2022-01-19', '123456'),
       ('F18-BCSE-018', 5, 'Maleeha Rahim', 'Abdul Rahim', '0315-2376813', 'maliharahim123@gmail.com',
        'maliharahim123@gmail.com', 'A', 'Tench bhatta Rwp', '2022-01-19', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `weeklytopicclo`
--

CREATE TABLE `weeklytopicclo`
(
    `weeklyTopicCode` int(11) NOT NULL,
    `CLOCode`         int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `weeklytopicclo`
--

INSERT INTO `weeklytopicclo` (`weeklyTopicCode`, `CLOCode`)
VALUES (1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weeklytopics`
--

CREATE TABLE `weeklytopics`
(
    `weeklyTopicCode`    int(11)      NOT NULL,
    `courseProfileCode`  int(11)      NOT NULL,
    `topicDetail`        varchar(500) NOT NULL,
    `assessmentCriteria` varchar(150) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `weeklytopics`
--

INSERT INTO `weeklytopics` (`weeklyTopicCode`, `courseProfileCode`, `topicDetail`, `assessmentCriteria`)
VALUES (1, 1, 'Hash Maps in Detail', 'ABC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
    ADD PRIMARY KEY (`assessmentCode`),
    ADD KEY `assessment_course_courseCode_fk` (`courseCode`),
    ADD KEY `assessment_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
    ADD PRIMARY KEY (`questionCode`),
    ADD KEY `AssessmentQuestion_assessment_assessmentCode_fk` (`assessmentCode`),
    ADD KEY `AssessmentQuestion_clo_CLOCode_fk` (`cloCode`);

--
-- Indexes for table `assessmentquestionstudentmarks`
--
ALTER TABLE `assessmentquestionstudentmarks`
    ADD KEY `AssessmentQuesStudentMarks_assessmentquestion_questionCode_fk` (`questionCode`),
    ADD KEY `AssessmentQuestionStudentMarks_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `assessmentstudentmarks`
--
ALTER TABLE `assessmentstudentmarks`
    ADD KEY `AssessmentStudentMarks_assessment_assessmentCode_fk` (`assessmentCode`),
    ADD KEY `AssessmentStudentMarks_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
    ADD PRIMARY KEY (`batchCode`),
    ADD KEY `batch_program_programCode_fk` (`programCode`),
    ADD KEY `batch_curriculum_curriculumCode_fk` (`curriculumCode`);

--
-- Indexes for table `clo`
--
ALTER TABLE `clo`
    ADD PRIMARY KEY (`CLOCode`),
    ADD KEY `CLO_course_courseCode_fk` (`courseCode`),
    ADD KEY `CLO_curriculum_curriculumCode_fk` (`curriculumCode`),
    ADD KEY `CLO_program_programCode_fk` (`programCode`);

--
-- Indexes for table `clotoplomapping`
--
ALTER TABLE `clotoplomapping`
    ADD KEY `CLOtoPLOMapping_clo_CLOCode_fk` (`CLOCode`),
    ADD KEY `CLOtoPLOMapping_plo_PLOCode_fk` (`PLOCode`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
    ADD PRIMARY KEY (`courseCode`),
    ADD KEY `Course_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseallocation`
--
ALTER TABLE `courseallocation`
    ADD PRIMARY KEY (`allocationCode`),
    ADD KEY `CourseAllocation_batch_batchCode_fk` (`batchCode`),
    ADD KEY `CourseAllocation_course_courseCode_fk` (`courseCode`),
    ADD KEY `CourseAllocation_courseoffering_offeringCode_fk` (`offeringCode`),
    ADD KEY `CourseAllocation_season_seasonCode_fk` (`seasonCode`),
    ADD KEY `courseallocation_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseoffered`
--
ALTER TABLE `courseoffered`
    ADD KEY `courseOffered_course_courseCode_fk` (`courseCode`),
    ADD KEY `courseOffered_courseoffering_offeringCode_fk` (`offeringCode`);

--
-- Indexes for table `courseoffering`
--
ALTER TABLE `courseoffering`
    ADD PRIMARY KEY (`offeringCode`),
    ADD KEY `CourseOffering_batch_batchCode_fk` (`batchCode`),
    ADD KEY `CourseOffering_curriculum_curriculumCode_fk` (`curriculumCode`),
    ADD KEY `CourseOffering_season__fk` (`seasonCode`),
    ADD KEY `CourseOffering_semester_semesterCode_fk` (`semesterCode`);

--
-- Indexes for table `courseprofile`
--
ALTER TABLE `courseprofile`
    ADD PRIMARY KEY (`courseProfileCode`),
    ADD KEY `courseProfile_batch_batchCode_fk` (`batchCode`),
    ADD KEY `courseProfile_course_courseCode_fk` (`courseCode`),
    ADD KEY `courseProfile_program_programCode_fk` (`programCode`);

--
-- Indexes for table `courseprofileassessmentinstruments`
--
ALTER TABLE `courseprofileassessmentinstruments`
    ADD KEY `CPAssessmentInstruments_courseprofile_courseProfileCode_fk` (`courseProfileCode`);

--
-- Indexes for table `courseprofileinstructordetail`
--
ALTER TABLE `courseprofileinstructordetail`
    ADD KEY `CourseProfileInstructorDetail_courseprofile_courseProfileCode_fk` (`courseProfileCode`);

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
    ADD PRIMARY KEY (`courseRegistrationCode`),
    ADD KEY `courseRegistration_courseoffering_offeringCode_fk` (`offeringCode`),
    ADD KEY `courseRegistration_semester_semesterCode_fk` (`semesterCode`),
    ADD KEY `courseRegistration_student_studentRegCode_fk` (`studentRegCode`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
    ADD PRIMARY KEY (`curriculumCode`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
    ADD PRIMARY KEY (`departmentCode`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
    ADD PRIMARY KEY (`facultyCode`),
    ADD UNIQUE KEY `Faculty_CNIC_uindex` (`CNIC`),
    ADD UNIQUE KEY `Faculty_contactNumber_uindex` (`contactNumber`),
    ADD UNIQUE KEY `Faculty_officialEmail_uindex` (`officialEmail`),
    ADD UNIQUE KEY `Faculty_personalEmail_uindex` (`personalEmail`),
    ADD KEY `faculty_department_departmentCode_fk` (`departmentCode`);

--
-- Indexes for table `facultyallocations`
--
ALTER TABLE `facultyallocations`
    ADD PRIMARY KEY (`facultyAllocationsCode`),
    ADD KEY `FacultyAllocations_courseallocation_allocationCode_fk` (`allocationCode`),
    ADD KEY `FacultyAllocations_faculty_facultyCode_fk` (`facultyCode`),
    ADD KEY `facultyallocations_season_seasonCode_fk` (`seasonCode`),
    ADD KEY `facultyallocations_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `plo`
--
ALTER TABLE `plo`
    ADD PRIMARY KEY (`PLOCode`),
    ADD KEY `PLO_curriculum_curriculumCode_fk` (`curriculumCode`),
    ADD KEY `PLO_program_programCode_fk` (`programCode`);

--
-- Indexes for table `prerequisites`
--
ALTER TABLE `prerequisites`
    ADD KEY `preRequisites_course_courseCode_fk` (`courseCode`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
    ADD PRIMARY KEY (`programCode`),
    ADD KEY `Program_curriculum_curriculumCode_fk` (`curriculumCode`),
    ADD KEY `Program_department_departmentCode_fk` (`departmentCode`);

--
-- Indexes for table `registeredcourses`
--
ALTER TABLE `registeredcourses`
    ADD KEY `RegisteredCourses_course_courseCode_fk` (`courseCode`),
    ADD KEY `RegisteredCourses_courseregistration_courseRegistrationCode_fk` (`courseRegistrationCode`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
    ADD PRIMARY KEY (`seasonCode`),
    ADD UNIQUE KEY `season_seasonName_uindex` (`seasonName`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
    ADD PRIMARY KEY (`sectionCode`),
    ADD KEY `Section_semester__fk` (`semesterCode`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
    ADD PRIMARY KEY (`semesterCode`),
    ADD KEY `semester_batch_batchCode_fk` (`batchCode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
    ADD PRIMARY KEY (`studentRegCode`),
    ADD UNIQUE KEY `Student_contactNumber_uindex` (`contactNumber`),
    ADD UNIQUE KEY `Student_officialEmail_uindex` (`officialEmail`),
    ADD UNIQUE KEY `Student_personalEmail_uindex` (`personalEmail`),
    ADD KEY `student_section_sectionCode_fk` (`sectionCode`);

--
-- Indexes for table `weeklytopicclo`
--
ALTER TABLE `weeklytopicclo`
    ADD KEY `WeeklyTopicCLO_clo_CLOCode_fk` (`CLOCode`),
    ADD KEY `WeeklyTopicCLO_weeklytopics_weeklyTopicCode_fk` (`weeklyTopicCode`);

--
-- Indexes for table `weeklytopics`
--
ALTER TABLE `weeklytopics`
    ADD PRIMARY KEY (`weeklyTopicCode`),
    ADD KEY `WeeklyTopics_courseprofile_courseProfileCode_fk` (`courseProfileCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
    MODIFY `assessmentCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
    MODIFY `questionCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
    MODIFY `batchCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `clo`
--
ALTER TABLE `clo`
    MODIFY `CLOCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `courseallocation`
--
ALTER TABLE `courseallocation`
    MODIFY `allocationCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `courseoffering`
--
ALTER TABLE `courseoffering`
    MODIFY `offeringCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `courseprofile`
--
ALTER TABLE `courseprofile`
    MODIFY `courseProfileCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `courseregistration`
--
ALTER TABLE `courseregistration`
    MODIFY `courseRegistrationCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
    MODIFY `curriculumCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
    MODIFY `departmentCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `facultyallocations`
--
ALTER TABLE `facultyallocations`
    MODIFY `facultyAllocationsCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
    MODIFY `PLOCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
    MODIFY `programCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
    MODIFY `seasonCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
    MODIFY `sectionCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
    MODIFY `semesterCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `weeklytopics`
--
ALTER TABLE `weeklytopics`
    MODIFY `weeklyTopicCode` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
    ADD CONSTRAINT `assessment_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON UPDATE CASCADE,
    ADD CONSTRAINT `assessment_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessmentquestion`
--
ALTER TABLE `assessmentquestion`
    ADD CONSTRAINT `AssessmentQuestion_assessment_assessmentCode_fk` FOREIGN KEY (`assessmentCode`) REFERENCES `assessment` (`assessmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `AssessmentQuestion_clo_CLOCode_fk` FOREIGN KEY (`cloCode`) REFERENCES `clo` (`CLOCode`) ON UPDATE CASCADE;

--
-- Constraints for table `assessmentquestionstudentmarks`
--
ALTER TABLE `assessmentquestionstudentmarks`
    ADD CONSTRAINT `AssessmentQuesStudentMarks_assessmentquestion_questionCode_fk` FOREIGN KEY (`questionCode`) REFERENCES `assessmentquestion` (`questionCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `AssessmentQuestionStudentMarks_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `assessmentstudentmarks`
--
ALTER TABLE `assessmentstudentmarks`
    ADD CONSTRAINT `AssessmentStudentMarks_assessment_assessmentCode_fk` FOREIGN KEY (`assessmentCode`) REFERENCES `assessment` (`assessmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `AssessmentStudentMarks_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
    ADD CONSTRAINT `batch_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON UPDATE CASCADE,
    ADD CONSTRAINT `batch_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE;

--
-- Constraints for table `clo`
--
ALTER TABLE `clo`
    ADD CONSTRAINT `CLO_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CLO_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON UPDATE CASCADE,
                                                                                                                                                                                                                                                                                      ADD CONSTRAINT `CLO_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clotoplomapping`
--
ALTER TABLE `clotoplomapping`
    ADD CONSTRAINT `CLOtoPLOMapping_clo_CLOCode_fk` FOREIGN KEY (`CLOCode`) REFERENCES `clo` (`CLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CLOtoPLOMapping_plo_PLOCode_fk` FOREIGN KEY (`PLOCode`) REFERENCES `plo` (`PLOCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
    ADD CONSTRAINT `Course_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE;

--
-- Constraints for table `courseallocation`
--
ALTER TABLE `courseallocation`
    ADD CONSTRAINT `CourseAllocation_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CourseAllocation_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CourseAllocation_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CourseAllocation_season_seasonCode_fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `courseallocation_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseoffered`
--
ALTER TABLE `courseoffered`
    ADD CONSTRAINT `courseOffered_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `courseOffered_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseoffering`
--
ALTER TABLE `courseoffering`
    ADD CONSTRAINT `CourseOffering_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CourseOffering_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON UPDATE CASCADE,
                                                                                                                                                                                                                                                                                                       ADD CONSTRAINT `CourseOffering_season__fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `CourseOffering_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseprofile`
--
ALTER TABLE `courseprofile`
    ADD CONSTRAINT `courseProfile_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON UPDATE CASCADE,
    ADD CONSTRAINT `courseProfile_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `courseProfile_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseprofileassessmentinstruments`
--
ALTER TABLE `courseprofileassessmentinstruments`
    ADD CONSTRAINT `CPAssessmentInstruments_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseprofileinstructordetail`
--
ALTER TABLE `courseprofileinstructordetail`
    ADD CONSTRAINT `CourseProfileInstructorDetail_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseregistration`
--
ALTER TABLE `courseregistration`
    ADD CONSTRAINT `courseRegistration_courseoffering_offeringCode_fk` FOREIGN KEY (`offeringCode`) REFERENCES `courseoffering` (`offeringCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `courseRegistration_semester_semesterCode_fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `courseRegistration_student_studentRegCode_fk` FOREIGN KEY (`studentRegCode`) REFERENCES `student` (`studentRegCode`) ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
    ADD CONSTRAINT `faculty_department_departmentCode_fk` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `facultyallocations`
--
ALTER TABLE `facultyallocations`
    ADD CONSTRAINT `FacultyAllocations_courseallocation_allocationCode_fk` FOREIGN KEY (`allocationCode`) REFERENCES `courseallocation` (`allocationCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `FacultyAllocations_faculty_facultyCode_fk` FOREIGN KEY (`facultyCode`) REFERENCES `faculty` (`facultyCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `facultyallocations_season_seasonCode_fk` FOREIGN KEY (`seasonCode`) REFERENCES `season` (`seasonCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `facultyallocations_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plo`
--
ALTER TABLE `plo`
    ADD CONSTRAINT `PLO_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `PLO_program_programCode_fk` FOREIGN KEY (`programCode`) REFERENCES `program` (`programCode`) ON UPDATE CASCADE;

--
-- Constraints for table `prerequisites`
--
ALTER TABLE `prerequisites`
    ADD CONSTRAINT `preRequisites_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
    ADD CONSTRAINT `Program_curriculum_curriculumCode_fk` FOREIGN KEY (`curriculumCode`) REFERENCES `curriculum` (`curriculumCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `Program_department_departmentCode_fk` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registeredcourses`
--
ALTER TABLE `registeredcourses`
    ADD CONSTRAINT `RegisteredCourses_course_courseCode_fk` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `RegisteredCourses_courseregistration_courseRegistrationCode_fk` FOREIGN KEY (`courseRegistrationCode`) REFERENCES `courseregistration` (`courseRegistrationCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
    ADD CONSTRAINT `Section_semester__fk` FOREIGN KEY (`semesterCode`) REFERENCES `semester` (`semesterCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
    ADD CONSTRAINT `semester_batch_batchCode_fk` FOREIGN KEY (`batchCode`) REFERENCES `batch` (`batchCode`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
    ADD CONSTRAINT `student_section_sectionCode_fk` FOREIGN KEY (`sectionCode`) REFERENCES `section` (`sectionCode`) ON UPDATE CASCADE;

--
-- Constraints for table `weeklytopicclo`
--
ALTER TABLE `weeklytopicclo`
    ADD CONSTRAINT `WeeklyTopicCLO_clo_CLOCode_fk` FOREIGN KEY (`CLOCode`) REFERENCES `clo` (`CLOCode`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `WeeklyTopicCLO_weeklytopics_weeklyTopicCode_fk` FOREIGN KEY (`weeklyTopicCode`) REFERENCES `weeklytopics` (`weeklyTopicCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weeklytopics`
--
ALTER TABLE `weeklytopics`
    ADD CONSTRAINT `WeeklyTopics_courseprofile_courseProfileCode_fk` FOREIGN KEY (`courseProfileCode`) REFERENCES `courseprofile` (`courseProfileCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;



select b.curriculumCode
from section
         join catalyst.semester s on section.semesterCode = s.semesterCode
         join
     batch b on b.batchCode = s.batchCode
         join curriculum c on b.curriculumCode = c.curriculumCode
where sectionCode = 4;



select ploName, ploDescription
from plo p
where p.curriculumCode = 1;

# where courseCode = 4 and semester =2
# select * from courseprofile ;

select b.batchCode, b.programCode
from section
         join semester s on section.semesterCode = s.semesterCode
         join batch b on
        s.batchCode = b.batchCode
         join program p on b.curriculumCode = p.curriculumCode
where sectionCode = 4;



select courseProfileCode from courseprofile cp where cp.courseCode = 'SEN-32' and cp.batchCode= 1 and cp.programCode = 1;



insert into courseprofile(courseCode, programCode, batchCode, courseTitle, creditHours, semester, programName,
                          programLevel, coordinatingUnit, teachingMethodology, courseModel, recommendedBooks, referenceBooks, courseDescription, otherReferences)
VALUES ('SEN-32', 1,1,'Programming Fundamentals',3,2,'BCSE','Undergraduate','ABC','ABc','XYZ','Programming Fundamental xxaxa',
        'Programming Fundamentalas','ABC','Programming Fundamental 2');

insert into courseprofile(courseProfileCode, courseCode, programCode, batchCode, courseTitle, creditHours, semester, programName, programLevel, coordinatingUnit, teachingMethodology, courseModel, courseDescription) VALUES(

                                                                                                                                                                                                                             )




    #  courseCode          varchar(10)  not null,
#     programCode         int          not null,
#     batchCode           int          not null,
#     courseTitle         varchar(40)  not null,
#     creditHours         int          not null,
#     semester            int          not null,
#     programName         varchar(50)  not null,
#     programLevel        varchar(20)  not null,
#     coordinatingUnit    varchar(30)  not null,
#     teachingMethodology varchar(100) not null,
#     courseModel         varchar(50)  not null,
#     recommendedBooks    varchar(200) null,
#     referenceBooks      varchar(200) null,
#     courseDescription   varchar(500) not null,
#     otherReferences     varchar(200) null,







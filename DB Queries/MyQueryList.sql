select co.courseCode,
       co.cloName,
       co.description,
       co.domain,
       co.btLevel,
       co.CLOCode,
       map.CLOCode,
       map.PLOCode,
       p.ploName,
       p.ploDescription
from clo as co
         join clotoplomapping map on co.CLOCode = map.CLOCode
         join plo p on map.PLOCode = p.PLOCode
where co.programCode = 1
  and co.curriculumCode = 1
  and co.courseCode = 'SEN-32'
ORDER BY co.cloName;


select * from clo where courseCode = 'SEN-32';


select b.curriculumCode , curriculumYear from section join catalyst.semester s on section.semesterCode = s.semesterCode join
                                              batch b on b.batchCode = s.batchCode join curriculum c on b.curriculumCode = c.curriculumCode where sectionCode=1;


select * from assessment as a join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode join assessmentquestionstudentmarks a3 on a2.questionCode = a3.questionCode where a2.questionCode;


select a2.studentRegCode , a.topic , a.totalMarks , a2.totalObtainedMarks from assessment as a join assessmentstudentmarks a2 on a.assessmentCode = a2.assessmentCode where a.assessmentCode = 3
                                                                                                                                                                        and a.sectionCode = 1 and a.courseCode = 1;









select *
from assessment as a
         join assessmentstudentmarks a2 on a.assessmentCode = a2.assessmentCode
where a.assessmentCode = 3;

select *
from assessmentquestion as aq
         join assessmentquestionstudentmarks a on aq.questionCode = a.questionCode
where a.studentRegCode = 'FUI/FURC-SP-18-BCSE-012'
  and aq.assessmentCode = 3;

select weeklyTopicCode, weeklyNo, topicDetail, assessmentCriteria
from weeklytopics
where courseProfileCode = 1
order BY weeklyTopicCode desc
    limit 1;


select *
from assessment as a
         join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
where sectionCode = 7
  and courseCode = 'SEN-32'
group by a.numberOfQuestions desc;

# Query to fetch the last most created created Sessional / mid / final. (not-working)
select a.assessmentCode,
       a.courseCode,
       a.assessmentType,
       a.assessmentSubType,
       a.title,
       a.weightage,
       @store := a.numberOfQuestions,
       a2.detail,
       a2.totalQuestionMarks
from assessment as a
    join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
where sectionCode = 7
  and courseCode = 'SEN-32'
    limit 5;


select *
from assessment;

select * from assessment where sectionCode = 7  and courseCode = 'SEN-32'order by assessmentCode desc limit 1;

select questionCode , c.cloName , detail , totalMarks
from assessment as a   join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode join clo c on a2.cloCode = c.CLOCode where sectionCode = 7 and a.courseCode = 'SEN-32' and a.assessmentCode = 63;


select questionCode , c.cloName , detail , totalMarks
from assessment as a join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode join clo c on a2.cloCode = c.CLOCode where sectionCode = 7 and a.courseCode = 'SEN-32' and a.assessmentCode = 63


select * from batch where year between
                        (select YEAR(DATE_SUB((select dateCreated from batch order by dateCreated desc limit 1), INTERVAL 5 year )))
                      and
                        (select year from batch order by year desc limit 1) order by dateCreated;


select * from clo where courseCode = 'SEN-32' and curriculumCode = 1
                    and programCode =1 and batchCode  = 7;

/** Student Dashboard*/

# current semester.
select * from batch b join semester s on b.batchCode = s.batchCode where b.batchCode = 7 order by s.semesterCode desc limit 1;


# current semester credit Hour.
select * from courseregistration join registeredcourses r on courseregistration.courseRegistrationCode = r.courseRegistrationCode where studentRegCode = 'FUI/FURC-SP-18-BCSE-040' and semesterCode = 42;


select * from courseregistration inner join registeredcourses r on courseregistration.courseRegistrationCode = r.courseRegistrationCode  inner join course c on r.courseCode = c.courseCode
where courseregistration.studentRegCode = 'FUI/FURC-SP-18-BCSE-040' and courseregistration.semesterCode = 42;



select *
from assessment as a
         join assessmentstudentmarks a2 on a.assessmentCode = a2.assessmentCode
where a.assessmentCode = 3;

select *
from assessmentquestion as aq
         join assessmentquestionstudentmarks a on aq.questionCode = a.questionCode
where a.studentRegCode = 'FUI/FURC-SP-18-BCSE-012'
  and aq.assessmentCode = 3;

select weeklyTopicCode, weeklyNo, topicDetail, assessmentCriteria
from weeklytopics
where courseProfileCode = 1
order BY weeklyTopicCode desc
    limit 1;


select *
from assessment as a
         join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
where sectionCode = 7
  and courseCode = 'SEN-32'
group by a.numberOfQuestions desc;

# Query to fetch the last most created created Sessional / mid / final. (not-working)
select a.assessmentCode,
       a.courseCode,
       a.assessmentType,
       a.assessmentSubType,
       a.title,
       a.weightage,
       @store := a.numberOfQuestions,
       a2.detail,
       a2.totalQuestionMarks
from assessment as a
    join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
where sectionCode = 7
  and courseCode = 'SEN-32'
    limit 5;


select *
from assessment;

select * from assessment where sectionCode = 7  and courseCode = 'SEN-32'order by assessmentCode desc limit 1;

select questionCode , c.cloName , detail , totalMarks
from assessment as a   join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode join clo c on a2.cloCode = c.CLOCode where sectionCode = 7 and a.courseCode = 'SEN-32' and a.assessmentCode = 63;


select questionCode , c.cloName , detail , totalMarks
from assessment as a join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode join clo c on a2.cloCode = c.CLOCode where sectionCode = 7 and a.courseCode = 'SEN-32' and a.assessmentCode = 63


select * from batch where year between
                        (select YEAR(DATE_SUB((select dateCreated from batch order by dateCreated desc limit 1), INTERVAL 5 year )))
                      and
                        (select year from batch order by year desc limit 1) order by dateCreated;


select * from clo where courseCode = 'SEN-32' and curriculumCode = 1
                    and programCode =1 and batchCode  = 7;

/** Student Dashboard*/

# current semester.
select * from batch b join semester s on b.batchCode = s.batchCode where b.batchCode = 7 order by s.semesterCode desc limit 1;


# current semester credit Hour.
select * from courseregistration join registeredcourses r on courseregistration.courseRegistrationCode = r.courseRegistrationCode where studentRegCode = 'FUI/FURC-SP-18-BCSE-040' and semesterCode = 42;


select * from courseregistration inner join registeredcourses r on courseregistration.courseRegistrationCode = r.courseRegistrationCode  inner join course c on r.courseCode = c.courseCode
where courseregistration.studentRegCode = 'FUI/FURC-SP-18-BCSE-040' and courseregistration.semesterCode = 42;


select *
from courseadvisor
         join section s on s.sectionCode = courseadvisor.sectionCode
         join semester s2 on s2.semesterCode = s.semesterCode
         join batch b on b.batchCode = s2.batchCode;

select batchCode, seasonCode, batchName, dateCreated
from batch
where programCode;

select *
from batch
         inner join semester s on batch.batchCode =
                                  (select * from semester where batch.batchCode = 1 group by semesterCode desc limit 1)
    join section s2 on s.semesterCode = s2.semesterCode;

select semesterCode, batchCode, semesterName
from semester
where batchCode = 1
group by semesterCode desc
limit 1;


select sectionCode, s.semesterCode, sectionName, sCbCsN.semesterCode, batchCode, semesterName
from section as s
         inner join (select se.semesterCode, se.batchCode, se.semesterName
                     from semester as se
                     where batchCode = 1
                     group by semesterCode desc
                     limit 1) as sCbCsN
where sCbCsN.semesterCode = s.semesterCode;


select f.departmentCode, f.facultyCode, f.officialEmail, name
from headofdepartment
         join faculty f on headofdepartment.facultyCode = f.facultyCode
where f.departmentCode;

select f.facultyCode, programCode, p.officialEmail, name, departmentCode
from programmanager p
         join faculty f on p.facultyCode = f.facultyCode
where departmentCode = 1;

select *
from faculty
         join headofdepartment h on faculty.facultyCode = h.facultyCode
         join program p on faculty.departmentCode = p.departmentCode
         join courseadvisor c on faculty.facultyCode = c.facultyCode;


select pm.facultyCode, pm.programCode, pm.officialEmail, name, f.departmentCode, programName, programShortName
from programmanager pm
         join faculty f on pm.facultyCode = f.facultyCode
         join program p on pm.programCode = p.programCode
where f.departmentCode = 1;

select ca.facultyCode,
       ca.sectionCode,
       ca.officialEmail,
       name,
       designation,
       departmentCode,
       sectionName,
       batchName,
       semesterName
from courseadvisor ca
         join faculty f on ca.facultyCode = f.facultyCode
         join section s on ca.sectionCode = s.sectionCode
         join semester s2 on s.semesterCode = s2.semesterCode
         join batch b on s2.batchCode = b.batchCode
where departmentCode = 1;

select ca.facultyCode, ca.sectionCode, ca.officialEmail, ca.password, departmentCode, programCode, b.batchCode
from courseadvisor ca
         join faculty f on ca.facultyCode = f.facultyCode
         join section s on ca.sectionCode = s.sectionCode
         join semester s2 on s.semesterCode = s2.semesterCode
         join batch b on s2.batchCode = b.batchCode;

select f.departmentCode, f.facultyCode, f.officialEmail, name, designation, departmentName, departmentShortName
from headofdepartment
         join faculty f on headofdepartment.facultyCode = f.facultyCode
         join department d on f.departmentCode = d.departmentCode
where f.departmentCode = 1;

delete
from programmanager
where facultyCode = 'FUI-FURC-058'
  and programCode = 2;

select facultyCode, sectionCode, officialEmail, password
from courseadvisor;

# FUI-FURC-058,2,pm-bscs@fui.edu.pk,cGRIqmu4E


select examHeadCode,
       name,
       CNIC,
       officialEmail,
       picture,
       address,
       contactNumber,
       password
from examhead
where officialEmail
  and password;


select p.programCode,
       p.curriculumCode,
       batchCode,
       co.courseCode,
       co.cloName,
       co.description,
       co.domain,
       co.btLevel,
       co.CLOCode,
       map.CLOCode,
       map.PLOCode,
       p.ploName,
       p.ploDescription
from clo as co
         join clotoplomapping map on co.CLOCode = map.CLOCode
         join plo p on map.PLOCode = p.PLOCode
where co.programCode = 1
  and co.curriculumCode = 1
  and co.courseCode = 'SEN-28'
  and batchCode = 4
ORDER BY co.cloName;


select cloName,
       studentRegCode,
       sum(totalQuestionMarks)                                                tQMarks,
       sum(obtainedMarks)                                                     obtainMarks,
       CAST(sum(obtainedMarks) / sum(totalQuestionMarks) * 100 as INTEGER) as result
from assessment as a
         join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
         join assessmentquestionstudentmarks a3 on a2.questionCode = a3.questionCode
         join clo c on c.CLOCode = a2.cloCode

group by a3.studentRegCode, a2.cloCode;


select cloName,
       sum(totalQuestionMarks)                                             as total,
       sum(obtainedMarks)                                                  as obtain,
       CAST(sum(obtainedMarks) / sum(totalQuestionMarks) * 100 as INTEGER) as result,
       sum(obtainedMarks) / COUNT(DISTINCT (totalQuestionMarks))              avg,
       stddev(obtainedMarks)                                               as standardDev,
       std(obtainedMarks)                                                  as standDev,
       stddev_pop(obtainedMarks)                                           as standardDevPop
from assessment as a
    join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
    join assessmentquestionstudentmarks a3 on a2.questionCode = a3.questionCode
    join clo c on c.CLOCode = a2.cloCode
where c.courseCode = 'SEN-29'
  and sectionCode = 42
  and c.batchCode = 4
  and c.curriculumCode = 1
group by a2.cloCode;


# Student Affairs Get department , program.
select programCode, departmentCode, programName, programShortName
from program;


# QUERY FOR REMOVING OLD HOD AND ASSIGNING TO NEW ONE.
select facultyCode, d.departmentCode, departmentName, departmentShortName, officialEmail, password, resignationDate
from headofdepartment
         join department d on d.departmentCode = headofdepartment.departmentCode
where officialEmail = 'hod-se@fui.edu.pk'
  and password = 123456789
  and NOT (resignationDate <=> NULL);

select facultyCode, departmentCode, officialEmail, password, resignationDate
from headofdepartment
where departmentCode = 1
  and (resignationDate <=> NULL);

delete
from headofdepartment
where departmentCode = 1
  and resignationDate <=> NULL;
update headofdepartment
set resignationDate = null
where departmentCode = 1
  and facultyCode = 'FUI-FURC-056';

select PLOCode, ploName, ploDescription, c.curriculumName, PLOCode, c.curriculumCode, p.programCode
from programcurriculum as pc
         join curriculum c on c.curriculumCode = pc.curriculumCode
         join plo p on c.curriculumCode = p.curriculumCode
where p.programCode = 2
group by PLOCode;


select semesterCode, batchCode, semesterName from semester group by batchCode desc;
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





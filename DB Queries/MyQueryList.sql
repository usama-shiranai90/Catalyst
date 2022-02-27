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
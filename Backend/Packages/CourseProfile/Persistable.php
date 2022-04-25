<?php

interface Persistable
{
//    public function saveCourseProfileData();
//    public function saveCourseProfileData($profile);
    public function saveCourseProfileData($CLOsPerCourseList , $CLOToPLOMapping , $ploArray , $courseInstructorList);

    public function loadCourseProfileData($courseProfileID , $facultyCode);

    public function modifyCourseProfileData($courseProfileID , $courseInstructorList);
}
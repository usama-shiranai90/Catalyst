<?php

interface Persistable
{
//    public function saveCourseProfileData();
//    public function saveCourseProfileData($profile);
    public function saveCourseProfileData($CLOsPerCourseList , $CLOToPLOMapping , $ploArray);

    public function loadCourseProfileData($courseProfileID);

    public function modifyCourseProfileData($courseProfileID);
}
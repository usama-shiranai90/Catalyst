<?php

interface Persistable
{
    public function saveCourseProfileData( $courseProfileID);
    public function loadCourseProfileData( $courseProfileID);
    public function modifyCourseProfileData( $courseProfileID);
}
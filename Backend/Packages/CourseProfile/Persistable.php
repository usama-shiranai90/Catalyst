<?php

interface Persistable
{
    public function saveCourseProfileData();

    public function loadCourseProfileData($courseProfileID);

    public function modifyCourseProfileData($courseProfileID);
}
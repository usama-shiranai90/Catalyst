<?php


class CourseInstructor
{
    private $instructorName;
    private $instructorDesignation;
    private $instructorQualification;
    private $instructorSpecialization;
    private $instructorContactNumber;
    private $instructorPersonalEmail;


    public function __construct()
    {

    }

    public function setAll($name, $designation, $qualification, $specialization, $contact, $personalEmail){
        $this->instructorName = $name;
        $this->instructorDesignation = $designation;
        $this->instructorQualification = $qualification;
        $this->instructorSpecialization = $specialization;
        $this->instructorContactNumber = $contact;
        $this->instructorPersonalEmail = $personalEmail;
    }

    public function getInstructorName()
    {
        return $this->instructorName;
    }

    public function setInstructorName($instructorName)
    {
        $this->instructorName = $instructorName;
    }

    public function getInstructorDesignation()
    {
        return $this->instructorDesignation;
    }

    public function setInstructorDesignation($instructorDesignation)
    {
        $this->instructorDesignation = $instructorDesignation;
    }

    public function getInstructorQualification()
    {
        return $this->instructorQualification;
    }

    public function setInstructorQualification($instructorQualification)
    {
        $this->instructorQualification = $instructorQualification;
    }

    public function getInstructorSpecialization()
    {
        return $this->instructorSpecialization;
    }

    public function setInstructorSpecialization($instructorSpecialization)
    {
        $this->instructorSpecialization = $instructorSpecialization;
    }

    public function getInstructorContactNumber()
    {
        return $this->instructorContactNumber;
    }

    public function setInstructorContactNumber($instructorContactNumber)
    {
        $this->instructorContactNumber = $instructorContactNumber;
    }

    public function getInstructorPersonalEmail()
    {
        return $this->instructorPersonalEmail;
    }

    public function setInstructorPersonalEmail($instructorPersonalEmail)
    {
        $this->instructorPersonalEmail = $instructorPersonalEmail;
    }


}
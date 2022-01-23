<?php

class Student
{
    private $registrationCode;
    private $studentName;

    public function __construct()
    {
    }

    public function getRegistrationCode()
    {
        return $this->registrationCode;
    }

    public function setRegistrationCode($registrationCode): void
    {
        $this->registrationCode = $registrationCode;
    }

    public function getStudentName()
    {
        return $this->studentName;
    }

    public function setStudentName($studentName): void
    {
        $this->studentName = $studentName;
    }

    public function toString(){
        echo "Student Name: ".$this->studentName;
        echo "Student Roll No: ".$this->registrationCode;
    }


}
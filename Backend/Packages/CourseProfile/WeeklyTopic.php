<?php

class WeeklyTopic
{
    protected $weekCode;
    protected $weekNo;
    protected $weekDescription;
    protected $weekAssessment;
    protected $weekCLOList;

    public function __construct()
    {
        $this->weekCode = '';
        $this->weekNo = '';
        $this->weekDescription = '';
        $this->weekAssessment = '';
        $this->weekCLOList = array();
    }



    public function createWeeklyTopic()
    {

    }


    public function modifyWeeklyTopic($weeklyID)
    {

    }

    /**
     * @return string
     */
    public function getWeekCode(): string
    {
        return $this->weekCode;
    }

    /**
     * @param string $weekCode
     */
    public function setWeekCode(string $weekCode): void
    {
        $this->weekCode = $weekCode;
    }

    /**
     * @return string
     */
    public function getWeekNo(): string
    {
        return $this->weekNo;
    }

    /**
     * @param string $weekNo
     */
    public function setWeekNo(string $weekNo): void
    {
        $this->weekNo = $weekNo;
    }

    /**
     * @return string
     */
    public function getWeekDescription(): string
    {
        return $this->weekDescription;
    }

    /**
     * @param string $weekDescription
     */
    public function setWeekDescription(string $weekDescription): void
    {
        $this->weekDescription = $weekDescription;
    }

    /**
     * @return string
     */
    public function getWeekAssessment(): string
    {
        return $this->weekAssessment;
    }

    /**
     * @param string $weekAssessment
     */
    public function setWeekAssessment(string $weekAssessment): void
    {
        $this->weekAssessment = $weekAssessment;
    }

    /**
     * @return array
     */
    public function getWeekCLOList(): array
    {
        return $this->weekCLOList;
    }

    /**
     * @param array $weekCLOList
     */
    public function setWeekCLOList(array $weekCLOList): void
    {
        $this->weekCLOList = $weekCLOList;
    }


}
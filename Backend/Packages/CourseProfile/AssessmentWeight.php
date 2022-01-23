<?php

class AssessmentWeight
{
    private $quizWeightage;
    private $projectWeightage;
    private $assignmentWeightage;
    private $midWeightage;
    private $finalWeightage;


    public function __construct(){

    }
    public function setAll($assignmentWeightage, $quizWeightage,
                           $projectWeightage, $midWeightage, $finalWeightage){
        $this->assignmentWeightage = $assignmentWeightage;
        $this->quizWeightage = $quizWeightage;
        $this->projectWeightage = $projectWeightage;
        $this->midWeightage = $midWeightage;
        $this->finalWeightage = $finalWeightage;
    }

    /**
     * @return mixed
     */
    public function getQuizWeightage()
    {
        return $this->quizWeightage;
    }

    /**
     * @param mixed $quizWeightage
     */
    public function setQuizWeightage($quizWeightage)
    {
        $this->quizWeightage = $quizWeightage;
    }

    /**
     * @return mixed
     */
    public function getProjectWeightage()
    {
        return $this->projectWeightage;
    }

    /**
     * @param mixed $projectWeightage
     */
    public function setProjectWeightage($projectWeightage)
    {
        $this->projectWeightage = $projectWeightage;
    }

    /**
     * @return mixed
     */
    public function getAssignmentWeightage()
    {
        return $this->assignmentWeightage;
    }

    /**
     * @param mixed $assignmentWeightage
     */
    public function setAssignmentWeightage($assignmentWeightage)
    {
        $this->assignmentWeightage = $assignmentWeightage;
    }

    /**
     * @return mixed
     */
    public function getMidWeightage()
    {
        return $this->midWeightage;
    }

    /**
     * @param mixed $midWeightage
     */
    public function setMidWeightage($midWeightage)
    {
        $this->midWeightage = $midWeightage;
    }

    /**
     * @return mixed
     */
    public function getFinalWeightage()
    {
        return $this->finalWeightage;
    }

    /**
     * @param mixed $finalWeightage
     */
    public function setFinalWeightage($finalWeightage)
    {
        $this->finalWeightage = $finalWeightage;
    }


}
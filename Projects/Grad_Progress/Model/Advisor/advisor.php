<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student List Model
 *
 */

class Advisor
{
    public $advisor_First_Name;
    public $advisor_Last_Name;
    public $student_Array;

    public function __construct($id)
    {
        if ($id == 1) {
            $this->create_Peter();
        }
        if ($id == 2) {
            $this->create_James();
        }
        if ($id == 3) {
            $this->create_Brandon();
        }
    }

    function create_Peter()
    {
        $this->advisor_First_Name = 'Peter';
        $this->advisor_Last_Name = 'James';
        $this->student_Array = array("Anne");
    }

    function create_James()
    {
        $this->advisor_First_Name = 'James';
        $this->advisor_Last_Name = 'Good';
        $this->student_Array = array("Mike", "Brad", "Neal", "Sam");
    }

    function create_Brandon()
    {
        $this->advisor_First_Name = 'Brandon';
        $this->advisor_Last_Name = 'Barnes';
        $this->student_Array = array("Jessica");
    }

}
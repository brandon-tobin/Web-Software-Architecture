<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms Model
 *
 */

class Student
{
    public $student_First_Name;
    public $form_count;
    public $form_Records_Array;


    public function __construct($id)
    {
        if ($id == 1) {
            $this->create_Anne();
        }
        if ($id == 2) {
            $this->create_Mike();
        }
        if ($id == 3) {
            $this->create_Brad();
        }
        if ($id == 4) {
            $this->create_Jessica();
        }
        if ($id == 5) {
            $this->create_Neal();
        }
        if ($id == 6) {
            $this->create_Sam();
        }
    }

    function create_Anne()
    {
        $this->student_First_Name = 'Anne';
        $this->form_count = 1;
        $this->form_Records_Array = array("January 18, 2016", "January 18, 2016", "Yes", "Link");
    }

    function create_Mike()
    {

    }

    function create_Brad()
    {

    }

    function create_Jessica()
    {

    }

    function create_Neal()
    {

    }

    function create_Sam()
    {

    }
}


<?php

namespace App\Helper;

use Illuminate\Http\Request;

class Student
{
    private $student;

    public function __construct(Request $request)
    {
        $this->student = $request->get('student');
    }

    public function get()
    {
        return $this->student;
    }

    public function id()
    {
        return $this->student->id;
    }
}

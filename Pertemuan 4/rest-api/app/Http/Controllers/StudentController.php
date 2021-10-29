<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    function index(){
        $students = Student::all();
        echo $students;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        return view('course.index');
    }

    public function create() {
        return view('course.create');
    }


    public function show(string $id)
    {
        return view('course.single', [
            'course_id' => $id,
        ]);
    }

    public function edit(string $id)
    {
        return view('course.edit', [
            'id' => $id,
        ]);
    }
}

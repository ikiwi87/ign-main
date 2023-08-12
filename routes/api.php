<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;

Route::get('student/data', [StudentController::class, 'studentData']);

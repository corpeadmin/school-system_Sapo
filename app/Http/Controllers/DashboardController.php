<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'students' => Student::count(),
            'courses' => Course::count(),
            'enrollments' => Enrollment::count(),
        ];

        $recentEnrollments = Enrollment::with(['student', 'course'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentEnrollments'));
    }
}

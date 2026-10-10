@extends('layouts.app')

@section('title', 'Edit Enrollment')
@section('heading', 'Edit Enrollment')
@section('subheading', 'Update enrollment details')

@section('content')
    <div class="max-w-2xl">
        <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="student_id" class="block text-sm font-medium text-slate-700">Student</label>
                    <select id="student_id" name="student_id"
                            class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                        <option value="">Select student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" @selected(old('student_id', $enrollment->student_id) == $student->id)>
                                {{ $student->student_number }} - {{ $student->first_name }} {{ $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="course_id" class="block text-sm font-medium text-slate-700">Course</label>
                    <select id="course_id" name="course_id"
                            class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                        <option value="">Select course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @selected(old('course_id', $enrollment->course_id) == $course->id)>
                                {{ $course->code }} - {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="enrolled_at" class="block text-sm font-medium text-slate-700">Enrolled At</label>
                    <input type="date" id="enrolled_at" name="enrolled_at"
                           value="{{ old('enrolled_at', $enrollment->enrolled_at?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                </div>
                <div>
                    <label for="grade" class="block text-sm font-medium text-slate-700">Grade (optional)</label>
                    <input type="text" id="grade" name="grade" value="{{ old('grade', $enrollment->grade) }}" maxlength="5"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
                <button type="submit"
                        class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700">
                    Update Enrollment
                </button>
                <a href="{{ route('enrollments.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection

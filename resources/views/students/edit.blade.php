@extends('layouts.app')

@section('title', 'Edit Student')
@section('heading', 'Edit Student')
@section('subheading', $student->first_name . ' ' . $student->last_name)

@section('content')
    <div class="max-w-2xl">
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:grid-cols-2">
                <div>
                    <label for="student_number" class="block text-sm font-medium text-slate-700">Student Number</label>
                    <input type="text" id="student_number" name="student_number" value="{{ old('student_number', $student->student_number) }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-slate-700">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth"
                           value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="first_name" class="block text-sm font-medium text-slate-700">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-slate-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                    Update Student
                </button>
                <a href="{{ route('students.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection

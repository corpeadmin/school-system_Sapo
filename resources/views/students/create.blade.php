@extends('layouts.app')

@section('title', 'New Student')
@section('heading', 'New Student')
@section('subheading', 'Add a new student record')

@section('content')
    <div class="max-w-2xl">
        <form action="{{ route('students.store') }}" method="POST" class="space-y-6 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="student_number" class="block text-sm font-medium text-slate-700">Student Number</label>
                    <input type="text" name="student_number" id="student_number" value="{{ old('student_number') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="date_of_birth" class="mt-0 block text-sm font-medium text-slate-700">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="first_name" class="block text-sm font-medium text-slate-700">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-slate-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                    Save Student
                </button>
                <a href="{{ route('students.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'New Course')
@section('heading', 'New Course')
@section('subheading', 'Add a course to the catalog')

@section('content')
    <div class="max-w-2xl">
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:grid-cols-2">
                <div>
                    <label for="code" class="block text-sm font-medium text-slate-700">Course Code</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                </div>
                <div>
                    <label for="credit" class="block text-sm font-medium text-slate-700">Credits</label>
                    <input type="number" id="credit" name="credit" min="1" max="10" value="{{ old('credit') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label for="title" class="block text-sm font-medium text-slate-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                           class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
                <button type="submit"
                        class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                    Save Course
                </button>
                <a href="{{ route('courses.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection

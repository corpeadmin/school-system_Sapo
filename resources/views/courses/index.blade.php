@extends('layouts.app')

@section('title', 'Courses')
@section('heading', 'Courses')
@section('subheading', 'Manage course catalog')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('courses.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
            <span class="text-lg leading-none">+</span> New Course
        </a>
    </div>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-6 py-3">Code</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Credits</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($courses as $course)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-3 font-mono font-medium text-slate-900">{{ $course->code }}</td>
                        <td class="px-6 py-3 text-slate-800">{{ $course->title }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $course->credit }}</td>
                        <td class="px-6 py-3">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('courses.show', $course) }}" class="font-medium text-slate-600 hover:text-slate-900">View</a>
                                <a href="{{ route('courses.edit', $course) }}" class="font-medium text-emerald-600 hover:text-emerald-700">Edit</a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                      onsubmit="return confirm('Delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:text-red-700">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $courses->links() }}
    </div>
@endsection

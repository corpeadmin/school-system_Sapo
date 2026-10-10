@extends('layouts.app')

@section('title', 'Course Details')
@section('heading', 'Course Details')
@section('subheading', $course->code . ' - ' . $course->title)

@section('content')
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 lg:col-span-1">
            <dl class="space-y-4 text-sm">
                <div>
                    <dt class="font-medium text-slate-500">Course Code</dt>
                    <dd class="mt-1 font-mono text-slate-900">{{ $course->code }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Title</dt>
                    <dd class="mt-1 text-slate-900">{{ $course->title }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Credits</dt>
                    <dd class="mt-1 text-slate-900">{{ $course->credit }}</dd>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('courses.edit', $course) }}"
                   class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">
                    Edit
                </a>
                <a href="{{ route('courses.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Back</a>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200 lg:col-span-2">
            <div class="border-b border-slate-200 px-6 py-4">
                <h2 class="text-base font-semibold text-slate-900">Enrolled Students</h2>
            </div>
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-6 py-3">Student</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Grade</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($course->students as $student)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-3 text-slate-900">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="px-6 py-3 text-slate-600">{{ $student->email }}</td>
                            <td class="px-6 py-3 text-slate-600">{{ $student->pivot->grade ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-slate-400">No students enrolled.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

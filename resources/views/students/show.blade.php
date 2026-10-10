@extends('layouts.app')

@section('title', 'Student Details')
@section('heading', 'Student Details')
@section('subheading', $student->first_name . ' ' . $student->last_name)

@section('content')
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 lg:col-span-1">
            <dl class="space-y-4 text-sm">
                <div>
                    <dt class="font-medium text-slate-500">Student Number</dt>
                    <dd class="mt-1 font-mono text-slate-900">{{ $student->student_number }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Full Name</dt>
                    <dd class="mt-1 text-slate-900">{{ $student->first_name }} {{ $student->last_name }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Email</dt>
                    <dd class="mt-1 text-slate-900">{{ $student->email }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Date of Birth</dt>
                    <dd class="mt-1 text-slate-900">{{ $student->date_of_birth?->format('M d, Y') }}</dd>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('students.edit', $student) }}"
                   class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                    Edit
                </a>
                <a href="{{ route('students.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Back</a>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200 lg:col-span-2">
            <div class="border-b border-slate-200 px-6 py-4">
                <h2 class="text-base font-semibold text-slate-900">Enrolled Courses</h2>
            </div>
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-6 py-3">Code</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Grade</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($student->courses as $course)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-3 font-mono text-slate-600">{{ $course->code }}</td>
                            <td class="px-6 py-3 text-slate-900">{{ $course->title }}</td>
                            <td class="px-6 py-3 text-slate-600">{{ $course->pivot->grade ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-slate-400">No courses enrolled.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

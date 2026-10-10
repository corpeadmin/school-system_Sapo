@extends('layouts.app')

@section('title', 'Enrollment Details')
@section('heading', 'Enrollment Details')
@section('subheading', 'Enrollment record')

@section('content')
    <div class="max-w-2xl">
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <dl class="space-y-4 text-sm">
                <div>
                    <dt class="font-medium text-slate-500">Student</dt>
                    <dd class="mt-1 text-slate-900">
                        {{ $enrollment->student?->first_name }} {{ $enrollment->student?->last_name }}
                        <span class="ml-2 text-slate-500">({{ $enrollment->student?->student_number }})</span>
                    </dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Course</dt>
                    <dd class="mt-1 text-slate-900">
                        {{ $enrollment->course?->code }} - {{ $enrollment->course?->title }}
                    </dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Grade</dt>
                    <dd class="mt-1 text-slate-900">{{ $enrollment->grade ?? 'Not assigned' }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-500">Enrolled At</dt>
                    <dd class="mt-1 text-slate-900">{{ $enrollment->enrolled_at?->format('M d, Y') }}</dd>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('enrollments.edit', $enrollment) }}"
                   class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-700">
                    Edit
                </a>
                <a href="{{ route('enrollments.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">Back</a>
            </div>
        </div>
    </div>
@endsection

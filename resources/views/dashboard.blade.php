@extends('layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('subheading', 'Overview of students, courses and enrollments')

@section('content')
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
        @php
            $cards = [
                ['label' => 'Students', 'value' => $stats['students'], 'route' => 'students.index', 'color' => 'bg-indigo-500'],
                ['label' => 'Courses', 'value' => $stats['courses'], 'route' => 'courses.index', 'color' => 'bg-emerald-500'],
                ['label' => 'Enrollments', 'value' => $stats['enrollments'], 'route' => 'enrollments.index', 'color' => 'bg-amber-500'],
            ];
        @endphp
        @foreach ($cards as $card)
            <a href="{{ route($card['route']) }}" class="group rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:shadow-md">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-500">{{ $card['label'] }}</span>
                    <span class="h-2.5 w-2.5 rounded-full {{ $card['color'] }}"></span>
                </div>
                <p class="mt-3 text-3xl font-bold text-slate-900">{{ $card['value'] }}</p>
                <span class="mt-2 inline-block text-sm font-medium text-indigo-600 group-hover:text-indigo-700">View all &rarr;</span>
            </a>
        @endforeach
    </div>

    <div class="mt-10 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="text-base font-semibold text-slate-900">Recent Enrollments</h2>
        </div>
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-6 py-3">Student</th>
                    <th class="px-6 py-3">Course</th>
                    <th class="px-6 py-3">Grade</th>
                    <th class="px-6 py-3">Enrolled</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($recentEnrollments as $enrollment)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-3 font-medium text-slate-900">
                            {{ $enrollment->student?->first_name }} {{ $enrollment->student?->last_name }}
                        </td>
                        <td class="px-6 py-3 text-slate-600">{{ $enrollment->course?->title }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $enrollment->grade ?? '—' }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $enrollment->enrolled_at?->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">No enrollments yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

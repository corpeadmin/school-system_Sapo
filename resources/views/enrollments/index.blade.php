@extends('layouts.app')

@section('title', 'Enrollments')
@section('heading', 'Enrollments')
@section('subheading', 'Track student course enrollments')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('enrollments.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700">
            <span class="text-lg leading-none">+</span> New Enrollment
        </a>
    </div>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-6 py-3">Student</th>
                    <th class="px-6 py-3">Course</th>
                    <th class="px-6 py-3">Grade</th>
                    <th class="px-6 py-3">Enrolled At</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($enrollments as $enrollment)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-3 text-slate-900">
                            {{ $enrollment->student?->first_name }} {{ $enrollment->student?->last_name }}
                        </td>
                        <td class="px-6 py-3 text-slate-900">{{ $enrollment->course?->code }} - {{ $enrollment->course?->title }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $enrollment->grade ?? '—' }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $enrollment->enrolled_at?->format('M d, Y') }}</td>
                        <td class="px-6 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('enrollments.show', $enrollment) }}" class="rounded-md px-2.5 py-1 text-xs font-medium text-slate-600 hover:bg-slate-100">View</a>
                                <a href="{{ route('enrollments.edit', $enrollment) }}" class="rounded-md px-2.5 py-1 text-xs font-medium text-amber-600 hover:bg-amber-50">Edit</a>
                                <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" onsubmit="return confirm('Delete this enrollment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md px-2.5 py-1 text-sm font-medium text-red-600 hover:bg-red-50">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-400">No enrollments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $enrollments->links() }}
    </div>
@endsection

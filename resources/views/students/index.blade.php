@extends('layouts.app')

@section('title', 'Students')
@section('heading', 'Students')
@section('subheading', 'Manage student records')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('students.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
            <span class="text-lg leading-none">+</span> New Student
        </a>
    </div>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-6 py-3">Student No.</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Date of Birth</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($students as $student)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-3 font-mono text-xs text-slate-500">{{ $student->student_number }}</td>
                        <td class="px-6 py-3 font-medium text-slate-900">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $student->email }}</td>
                        <td class="px-6 py-3 text-slate-600">{{ $student->date_of_birth?->format('M d, Y') }}</td>
                        <td class="px-6 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('students.show', $student) }}" class="rounded-md px-2.5 py-1 text-xs font-medium text-slate-600 hover:bg-slate-100">View</a>
                                <a href="{{ route('students.edit', $student) }}" class="rounded-md px-2.5 py-1 text-xs font-medium text-indigo-600 hover:bg-indigo-50">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md px-2.5 py-1 text-sm font-medium text-red-600 hover:bg-red-50">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $students->links() }}
    </div>
@endsection

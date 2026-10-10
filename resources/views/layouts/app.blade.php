<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'School System')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-100 font-sans text-slate-800 antialiased">
    <div class="min-h-full">
        <nav class="bg-slate-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-8">
                        <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-white">
                            School System
                        </a>
                        <div class="hidden items-center gap-1 md:flex">
                            @php
                                $links = [
                                    ['route' => 'dashboard', 'label' => 'Dashboard'],
                                    ['route' => 'students.index', 'label' => 'Students'],
                                    ['route' => 'courses.index', 'label' => 'Courses'],
                                    ['route' => 'enrollments.index', 'label' => 'Enrollments'],
                                ];
                            @endphp
                            @foreach ($links as $link)
                                @php $active = request()->routeIs($link['route']) || request()->routeIs(explode('.', $link['route'])[0] . '.*'); @endphp
                                <a href="{{ route($link['route']) }}"
                                   class="rounded-md px-3 py-2 text-sm font-medium transition {{ $active ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                                    {{ $link['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">@yield('heading', 'Dashboard')</h1>
                @hasSection('subheading')
                    <p class="mt-1 text-sm text-slate-500">@yield('subheading')</p>
                @endif
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                    <p class="font-semibold">Please fix the following errors:</p>
                    <ul class="mt-1 list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>

@inject('report', 'App\Service\Report\ReportContract')

@php
    $hasLeaveTime = $report->getLeaveTime(auth()->user());
@endphp

@extends('layout.app')
@section('title', 'Главная')
@section('content')
    @if($hasLeaveTime !== false)
    <form action="{{ route('time.leave', auth()->user()) }}" method="POST">
        @csrf
        <button type="submit" class="w-full h-12 bg-red-700 rounded-lg text-white font-medium text-lg mb-2">Я ушёл
        </button>
    </form>
    @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div
                class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"
            ></div>
        </div>
{{--        <div class="grid grid-cols-2 gap-4 mb-4">--}}
{{--            <div--}}
{{--                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"--}}
{{--            ></div>--}}
{{--            <div--}}
{{--                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"--}}
{{--            ></div>--}}
{{--            <div--}}
{{--                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"--}}
{{--            ></div>--}}
{{--            <div--}}
{{--                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"--}}
{{--            ></div>--}}
{{--        </div>--}}
@endsection

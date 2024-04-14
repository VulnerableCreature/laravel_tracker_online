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
    <div class="p-8 lg:p-20 bg-blue-700 rounded-2xl lg:rounded-6xl">
        <div>
            <p class="mt-8 text-4xl font-display font-semibold md:text-2xl lg:text-5xl text-lime-500">
                Отслеживайте присутствие, управляйте эффективностью –
                <span class="md:block md:text-white"> ваше приложение для умного контроля</span></p></div>
        <div class="grid text-left grid-cols-1 gap-10 lg:grid-cols-3 lg:gap-32 lg:items-end"><p
                class="text-white text-lg mt-8 lg:col-span-2">
                Мы - вдохновленная команда, которая стремится упростить и усовершенствовать способы отслеживания посещений. Наше приложение - это инновационное решение, предназначенное для управления присутствием с легкостью и точностью. Мы верим в силу технологии для создания эффективных и удобных инструментов, которые помогают организациям и предпринимателям достигать новых высот в управлении и анализе данных о посещаемости. Наша цель - обеспечить наших пользователей не только надежным инструментом, но и вдохновляющим опытом, который помогает им принимать информированные решения и достигать успеха
            </p>
        </div>
    </div>
{{--    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">--}}
{{--        <div--}}
{{--            class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"--}}
{{--        ></div>--}}
{{--        <div--}}
{{--            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"--}}
{{--        ></div>--}}
{{--        <div--}}
{{--            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"--}}
{{--        ></div>--}}
{{--        <div--}}
{{--            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"--}}
{{--        ></div>--}}
{{--    </div>--}}
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

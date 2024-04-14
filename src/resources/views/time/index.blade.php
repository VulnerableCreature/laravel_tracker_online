@extends('layout.app')
@section('title', 'Посещение')
@section('content')
    <div class="w-full flex flex-col gap-2">
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
             role="alert">
            <span class="font-medium">Вы пришли на работу/учебу! Удачного дня!</span>
        </div>
        <a href="{{ route('main.index') }}" class="w-full flex items-center justify-center h-12 p-2 bg-blue-700 rounded-lg text-white font-medium text-lg">На
            главную</a>
    </div>
@endsection

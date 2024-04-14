<!doctype html>
<html lang="ru">
@include('includes.head')
<body class="h-screen">
@if(auth()->check())
    <div class="h-full antialiased bg-gray-50 dark:bg-gray-900">
        @include('includes.header')
        @include('includes.aside')
        @include('includes.content')
    </div>
@endif
</body>
</html>

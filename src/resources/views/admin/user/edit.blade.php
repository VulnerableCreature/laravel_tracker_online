@extends('layout.app')
@section('title', "Обновление пользователя $user->fullName")
@section('content')
    <section>
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Обновление пользователя | {{ $user->fullName }}</h2>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
                        <input type="text" name="surname" id="surname"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               value="{{ $user->surname }}">
                    </div>
                    <div class="w-full">
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                        <input type="text" name="name" id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               value="{{ $user->name }}">
                    </div>
                    <div class="w-full">
                        <label for="middleName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Отчество</label>
                        <input type="text" name="middleName" id="middleName"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               value="{{ $user->middleName }}">
                    </div>
                    <div>
                        <label for="role_id"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Роль</label>
                        <select id="role_id" name="role_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach($roles as $role)
                                <option @selected($role->id == $user->role?->id) value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="division_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Подразделение</label>
                        <select id="division_id" name="division_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach($divisions as $division)
                                <option @selected($division->id == $user->division?->id) value="{{ $division->id }}">{{ $division->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Обновить
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

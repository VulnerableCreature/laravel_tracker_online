@extends('layout.app')
@section('title', 'Посещение')
@section('content')
    @forelse($dates as $date)
        <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow mb-2">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{Carbon\Carbon::parse($date)->translatedFormat('d F Y г.')}}</h5>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Подразделение
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Действие
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($divisions as $index => $division)
                        @if ($division['date'] == $date)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $division['title'] }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{ route('report.show', ['division_id' => $division['id'], 'date'=>$date]) }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                  d="M15.28 9.47a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L13.69 10 9.97 6.28a.75.75 0 0 1 1.06-1.06l4.25 4.25ZM6.03 5.22l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L8.69 10 4.97 6.28a.75.75 0 0 1 1.06-1.06Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
    @endforelse
@endsection

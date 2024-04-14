@extends('layout.app')
@section('title')
    @foreach($reportsByUser->first() as $report)
        {{ $division = $report->division?->title  }}
    @endforeach
    Подразделение | {{ $division }} | {{ $date }}
@endsection
@section('content')
    <div class="flex items-center justify-start gap-2 mb-5">
        <a href="{{ route('report.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.612l4.158 3.96a.75.75 0 1 1-1.04 1.08l-5.5-5.25a.75.75 0 0 1 0-1.08l5.5-5.25a.75.75 0 1 1 1.04 1.08L5.612 9.25H16.25A.75.75 0 0 1 17 10Z" clip-rule="evenodd" />
            </svg>
        </a>

        <span class="text-lg font-bold tracking-tight text-gray-900">Подразделение | {{ $division }} | {{ $date }}</span>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Сотрудник
                </th>
                <th scope="col" class="px-6 py-3">
                    Время прихода
                </th>
                <th scope="col" class="px-6 py-3">
                    Время ухода
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reportsByUser as $userId => $userReports)
                @php $user = $userReports->first()?->user @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->fullName }}
                    </td>
                    @foreach ($userReports as $report)
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($report->entry_time)->translatedFormat('d F Y H:i:s') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($report->leave_time)->translatedFormat('d F Y H:i:s') ?? "-" }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

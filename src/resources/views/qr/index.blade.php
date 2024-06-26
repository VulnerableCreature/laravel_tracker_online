@extends('layout.app')
@section('title', 'QrCode')
<section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                 alt="logo">
            Трекер
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                {!! $qrCode !!}
            </div>
        </div>
    </div>
</section>

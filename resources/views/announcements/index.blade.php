@extends('layouts.main')

@section('title', 'Announcements')

@section('content')
    <!-- Page Header -->
    <div class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Announcements
                    </h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Send announcements to all customers
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Announcement Form -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form method="POST" action="{{ route('announcements.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        required
                        class="mt-1 block w-full rounded-md
                               border-gray-300 dark:border-gray-700
                               bg-white dark:bg-gray-900
                               text-gray-900 dark:text-white
                               focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Description
                    </label>
                    <textarea
                        name="description"
                        rows="5"
                        required
                        class="mt-1 block w-full rounded-md
                               border-gray-300 dark:border-gray-700
                               bg-white dark:bg-gray-900
                               text-gray-900 dark:text-white
                               focus:ring-blue-500 focus:border-blue-500"
                    ></textarea>
                </div>

                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2
                               bg-blue-600 text-white rounded-md
                               text-sm font-medium
                               hover:bg-blue-700"
                    >
                        Send Announcement 📧
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

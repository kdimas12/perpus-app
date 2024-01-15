<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-700">Add a new Alternative</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('categories') }}"
                                class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="mb-3">
                        <h3 class="font-semibold text-base text-gray-700">Find your book!</h3>
                    </div>
                    <form action="{{ route('home') }}" method="get" class="flex flex-col md:flex-row gap-3">
                        <div class="relative md:w-4/5">
                            <label for="searchbar" class="sr-only"> Search </label>
                            <input type="text" id="searchbar"
                                placeholder="{{ request('q') == '' ? 'Search for...' : request('q') }}" name="q"
                                class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />
                            <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                                <span class="sr-only">Search</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                        </div>
                        <div class="w-full md:w-1/5">
                            <select name="category" id="category"
                                class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm">
                                <option value="">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->book_category_id }}"
                                        {{ request('category') == $category->book_category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full md:w-1/5">
                            <button type="submit"
                                class="w-full rounded-md bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full mx-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full rounded ">
                        <div class="block w-full overflow-x-auto">
                            <form action="{{ route('evaluations.store') }}" method="POST">
                                @csrf
                                <table class="items-center bg-transparent w-full border-collapse table-auto">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left">
                                                Title
                                            </th>
                                            <th
                                                class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Category
                                            </th>
                                            <th
                                                class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                ISBN
                                            </th>
                                            <th
                                                class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Description
                                            </th>
                                            <th
                                                class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Status
                                            </th>
                                            <th
                                                class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-20">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($books->count() > 0)
                                            @foreach ($books as $key => $book)
                                                <tr>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 p-4 text-left">
                                                        <p class="text-sm font-bold">{{ $book->title }}</p>
                                                        <p class="text-xs italic">{{ $book->code }}</p>
                                                        <p class="text-sm">{{ $book->author }}. {{ $book->year }}.
                                                            {{ $book->publish_city }}:
                                                            {{ $book->publisher->name }}</p>
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $book->category->name }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $book->isbn }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $book->description }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <x-badge-status :status="$book->status">
                                                            {{ $book->status }}
                                                        </x-badge-status>
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        {{-- Form checkbox --}}
                                                        <input type="checkbox" name="book[]"
                                                            value="{{ $book->book_id }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center text-sm py-2">No data found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                <div class="flex justify-end mt-4">
                                    <button type="submit"
                                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

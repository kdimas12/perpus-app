<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full mx-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full rounded mb-4">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-gray-700">Add a new Book</h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <a href="{{ route('books') }}"
                                        class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Back to List
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="px-4">
                            <form method="POST" action="{{ route('books.create') }}"
                                class="container flex flex-col mx-auto">
                                @csrf

                                <fieldset class="grid grid-cols-4 gap-6 p-6">
                                    <div class="space-y-2 col-span-full lg:col-span-1">
                                        <p class="font-medium">Book Information</p>
                                        <p class="text-xs">Insert information of the book!</p>
                                    </div>
                                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                                        <div class="col-span-full sm:col-span-2">
                                            <label for="code" class="text-sm">Code</label>
                                            <input id="code" name="code" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="title" class="text-sm">Title</label>
                                            <input id="title" name="title" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-3">
                                            <label for="author" class="text-sm">Author</label>
                                            <input id="author" name="author" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('author')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-2">
                                            <label for="genre" class="text-sm">Genre</label>
                                            <input id="genre" name="genre" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-2">
                                            <label for="year" class="text-sm">Year</label>
                                            <input id="year" name="year" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-2">
                                            <label for="edition" class="text-sm">Edition</label>
                                            <input id="edition" name="edition" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('edition')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-2">
                                            <label for="isbn" class="text-sm">ISBN</label>
                                            <input id="isbn" name="isbn" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="publisher_id" class="text-sm">Publisher</label>
                                            <select id="publisher_id" name="publisher_id" class="w-full rounded-md">
                                                <option value="">Select Publisher</option>
                                                @foreach ($publishers as $publisher)
                                                    <option value="{{ $publisher->publisher_id }}">
                                                        {{ $publisher->publisher_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-2">
                                            <label for="publish_city" class="text-sm">Publish City</label>
                                            <input id="publish_city" name="publish_city" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('publish_city')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full">
                                            <label for="category_id" class="text-sm">Category</label>
                                            <select id="category_id" name="category_id" class="w-full rounded-md">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_id }}">
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full">
                                            <label for="description" class="text-sm">Description</label>
                                            <textarea id="description" name="description" class="w-full rounded-md dark:border-gray-700 dark:text-gray-900"></textarea>
                                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full">
                                            <label for="status" class="text-sm">Status</label>
                                            <select id="status" name="status" class="w-full rounded-md">
                                                <option value="">Select Status</option>
                                                <option value="available">available</option>
                                                <option value="unavailable">unavailable</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                        </div>
                                    </div>
                                </fieldset>
                                {{-- Button Submit --}}
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Add
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

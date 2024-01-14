<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Evaluation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-700">Edit a book of
                                "{{ $alternative->book->title }}"</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('evaluations') }}"
                                class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full mx-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full rounded mb-4">
                        <div class="px-4">
                            <form method="POST"
                                action="{{ route('evaluations.update', ['evaluation' => $alternative->evaluation->evaluation_id]) }}"
                                class="container flex flex-col mx-auto">
                                @csrf
                                @method('PATCH')

                                <fieldset class="grid grid-cols-4 gap-6 p-6">
                                    <div class="space-y-2 col-span-full lg:col-span-1">
                                        <p class="font-medium">Evaluation</p>
                                        <p class="text-xs">Edit information of the publisher!</p>
                                    </div>
                                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="book_type" class="text-sm">Book Type</label>
                                            <select name="book_type" id="book_type" class="w-full rounded-md">
                                                <option value="0"
                                                    {{ $alternative->evaluation->book_type == 0 ? 'selected' : '' }}>
                                                    Choose</option>
                                                <option value="6"
                                                    {{ $alternative->evaluation->book_type == 6 ? 'selected' : '' }}>
                                                    Fiction</option>
                                                <option value="5"
                                                    {{ $alternative->evaluation->book_type == 5 ? 'selected' : '' }}>
                                                    Non-Fiction</option>
                                                <option value="4"
                                                    {{ $alternative->evaluation->book_type == 4 ? 'selected' : '' }}>
                                                    Bisnis, Ekonomi, dan Manajemen</option>
                                                <option value="3"
                                                    {{ $alternative->evaluation->book_type == 3 ? 'selected' : '' }}>
                                                    Sains Teknologi dan Pendidikan</option>
                                                <option value="2"
                                                    {{ $alternative->evaluation->book_type == 2 ? 'selected' : '' }}>
                                                    Hukum dan Politik</option>
                                                <option value="1"
                                                    {{ $alternative->evaluation->book_type == 1 ? 'selected' : '' }}>
                                                    Literatur Lainnya</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('book_type')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="book_loan" class="text-sm">Jumlah Peminjam</label>
                                            <input type="number" name="book_loan" id="book_loan"
                                                class="w-full rounded-md"
                                                value="{{ $alternative->evaluation->book_loan }}">
                                            <x-input-error :messages="$errors->get('book_loan')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="popularity" class="text-sm">Popularity</label>
                                            <select name="popularity" id="popularity" class="w-full rounded-md">
                                                <option value="0"
                                                    {{ $alternative->evaluation->popularity == 0 ? 'selected' : '' }}>
                                                    Choose</option>
                                                <option value="5"
                                                    {{ $alternative->evaluation->popularity == 5 ? 'selected' : '' }}>
                                                    Sangat Baik</option>
                                                <option value="4"
                                                    {{ $alternative->evaluation->popularity == 4 ? 'selected' : '' }}>
                                                    Baik</option>
                                                <option value="3"
                                                    {{ $alternative->evaluation->popularity == 3 ? 'selected' : '' }}>
                                                    Cukup</option>
                                                <option value="2"
                                                    {{ $alternative->evaluation->popularity == 2 ? 'selected' : '' }}>
                                                    Buruk</option>
                                                <option value="1"
                                                    {{ $alternative->evaluation->popularity == 1 ? 'selected' : '' }}>
                                                    Sangat Buruk</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('popularity')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="availability" class="text-sm">Availability</label>
                                            <select name="availability" id="availability" class="w-full rounded-md">
                                                <option value="0"
                                                    {{ $alternative->evaluation->availability == 0 ? 'selected' : '' }}>
                                                    Choose</option>
                                                <option value="5"
                                                    {{ $alternative->evaluation->availability == 5 ? 'selected' : '' }}>
                                                    Sangat Banyak (>8)</option>
                                                <option value="4"
                                                    {{ $alternative->evaluation->availability == 4 ? 'selected' : '' }}>
                                                    Banyak (5 - 8)</option>
                                                <option value="3"
                                                    {{ $alternative->evaluation->availability == 3 ? 'selected' : '' }}>
                                                    Cukup (3 - 4)</option>
                                                <option value="2"
                                                    {{ $alternative->evaluation->availability == 2 ? 'selected' : '' }}>
                                                    Sedikit (2)</option>
                                                <option value="1"
                                                    {{ $alternative->evaluation->availability == 1 ? 'selected' : '' }}>
                                                    Sangat Sedikit (1)</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                                        </div>
                                    </div>
                                </fieldset>
                                {{-- Button Submit --}}
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
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

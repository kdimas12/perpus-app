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
                            <h3 class="font-semibold text-base text-gray-700">Edit a new Evaluation</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('publishers') }}"
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
                            <form method="POST" action="#" class="container flex flex-col mx-auto">
                                @csrf
                                @method('PATCH')

                                <fieldset class="grid grid-cols-4 gap-6 p-6">
                                    <div class="space-y-2 col-span-full lg:col-span-1">
                                        <p class="font-medium">Evaluation</p>
                                        <p class="text-xs">Edit information of the publisher!</p>
                                    </div>
                                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="jenis_buku" class="text-sm">Jenis Buku</label>
                                            <select name="jenis_buku" id="jenis_buku" class="w-full rounded-md">
                                                <option value="1">Fiksi</option>
                                                <option value="2">Non-Fiksi</option>
                                                <option value="3">Bisnis, Ekonomi, dan Manajemen</option>
                                                <option value="4">Sains Teknologi dan Pendidikan</option>
                                                <option value="5">Novel</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('jenis_buku')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="jumlah_peminjam" class="text-sm">Jumlah Peminjam</label>
                                            <input type="number" name="jumlah_peminjam" id="jumlah_peminjam"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('jumlah_peminjam')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="popularitas" class="text-sm">Popularitas</label>
                                            <select name="popularitas" id="popularitas" class="w-full rounded-md">
                                                <option value="1">Sangat Baik</option>
                                                <option value="2">Baik</option>
                                                <option value="3">Cukup</option>
                                                <option value="4">Buruk</option>
                                                <option value="5">Sangat Buruk</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('popularitas')" class="mt-2" />
                                        </div>
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="ketersediaan" class="text-sm">Ketersediaan</label>
                                            <input type="number" name="ketersediaan" id="ketersediaan"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('ketersediaan')" class="mt-2" />
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

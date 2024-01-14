<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Publisher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-700">Add a new Publisher</h3>
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
                            <form method="POST" action="{{ route('publishers.store') }}"
                                class="container flex flex-col mx-auto">
                                @csrf

                                <fieldset class="grid grid-cols-4 gap-6 p-6">
                                    <div class="space-y-2 col-span-full lg:col-span-1">
                                        <p class="font-medium">Publisher Information</p>
                                        <p class="text-xs">Insert information of the publisher!</p>
                                    </div>
                                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                                        <div class="col-span-full sm:col-span-4">
                                            <label for="publisher_name" class="text-sm">Publisher Name</label>
                                            <input id="publisher_name" name="publisher_name" type="text"
                                                class="w-full rounded-md">
                                            <x-input-error :messages="$errors->get('publisher_name')" class="mt-2" />
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

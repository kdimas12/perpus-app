<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publishers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-700">Data Publishers</h3>
                            <p class="text-sm text-gray-500">The following data of Publishers.</p>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('publishers.create') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Add
                                New Publisher
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full mx-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full rounded ">
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center bg-transparent w-full border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-5">
                                            #
                                        </th>
                                        <th
                                            class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Publisher Name
                                        </th>
                                        <th
                                            class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-20">
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($publishers->count() > 0)
                                        @foreach ($publishers as $key => $publisher)
                                            <tr>
                                                <th
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-left">
                                                    {{ $publishers->firstItem() + $key }}
                                                </th>
                                                <td
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    {{ $publisher->publisher_name }}
                                                </td>
                                                <td
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                                    <a href="{{ route('publishers.edit', ['publisher' => $publisher->publisher_id]) }}"
                                                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Edit
                                                    </a>
                                                    {{-- Button Delete with A tag --}}
                                                    <a href="{{ route('publishers.destroy', ['publisher' => $publisher->publisher_id]) }}"
                                                        class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                        data-confirm-delete="true">Delete
                                                    </a>
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
                            @if ($publishers->hasPages())
                                <div class="bg-white px-4 py-3 items-center border-t border-gray-200 sm:px-6">
                                    {{ $publishers->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logbook') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6 ">
                <div class="text-gray-900 block w-full overflow-x-auto">
                    <div class="flex flex-row w-full py-2 justify-between">
                        <div class="font-semibold text-4xl text-gray-800 leading-tight">
                            {{ __("Data Logbook :name", ['name' => Auth::user()->nama_petugas]) }}
                        </div>
                        <div class="flex items-center">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 mr-2 pt-2">Cari</label>
                            <input type="text" id="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                                placeholder="Nomor Rekam Medis" required />
                        </div>
                    </div>
                </div>
                @php
                $roleRoutes = [
                'bk' => 'input-logbook-bk',
                'pk-ugd' => 'input-logbook-pk-ugd',
                'pk-rawat-jalan' => 'input-logbook-pk-ralan',
                'pk-rawat-inap' => 'input-logbook-pk-ranap',
                'pk-perina' => 'input-logbook-pk-perina',
                'pk-ok' => 'input-logbook-pk-ok',
                'pk-icu' => 'input-logbook-pk-icu',
                ];

                $routeName = $roleRoutes[Auth::user()->role] ?? '#';
                @endphp

                <form action="{{ $routeName !== '#' ? route($routeName) : '#' }}" method="GET">
                    <button id="btnInputLogbook" type="submit"
                        class="float-right mx-8 my-0.5 rounded-lg border-x-orange-900 bg-purple-600 px-4 py-3 text-sm font-black text-white hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:bg-purple-600 dark:text-white dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </button>
                </form>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                        <tr>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(0, this)">
                                Tanggal <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(1, this)">
                                No Rekam Medis <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(2, this)">
                                Nama Pasien <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(2, this)">
                                Nama Petugas <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(3, this)">
                                Status Validasi <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(3, this)">
                                Waktu Validasi <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3"></th> <!-- For actions -->
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
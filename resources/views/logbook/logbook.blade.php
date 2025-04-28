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
                'pk-rawat-jalan' => 'input-logbook-pk-rawat-jalan',
                'pk-rawat-inap' => 'input-logbook-pk-rawat-inap',
                'pk-perinatologi' => 'input-logbook-pk-perinatologi',
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
                        @foreach ($indexLogbook as $logbookIndex)
                        <tr
                            class="border-b align-middle text-black dark:border-gray-700 odd:bg-white odd:dark:bg-white even:bg-gray-100 even:dark:bg-gray-100">
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($logbookIndex->created_at)->format('d-m-Y H:i') }}
                            </td>
                            <td class="px-4">{{ $logbookIndex->no_rm }}</td>
                            <td class="px-4">{{ $logbookIndex->nama_pasien }}</td>
                            <td class="px-4">{{ $logbookIndex->nama_petugas }}</td>
                            <td class="px-4">{{ $logbookIndex->status_validasi }}</td>
                            <td class="px-4">{{ $logbookIndex->waktu_validasi }}</td>
                            <td class="flex flex-row justify-end gap-2 px-4 text-right">
                                <!-- Form untuk Edit -->
                                <form
                                    action="{{ route('edit-logbook', ['id' => $logbookIndex->id,'nip'=>$logbookIndex->nip,'no_rm'=>$logbookIndex->no_rm ]) }}"
                                    method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $logbookIndex->id }}" />
                                    <input type="hidden" name="nip" value="{{ $logbookIndex->nip }}" />
                                    <input type="hidden" name="no_rm" value="{{ $logbookIndex->no_rm }}" />
                                    <button id="btnUbahLogbook" type="submit"
                                        class="mt-3 rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-black hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:focus:ring-black">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </form>

                                <form
                                    action="{{ route('delete-data-logbook', ['id' => $logbookIndex->id, 'nip' => $logbookIndex->nip, 'no_rm' => $logbookIndex->no_rm]) }}"
                                    method="POST" class="form-hapus-logbook">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="confirm-submit mt-3 rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-black hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:focus:ring-black"
                                        data-action="hapus">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
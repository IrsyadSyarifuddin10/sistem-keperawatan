<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl leading-tight font-semibold text-gray-800">{{ __('Supervisi') }}</h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6 ">
                <div class="text-gray-900 block w-full overflow-x-auto">
                    <div class="flex flex-row w-full py-2 justify-between">
                        <div class="font-semibold text-4xl text-gray-800 leading-tight">Data Supervisi</div>
                        <div class="flex items-center">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 mr-2 pt-2">Cari</label>
                            <input type="text" id="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                                placeholder="Nomor Rekam Medis" required />
                        </div>
                    </div>
                </div>
                <form action="{{ route('input-supervisi') }}" method="GET">
                    <button id="btnInputSupervisi" type="submit"
                        class="float-right mx-8 my-0.5 rounded-lg border-x-orange-900 bg-purple-600 px-4 py-3 text-sm font-black text-white hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:bg-purple-600 dark:text-white dark:hover:bg-purple-700 dark:focus:ring-purple-900"><i
                            class="bi bi-plus-circle"></i> Tambah</button>
                </form>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-100">
                        <tr>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(0, this)">
                                Tanggal <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(1, this)">
                                Petugas <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(2, this)">
                                Supervisor <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(3, this)">
                                Status Verifikasi <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3"></th> <!-- For actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indexSupervisi as $supervisiIndex)
                        <tr class="border-b dark:border-gray-700 text-black">
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse(time: $supervisiIndex->created_at)->format('d-m-Y H:i') }}
                            </td>
                            <td class="px-4 py-3">{{ $supervisiIndex->nama_petugas }}</td>
                            <td class="px-4 py-3">{{ $supervisiIndex->supervisor }}</td>
                            <td class="px-4 py-3">{{ $supervisiIndex->status_verifikasi }}</td>
                            <td class="px-4 py-3 text-right flex flex-row justify-end gap-2">
                                <!-- Form untuk Edit -->
                                <form
                                    action="{{ route('edit-supervisi', ['id' => $supervisiIndex->id,'nip'=>$supervisiIndex->nip,'nipSupervisor'=>$supervisiIndex->nipSupervisor ]) }}"
                                    method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $supervisiIndex->id }}" />
                                    <input type="hidden" name="nip" value="{{ $supervisiIndex->nip }}" />
                                    <input type="hidden" name="nip-supervisor"
                                        value="{{ $supervisiIndex->nipSupervisor }}" />
                                    <button id="btnUbahSupervisi" type="submit"
                                        class="mt-3 rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-black hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:focus:ring-black">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </form>

                                <form
                                    action="{{ route('delete-data-supervisi', ['id' => $supervisiIndex->id, 'nip' => $supervisiIndex->nip, 'nipSupervisor' => $supervisiIndex->nipSupervisor]) }}"
                                    method="POST" class="form-hapus-supervisor">
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
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $indexSupervisi->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
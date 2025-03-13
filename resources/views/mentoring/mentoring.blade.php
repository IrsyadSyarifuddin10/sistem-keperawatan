<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mentoring') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6 ">
                <div class="text-gray-900 block w-full overflow-x-auto">
                    <div class="flex flex-row w-full py-2 justify-between">
                        <div class="font-semibold text-4xl text-gray-800 leading-tight">
                            Data Mentoring
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
                <form action="{{ route('input-mentoring') }}">
                    <button id="btnInputMentoring" type="button"
                        class="float-right mx-8 px-4 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 hover:bg-orange-800 focus:ring-4 focus:ring-purple-300 rounded-lg text-sm dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                        :href="route('input-mentoring')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
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
                                Petugas <span class="sort-icon cursor-pointer sort-header"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(2, this)">
                                Mentor <span class="sort-icon cursor-pointer sort-header"><i
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
                        @foreach ($indexMentoring as $mentoringIndex)
                            <tr class="border-b dark:border-gray-700 text-black">
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($mentoringIndex->created_at)->format('d-m-Y H:i') }}
                                </td>
                                <td class="px-4 py-3">{{ $mentoringIndex->nip }}</td>
                                <td class="px-4 py-3">{{ $mentoringIndex->mentor }}</td>
                                <td class="px-4 py-3">{{ $mentoringIndex->status_verifikasi }}</td>
                                <td class="px-4 py-3 text-right">
                                    @if(in_array(auth()->user()->role, ['admin', 'bk']))
                                        <form action="{{ route('input-mentoring') }}">
                                            <div class="relative inline-block group">
                                                <!-- Tombol Validasi (Hanya untuk Role A) -->
                                                <button id="btnValidasiMentoring" type="button"
                                                    class="float-right mx-0.5 my-0.5 px-4 py-3 focus:outline-none text-black border-x-orange-900 hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm dark:focus:ring-black">
                                                    <i class="bi bi-file-earmark-check-fill"></i>
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                    <div class="relative inline-block group">
                                        <!-- Tombol -->
                                        <button id="btnUbahMentoring" type="button"
                                            class="float-right mx-0.5 my-0.5 px-4 py-3 focus:outline-none text-black border-x-orange-900 hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm dark:focus:ring-black">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </div>
                                    <div class="inline-block">
                                        <!-- Tombol -->
                                        <button id="btnHapusMentoring" type="button"
                                            class="float-right mx-0.5 my-0.5 px-4 py-3 focus:outline-none text-black border-x-orange-900 hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm dark:focus:ring-black">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
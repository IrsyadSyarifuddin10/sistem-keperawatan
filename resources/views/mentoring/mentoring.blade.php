<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl leading-tight font-semibold text-gray-800">{{ __('Mentoring') }}</h2>
    </x-slot>

    <div class="px-6 py-12">
        <div class="mx-auto max-w-7xl px-2 sm:px-2 lg:px-4 xl:max-w-[1920px]">
            <div class="overflow-hidden bg-white px-6 pt-6 shadow-sm sm:rounded-lg">
                <div class="block w-full overflow-x-auto text-gray-900">
                    <div class="flex w-full flex-row justify-between py-2">
                        <div class="text-4xl leading-tight font-semibold text-gray-800">Data Mentoring</div>
                        <div class="flex items-center">
                            <label for="first_name"
                                class="mr-2 mb-2 block pt-2 text-sm font-medium text-gray-900 dark:text-gray-900">Cari</label>
                            <input type="text" id="first_name"
                                class="block h-8 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-slate-50 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Nama Petugas" required />
                        </div>
                    </div>
                </div>
                <form action="{{ route('input-mentoring') }}" method="GET">
                    <button id="btnInputMentoring" type="submit"
                        class="float-right mx-8 my-0.5 rounded-lg border-x-orange-900 bg-purple-600 px-4 py-3 text-sm font-black text-white hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:bg-purple-600 dark:text-white dark:hover:bg-purple-700 dark:focus:ring-purple-900"><i
                            class="bi bi-plus-circle"></i> Tambah</button>
                </form>

                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-700 text-xs text-gray-100 uppercase dark:bg-gray-700 dark:text-gray-100">
                        <tr>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(0, this)">
                                Tanggal <span class="sort-icon sort-header cursor-pointer"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(1, this)">
                                Petugas <span class="sort-icon sort-header cursor-pointer"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(2, this)">
                                Mentor <span class="sort-icon sort-header cursor-pointer"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3" onclick="sortTable(3, this)">
                                Status Verifikasi <span class="sort-icon sort-header cursor-pointer"><i
                                        class="bi bi-chevron-expand"></i></span>
                            </th>
                            <th scope="col" class="px-4 py-3"></th>
                            <!-- Kolom Aksi -->
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($indexMentoring as $mentoringIndex)
                        <tr
                            class="border-b align-middle text-black dark:border-gray-700 odd:bg-white odd:dark:bg-white even:bg-gray-100 even:dark:bg-gray-100">
                            <td class="px-4">
                                {{ \Carbon\Carbon::parse($mentoringIndex->created_at)->format('d-m-Y H:i') }}
                            </td>
                            <td class="px-4">{{ $mentoringIndex->nama_petugas }}</td>
                            <td class="px-4">{{ $mentoringIndex->mentor }}</td>
                            <td class="px-4">{{ $mentoringIndex->status_verifikasi }}</td>
                            <td class="px-4 pt-2 flex justify-end items-center gap-2">
                                <!-- Form untuk Edit -->
                                <form
                                    action="{{ route('edit-mentoring', ['id' => $mentoringIndex->id,'nip'=>$mentoringIndex->nip,'nipMentor'=>$mentoringIndex->nipMentor ]) }}"
                                    method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $mentoringIndex->id }}" />
                                    <input type="hidden" name="nip" value="{{ $mentoringIndex->nip }}" />
                                    <input type="hidden" name="nipMentor" value="{{ $mentoringIndex->nipMentor }}" />
                                    <button id="btnUbahMentoring" type="submit"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-black hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:focus:ring-black">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </form>

                                <form
                                    action="{{ route('delete-data-mentoring', ['id' => $mentoringIndex->id, 'nip' => $mentoringIndex->nip, 'nipMentor' => $mentoringIndex->nipMentor]) }}"
                                    method="POST" class="form-hapus-mentoring">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="confirm-submit rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-black hover:bg-purple-100 focus:ring-4 focus:ring-purple-300 focus:outline-none dark:focus:ring-black"
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
                <div class="mt-4">{{ $indexMentoring->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
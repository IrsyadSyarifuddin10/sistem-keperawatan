<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logbook') }}
        </h2>
    </x-slot>

    <?php
    $f_logbook_pk_ugd = [
        'serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak',
        'memasang_gelang_identitas_pasien_sesuai_prosedur',
        'melakukan_pendokumentasian_assesment_pasien_awal_masuk',
        'melakukan_sbar_dan_tbak',
        'mengukur_pernafasan',
        'mengukur_tekanan_nadi',
        'mengukur_tekanan_darah',
        'mengukur_suhu_tubuh',
        'mengukur_saturasi_oksigen',
        'memberikan_oksigen_inhalasi_o2',
        'melakukan_rjp',
        'memasang_catheter',
        'melakukan_heacting',
        'melakukan_dan_mendokumentasikan_7_benar_obat',
        'memberikan_obat_per_oral_po',
        'memberikan_obat_intra_venous_iv',
        'memberikan_obat_intra_muskular_im',
        'memberikan_obat_intra_cutan_ic',
        'memberikan_obat_sub_cutan_sc',
        'memberikan_obat_supositori',
        'memberikan_obat_vaginal',
        'memberikan_obat_mata',
        'memberikan_obat_sublingual',
        'menyiapkan_dan_memasang_infus_anak',
        'menyiapkan_dan_memasang_infus_dewasa',
        'memberikan_balance_cairan',
        'mengoperasionalkan_ctg',
        'mengoprasionalkan_ekg',
        'memasang_ngt',
        'melakukan_kompres_hangat',
        'memberikan_perawatan_pada_pasien_yang_akan_meninggal',
        'memberikan_perawatan_pada_pasien_baru_meninggal',
    ];
    $v_logbook_pk_ugd = [
        'serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak',
        'memasang_gelang_identitas_pasien_sesuai_prosedur',
        'melakukan_pendokumentasian_assesment_pasien_awal_masuk',
        'melakukan_sbar_dan_tbak',
        'mengukur_pernafasan',
        'mengukur_tekanan_nadi',
        'mengukur_tekanan_darah',
        'mengukur_suhu_tubuh',
        'mengukur_saturasi_oksigen',
        'memberikan_oksigen_inhalasi_o2',
        'melakukan_rjp',
        'memasang_catheter',
        'melakukan_heacting',
        'melakukan_dan_mendokumentasikan_7_benar_obat',
        'memberikan_obat_per_oral_po',
        'memberikan_obat_intra_venous_iv',
        'memberikan_obat_intra_muskular_im',
        'memberikan_obat_intra_cutan_ic',
        'memberikan_obat_sub_cutan_sc',
        'memberikan_obat_supositori',
        'memberikan_obat_vaginal',
        'memberikan_obat_mata',
        'memberikan_obat_sublingual',
        'menyiapkan_dan_memasang_infus_anak',
        'menyiapkan_dan_memasang_infus_dewasa',
        'memberikan_balance_cairan',
        'mengoperasionalkan_ctg',
        'mengoprasionalkan_ekg',
        'memasang_ngt',
        'melakukan_kompres_hangat',
        'memberikan_perawatan_pada_pasien_yang_akan_meninggal',
        'memberikan_perawatan_pada_pasien_baru_meninggal'
    ];
    
    $v_logbook_pk_ugd_formatted = array_map(function ($item) {
        return ucwords(str_replace('_', ' ', $item));
    }, $v_logbook_pk_ugd);
    ?>

    <form action="{{ route('edit-data-logbook') }}" method="POST">
        <div class="py-12">
            <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6  ">
                    <div class="p-3 text-gray-900 block w-full overflow-x-auto">
                        <div class="p-3 text-2xl font-black">
                            Ubah Logbook BK
                        </div>
                        <div class="p-3 flex flex-row">
                            <div class="mt-4 flex-1 mx-2">
                                <x-input-label for="no_rm" :value="__('Masukkan Nomor Rekam Medis')" />

                                <x-text-input id="no_rm" class="block mt-1 w-full" type="text" name="no_rm"
                                    value="{{ $indexEditLogbook->no_rm }}" />

                                <x-input-error :messages="$errors->get('no_rm')" class="mt-2" />
                            </div>
                            <div class="mt-4 flex-1 mx-2">
                                <x-input-label for="nama_pasien" :value="__('Masukkan Nama Pasien')" />

                                <x-text-input id="nama_pasien" class="block mt-1 w-full" type="text" name="nama_pasien"
                                    value="{{ $indexEditLogbook->nama_pasien }}" />

                                <x-input-error :messages="$errors->get('nama_pasien')" class="mt-2" />
                            </div>
                            <x-text-input id="id" class="block mt-1 w-full" type="hidden"
                                value="{{ $indexEditLogbook->id }}" name="id" />
                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                            <x-text-input id="nip" class="block mt-1 w-full" type="hidden"
                                value="{{ $indexEditLogbook->nip }}" name="nip" />
                            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                        </div>
                        <table id="tbLogbookBK" class="items-center bg-transparent w-full">
                            <thead
                                class="text-gray-100 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-100 text-xs">
                                <tr>
                                    <th
                                        class="bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 px-6 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-[1300px]">
                                        Ceklis
                                    </th>
                                    <th
                                        class="bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 px-6 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right w-fit">
                                        Sudah Sesuai?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @csrf
                                <?php foreach ($v_logbook_pk_ugd_formatted as $index => $item): ?>
                                <?php
                                    $fitem = $f_logbook_pk_ugd[$index] ?? null;
                                    $dataIndexEditLogbook = $indexEditLogbook->$fitem;
                                ?>
                                <tr>
                                    <!-- Kolom Pertama: Nama Supervisi -->
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-normal p-4 text-left text-blueGray-700">
                                        *
                                        <?= htmlspecialchars($item) ?>
                                    </td>
                                    <!-- Kolom Kedua: Toggle Button -->
                                    <td class="text-right px-6">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <!-- Hidden input untuk nilai default "tidak sesuai" -->
                                            <input type="hidden" name="{{ $fitem }}" value="tidak sesuai">

                                            <!-- Checkbox: jika dicentang, nilainya "sesuai" -->
                                            <input type="checkbox" value="sesuai" name="{{ $fitem }}" id="{{ $fitem }}"
                                                class="sr-only peer" <?=($dataIndexEditLogbook==='sesuai' ) ? 'checked'
                                                : '' ?>
                                            >

                                            <div
                                                class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="flex flex-row pt-4 px-6">
                            <x-input-label for="catatan" :value="__('Catatan')" />
                            <textarea name="catatan" class="form-control mx-2 w-full"
                                rows="3">{{ $indexEditLogbook->catatan ?? '' }}</textarea>
                        </div>
                        <div class="flex flex-row pt-10 justify-end">
                            <a href="{{ route('logbook') }}"
                                class="float-right w-20 mx-2 pl-6 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 bg-amber-400 hover:bg-amber-600 focus:ring-purple-900 rounded-lg text-sm dark:bg-amber-400 dark:hover:bg-amber-600 dark:focus:ring-purple-900">
                                {{ __('Batal') }}
                            </a>
                            <x-primary-button id="openModal"
                                class="confirm-submit float-right w-21 mx-2 px-4 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 bg-purple-600 hover:bg-purple-700 focus:ring-purple-900 focus:ring-purple-300 rounded-lg text-sm dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                                data-action="ubah">
                                {{ __('Ubah') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logbook') }}
        </h2>
    </x-slot>

    <?php
$f_logbook_pk_ranap = [
    'menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak',
    'melakukan_sbar_dan_tbak',
    'assesment_resiko_jatuh',
    'assesment_nyeri',
    'mengukur_pernafasan',
    'mengukur_tekanan_nadi',
    'mengukur_tekanan_darah',
    'mengukur_suhu_tubuh',
    'mengukur_saturasi_oksigen',
    'memberikan_oksigen_inhalasi_o2',
    'melakukan_balance_cairan',
    'menyiapkan_dan_memasang_infus_anak',
    'menyiapkan_dan_memasang_infus_dewasa',
    'melakukan_dan_mendokumentasikan_7_benar_obat',
    'memberikan_obat_per_oral_po',
    'memberikan_obat_intra_venous_iv',
    'memberikan_obat_intra_muskular_im',
    'memberikan_obat_intra_cutan_ic',
    'memberikan_obat_sub_cutan_sc',
    'memberikan_obat_supositori',
    'memberikan_obat_vagina',
    'memasang_catheter',
    'mengoperasionalkan_ctg',
    'mengoprasionalkan_ekg',
    'melakukan_nebulizer',
    'melakukan_transfusi_darah',
    'memandikan_pasien',
    'melakukan_kompres_hangat',
    'melakukan_ganti_verban',
    'memasang_ngt_ogt',
    'melakukan_pendidikan_kesehatan',
];
$v_logbook_pk_ranap = [
    'menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak',
    'melakukan_sbar_dan_tbak',
    'assesment_resiko_jatuh',
    'assesment_nyeri',
    'mengukur_pernafasan',
    'mengukur_tekanan_nadi',
    'mengukur_tekanan_darah',
    'mengukur_suhu_tubuh',
    'mengukur_saturasi_oksigen',
    'memberikan_oksigen_inhalasi_o2',
    'melakukan_balance_cairan',
    'menyiapkan_dan_memasang_infus_anak',
    'menyiapkan_dan_memasang_infus_dewasa',
    'melakukan_dan_mendokumentasikan_7_benar_obat',
    'memberikan_obat_per_oral_po',
    'memberikan_obat_intra_venous_iv',
    'memberikan_obat_intra_muskular_im',
    'memberikan_obat_intra_cutan_ic',
    'memberikan_obat_sub_cutan_sc',
    'memberikan_obat_supositori',
    'memberikan_obat_vagina',
    'memasang_catheter',
    'mengoperasionalkan_ctg',
    'mengoprasionalkan_ekg',
    'melakukan_nebulizer',
    'melakukan_transfusi_darah',
    'memandikan_pasien',
    'melakukan_kompres_hangat',
    'melakukan_ganti_verban',
    'memasang_ngt_ogt',
    'melakukan_pendidikan_kesehatan'
];

$v_logbook_pk_ranap_formatted = array_map(function ($item) {
    return ucwords(str_replace('_', ' ', $item));
}, $v_logbook_pk_ranap);
?>

    <div class="py-12 px-[250px]">
        <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6 ">
                <div class="p-3 text-gray-900 block w-full overflow-x-auto">
                    <div class="p-3 text-2xl font-black">
                        Input Logbook PK Rawat Inap
                    </div>
                    <table id="tbInputLogbookPKRawatTInap" class="items-center bg-transparent w-full">
                        <thead class="text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100 text-xs">
                            <tr>
                                <th
                                    class="bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 px-6 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-[1300px]">
                                    Ceklis
                                </th>
                                <th
                                    class="bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 px-6 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right w-fit">
                                    Sudah Sesuai
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('input-logbook-pk-ranap') }}" method="POST">
                                <?php foreach ($v_logbook_pk_ranap_formatted as $index => $item): ?>
                                <?php    $fitem = $f_logbook_pk_ranap[$index] ?? null; ?>
                                <tr>
                                    <!-- Kolom Pertama: Nama logbook-pk-ranap -->
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-normal p-4 text-left text-blueGray-700">
                                        <?= htmlspecialchars($item) ?>
                                    </td>
                                    <!-- Kolom Kedua: Toggle Button -->
                                    <td class="text-right px-6">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" name="<?php    $fitem ?>"
                                                class="sr-only peer">
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
                        <x-input-label for="catatan-logbook-pk-ranap" :value="__('Catatan')" />
                        <textarea name="catatan-logbook-pk-ranap" class="form-control mx-2 w-full" rows="3"></textarea>
                    </div>
                    <div class="flex flex-row pt-12 justify-end">
                        <a href="{{ route('logbook') }}"
                            class="float-right w-20 mx-2 pl-6 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 hover:bg-orange-800 focus:ring-4 focus:ring-purple-300 rounded-lg text-sm dark:bg-amber-400 dark:hover:bg-amber-600 dark:focus:ring-purple-900">
                            {{ __('Batal') }}
                        </a>
                        <button id="btnSimpanLogbookPKRawatInap" type="button"
                            class="float-right w-20 mx-2 px-4 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 hover:bg-orange-800 focus:ring-4 focus:ring-purple-300 rounded-lg text-sm dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
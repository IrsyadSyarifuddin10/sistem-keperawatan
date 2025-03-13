<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supervisi') }}
        </h2>
    </x-slot>

    <?php
$f_supervisi = [
    'menerima_dan_mengerjakan_dokumentasi_pasien_baru',
    'memberikan_oksigen',
    'melakukan_sbar_dan_tbak',
    'assesment_resiko_jatuh',
    'asesment_nyeri',
    'mengukur_pernafasan',
    'mengukur_tekanan_nadi',
    'mengukur_tekanan_darah',
    'mengukur_suhu_tubuh',
    'mengukur_saturasi_oksigen',
    'melakukan_bimbingan_dan_penyuluhan',
    'melakukan_asuhan_kebidanan',
    'membantu_proses_persalinan_normal',
    'melakukan_kebersihan_vulva',
    'melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv',
    'melakukan_vt',
    'melakukan_observasi_djj',
    'melakukan_epistomi',
    'melakukan_hecting_perineum',
    'resusitasi_bayi_baru_lahir_spontan',
    'memasang_catheter_wanita',
    'memasang_infus_dewasa',
    'melakukan_gym_ball',
    'melakukan_pijat_oksitosin',
    'mengoperasionalkan_ctg',
    'mengoperasionalkan_ekg',
    'mengoperasionalkan_usg',
    'melakukan_dan_mendokumentasikan_7_benar_obat',
    'memberikan_obat_per_oral',
    'memberikan_obat_intra_venous',
    'memberikan_obat_intra_muskular',
    'memberikan_obat_intra_cutan',
    'memberikan_obat_sub_cutan',
    'memberikan_obat_supositori',
    'memberikan_obat_vaginal',
    'memberikan_obat_sublingual',
    'melakukan_prosedur_tranfusi',
    'melakukan_pasien_nebulizer',
    'melakukan_ganti_verban',
    'mempersiapkan_pasien_operasi',
    'membantu_dokter_bedah_selama_operasi',
    'melakukan_identifikasi_pasien_yang_akan_dioperasi',
    'menyiapkan_alat_saat_operasi',
    'pemasangan_sarung_meja_mayo',
    'penyusunan_instrument_dasar',
    'teknik_aseptic_antiseptic',
    'cuci_tangan_bedah',
    'penghitungan_instrument_peralatan',
    'dokumentasi_sign_in_out',
    'observasi_pasien_post_operasi',
    'memandikan_pasien',
    'memandikan_bayi',
    'menghitung_tetesan_infus',
    'mengoperasionalkan_cpap',
    'mengoperasionalkan_ventilator',
];
$v_supervisi = [
    'menerima_dan_mengerjakan_dokumentasi_pasien_baru',
    'memberikan_oksigen',
    'melakukan_sbar_dan_tbak',
    'assesment_resiko_jatuh',
    'asesment_nyeri',
    'mengukur_pernafasan',
    'mengukur_tekanan_nadi',
    'mengukur_tekanan_darah',
    'mengukur_suhu_tubuh',
    'mengukur_saturasi_oksigen',
    'melakukan_bimbingan_dan_penyuluhan',
    'melakukan_asuhan_kebidanan',
    'membantu_proses_persalinan_normal',
    'melakukan_kebersihan_vulva',
    'melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv',
    'melakukan_vt',
    'melakukan_observasi_djj',
    'melakukan_epistomi',
    'melakukan_hecting_perineum',
    'resusitasi_bayi_baru_lahir_spontan',
    'memasang_catheter_wanita',
    'memasang_infus_dewasa',
    'melakukan_gym_ball',
    'melakukan_pijat_oksitosin',
    'mengoperasionalkan_ctg',
    'mengoperasionalkan_ekg',
    'mengoperasionalkan_usg',
    'melakukan_dan_mendokumentasikan_7_benar_obat',
    'memberikan_obat_per_oral',
    'memberikan_obat_intra_venous',
    'memberikan_obat_intra_muskular',
    'memberikan_obat_intra_cutan',
    'memberikan_obat_sub_cutan',
    'memberikan_obat_supositori',
    'memberikan_obat_vaginal',
    'memberikan_obat_sublingual',
    'melakukan_prosedur_tranfusi',
    'melakukan_pasien_nebulizer',
    'melakukan_ganti_verban',
    'mempersiapkan_pasien_operasi',
    'membantu_dokter_bedah_selama_operasi',
    'melakukan_identifikasi_pasien_yang_akan_dioperasi',
    'menyiapkan_alat_saat_operasi',
    'pemasangan_sarung_meja_mayo',
    'penyusunan_instrument_dasar',
    'teknik_aseptic_antiseptic',
    'cuci_tangan_bedah',
    'penghitungan_instrument_peralatan',
    'dokumentasi_sign_in_out',
    'observasi_pasien_post_operasi',
    'memandikan_pasien',
    'memandikan_bayi',
    'menghitung_tetesan_infus',
    'mengoperasionalkan_cpap',
    'mengoperasionalkan_ventilator',
];

$v_supervisi_formatted = array_map(function ($item) {
    return ucwords(str_replace('_', ' ', $item));
}, $v_supervisi);
    ?>

    <script>
        $(document).ready(function() {
            $("#nip_confirmation").keypress(function(event) {
                if (event.which == 13) { // Enter key
                    event.preventDefault(); // Mencegah form submit

                    let nip = $(this).val(); // Ambil nilai NIP yang diketik

                    if (nip) {
                        $.ajax({
                            url: "/get-user-name", // Endpoint API
                            type: "GET",
                            data: {
                                nip: nip
                            },
                            success: function(response) {
                                if (response.name) {
                                    $("#name_confirmation").val(response.name);
                                } else {
                                    alert("NIP tidak ditemukan!");
                                    $("#name_confirmation").val(
                                    ""); // Kosongkan jika tidak ditemukan
                                }
                            },
                            error: function() {
                                alert("Terjadi kesalahan, coba lagi.");
                            }
                        });
                    }
                }
            });
        });
    </script>

    <form action="{{ route('input-supervisi') }}" method="POST">
        <div class="py-12 px-[250px]">
            <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6 ">
                    <div class="p-3 text-gray-900 block w-full overflow-x-auto">
                        <div class="p-3 text-2xl font-black">
                            Input Supervisi
                        </div>
                        <div class="p-3 flex flex-row">
                            <div class="mt-4 flex-1 mx-2">
                                <x-input-label for="nip_confirmation" :value="__('Masukkan NIP lalu enter')" />

                                <x-text-input id="nip_confirmation" class="block mt-1 w-full" type="text"
                                    name="nip_confirmation" />

                                <x-input-error :messages="$errors->get('nip_confirmation')" class="mt-2" />
                            </div>
                            <div class="mt-4 flex-1 mx-2">
                                <x-input-label for="name_confirmation" :value="__('Pastikan nama yang otomatis muncul')" />

                                <x-text-input id="name_confirmation" class="block mt-1 w-full" type="text"
                                    disabled="true" name="name_confirmation" />

                                <x-input-error :messages="$errors->get('name_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <table id="tbSupervisi" class="items-center bg-transparent w-full">
                            <thead
                                class="text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100 text-xs">
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

                                @csrf
                                <?php foreach ($v_supervisi_formatted as $index => $item): ?>
                                <?php    $fitem = $f_supervisi[$index] ?? null; ?>
                                <tr>
                                    <!-- Kolom Pertama: Nama Supervisi -->
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-normal p-4 text-left text-blueGray-700">
                                        <?= htmlspecialchars($item) ?>
                                    </td>
                                    <!-- Kolom Kedua: Toggle Button -->
                                    <td class="text-right px-6">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <!-- Hidden input untuk nilai default "belum" -->
                                            <input type="hidden" name="{{ $fitem }}" value="belum">

                                            <!-- Checkbox: jika dicentang, nilainya "tercapai" -->
                                            <input type="checkbox" value="sudah" name="{{ $fitem }}"
                                                id="{{ $fitem }}" class="sr-only peer">

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
                            <x-input-label for="catatan_supervisi" :value="__('Catatan')" />
                            <textarea name="catatan_supervisi" class="form-control mx-2 w-full" rows="3"></textarea>
                        </div>
                        @if(in_array(auth()->user()->role, ['admin', 'bk']))
                            <div class="flex flex-row pt-4 px-6 justify-end">
                                <div class="align-middletext-sm whitespace-normal p-4 text-left text-blueGray-700">
                                    Verifikasi?
                                </div>
                                <td>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <!-- Hidden input untuk nilai default "tidak tercapai" -->
                                        <input type="hidden" name="status_verifikasi" value="tidak tercapai">

                                        <!-- Checkbox: jika dicentang, nilainya "tercapai" -->
                                        <input type="checkbox" value="tercapai" name="status_verifikasi" id="status_verifikasi"
                                            class="sr-only peer">

                                        <div
                                            class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </td>
                            </div>
                        @endif
                        <div class="flex flex-row pt-10 justify-end">
                            <a href="{{ route('supervisi') }}"
                                class="float-right w-20 mx-2 pl-6 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 hover:bg-orange-800 focus:ring-4 focus:ring-purple-300 rounded-lg text-sm dark:bg-amber-400 dark:hover:bg-amber-600 dark:focus:ring-purple-900">
                                {{ __('Batal') }}
                            </a>
                            <x-primary-button
                                class="float-right w-21 mx-2 px-4 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 hover:bg-orange-800 focus:ring-4 focus:ring-purple-300 rounded-lg text-sm dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

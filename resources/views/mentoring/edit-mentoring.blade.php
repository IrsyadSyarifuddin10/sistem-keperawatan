<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mentoring') }}
        </h2>
    </x-slot>
    <?php
$f_mentoring = ['visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu', 'struktur_organisasi_rsia_puti_bungsu', 'dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu', 'pelayanan_unggulan_rsia_puti_bungsu', 'alur_perizinan_rsia_puti_bungsu', 'peraturan_rsia_puti_bungsu', 'disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu', 'budaya_5s', 'komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan', 'prinsip_etika_dan_etiket_keperawatan', 'menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial', 'melakukan_ttv', 'insiden_keselamatan_pasien', 'pasien_safety', 'assasmen_resiko_jatuh', 'transportasi_pasien', 'memberikan_obat_dengan_cara_aman_dan_tepat', 'memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit', 'mengelola_pemberian_darah_dan_produk_darah', 'memfasilitasi_pemenuhan_kebutuhan_oksigen', 'melakukan_perawatan_luka', 'analisa_interpretasi_data_dan_dokumen_secara_akurat', 'pembinaan_staf_keperawatan', 'caring'];
$v_mentoring = ['visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu', 'struktur_organisasi_rsia_puti_bungsu', 'dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu', 'pelayanan_unggulan_rsia_puti_bungsu', 'alur_perizinan_rsia_puti_bungsu', 'peraturan_rsia_puti_bungsu', 'disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu', 'budaya_5S', 'komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan', 'prinsip_etika_dan_etiket_keperawatan', 'menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial', 'melakukan_TTV', 'insiden_keselamatan_pasien', 'pasien_safety', 'assasmen_resiko_jatuh', 'transportasi_pasien', 'memberikan_obat_dengan_cara_aman_dan_tepat', 'memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit', 'mengelola_pemberian_darah_dan_produk_darah', 'memfasilitasi_pemenuhan_kebutuhan_oksigen', 'melakukan_perawatan_luka', 'analisa_interpretasi_data_dan_dokumen_secara_akurat', 'pembinaan_staf_keperawatan', 'caring'];

$v_mentoring_formatted = array_map(function ($item) {
    return ucwords(str_replace('_', ' ', $item));
}, $v_mentoring);
    ?>

    <script>
        $(document).ready(function () {
            $("#nip_confirmation").keypress(function (event) {
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
                            success: function (response) {
                                if (response.nama_petugas) {
                                    $("#name_confirmation").val(response.nama_petugas);
                                } else {
                                    alert("NIP tidak ditemukan!");
                                    $("#name_confirmation").val(
                                        ""); // Kosongkan jika tidak ditemukan
                                }
                            },
                            error: function () {
                                alert("Terjadi kesalahan, coba lagi.");
                            }
                        });
                    }
                }
            });
        });
    </script>
    <form action="{{ route('edit-data-mentoring') }}" method="POST">
        <div class="py-12">
            <div class="max-w-7xl xl:max-w-[1920px] mx-auto px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-6 px-6  ">
                    <div class="p-3 text-gray-900 block w-full overflow-x-auto">
                        <div class="p-3 text-2xl font-black">
                            Edit Mentoring
                        </div>
                        <div class="p-3 flex flex-row">
                            <div class="mt-4 flex-1 mx-2">
                                <x-input-label for="nip_confirmation" :value="__('Pastikan NIP sudah benar')" />

                                <x-text-input id="nip_confirmation" class="block mt-1 w-full" type="text"
                                    value="{{ $indexEditMentoring->nip }}" name="nip_confirmation" />

                                <x-input-error :messages="$errors->get('nip_confirmation')" class="mt-2" />
                            </div>
                            <div class="mt-4 flex-1 mx-2">
                                <x-input-label for="name_confirmation" :value="__('Pastikan nama sudah benar')" />

                                <x-text-input id="name_confirmation" class="block mt-1 w-full" type="text"
                                    value="{{ $indexEditMentoring->nama_petugas }}" disabled="true"
                                    name="name_confirmation" />

                                <x-input-error :messages="$errors->get('name_confirmation')" class="mt-2" />
                            </div>
                            <x-text-input id="id" class="block mt-1 w-full" type="hidden"
                                value="{{ $indexEditMentoring->id }}" name="id" />
                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                            <x-text-input id="nipMentor" class="block mt-1 w-full" type="hidden"
                                value="{{ $indexEditMentoring->mentor }}" name="nipMentor" />
                            <x-input-error :messages="$errors->get('nipMentor')" class="mt-2" />
                        </div>
                        <table id="tbSupervisi" class="items-center bg-transparent w-full">
                            <thead
                                class="text-gray-100 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-100 text-xs">
                                <tr>
                                    <th
                                        class="bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 px-6 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-[1300px]">
                                        Ceklis
                                    </th>
                                    <th
                                        class="bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 px-6 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right w-fit">
                                        Tercapai?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @csrf
                                <?php foreach ($v_mentoring_formatted as $index => $item): ?>
                                <?php    
                                    $fitem = $f_mentoring[$index] ?? null; 
                                    $dataIndexEditMentoring = $indexEditMentoring->$fitem;
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
                                            <!-- Hidden input untuk nilai default "tidak tercapai" -->
                                            <input type="hidden" name="{{ $fitem }}" value="tidak tercapai">

                                            <!-- Checkbox: jika dicentang, nilainya "tercapai" -->
                                            <input type="checkbox" value="tercapai" name="{{ $fitem }}"
                                                id="{{ $fitem }}" class="sr-only peer"
                                                <?=($dataIndexEditMentoring==='tercapai' ) ? 'checked' : '' ?>
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
                            <x-input-label for="catatan_mentoring" :value="__('Catatan')" />
                            <textarea name="catatan_mentoring" class="form-control mx-2 w-full"
                                rows="3">{{ $indexEditMentoring->catatan ?? '' }}</textarea>
                        </div>
                        <div class="flex flex-row pt-10 justify-end">
                            <a href="{{ route('mentoring') }}"
                                class="float-right w-20 mx-2 pl-6 py-3 my-0.5 focus:outline-none text-white font-black border-x-orange-900 bg-amber-400 hover:bg-amber-600 focus:ring-purple-900 rounded-lg text-sm dark:bg-amber-400 dark:hover:bg-amber-600 dark:focus:ring-purple-900">
                                {{ __('Batal') }}
                            </a>
                            <x-primary-button
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
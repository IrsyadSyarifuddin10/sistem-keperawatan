<?php

namespace App\Http\Controllers;

use App\Models\LogbookBK;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LogbookPKUGD;
use App\Models\LogbookPKICU;
use App\Models\LogbookPKOK;
use App\Models\LogbookPKPerina;
use App\Models\LogbookPKRalan;
use App\Models\LogbookPKRanap;


class LogbookController extends Controller
{
    protected $logbookMap = [
        'bk' => [LogbookBK::class, [
            'no_rm',
            'menerima_dan_mengerjakan_dokumentasi_pasien_baru',
            'memberikan_oksigen_inhalasi_o2',
            'melakukan_sbar_dan_tbak',
            'mengukur_pernafasan',
            'mengukur_tekanan_nadi',
            'mengukur_tekanan_darah',
            'mengukur_suhu_tubuh',
            'mengukur_saturasi_oksigen',
            'melakukan_bimbingan_dan_penyuluhan',
            'melakukan_asuhan_kebidanan',
            'membantu_proses_persalinan_normal',
            'melakukan_kebersihan_vulva_vulva_hygiene',
            'melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_dan_iv',
            'melakukan_vt_atau_vaginal_touche',
            'melakukan_observasi_djj',
            'melakukan_epistomi',
            'melakukan_hecting_perineum',
            'resusitasi_bayi_baru_lahir_spontan',
            'memasang_catheter_wanita',
            'memasang_infus_dewasa',
            'melakukan_gym_ball',
            'melakukan_pijat_oksitosin',
            'mengoperasionalkan_ctg',
            'melakukan_dan_mendokumentasikan_7_benar_obat',
            'memberikan_obat_per_oral_po',
            'memberikan_obat_intra_venous_iv',
            'memberikan_obat_intra_muskular_im',
            'memberikan_obat_intra_cutan_ic',
            'memberikan_obat_sub_cutan_sc',
            'memberikan_obat_supositori',
            'memberikan_obat_vaginal',
            'catatan',
            'nip'
        ]],
        'pk-ugd' => [LogbookPKUGD::class, [
            'no_rm',
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
            'catatan',
            'nip',
        ]],
        'pk-rawat-jalan' => [LogbookPKRalan::class, [
            'no_rm',
            'serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak',
            'memasang_gelang_identitas_pasien_sesuai_prosedur',
            'melakukan_sbar_dan_tbak',
            'assesment_resiko_jatuh',
            'mengukur_pernafasan',
            'mengukur_tekanan_nadi',
            'mengukur_tekanan_darah',
            'mengukur_suhu_tubuh',
            'mengukur_saturasi_oksigen',
            'memberikan_oksigen_inhalasi_o2',
            'melakukan_nebulizer',
            'melakukan_ganti_verban',
            'mengoperasikan_ctg',
            'mengoperasikan_usg',
            'mengoprasikan_ekg',
            'melakukan_pemasangan_infus_dewasa',
            'melakukan_pemasangan_infus_anak_neonatus',
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
            'melakukan_pendidikan_kesehatan',
            'catatan',
            'nip',
        ]],
        'pk-rawat-inap' => [LogbookPKRanap::class, [
            'no_rm',
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
            'catatan',
            'nip',
        ]],
        'pk-perina' => [LogbookPKPerina::class, [
            'no_rm',
            'melakukan_resusitasi_bayi_baru_lahir',
            'memasang_gelang_pasien_baru',
            'menerima_dan_mengerjakan_dokumentasi_pasien_baru_neonatus',
            'melakukan_sbar_dan_tbak',
            'mengoperasikan_cpap',
            'melakukan_oksigenasi_pemasangan_o2',
            'mengoperasikan_ventilator',
            'memasang_infus_umbilical',
            'memasang_infus_neonatus_via_iv',
            'melakukan_dan_mendokumentasikan_7_benar_obat',
            'memberikan_obat_per_oral_po',
            'memberikan_obat_intra_venous_iv',
            'memberikan_obat_intra_muskular_im',
            'memberikan_obat_mata',
            'memandikan_bayi',
            'memberikan_makan_via_ogt',
            'memasang_ogt',
            'melakukan_pendidikan_kesehatan',
            'mengukur_pernafasan',
            'mengukur_tekanan_nadi',
            'mengukur_tekanan_darah',
            'mengukur_suhu_tubuh',
            'mengukur_saturasi_oksigen',
            'assesment_resiko_jatuh',
            'catatan',
            'nip',
        ]],
        'pk-ok' => [LogbookPKOK::class, [
            'no_rm',
            'menerima_dan_mengerjakan_dokumentasi_pasien_tindakan_ok',
            'melakukan_sbar_dan_tbak',
            'mengukur_pernafasan',
            'mengukur_tekanan_nadi',
            'mengukur_tekanan_darah',
            'mengukur_suhu_tubuh',
            'mengukur_saturasi_oksigen',
            'memberikan_oksigen_inhalasi_o2',
            'assesment_resiko_jatuh',
            'melakukan_dan_mendokumentasikan_7_benar_obat',
            'memberikan_obat_per_oral_po',
            'memberikan_obat_intra_venous_iv',
            'memberikan_obat_intra_muskular_im',
            'memberikan_obat_intra_cutan_ic',
            'memberikan_obat_sub_cutan_sc',
            'pemasangan_catether',
            'mempersiapkan_pasien_operasi',
            'membantu_dokter_bedah_selama_operasi',
            'melakukan_identifikasi_pasien_yang_akan_dioperasi',
            'menyiapkan_alat_yang_dibutuhkan_saat_operasi_berlangsung',
            'melakukan_pemasangan_sarung_meja_mayo_dengan_benar',
            'melakukan_penyusunan_instrument_dasar_dimeja_mayo_dengan_benar',
            'melakukan_teknik_aseptic_dan_antiseptic_daerah_operasi',
            'melakukan_cuci_tangan_bedah',
            'penghitungan_instrument_dan_peralatan_prosedur_pembedahan',
            'melakukan_dokumentasi_sign_in_dan_sign_out',
            'melakukan_observasi_pasien_post_operasi',
            'catatan',
            'nip',
        ]],
        'pk-icu' => [LogbookPKICU::class, [
            'no_rm',
            'assesment_resiko_jatuh',
            'menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak',
            'melakukan_sbar_dan_tbak',
            'melakukan_pemasangan_infus_dewasa',
            'melakukan_pemasangan_infus_anak_dan_neonatus',
            'melakukan_pemasangan_ngt_ogt',
            'melakukan_pemasangan_ventilator',
            'observasi_pasien_dengan_intubasi',
            'melakukan_personal_hygiene_pasien',
            'mengukur_pernafasan',
            'mengukur_tekanan_nadi',
            'mengukur_tekanan_darah',
            'mengukur_suhu_tubuh',
            'mengukur_saturasi_oksigen',
            'memberikan_oksigen_inhalasi_o2',
            'memberikan_oksigenasi_pemasangan_o2',
            'melakukan_prosedur_tranfusi',
            'melakukan_pasien_nebulizer',
            'melakukan_balance_cairan',
            'melakukan_dan_mendokumentasikan_7_benar_obat',
            'memberikan_obat_per_oral_po',
            'memberikan_obat_intra_venous_iv',
            'memberikan_obat_intra_muskular_im',
            'memberikan_obat_intra_cutan_ic',
            'memberikan_obat_supositori',
            'memberikan_obat_vaginal',
            'memberikan_obat_mata',
            'memberikan_obat_sublingual',
            'menghitung_tetesan_infus',
            'catatan',
            'nip',
        ]]
    ];

    public function store(Request $request): RedirectResponse
    {

        $user = Auth::user();
        $role = $user->role;

        switch ($user->role) {
            case 'bk':
                $logbook = LogbookBK::create([
                    'no_rm' => $request->no_rm,
                    'menerima_dan_mengerjakan_dokumentasi_pasien_baru' => $request->menerima_dan_mengerjakan_dokumentasi_pasien_baru,
                    'memberikan_oksigen_inhalasi_o2' => $request->memberikan_oksigen_inhalasi_o2,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'melakukan_bimbingan_dan_penyuluhan' => $request->melakukan_bimbingan_dan_penyuluhan,
                    'melakukan_asuhan_kebidanan' => $request->melakukan_asuhan_kebidanan,
                    'membantu_proses_persalinan_normal' => $request->membantu_proses_persalinan_normal,
                    'melakukan_kebersihan_vulva_vulva_hygiene' => $request->melakukan_kebersihan_vulva_vulva_hygiene,
                    'melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_dan_iv' => $request->melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_dan_iv,
                    'melakukan_vt_atau_vaginal_touche' => $request->melakukan_vt_atau_vaginal_touche,
                    'melakukan_observasi_djj' => $request->melakukan_observasi_djj,
                    'melakukan_epistomi' => $request->melakukan_epistomi,
                    'melakukan_hecting_perineum' => $request->melakukan_hecting_perineum,
                    'resusitasi_bayi_baru_lahir_spontan' => $request->resusitasi_bayi_baru_lahir_spontan,
                    'memasang_catheter_wanita' => $request->memasang_catheter_wanita,
                    'memasang_infus_dewasa' => $request->memasang_infus_dewasa,
                    'melakukan_gym_ball' => $request->melakukan_gym_ball,
                    'melakukan_pijat_oksitosin' => $request->melakukan_pijat_oksitosin,
                    'mengoperasionalkan_ctg' => $request->mengoperasionalkan_ctg,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_intra_cutan_ic' => $request->memberikan_obat_intra_cutan_ic,
                    'memberikan_obat_sub_cutan_sc' => $request->memberikan_obat_sub_cutan_sc,
                    'memberikan_obat_supositori' => $request->memberikan_obat_supositori,
                    'memberikan_obat_vaginal' => $request->memberikan_obat_vaginal,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,
                ]);
                break;

            case 'pk-ugd':
                $logbook = LogbookPKUGD::create([
                    'no_rm' => $request->no_rm,
                    'serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak' => $request->serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak,
                    'memasang_gelang_identitas_pasien_sesuai_prosedur' => $request->memasang_gelang_identitas_pasien_sesuai_prosedur,
                    'melakukan_pendokumentasian_assesment_pasien_awal_masuk' => $request->melakukan_pendokumentasian_assesment_pasien_awal_masuk,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'memberikan_oksigen_inhalasi_o2' => $request->memberikan_oksigen_inhalasi_o2,
                    'melakukan_rjp' => $request->melakukan_rjp,
                    'memasang_catheter' => $request->memasang_catheter,
                    'melakukan_heacting' => $request->melakukan_heacting,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_intra_cutan_ic' => $request->memberikan_obat_intra_cutan_ic,
                    'memberikan_obat_sub_cutan_sc' => $request->memberikan_obat_sub_cutan_sc,
                    'memberikan_obat_supositori' => $request->memberikan_obat_supositori,
                    'memberikan_obat_vaginal' => $request->memberikan_obat_vaginal,
                    'memberikan_obat_mata' => $request->memberikan_obat_mata,
                    'memberikan_obat_sublingual' => $request->memberikan_obat_sublingual,
                    'menyiapkan_dan_memasang_infus_anak' => $request->menyiapkan_dan_memasang_infus_anak,
                    'menyiapkan_dan_memasang_infus_dewasa' => $request->menyiapkan_dan_memasang_infus_dewasa,
                    'memberikan_balance_cairan' => $request->memberikan_balance_cairan,
                    'mengoperasionalkan_ctg' => $request->mengoperasionalkan_ctg,
                    'mengoprasionalkan_ekg' => $request->mengoprasionalkan_ekg,
                    'memasang_ngt' => $request->memasang_ngt,
                    'melakukan_kompres_hangat' => $request->melakukan_kompres_hangat,
                    'memberikan_perawatan_pada_pasien_yang_akan_meninggal' => $request->memberikan_perawatan_pada_pasien_yang_akan_meninggal,
                    'memberikan_perawatan_pada_pasien_baru_meninggal' => $request->memberikan_perawatan_pada_pasien_baru_meninggal,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,

                ]);
                break;

            case 'pk-rawat-jalan':
                $logbook = LogbookPKRalan::create([
                    'no_rm' => $request->no_rm,
                    'serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak' => $request->serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak,
                    'memasang_gelang_identitas_pasien_sesuai_prosedur' => $request->memasang_gelang_identitas_pasien_sesuai_prosedur,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'assesment_resiko_jatuh' => $request->assesment_resiko_jatuh,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'memberikan_oksigen_inhalasi_o2' => $request->memberikan_oksigen_inhalasi_o2,
                    'melakukan_nebulizer' => $request->melakukan_nebulizer,
                    'melakukan_ganti_verban' => $request->melakukan_ganti_verban,
                    'mengoperasikan_ctg' => $request->mengoperasikan_ctg,
                    'mengoperasikan_usg' => $request->mengoperasikan_usg,
                    'mengoprasikan_ekg' => $request->mengoprasikan_ekg,
                    'melakukan_pemasangan_infus_dewasa' => $request->melakukan_pemasangan_infus_dewasa,
                    'melakukan_pemasangan_infus_anak_neonatus' => $request->melakukan_pemasangan_infus_anak_neonatus,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_intra_cutan_ic' => $request->memberikan_obat_intra_cutan_ic,
                    'memberikan_obat_sub_cutan_sc' => $request->memberikan_obat_sub_cutan_sc,
                    'memberikan_obat_supositori' => $request->memberikan_obat_supositori,
                    'memberikan_obat_vaginal' => $request->memberikan_obat_vaginal,
                    'memberikan_obat_mata' => $request->memberikan_obat_mata,
                    'memberikan_obat_sublingual' => $request->memberikan_obat_sublingual,
                    'melakukan_pendidikan_kesehatan' => $request->melakukan_pendidikan_kesehatan,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,
                ]);
                break;

            case 'pk-rawat-inap':
                $logbook = LogbookPKRanap::create([
                    'no_rm' => $request->no_rm,
                    'menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak' => $request->menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'assesment_resiko_jatuh' => $request->assesment_resiko_jatuh,
                    'assesment_nyeri' => $request->assesment_nyeri,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'memberikan_oksigen_inhalasi_o2' => $request->memberikan_oksigen_inhalasi_o2,
                    'melakukan_balance_cairan' => $request->melakukan_balance_cairan,
                    'menyiapkan_dan_memasang_infus_anak' => $request->menyiapkan_dan_memasang_infus_anak,
                    'menyiapkan_dan_memasang_infus_dewasa' => $request->menyiapkan_dan_memasang_infus_dewasa,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_intra_cutan_ic' => $request->memberikan_obat_intra_cutan_ic,
                    'memberikan_obat_sub_cutan_sc' => $request->memberikan_obat_sub_cutan_sc,
                    'memberikan_obat_supositori' => $request->memberikan_obat_supositori,
                    'memberikan_obat_vagina' => $request->memberikan_obat_vagina,
                    'memasang_catheter' => $request->memasang_catheter,
                    'mengoperasionalkan_ctg' => $request->mengoperasionalkan_ctg,
                    'mengoprasionalkan_ekg' => $request->mengoprasionalkan_ekg,
                    'melakukan_nebulizer' => $request->melakukan_nebulizer,
                    'melakukan_transfusi_darah' => $request->melakukan_transfusi_darah,
                    'memandikan_pasien' => $request->memandikan_pasien,
                    'melakukan_kompres_hangat' => $request->melakukan_kompres_hangat,
                    'melakukan_ganti_verban' => $request->melakukan_ganti_verban,
                    'memasang_ngt_ogt' => $request->memasang_ngt_ogt,
                    'melakukan_pendidikan_kesehatan' => $request->melakukan_pendidikan_kesehatan,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,
                ]);
                break;

            case 'pk-perina':
                $logbook = LogbookPKPerina::create([
                    'no_rm' => $request->no_rm,
                    'melakukan_resusitasi_bayi_baru_lahir' => $request->melakukan_resusitasi_bayi_baru_lahir,
                    'memasang_gelang_pasien_baru' => $request->memasang_gelang_pasien_baru,
                    'menerima_dan_mengerjakan_dokumentasi_pasien_baru_neonatus' => $request->menerima_dan_mengerjakan_dokumentasi_pasien_baru_neonatus,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'mengoperasikan_cpap' => $request->mengoperasikan_cpap,
                    'melakukan_oksigenasi_pemasangan_o2' => $request->melakukan_oksigenasi_pemasangan_o2,
                    'mengoperasikan_ventilator' => $request->mengoperasikan_ventilator,
                    'memasang_infus_umbilical' => $request->memasang_infus_umbilical,
                    'memasang_infus_neonatus_via_iv' => $request->memasang_infus_neonatus_via_iv,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_mata' => $request->memberikan_obat_mata,
                    'memandikan_bayi' => $request->memandikan_bayi,
                    'memberikan_makan_via_ogt' => $request->memberikan_makan_via_ogt,
                    'memasang_ogt' => $request->memasang_ogt,
                    'melakukan_pendidikan_kesehatan' => $request->melakukan_pendidikan_kesehatan,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'assesment_resiko_jatuh' => $request->assesment_resiko_jatuh,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,
                ]);
                break;

            case 'pk-ok':
                $logbook = LogbookPKOK::create([
                    'no_rm' => $request->no_rm,
                    'menerima_dan_mengerjakan_dokumentasi_pasien_tindakan_ok' => $request->menerima_dan_mengerjakan_dokumentasi_pasien_tindakan_ok,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'memberikan_oksigen_inhalasi_o2' => $request->memberikan_oksigen_inhalasi_o2,
                    'assesment_resiko_jatuh' => $request->assesment_resiko_jatuh,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_intra_cutan_ic' => $request->memberikan_obat_intra_cutan_ic,
                    'memberikan_obat_sub_cutan_sc' => $request->memberikan_obat_sub_cutan_sc,
                    'pemasangan_catether' => $request->pemasangan_catether,
                    'mempersiapkan_pasien_operasi' => $request->mempersiapkan_pasien_operasi,
                    'membantu_dokter_bedah_selama_operasi' => $request->membantu_dokter_bedah_selama_operasi,
                    'melakukan_identifikasi_pasien_yang_akan_dioperasi' => $request->melakukan_identifikasi_pasien_yang_akan_dioperasi,
                    'menyiapkan_alat_yang_dibutuhkan_saat_operasi_berlangsung' => $request->menyiapkan_alat_yang_dibutuhkan_saat_operasi_berlangsung,
                    'melakukan_pemasangan_sarung_meja_mayo_dengan_benar' => $request->melakukan_pemasangan_sarung_meja_mayo_dengan_benar,
                    'melakukan_penyusunan_instrument_dasar_dimeja_mayo_dengan_benar' => $request->melakukan_penyusunan_instrument_dasar_dimeja_mayo_dengan_benar,
                    'melakukan_teknik_aseptic_dan_antiseptic_daerah_operasi' => $request->melakukan_teknik_aseptic_dan_antiseptic_daerah_operasi,
                    'melakukan_cuci_tangan_bedah' => $request->melakukan_cuci_tangan_bedah,
                    'penghitungan_instrument_dan_peralatan_prosedur_pembedahan' => $request->penghitungan_instrument_dan_peralatan_prosedur_pembedahan,
                    'melakukan_dokumentasi_sign_in_dan_sign_out' => $request->melakukan_dokumentasi_sign_in_dan_sign_out,
                    'melakukan_observasi_pasien_post_operasi' => $request->melakukan_observasi_pasien_post_operasi,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,
                ]);
                break;

            case 'pk-icu':
                $logbook = LogbookPKICU::create([
                    'no_rm' => $request->no_rm,
                    'assesment_resiko_jatuh' => $request->assesment_resiko_jatuh,
                    'menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak' => $request->menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak,
                    'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
                    'melakukan_pemasangan_infus_dewasa' => $request->melakukan_pemasangan_infus_dewasa,
                    'melakukan_pemasangan_infus_anak_dan_neonatus' => $request->melakukan_pemasangan_infus_anak_dan_neonatus,
                    'melakukan_pemasangan_ngt_ogt' => $request->melakukan_pemasangan_ngt_ogt,
                    'melakukan_pemasangan_ventilator' => $request->melakukan_pemasangan_ventilator,
                    'observasi_pasien_dengan_intubasi' => $request->observasi_pasien_dengan_intubasi,
                    'melakukan_personal_hygiene_pasien' => $request->melakukan_personal_hygiene_pasien,
                    'mengukur_pernafasan' => $request->mengukur_pernafasan,
                    'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
                    'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
                    'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
                    'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
                    'memberikan_oksigen_inhalasi_o2' => $request->memberikan_oksigen_inhalasi_o2,
                    'memberikan_oksigenasi_pemasangan_o2' => $request->memberikan_oksigenasi_pemasangan_o2,
                    'melakukan_prosedur_tranfusi' => $request->melakukan_prosedur_tranfusi,
                    'melakukan_pasien_nebulizer' => $request->melakukan_pasien_nebulizer,
                    'melakukan_balance_cairan' => $request->melakukan_balance_cairan,
                    'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                    'memberikan_obat_per_oral_po' => $request->memberikan_obat_per_oral_po,
                    'memberikan_obat_intra_venous_iv' => $request->memberikan_obat_intra_venous_iv,
                    'memberikan_obat_intra_muskular_im' => $request->memberikan_obat_intra_muskular_im,
                    'memberikan_obat_intra_cutan_ic' => $request->memberikan_obat_intra_cutan_ic,
                    'memberikan_obat_supositori' => $request->memberikan_obat_supositori,
                    'memberikan_obat_vaginal' => $request->memberikan_obat_vaginal,
                    'memberikan_obat_mata' => $request->memberikan_obat_mata,
                    'memberikan_obat_sublingual' => $request->memberikan_obat_sublingual,
                    'menghitung_tetesan_infus' => $request->menghitung_tetesan_infus,
                    'catatan' => $request->catatan,
                    'nip' => Auth::user()->nip,
                ]);
                break;

            default:
                abort(403, 'Unauthorized role.');
        }

        return redirect(route('logbook', absolute: false));
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'bk':
                $indexLogbook = DB::table('logbook_bk')
                    ->leftJoin('pasien', 'logbook_bk.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_bk.validator', '=', 'users.nip')
                    ->select(['logbook_bk.created_at', 'logbook_bk.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_bk.status_validasi', 'logbook_bk.waktu_validasi'])
                    ->paginate(5);
                break;

            case 'pk-ugd':
                $indexLogbook = DB::table('logbook_pk_ugd')
                    ->leftJoin('pasien', 'logbook_pk_ugd.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_pk_ugd.validator', '=', 'users.nip')
                    ->select(['logbook_pk_ugd.created_at', 'logbook_pk_ugd.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_pk_ugd.status_validasi', 'logbook_pk_ugd.waktu_validasi'])
                    ->paginate(5);
                break;

            case 'pk-rawat-jalan':
                $indexLogbook = DB::table('logbook_pk_rawatjalan')
                    ->leftJoin('pasien', 'logbook_pk_rawatjalan.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_pk_rawatjalan.validator', '=', 'users.nip')
                    ->select(['logbook_pk_rawatjalan.created_at', 'logbook_pk_rawatjalan.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_pk_rawatjalan.status_validasi', 'logbook_pk_rawatjalan.waktu_validasi'])
                    ->paginate(5);
                break;

            case 'pk-rawat-inap':
                $indexLogbook = DB::table('logbook_pk_rawatinap')
                    ->leftJoin('pasien', 'logbook_pk_rawatinap.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_pk_rawatinap.validator', '=', 'users.nip')
                    ->select(['logbook_pk_rawatinap.created_at', 'logbook_pk_rawatinap.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_pk_rawatinap.status_validasi', 'logbook_pk_rawatinap.waktu_validasi'])
                    ->paginate(5);
                break;

            case 'pk-perina':
                $indexLogbook = DB::table('logbook_pk_perina')
                    ->leftJoin('pasien', 'logbook_pk_perina.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_pk_perina.validator', '=', 'users.nip')
                    ->select(['logbook_pk_perina.created_at', 'logbook_pk_perina.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_pk_perina.status_validasi', 'logbook_pk_perina.waktu_validasi'])
                    ->paginate(5);
                break;

            case 'pk-ok':
                $indexLogbook = DB::table('logbook_pk_ok')
                    ->leftJoin('pasien', 'logbook_pk_ok.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_pk_ok.validator', '=', 'users.nip')
                    ->select(['logbook_pk_ok.created_at', 'logbook_pk_ok.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_pk_ok.status_validasi', 'logbook_pk_ok.waktu_validasi'])
                    ->paginate(5);
                break;

            case 'pk-icu':
                $indexLogbook = DB::table('logbook_pk_icu')
                    ->leftJoin('pasien', 'logbook_pk_icu.no_rm', '=', 'pasien.no_rm')
                    ->leftJoin('users', 'logbook_pk_icu.validator', '=', 'users.nip')
                    ->select(['logbook_pk_icu.created_at', 'logbook_pk_icu.no_rm', 'pasien.nama_pasien', 'users.nama_petugas', 'logbook_pk_icu.status_validasi', 'logbook_pk_icu.waktu_validasi'])
                    ->paginate(5);
                break;

            default:
                abort(403, 'Unauthorized role.');
        }

        return view('logbook.logbook', compact('indexLogbook'));

        // fallback kalau role tidak dikenali
        abort(403, 'Unauthorized role.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mentoring;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputMentoringController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $mentoring = Mentoring::create([
            'nip' => $request->nip_confirmation,
            'visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu' => $request->visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu,
            'struktur_organisasi_rsia_puti_bungsu' => $request->struktur_organisasi_rsia_puti_bungsu,
            'dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu' => $request->dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu,
            'pelayanan_unggulan_rsia_puti_bungsu' => $request->pelayanan_unggulan_rsia_puti_bungsu,
            'alur_perizinan_rsia_puti_bungsu' => $request->alur_perizinan_rsia_puti_bungsu,
            'peraturan_rsia_puti_bungsu' => $request->peraturan_rsia_puti_bungsu,
            'disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu' => $request->disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu,
            'budaya_5s' => $request->budaya_5s,
            'komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan' => $request->komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan,
            'prinsip_etika_dan_etiket_keperawatan' => $request->prinsip_etika_dan_etiket_keperawatan,
            'menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial' => $request->menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial,
            'melakukan_ttv' => $request->melakukan_ttv,
            'insiden_keselamatan_pasien' => $request->insiden_keselamatan_pasien,
            'pasien_safety' => $request->pasien_safety,
            'assasmen_resiko_jatuh' => $request->assasmen_resiko_jatuh,
            'transportasi_pasien' => $request->transportasi_pasien,
            'memberikan_obat_dengan_cara_aman_dan_tepat' => $request->memberikan_obat_dengan_cara_aman_dan_tepat,
            'memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit' => $request->memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit,
            'mengelola_pemberian_darah_dan_produk_darah' => $request->mengelola_pemberian_darah_dan_produk_darah,
            'memfasilitasi_pemenuhan_kebutuhan_oksigen' => $request->memfasilitasi_pemenuhan_kebutuhan_oksigen,
            'melakukan_perawatan_luka' => $request->melakukan_perawatan_luka,
            'analisa_interpretasi_data_dan_dokumen_secara_akurat' => $request->analisa_interpretasi_data_dan_dokumen_secara_akurat,
            'pembinaan_staf_keperawatan' => $request->pembinaan_staf_keperawatan,
            'caring' => $request->caring,
            'catatan' => $request->catatan_mentoring,
            'mentor' => Auth::user()->nip,
        ]);

        return redirect(route('mentoring', absolute: false));
    }
}
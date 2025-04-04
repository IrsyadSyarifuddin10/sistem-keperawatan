<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supervisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SupervisiController extends Controller
{
    public function create(): View
    {
        return view('supervisi.input-supervisi');
    }

    public function index()
    {
        $indexSupervisi = DB::table('supervisi')
            ->leftJoin('users as nipUsers', 'supervisi.nip', '=', 'nipUsers.nip')
            ->leftJoin('users as supervisorUsers', 'supervisi.supervisor', '=', 'supervisorUsers.nip')
            ->select(['supervisi.created_at', 'nipUsers.nip as nip', 'nipUsers.name as name', 'supervisorUsers.nip as nipSupervisor', 'supervisorUsers.name as supervisor', 'supervisi.status_verifikasi'])
            ->get();

        return view('supervisi.supervisi', compact('indexSupervisi')); // Kirim data ke view
    }
    public function store(Request $request): RedirectResponse
    {
        $supervisi = Supervisi::create([
            'nip' => $request->nip_confirmation,
            'menerima_dan_mengerjakan_dokumentasi_pasien_baru' => $request->menerima_dan_mengerjakan_dokumentasi_pasien_baru,
            'memberikan_oksigen' => $request->memberikan_oksigen,
            'melakukan_sbar_dan_tbak' => $request->melakukan_sbar_dan_tbak,
            'assesment_resiko_jatuh' => $request->assesment_resiko_jatuh,
            'asesment_nyeri' => $request->asesment_nyeri,
            'mengukur_pernafasan' => $request->mengukur_pernafasan,
            'mengukur_tekanan_nadi' => $request->mengukur_tekanan_nadi,
            'mengukur_tekanan_darah' => $request->mengukur_tekanan_darah,
            'mengukur_suhu_tubuh' => $request->mengukur_suhu_tubuh,
            'mengukur_saturasi_oksigen' => $request->mengukur_saturasi_oksigen,
            'melakukan_bimbingan_dan_penyuluhan' => $request->melakukan_bimbingan_dan_penyuluhan,
            'melakukan_asuhan_kebidanan' => $request->melakukan_asuhan_kebidanan,
            'membantu_proses_persalinan_normal' => $request->membantu_proses_persalinan_normal,
            'melakukan_kebersihan_vulva' => $request->melakukan_kebersihan_vulva,
            'melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv' => $request->melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv,
            'melakukan_vt' => $request->melakukan_vt,
            'melakukan_observasi_djj' => $request->melakukan_observasi_djj,
            'melakukan_epistomi' => $request->melakukan_epistomi,
            'melakukan_hecting_perineum' => $request->melakukan_hecting_perineum,
            'resusitasi_bayi_baru_lahir_spontan' => $request->resusitasi_bayi_baru_lahir_spontan,
            'memasang_catheter_wanita' => $request->memasang_catheter_wanita,
            'memasang_infus_dewasa' => $request->memasang_infus_dewasa,
            'melakukan_gym_ball' => $request->melakukan_gym_ball,
            'melakukan_pijat_oksitosin' => $request->melakukan_pijat_oksitosin,
            'mengoperasionalkan_ctg' => $request->mengoperasionalkan_ctg,
            'mengoperasionalkan_ekg' => $request->mengoperasionalkan_ekg,
            'mengoperasionalkan_usg' => $request->mengoperasionalkan_usg,
            'melakukan_dan_mendokumentasikan_7_benar_obat' => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
            'memberikan_obat_per_oral' => $request->memberikan_obat_per_oral,
            'memberikan_obat_intra_venous' => $request->memberikan_obat_intra_venous,
            'memberikan_obat_intra_muskular' => $request->memberikan_obat_intra_muskular,
            'memberikan_obat_intra_cutan' => $request->memberikan_obat_intra_cutan,
            'memberikan_obat_sub_cutan' => $request->memberikan_obat_sub_cutan,
            'memberikan_obat_supositori' => $request->memberikan_obat_supositori,
            'memberikan_obat_vaginal' => $request->memberikan_obat_vaginal,
            'memberikan_obat_sublingual' => $request->memberikan_obat_sublingual,
            'melakukan_prosedur_tranfusi' => $request->melakukan_prosedur_tranfusi,
            'melakukan_pasien_nebulizer' => $request->melakukan_pasien_nebulizer,
            'melakukan_ganti_verban' => $request->melakukan_ganti_verban,
            'mempersiapkan_pasien_operasi' => $request->mempersiapkan_pasien_operasi,
            'membantu_dokter_bedah_selama_operasi' => $request->membantu_dokter_bedah_selama_operasi,
            'melakukan_identifikasi_pasien_yang_akan_dioperasi' => $request->melakukan_identifikasi_pasien_yang_akan_dioperasi,
            'menyiapkan_alat_saat_operasi' => $request->menyiapkan_alat_saat_operasi,
            'pemasangan_sarung_meja_mayo' => $request->pemasangan_sarung_meja_mayo,
            'penyusunan_instrument_dasar' => $request->penyusunan_instrument_dasar,
            'teknik_aseptic_antiseptic' => $request->teknik_aseptic_antiseptic,
            'cuci_tangan_bedah' => $request->cuci_tangan_bedah,
            'penghitungan_instrument_peralatan' => $request->penghitungan_instrument_peralatan,
            'dokumentasi_sign_in_out' => $request->dokumentasi_sign_in_out,
            'observasi_pasien_post_operasi' => $request->observasi_pasien_post_operasi,
            'memandikan_pasien' => $request->memandikan_pasien,
            'memandikan_bayi' => $request->memandikan_bayi,
            'menghitung_tetesan_infus' => $request->menghitung_tetesan_infus,
            'mengoperasionalkan_cpap' => $request->mengoperasionalkan_cpap,
            'mengoperasionalkan_ventilator' => $request->mengoperasionalkan_ventilator,
            'catatan' => $request->catatan_supervisi,
            'supervisor' => Auth::user()->nip,
        ]);

        return redirect(route('supervisi', absolute: false));
    }
}
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
            ->select(['supervisi.created_at', 'supervisi.id', 'nipUsers.nip as nip', 'nipUsers.nama_petugas as nama_petugas', 'supervisorUsers.nip as nipSupervisor', 'supervisorUsers.nama_petugas as supervisor', 'supervisi.status_verifikasi'])
            ->paginate(10);

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

        return redirect()->route('supervisi')->with('success', 'Data berhasil disimpan.');
    }

    public function indexEdit($id, $nip, $nipSupervisor)
    {
        $indexEditSupervisi = DB::table('supervisi')
            ->leftJoin('users', 'supervisi.nip', '=', 'users.nip')
            ->select([
                "supervisi.id",
                "supervisi.nip",
                "supervisi.menerima_dan_mengerjakan_dokumentasi_pasien_baru",
                "supervisi.memberikan_oksigen",
                "supervisi.melakukan_sbar_dan_tbak",
                "supervisi.assesment_resiko_jatuh",
                "supervisi.asesment_nyeri",
                "supervisi.mengukur_pernafasan",
                "supervisi.mengukur_tekanan_nadi",
                "supervisi.mengukur_tekanan_darah",
                "supervisi.mengukur_suhu_tubuh",
                "supervisi.mengukur_saturasi_oksigen",
                "supervisi.melakukan_bimbingan_dan_penyuluhan",
                "supervisi.melakukan_asuhan_kebidanan",
                "supervisi.membantu_proses_persalinan_normal",
                "supervisi.melakukan_kebersihan_vulva",
                "supervisi.melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv",
                "supervisi.melakukan_vt",
                "supervisi.melakukan_observasi_djj",
                "supervisi.melakukan_epistomi",
                "supervisi.melakukan_hecting_perineum",
                "supervisi.resusitasi_bayi_baru_lahir_spontan",
                "supervisi.memasang_catheter_wanita",
                "supervisi.memasang_infus_dewasa",
                "supervisi.melakukan_gym_ball",
                "supervisi.melakukan_pijat_oksitosin",
                "supervisi.mengoperasionalkan_ctg",
                "supervisi.mengoperasionalkan_ekg",
                "supervisi.mengoperasionalkan_usg",
                "supervisi.melakukan_dan_mendokumentasikan_7_benar_obat",
                "supervisi.memberikan_obat_per_oral",
                "supervisi.memberikan_obat_intra_venous",
                "supervisi.memberikan_obat_intra_muskular",
                "supervisi.memberikan_obat_intra_cutan",
                "supervisi.memberikan_obat_sub_cutan",
                "supervisi.memberikan_obat_supositori",
                "supervisi.memberikan_obat_vaginal",
                "supervisi.memberikan_obat_sublingual",
                "supervisi.melakukan_prosedur_tranfusi",
                "supervisi.melakukan_pasien_nebulizer",
                "supervisi.melakukan_ganti_verban",
                "supervisi.mempersiapkan_pasien_operasi",
                "supervisi.membantu_dokter_bedah_selama_operasi",
                "supervisi.melakukan_identifikasi_pasien_yang_akan_dioperasi",
                "supervisi.menyiapkan_alat_saat_operasi",
                "supervisi.pemasangan_sarung_meja_mayo",
                "supervisi.penyusunan_instrument_dasar",
                "supervisi.teknik_aseptic_antiseptic",
                "supervisi.cuci_tangan_bedah",
                "supervisi.penghitungan_instrument_peralatan",
                "supervisi.dokumentasi_sign_in_out",
                "supervisi.observasi_pasien_post_operasi",
                "supervisi.memandikan_pasien",
                "supervisi.memandikan_bayi",
                "supervisi.menghitung_tetesan_infus",
                "supervisi.mengoperasionalkan_cpap",
                "supervisi.mengoperasionalkan_ventilator",
                "supervisi.catatan",
                "supervisi.supervisor",
                'users.nama_petugas' // Perbaikan alias
            ])
            ->where('supervisi.id', $id)
            ->where('supervisi.nip', $nip)
            ->where('supervisi.supervisor', $nipSupervisor)
            ->first(); // Jika hanya satu baris, gunakan first()

        // Pastikan data ditemukan
        if (!$indexEditSupervisi) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('supervisi.edit-supervisi', compact('indexEditSupervisi'));
    }

    public function update(Request $request): RedirectResponse
    {
        $supervisi = Supervisi::where('nip', $request->nip_confirmation)
            ->where('id', $request->id)
            ->where('supervisor', $request->nipSupervisor)
            ->first();

        if ($supervisi) {
            $supervisi->update([
                "menerima_dan_mengerjakan_dokumentasi_pasien_baru" => $request->menerima_dan_mengerjakan_dokumentasi_pasien_baru,
                "memberikan_oksigen" => $request->memberikan_oksigen,
                "melakukan_sbar_dan_tbak" => $request->melakukan_sbar_dan_tbak,
                "assesment_resiko_jatuh" => $request->assesment_resiko_jatuh,
                "asesment_nyeri" => $request->asesment_nyeri,
                "mengukur_pernafasan" => $request->mengukur_pernafasan,
                "mengukur_tekanan_nadi" => $request->mengukur_tekanan_nadi,
                "mengukur_tekanan_darah" => $request->mengukur_tekanan_darah,
                "mengukur_suhu_tubuh" => $request->mengukur_suhu_tubuh,
                "mengukur_saturasi_oksigen" => $request->mengukur_saturasi_oksigen,
                "melakukan_bimbingan_dan_penyuluhan" => $request->melakukan_bimbingan_dan_penyuluhan,
                "melakukan_asuhan_kebidanan" => $request->melakukan_asuhan_kebidanan,
                "membantu_proses_persalinan_normal" => $request->membantu_proses_persalinan_normal,
                "melakukan_kebersihan_vulva" => $request->melakukan_kebersihan_vulva,
                "melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv" => $request->melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv,
                "melakukan_vt" => $request->melakukan_vt,
                "melakukan_observasi_djj" => $request->melakukan_observasi_djj,
                "melakukan_epistomi" => $request->melakukan_epistomi,
                "melakukan_hecting_perineum" => $request->melakukan_hecting_perineum,
                "resusitasi_bayi_baru_lahir_spontan" => $request->resusitasi_bayi_baru_lahir_spontan,
                "memasang_catheter_wanita" => $request->memasang_catheter_wanita,
                "memasang_infus_dewasa" => $request->memasang_infus_dewasa,
                "melakukan_gym_ball" => $request->melakukan_gym_ball,
                "melakukan_pijat_oksitosin" => $request->melakukan_pijat_oksitosin,
                "mengoperasionalkan_ctg" => $request->mengoperasionalkan_ctg,
                "mengoperasionalkan_ekg" => $request->mengoperasionalkan_ekg,
                "mengoperasionalkan_usg" => $request->mengoperasionalkan_usg,
                "melakukan_dan_mendokumentasikan_7_benar_obat" => $request->melakukan_dan_mendokumentasikan_7_benar_obat,
                "memberikan_obat_per_oral" => $request->memberikan_obat_per_oral,
                "memberikan_obat_intra_venous" => $request->memberikan_obat_intra_venous,
                "memberikan_obat_intra_muskular" => $request->memberikan_obat_intra_muskular,
                "memberikan_obat_intra_cutan" => $request->memberikan_obat_intra_cutan,
                "memberikan_obat_sub_cutan" => $request->memberikan_obat_sub_cutan,
                "memberikan_obat_supositori" => $request->memberikan_obat_supositori,
                "memberikan_obat_vaginal" => $request->memberikan_obat_vaginal,
                "memberikan_obat_sublingual" => $request->memberikan_obat_sublingual,
                "melakukan_prosedur_tranfusi" => $request->melakukan_prosedur_tranfusi,
                "melakukan_pasien_nebulizer" => $request->melakukan_pasien_nebulizer,
                "melakukan_ganti_verban" => $request->melakukan_ganti_verban,
                "mempersiapkan_pasien_operasi" => $request->mempersiapkan_pasien_operasi,
                "membantu_dokter_bedah_selama_operasi" => $request->membantu_dokter_bedah_selama_operasi,
                "melakukan_identifikasi_pasien_yang_akan_dioperasi" => $request->melakukan_identifikasi_pasien_yang_akan_dioperasi,
                "menyiapkan_alat_saat_operasi" => $request->menyiapkan_alat_saat_operasi,
                "pemasangan_sarung_meja_mayo" => $request->pemasangan_sarung_meja_mayo,
                "penyusunan_instrument_dasar" => $request->penyusunan_instrument_dasar,
                "teknik_aseptic_antiseptic" => $request->teknik_aseptic_antiseptic,
                "cuci_tangan_bedah" => $request->cuci_tangan_bedah,
                "penghitungan_instrument_peralatan" => $request->penghitungan_instrument_peralatan,
                "dokumentasi_sign_in_out" => $request->dokumentasi_sign_in_out,
                "observasi_pasien_post_operasi" => $request->observasi_pasien_post_operasi,
                "memandikan_pasien" => $request->memandikan_pasien,
                "memandikan_bayi" => $request->memandikan_bayi,
                "menghitung_tetesan_infus" => $request->menghitung_tetesan_infus,
                "mengoperasionalkan_cpap" => $request->mengoperasionalkan_cpap,
                "mengoperasionalkan_ventilator" => $request->mengoperasionalkan_ventilator,
                "catatan" => $request->catatan_supervisi,
            ]);
            return redirect()->route('supervisi')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->route('supervisi')->with('error', 'Data tidak ditemukan.');
        }

        return redirect()->route('supervisi');
    }

    public function destroy($id, $nip, $nipSupervisor)
    {
        DB::table('supervisi')->where('id', $id)->where('nip', $nip)->where('supervisor', $nipSupervisor)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('supervisi')->with('success', 'Data berhasil dihapus!');
    }
}

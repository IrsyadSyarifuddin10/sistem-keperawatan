<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Mentoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use function Pest\Laravel\get;

class MentoringController extends Controller
{
    public function create(): View
    {
        return view('mentoring.input-mentoring');
    }

    public function index()
    {
        $indexMentoring = DB::table('mentoring')
            ->leftJoin('users as nipUsers', 'mentoring.nip', '=', 'nipUsers.nip')
            ->leftJoin('users as mentorUsers', 'mentoring.mentor', '=', 'mentorUsers.nip')
            ->select(['mentoring.created_at', 'nipUsers.nip as nip', 'nipUsers.name as name', 'mentorUsers.nip as nipMentor', 'mentorUsers.name as mentor', 'mentoring.status_verifikasi'])
            ->paginate(5);

        return view('mentoring.mentoring', compact('indexMentoring')); // Kirim data ke view
    }

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

    public function indexEdit($created_at, $nip, $nipMentor) {
    $indexEditMentoring = DB::table('mentoring')
        ->leftJoin('users', 'mentoring.nip', '=', 'users.nip')
        ->select([
            'mentoring.nip',
            'mentoring.visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu',
            'mentoring.struktur_organisasi_rsia_puti_bungsu',
            'mentoring.dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu',
            'mentoring.pelayanan_unggulan_rsia_puti_bungsu',
            'mentoring.alur_perizinan_rsia_puti_bungsu',
            'mentoring.peraturan_rsia_puti_bungsu',
            'mentoring.disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu',
            'mentoring.budaya_5s',
            'mentoring.komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan',
            'mentoring.prinsip_etika_dan_etiket_keperawatan',
            'mentoring.menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial',
            'mentoring.melakukan_ttv',
            'mentoring.insiden_keselamatan_pasien',
            'mentoring.pasien_safety',
            'mentoring.assasmen_resiko_jatuh',
            'mentoring.transportasi_pasien',
            'mentoring.memberikan_obat_dengan_cara_aman_dan_tepat',
            'mentoring.memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit',
            'mentoring.mengelola_pemberian_darah_dan_produk_darah',
            'mentoring.memfasilitasi_pemenuhan_kebutuhan_oksigen',
            'mentoring.melakukan_perawatan_luka',
            'mentoring.analisa_interpretasi_data_dan_dokumen_secara_akurat',
            'mentoring.pembinaan_staf_keperawatan',
            'mentoring.caring',
            'mentoring.catatan',
            'users.name' // Perbaikan alias
        ])
        ->where('mentoring.created_at', $created_at)
        ->where('mentoring.nip', $nip)
        ->where('mentoring.mentor', $nipMentor)
        ->first(); // Jika hanya satu baris, gunakan first()

        // Pastikan data ditemukan
        if (!$indexEditMentoring) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('mentoring.edit-mentoring', compact('indexEditMentoring'));
    }

    public function update(Request $request): RedirectResponse
    {
        $mentoring = Mentoring::where('nip', $request->nip_confirmation)->first(); // Cari data berdasarkan NIP

        if ($mentoring) {
            $mentoring->update([
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
            ]);
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
        
        return redirect()->route('mentoring');
    }

    public function destroy($created_at, $nip, $nipMentor)
    {
        DB::table('mentoring')->where('created_at', $created_at)->where('nip', $nip)->where('mentor', $nipMentor)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('mentoring')->with('success', 'Data berhasil dihapus!');
    }
}
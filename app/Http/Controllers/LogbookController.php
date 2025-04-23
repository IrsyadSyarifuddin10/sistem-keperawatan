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
use App\Models\Pasien;


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

        if (!isset($this->logbookMap[$role])) {
            abort(403, 'Unauthorized role');
        }

        [$model, $fields] = $this->logbookMap[$role];

        $data = $request->only($fields);
        $data['nip'] = $user->nip;

        // Cek apakah pasien sudah ada
        $pasien = Pasien::where('no_rm', $request->no_rm)->first();

        if ($pasien) {
            // Jika belum ada, baru buat pasien
            if ($pasien->nama_pasien !== $request->nama_pasien) {
                return redirect()->back()->with('error', 'No RM sudah ada, tetapi nama pasien berbeda.');
            }
        } else {
            // Jika pasien tidak ada, buat data pasien baru
            Pasien::create([
                'no_rm' => $request->no_rm,
                'nama_pasien' => $request->nama_pasien,
            ]);
        }

        // Simpan data logbook
        $model::create($data);

        return redirect()->route('logbook')->with('success', 'Logbook berhasil disimpan.');
    }


    public function index(Request $request)
    {
        $user = Auth::user();

        $tableMap = [
            'bk' => 'logbook_bk',
            'pk-ugd' => 'logbook_pk_ugd',
            'pk-rawat-jalan' => 'logbook_pk_rawatjalan',
            'pk-rawat-inap' => 'logbook_pk_rawatinap',
            'pk-perina' => 'logbook_pk_perina',
            'pk-ok' => 'logbook_pk_ok',
            'pk-icu' => 'logbook_pk_icu',
        ];

        $role = $user->role;

        if (!isset($tableMap[$role])) {
            abort(403, 'Unauthorized role.');
        }

        $table = $tableMap[$role];

        $indexLogbook = DB::table($table)
            ->leftJoin('pasien', "$table.no_rm", '=', 'pasien.no_rm')
            ->leftJoin('users', "$table.nip", '=', 'users.nip')
            ->select([
                "$table.id",
                "$table.nip",
                "$table.no_rm",
                "$table.created_at",
                "$table.no_rm",
                'pasien.nama_pasien',
                'users.nama_petugas',
                "$table.status_validasi",
                "$table.waktu_validasi",
            ])
            ->paginate(5);

        return view('logbook.logbook', compact('indexLogbook'));
    }

    public function indexEdit($id, $nip, $no_rm)
    {
        $user = Auth::user();

        $tableMap = [
            'bk' => 'logbook_bk',
            'pk-ugd' => 'logbook_pk_ugd',
            'pk-rawat-jalan' => 'logbook_pk_rawatjalan',
            'pk-rawat-inap' => 'logbook_pk_rawatinap',
            'pk-perina' => 'logbook_pk_perina',
            'pk-ok' => 'logbook_pk_ok',
            'pk-icu' => 'logbook_pk_icu',
        ];

        $role = $user->role;

        if (!isset($tableMap[$role])) {
            abort(403, 'Unauthorized role.');
        }

        $table = $tableMap[$role];

        $indexEditLogbook = DB::table($table)
            ->leftJoin('pasien', "$table.no_rm", '=', 'pasien.no_rm')
            ->leftJoin('users', "$table.validator", '=', 'users.nip')
            ->select([
                "$table.*",
                'pasien.nama_pasien',
                'users.nama_petugas'
            ])
            ->where("$table.id", $id)
            ->where("$table.nip", $nip)
            ->where("$table.no_rm", $no_rm)
            ->first();

        // Pastikan data ditemukan
        if (!$indexEditLogbook) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view("logbook.edit-logbook-$role", compact('indexEditLogbook'));
    }

    public function destroy($id, $nip, $no_rm)
    {

        $user = Auth::user();

        $tableMap = [
            'bk' => 'logbook_bk',
            'pk-ugd' => 'logbook_pk_ugd',
            'pk-rawat-jalan' => 'logbook_pk_rawatjalan',
            'pk-rawat-inap' => 'logbook_pk_rawatinap',
            'pk-perina' => 'logbook_pk_perina',
            'pk-ok' => 'logbook_pk_ok',
            'pk-icu' => 'logbook_pk_icu',
        ];

        $role = $user->role;

        if (!isset($tableMap[$role])) {
            abort(403, 'Unauthorized role.');
        }

        $table = $tableMap[$role];

        DB::table("$table")->where('id', $id)->where('nip', $nip)->where('no_rm', $no_rm)->delete();
        // Redirect dengan pesan sukses
        return redirect()->route('logbook')->with('success', 'Data berhasil dihapus!');
    }
}

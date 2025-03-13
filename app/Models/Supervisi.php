<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Supervisi extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'supervisi';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
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
        'catatan',
        'supervisor',
        'status_verifikasi',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp'
        ];
    }
}
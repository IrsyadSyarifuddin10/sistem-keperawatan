<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookPKOK extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_pk_ok';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
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
        'status_validasi',
        'validator',
        'created_at',
        'waktu_validasi',
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
        ];
    }
}

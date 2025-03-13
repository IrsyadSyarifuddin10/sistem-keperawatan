<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Mentoring extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'mentoring';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
        'visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu',
        'struktur_organisasi_rsia_puti_bungsu',
        'dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu',
        'pelayanan_unggulan_rsia_puti_bungsu',
        'alur_perizinan_rsia_puti_bungsu',
        'peraturan_rsia_puti_bungsu',
        'disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu',
        'budaya_5s',
        'komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan',
        'prinsip_etika_dan_etiket_keperawatan',
        'menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial',
        'melakukan_ttv',
        'insiden_keselamatan_pasien',
        'pasien_safety',
        'assasmen_resiko_jatuh',
        'transportasi_pasien',
        'memberikan_obat_dengan_cara_aman_dan_tepat',
        'memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit',
        'mengelola_pemberian_darah_dan_produk_darah',
        'memfasilitasi_pemenuhan_kebutuhan_oksigen',
        'melakukan_perawatan_luka',
        'analisa_interpretasi_data_dan_dokumen_secara_akurat',
        'pembinaan_staf_keperawatan',
        'caring',
        'catatan',
        'mentor',
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
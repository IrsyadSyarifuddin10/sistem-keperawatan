<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookPKRalan extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_pk_rawatjalan';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
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

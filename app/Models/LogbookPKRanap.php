<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookPKRanap extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_pk_rawatinap';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookPKICU extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_pk_icu';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
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

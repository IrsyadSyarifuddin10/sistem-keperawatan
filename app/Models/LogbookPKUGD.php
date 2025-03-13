<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookPKUGD extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_pk_ugd';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
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
        'validator',
        'created_at',
        'updated_at',
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
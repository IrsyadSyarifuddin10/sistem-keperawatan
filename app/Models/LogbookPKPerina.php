<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookPKPerina extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_pk_perina';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
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
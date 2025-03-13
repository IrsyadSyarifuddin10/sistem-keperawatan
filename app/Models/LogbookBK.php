<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LogbookBK extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'logbook_bk';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
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
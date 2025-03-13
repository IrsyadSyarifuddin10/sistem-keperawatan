<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supervisi', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('menerima_dan_mengerjakan_dokumentasi_pasien_baru', ['sudah', 'belum']);
            $table->enum('memberikan_oksigen', ['sudah', 'belum']);
            $table->enum('melakukan_sbar_dan_tbak', ['sudah', 'belum']);
            $table->enum('assesment_resiko_jatuh', ['sudah', 'belum']);
            $table->enum('asesment_nyeri', ['sudah', 'belum']);
            $table->enum('mengukur_pernafasan', ['sudah', 'belum']);
            $table->enum('mengukur_tekanan_nadi', ['sudah', 'belum']);
            $table->enum('mengukur_tekanan_darah', ['sudah', 'belum']);
            $table->enum('mengukur_suhu_tubuh', ['sudah', 'belum']);
            $table->enum('mengukur_saturasi_oksigen', ['sudah', 'belum']);
            $table->enum('melakukan_bimbingan_dan_penyuluhan', ['sudah', 'belum']);
            $table->enum('melakukan_asuhan_kebidanan', ['sudah', 'belum']);
            $table->enum('membantu_proses_persalinan_normal', ['sudah', 'belum']);
            $table->enum('melakukan_kebersihan_vulva', ['sudah', 'belum']);
            $table->enum('melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_iv', ['sudah', 'belum']);
            $table->enum('melakukan_vt', ['sudah', 'belum']);
            $table->enum('melakukan_observasi_djj', ['sudah', 'belum']);
            $table->enum('melakukan_epistomi', ['sudah', 'belum']);
            $table->enum('melakukan_hecting_perineum', ['sudah', 'belum']);
            $table->enum('resusitasi_bayi_baru_lahir_spontan', ['sudah', 'belum']);
            $table->enum('memasang_catheter_wanita', ['sudah', 'belum']);
            $table->enum('memasang_infus_dewasa', ['sudah', 'belum']);
            $table->enum('melakukan_gym_ball', ['sudah', 'belum']);
            $table->enum('melakukan_pijat_oksitosin', ['sudah', 'belum']);
            $table->enum('mengoperasionalkan_ctg', ['sudah', 'belum']);
            $table->enum('mengoperasionalkan_ekg', ['sudah', 'belum']);
            $table->enum('mengoperasionalkan_usg', ['sudah', 'belum']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['sudah', 'belum']);
            $table->enum('memberikan_obat_per_oral', ['sudah', 'belum']);
            $table->enum('memberikan_obat_intra_venous', ['sudah', 'belum']);
            $table->enum('memberikan_obat_intra_muskular', ['sudah', 'belum']);
            $table->enum('memberikan_obat_intra_cutan', ['sudah', 'belum']);
            $table->enum('memberikan_obat_sub_cutan', ['sudah', 'belum']);
            $table->enum('memberikan_obat_supositori', ['sudah', 'belum']);
            $table->enum('memberikan_obat_vaginal', ['sudah', 'belum']);
            $table->enum('memberikan_obat_sublingual', ['sudah', 'belum']);
            $table->enum('melakukan_prosedur_tranfusi', ['sudah', 'belum']);
            $table->enum('melakukan_pasien_nebulizer', ['sudah', 'belum']);
            $table->enum('melakukan_ganti_verban', ['sudah', 'belum']);
            $table->enum('mempersiapkan_pasien_operasi', ['sudah', 'belum']);
            $table->enum('membantu_dokter_bedah_selama_operasi', ['sudah', 'belum']);
            $table->enum('melakukan_identifikasi_pasien_yang_akan_dioperasi', ['sudah', 'belum']);
            $table->enum('menyiapkan_alat_saat_operasi', ['sudah', 'belum']);
            $table->enum('pemasangan_sarung_meja_mayo', ['sudah', 'belum']);
            $table->enum('penyusunan_instrument_dasar', ['sudah', 'belum']);
            $table->enum('teknik_aseptic_antiseptic', ['sudah', 'belum']);
            $table->enum('cuci_tangan_bedah', ['sudah', 'belum']);
            $table->enum('penghitungan_instrument_peralatan', ['sudah', 'belum']);
            $table->enum('dokumentasi_sign_in_out', ['sudah', 'belum']);
            $table->enum('observasi_pasien_post_operasi', ['sudah', 'belum']);
            $table->enum('memandikan_pasien', ['sudah', 'belum']);
            $table->enum('memandikan_bayi', ['sudah', 'belum']);
            $table->enum('menghitung_tetesan_infus', ['sudah', 'belum']);
            $table->enum('mengoperasionalkan_cpap', ['sudah', 'belum']);
            $table->enum('mengoperasionalkan_ventilator', ['sudah', 'belum']);
            $table->string('catatan')->nullable();
            $table->string('supervisor', 12);
            $table->foreign('supervisor')->references('nip')->on('users');
            $table->enum('status_verifikasi', ['sudah', 'belum'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisi');
    }
};
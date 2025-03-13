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
        Schema::create('logbook_pk_ugd', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_gelang_identitas_pasien_sesuai_prosedur', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pendokumentasian_assesment_pasien_awal_masuk', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigen_inhalasi_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_rjp', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_catheter', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_heacting', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_cutan_ic', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sub_cutan_sc', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_supositori', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_vaginal', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_mata', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sublingual', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menyiapkan_dan_memasang_infus_anak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menyiapkan_dan_memasang_infus_dewasa', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_balance_cairan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasionalkan_ctg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoprasionalkan_ekg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_ngt', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_kompres_hangat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_perawatan_pada_pasien_yang_akan_meninggal', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_perawatan_pada_pasien_baru_meninggal', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });

        Schema::create('logbook_pk_rawatinap', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('assesment_resiko_jatuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('assesment_nyeri', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigen_inhalasi_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_balance_cairan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menyiapkan_dan_memasang_infus_anak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menyiapkan_dan_memasang_infus_dewasa', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_cutan_ic', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sub_cutan_sc', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_supositori', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_vagina', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_catheter', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasionalkan_ctg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoprasionalkan_ekg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_nebulizer', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_transfusi_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memandikan_pasien', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_kompres_hangat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_ganti_verban', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_ngt_ogt', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pendidikan_kesehatan', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });

        Schema::create('logbook_pk_rawatjalan', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('serah_terima_dan_mengerjakan_dok_pasien_baru_dewasa_dan_anak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_gelang_identitas_pasien_sesuai_prosedur', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('assesment_resiko_jatuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigen_inhalasi_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_nebulizer', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_ganti_verban', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasikan_ctg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasikan_usg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoprasikan_ekg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_infus_dewasa', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_infus_anak_neonatus', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_cutan_ic', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sub_cutan_sc', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_supositori', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_vaginal', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_mata', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sublingual', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pendidikan_kesehatan', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });

        Schema::create('logbook_pk_perina', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('melakukan_resusitasi_bayi_baru_lahir', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_gelang_pasien_baru', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menerima_dan_mengerjakan_dokumentasi_pasien_baru_neonatus', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasikan_cpap', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_oksigenasi_pemasangan_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasikan_ventilator', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_infus_umbilical', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_infus_neonatus_via_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_mata', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memandikan_bayi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_makan_via_ogt', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_ogt', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pendidikan_kesehatan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('assesment_resiko_jatuh', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });

        Schema::create('logbook_pk_ok', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('menerima_dan_mengerjakan_dokumentasi_pasien_tindakan_ok', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigen_inhalasi_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('assesment_resiko_jatuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_cutan_ic', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sub_cutan_sc', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('pemasangan_catether', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mempersiapkan_pasien_operasi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('membantu_dokter_bedah_selama_operasi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_identifikasi_pasien_yang_akan_dioperasi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menyiapkan_alat_yang_dibutuhkan_saat_operasi_berlangsung', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_sarung_meja_mayo_dengan_benar', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_penyusunan_instrument_dasar_dimeja_mayo_dengan_benar', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_teknik_aseptic_dan_antiseptic_daerah_operasi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_cuci_tangan_bedah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('penghitungan_instrument_dan_peralatan_prosedur_pembedahan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dokumentasi_sign_in_dan_sign_out', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_observasi_pasien_post_operasi', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });

        Schema::create('logbook_pk_icu', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('assesment_resiko_jatuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menerima_dan_mengerjakan_dokumentasi_pasien_baru_dewasa_dan_anak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_infus_dewasa', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_infus_anak_dan_neonatus', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_ngt_ogt', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pemasangan_ventilator', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('observasi_pasien_dengan_intubasi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_personal_hygiene_pasien', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigen_inhalasi_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigenasi_pemasangan_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_prosedur_tranfusi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pasien_nebulizer', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_balance_cairan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_cutan_ic', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_supositori', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_vaginal', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_mata', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sublingual', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('menghitung_tetesan_infus', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });

        Schema::create('logbook_bk', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('menerima_dan_mengerjakan_dokumentasi_pasien_baru', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_oksigen_inhalasi_o2', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_sbar_dan_tbak', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_pernafasan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_nadi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_tekanan_darah', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_suhu_tubuh', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengukur_saturasi_oksigen', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_bimbingan_dan_penyuluhan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_asuhan_kebidanan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('membantu_proses_persalinan_normal', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_kebersihan_vulva_vulva_hygiene', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_observasi_kemajuan_persalinan_kala_i_ii_iii_dan_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_vt_atau_vaginal_touche', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_observasi_djj', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_epistomi', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_hecting_perineum', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('resusitasi_bayi_baru_lahir_spontan', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_catheter_wanita', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memasang_infus_dewasa', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_gym_ball', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_pijat_oksitosin', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('mengoperasionalkan_ctg', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('melakukan_dan_mendokumentasikan_7_benar_obat', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_per_oral_po', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_venous_iv', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_muskular_im', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_intra_cutan_ic', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_sub_cutan_sc', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_supositori', ['Sesuai', 'Tidak Sesuai']);
            $table->enum('memberikan_obat_vaginal', ['Sesuai', 'Tidak Sesuai']);
            $table->string('catatan')->nullable();
            $table->string('validator', 12);
            $table->foreign('validator')->references('nip')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbook_pk_ugd');
        Schema::dropIfExists('logbook_pk_rawatinap');
        Schema::dropIfExists('logbook_pk_rawatjalan');
        Schema::dropIfExists('logbook_pk_perina');
        Schema::dropIfExists('logbook_pk_ok');
        Schema::dropIfExists('logbook_pk_icu');
        Schema::dropIfExists('logbook_bk');
    }
};
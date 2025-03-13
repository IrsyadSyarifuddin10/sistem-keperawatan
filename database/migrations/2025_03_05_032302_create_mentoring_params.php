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
        Schema::create('mentoring', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nip', 12);
            $table->foreign('nip')->references('nip')->on('users');
            $table->enum('visi_misi_motto_dan_nilai_nilai_dasar_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('struktur_organisasi_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('dokter_umum_dan_dokter_spesialis_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('pelayanan_unggulan_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('alur_perizinan_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('peraturan_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('disiplin_dan_tata_tertib_kerja_rsia_puti_bungsu', ['tercapai', 'tidak tercapai']);
            $table->enum('budaya_5s', ['tercapai', 'tidak tercapai']);
            $table->enum('komunikasi_interpersonal_dalam_melaksanakan_tindakan_keperawatan', ['tercapai', 'tidak tercapai']);
            $table->enum('prinsip_etika_dan_etiket_keperawatan', ['tercapai', 'tidak tercapai']);
            $table->enum('menerapkan_prinsip_prinsip_pencegahan_infeksi_nosocomial', ['tercapai', 'tidak tercapai']);
            $table->enum('melakukan_ttv', ['tercapai', 'tidak tercapai']);
            $table->enum('insiden_keselamatan_pasien', ['tercapai', 'tidak tercapai']);
            $table->enum('pasien_safety', ['tercapai', 'tidak tercapai']);
            $table->enum('assasmen_resiko_jatuh', ['tercapai', 'tidak tercapai']);
            $table->enum('transportasi_pasien', ['tercapai', 'tidak tercapai']);
            $table->enum('memberikan_obat_dengan_cara_aman_dan_tepat', ['tercapai', 'tidak tercapai']);
            $table->enum('memfasilitasi_pemenuhan_kebutuhan_cairan_dan_elektrolit', ['tercapai', 'tidak tercapai']);
            $table->enum('mengelola_pemberian_darah_dan_produk_darah', ['tercapai', 'tidak tercapai']);
            $table->enum('memfasilitasi_pemenuhan_kebutuhan_oksigen', ['tercapai', 'tidak tercapai']);
            $table->enum('melakukan_perawatan_luka', ['tercapai', 'tidak tercapai']);
            $table->enum('analisa_interpretasi_data_dan_dokumen_secara_akurat', ['tercapai', 'tidak tercapai']);
            $table->enum('pembinaan_staf_keperawatan', ['tercapai', 'tidak tercapai']);
            $table->enum('caring', ['tercapai', 'tidak tercapai']);
            $table->string('catatan')->nullable();
            $table->string('mentor', 12);
            $table->foreign('mentor')->references('nip')->on('users');
            $table->enum('status_verifikasi', ['sudah', 'belum'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentoring');
    }
};
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 12)->unique();
            $table->string('nama_petugas');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['admin', 'bk', 'pk', 'pra pk', 'verifikator'])->default('admin');
            $table->enum('unit', ['admin', 'ugd', 'rawat inap', 'rawat jalan', 'perinatologi', 'ok', 'icu', 'bk', 'vk', 'kepegawaian'])->default('admin');
            $table->enum('role', [
                'bk',
                'pk-ugd',
                'pk-rawat-inap',
                'pk-rawat-jalan',
                'pk-perinatologi',
                'pk-ok',
                'pk-icu',
                'pk-vk',
                'pk-kepegawaian',
                'admin',
                'pra-pk-ugd',
                'pra-pk-rawat-inap',
                'pra-pk-rawat-jalan',
                'pra-pk-perinatologi',
                'pra-pk-ok',
                'pra-pk-icu',
                'pra-pk-vk',
                'pra-pk-kepegawaian',
                'verifikator',
            ])->default('admin');
            $table->rememberToken();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

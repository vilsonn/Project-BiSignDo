<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul event
            $table->text('description'); // Deskripsi event
            $table->string('location'); // Lokasi pelaksanaan
            $table->datetime('start_date'); // Tanggal mulai
            $table->datetime('end_date'); // Tanggal selesai
            $table->string('image')->nullable(); // Poster event (opsional)
            $table->string('status')->default('upcoming'); // Status (upcoming, ongoing, ended, canceled)
            $table->integer('max_participants')->nullable(); // Maksimal peserta (opsional)
            $table->string('registration_link')->nullable(); // Link eksternal pendaftaran (opsional)
            $table->text('embed_code')->nullable(); // Embed Instagram
            $table->string('type')->default('external'); // Tipe event (internal, external)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

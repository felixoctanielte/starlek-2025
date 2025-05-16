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
        Schema::create('isthara', function (Blueprint $table) {
            $table->id(); // kolom id (PK)
            $table->string('name'); // nama kandidat/opsi
            $table->integer('vote_count')->default(0); // jumlah voting diterima
            $table->text('description')->nullable(); // deskripsi kandidat (opsional)
            $table->string('image')->nullable(); // URL foto kandidat (opsional)
            $table->timestamp('voting_start_time')->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isthara');
    }
};

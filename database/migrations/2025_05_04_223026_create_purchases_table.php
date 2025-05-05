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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');

            // Satın alınan dersi belirten foreign key
            $table->unsignedBigInteger('course_id');

            // Satın alma tarihi
            $table->timestamp('purchased_at')->useCurrent();

            // Foreign key ilişkileri
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('adverts')->onDelete('cascade');

            // Her kullanıcı aynı dersi birden fazla satın almasın
            $table->unique(['member_id', 'course_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};

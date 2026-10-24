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
    Schema::create('invitations', function (Blueprint $table) {
        $table->id();

        $table->string('groom_name');
        $table->string('bride_name');
        $table->string('slug')->unique();

        $table->string('groom_photo')->nullable();
        $table->string('bride_photo')->nullable();
        $table->string('cover_photo')->nullable();

        $table->dateTime('akad_date')->nullable();
        $table->string('akad_location')->nullable();
        $table->text('akad_address')->nullable();

        $table->dateTime('reception_date')->nullable();
        $table->string('reception_location')->nullable();
        $table->text('reception_address')->nullable();

        $table->text('google_maps_url')->nullable();
        $table->text('story')->nullable();
        $table->boolean('is_published')->default(false);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};

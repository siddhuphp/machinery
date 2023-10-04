<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_page', function (Blueprint $table) {
            $table->id();
            $table->text('about')->nullable(true);
            $table->text('mission')->nullable(true);
            $table->text('vision')->nullable(true);
            $table->timestamps();
        });


        // Insert a default record
        DB::table('about_page')->insert([
            'about' => 'Please Add your about description here',
            'mission' => 'Please Add your mission description here',
            'vision' => 'Please Add your vision description here',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page');
    }
};

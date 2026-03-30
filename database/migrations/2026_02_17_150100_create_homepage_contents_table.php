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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('topbar_text');
            $table->string('brand_name');
            $table->string('brand_sub');
            $table->string('phone_number');
            $table->string('quote_email');
            $table->string('hero_badge');
            $table->string('hero_title');
            $table->text('hero_description');
            $table->text('hero_image_url');
            $table->text('destination_intro');
            $table->json('destination_cards');
            $table->json('safari_cards');
            $table->string('contact_title');
            $table->text('contact_text');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};


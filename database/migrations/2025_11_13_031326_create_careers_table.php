// database/migrations/2025_11_13_000000_create_careers_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location')->nullable();
            $table->string('type')->nullable(); // Full-time, Contract, etc.
            $table->text('description')->nullable();
            $table->json('requirements')->nullable(); // array
            $table->string('image')->nullable(); // path relative ke storage/app/public
            $table->timestamp('published_at')->nullable();
            // SEO optional
            // $table->string('meta_title')->nullable();
            // $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('careers');
    }
};

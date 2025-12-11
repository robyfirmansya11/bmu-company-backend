<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
    Schema::table('news', function (Blueprint $table) {
        $table->string('slug')->nullable()->after('title'); // sementara NULL
    });

    // isi slug otomatis untuk data existing
    $news = \App\Models\News::all();
    foreach ($news as $item) {
        $item->slug = \Str::slug($item->title);
        $item->save();
    }

    Schema::table('news', function (Blueprint $table) {
        $table->string('slug')->nullable(false)->change(); // jadikan NOT NULL
        $table->unique('slug'); // unique constraint
    });
}

public function down(): void
{
    Schema::table('news', function (Blueprint $table) {
        $table->dropUnique(['slug']);
        $table->dropColumn('slug');
    });
}
};
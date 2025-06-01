<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('doctors', function (Blueprint $table) {
        $table->string('phone', 15)->nullable()->after('specialization');
    });
    
    // Kemudian update untuk mengisi nilai yang kosong
    DB::table('doctors')->whereNull('phone')->update(['phone' => '']);
    
    // Terakhir buat tidak nullable
    Schema::table('doctors', function (Blueprint $table) {
        $table->string('phone', 15)->nullable(false)->change();
    });
}

public function down()
{
    Schema::table('doctors', function (Blueprint $table) {
        $table->dropColumn('phone');
    });
}
};

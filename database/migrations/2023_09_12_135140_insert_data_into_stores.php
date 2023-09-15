<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table = 'stores';

        $data = [
            ['name' => 'Kentucky', 'short_name' => 'KFC'],
            ['name' => 'Macdonal', 'short_name' => 'MCD'],
        ];

        DB::table($table)->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

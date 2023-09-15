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
        $table = 'groups';

        $data = [
            ['name' => 'group1',],
            ['name' => 'group2',],
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
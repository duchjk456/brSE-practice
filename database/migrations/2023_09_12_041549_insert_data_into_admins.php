<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table = 'admins';

        $data = [
            ['name' => 'admin1', 'email' => 'admin1@gmail.com', 'password' => Hash::make('123456'), 'group_id' => 1],
            ['name' => 'admin2', 'emai' => 'admin2@gmail.com', 'password' => Hash::make('123456'), 'group_id' => 2],
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

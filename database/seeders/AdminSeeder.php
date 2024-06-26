<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'username' => 'admin',
            'password' => Hash::make('root'),
            'nama_admin' => 'yanto',
            'jenis_kelamin' => 'L'
        ];
        DB::table('admin')->insert($data);
    }
}

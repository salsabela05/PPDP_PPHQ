<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama'=>'sekretaris',
            'email'=>'sekretaris@gmail.com',
            'password'=>bcrypt(123),
            'level'=>'sekretaris'
        ]);
        User::create([
            'nama'=>'ketua',
            'email'=>'ketua@gmail.com',
            'password'=>bcrypt(123),
            'level'=>'ketua'
        ]);
        User::create([
            'nama'=>'panitia',
            'email'=>'panitia@gmail.com',
            'password'=>bcrypt(123),
            'level'=>'panitia'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssdtUsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('assdt_users')->insert([
            [
                'full_name' => 'Jessy',
                'email_id' => 'jessy@test.com',
                'mobile_number' => '9026176583',
                'password' => md5('jessy123'),
                'created_on' => now(),
                'last_login_ip' => '127.0.0.1',
                'is_active' => 'ACTIVE',
            ],
            [
                'full_name' => 'jai',
                'email_id' => 'jai@test.com',
                'mobile_number' => '9876543211',
                'password' => md5('jai12345'),
                'created_on' => now(),
                'last_login_ip' => '127.0.0.1',
                'is_active' => 'ACTIVE',
            ],
            [
                'full_name' => 'Rahul Sharma',
                'email_id' => 'rahul@test.com',
                'mobile_number' => '9876543212',
                'password' => md5('rahul123'),
                'created_on' => now(),
                'last_login_ip' => '127.0.0.1',
                'is_active' => 'ACTIVE',
            ],
            [
                'full_name' => 'vivek Rao',
                'email_id' => 'vivek@test.com',
                'mobile_number' => '9876543213',
                'password' => md5('vivek123'),
                'created_on' => now(),
                'last_login_ip' => '127.0.0.1',
                'is_active' => 'BLOCKED',
            ],
            [
                'full_name' => 'vijay',
                'email_id' => 'vijay@test.com',
                'mobile_number' => '9876543214',
                'password' => md5('vijay123'),
                'created_on' => now(),
                'last_login_ip' => '127.0.0.1',
                'is_active' => 'ACTIVE',
            ],
        ]);
    }
}
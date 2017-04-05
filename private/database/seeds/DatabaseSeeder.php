<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        DB::connection('mysql')->table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'name' => 'Admin',
            'email' => 'priya.nugraha91@gmail.com',
            'level' => 1
        ]);

        Model::reguard();
    }

}

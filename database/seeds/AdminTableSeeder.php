<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('tbl_admin')->insert([
            'admin_name' => 'Fazle Rabbi Ador',
            'email_address' => 'aujisti.ador@gmail.com',
            'admin_password' => md5('123456'),
            'mobile_Number' => '01521101414',
            'access_level' => '1',
        ]);
    }

}

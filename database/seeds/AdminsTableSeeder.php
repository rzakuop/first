<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'email' => 'info@example.com',
                'password' => bcrypt('admin'),
            ],
        ];

        foreach ($users as $u) {
            $admin = Admin::where('email', '=', $u['email'])->first();
            if (!$admin) {
                $admin = new Admin();
            }

            foreach ($u as $k => $v) {
                $admin->$k = $v;
            }
            $admin->save();
        }
    }
}

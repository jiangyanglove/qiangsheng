<?php

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staffs = [
            [
                'itcode' => 'lenovoculture1',
                'password' => 'lenovoculture365',
                'name' => '岳彦召',
                'position' => 'CTO',
                'country' => '中国',
                'city' => '北京',
                'nickname' => '大岳',
                'last_login_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'itcode' => 'lenovoculture2',
                'password' => 'lenovoculture365',
                'name' => '高赟鹏',
                'position' => 'CMO',
                'country' => '中国',
                'city' => '北京',
                'nickname' => '鹏鹏',
                'last_login_at' => date('Y-m-d H:i:s', time())
            ]
        ];

        foreach ($staffs as $key => $value) {
            Staff::create($value);
        }
    }
}

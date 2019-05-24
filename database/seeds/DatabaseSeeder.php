<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(NewsTableSeeder::class);//运用News的填充文件
        $this->call(ManagersTableSeeder::class);//运用User的填充文件
    }
}

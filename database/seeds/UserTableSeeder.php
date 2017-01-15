<?php
use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{

    public function run()
    {
        factory(User::class, 100)->create();
    }
}

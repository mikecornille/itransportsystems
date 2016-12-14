<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LocationSeeder::class);
    }

    // public function run()
    // {
    //     DB::table('users')->insert([
    //         'name' => 'Mike Cornille',
    //         'email' => 'mikecornille@gmail.com',
    //         'cell' => 6307501718,
    //         'password' => 'password',
    //     ]);
    // }
}

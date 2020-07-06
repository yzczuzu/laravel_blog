<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users=array(
            array(
                'name'=>'Zili',
                'email'=>'zili@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            ),
            array(
                'name'=>'Zhicheng',
                'email'=>'zhicheng@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            ),
            array(
                'name'=>'Jhon',
                'email'=>'jhon@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            ),
            array(
                'name'=>'Jack',
                'email'=>'jack@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            ),
            array(
                'name'=>'Bert',
                'email'=>'bert@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            ),
            array(
                'name'=>'Yifan',
                'email'=>'yifan@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            ),
            array(
                'name'=>'Yifei',
                'email'=>'yifei@gmail.com',
                'password'=>Hash::make('badwingnog4a')

            )

        );
        DB::table('users')->insert($users);
    }
}

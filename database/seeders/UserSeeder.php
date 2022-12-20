<?php

namespace Database\Seeders;

use App\Models\Sections;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            ['name'  => 'Admin','email' => 'admin@admin.com','password' =>bcrypt('123456789')],
            ['name'  => 'Editor','email' => 'editor@editor.com','password' =>bcrypt('123456789')],
            ['name'  => 'Author','email' => 'author@author.com','password' =>bcrypt('123456789')],
        ];

        User::insert($admin);
        Sections::insert([
           [ 'section_name'=>"البنك الاهلي",
            'description'=>'ملاحظات البنك الاهلي',
            'created_by'=>'Admin'],
            [ 'section_name'=>"بنك مصر",
                'description'=>'ملاحظات البنك الثاني',
                'created_by'=>'Admin'],
            [ 'section_name'=>"البنك الاماراتي",
                'description'=>'ملاحظات البنك الاماراتي',
                'created_by'=>'Admin'],
        ]);
    }
}

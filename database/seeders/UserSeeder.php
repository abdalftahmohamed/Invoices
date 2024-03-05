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
            ['name'  => 'Editor','email' => 'editor@editor.com','Status' => 'مفعل','password' =>bcrypt('123456789'),'roles_name' => "owner"],
            ['name'  => 'Author','email' => 'author@author.com','Status' => 'مفعل','password' =>bcrypt('123456789'),'roles_name' => "owner"],
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

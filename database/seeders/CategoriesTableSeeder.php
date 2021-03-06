<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Мобильные телефоны', 'code' => 'mobiles', 'description' => 'Описание мобильных телефонов', 'image' => 'categories/mobiles.png'],
            ['name' => 'Портативная техника', 'code' => 'portable', 'description' => 'Описание портативной техники', 'image' => 'categories/portable.png'],
            ['name' => 'Бытовая техника', 'code' => 'appliances', 'description' => 'Описание бытовой техники', 'image' => 'categories/appliances.png']
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();
        \App\Categories::insert([
            [
                'name' => 'DashBoard',
                'parentID' => 0,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Product',
                'parentID' => 0,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name' => 'Product1',
                'parentID' => 2,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 2,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]
        ]);
    }
}

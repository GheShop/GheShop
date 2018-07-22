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
        \App\Models\Categories::insert([
            [
                'name' => 'Members',
                'parentID' => 0,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 1,
                'hasSub'=>false,
                'path'=>'members',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Product',
                'parentID' => 0,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 1,
                'hasSub'=>true,
                'path'=>'product',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name' => 'Product1',
                'parentID' => 2,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 2,
                'hasSub'=>false,
                'path'=>'product/product1',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name' => 'Product2',
                'parentID' => 2,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 2,
                'hasSub'=>false,
                'path'=>'product/product2',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name' => 'Product3',
                'parentID' => 2,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 2,
                'hasSub'=>false,
                'path'=>'product/product3',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
            [
                'name' => 'Coupon',
                'parentID' => 0,
                'class_bst_icon' => 'glyphicon glyphicon-apple',
                'level' => 1,
                'hasSub'=>false,
                'path'=>'coupon',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ],
        ]);
    }
}

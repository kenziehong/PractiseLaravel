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
        $this->call('ProductTableSeeder');
    }
}

class ProductTableSeeder extends Seeder
{
        public function run()
    {
        DB::table('product')->insert([

        	array('name'=>'Quan Da Banh','price'=>50000,'cate_id'=>1),
        	array('name'=>'Quan Bau Duc','price'=>55000,'cate_id'=>1),
        	array('name'=>'Quan Boi Loi','price'=>54000,'cate_id'=>1),
        ]);
    }
}

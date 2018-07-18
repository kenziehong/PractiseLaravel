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
        $this->call('Product2Seeder');
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

class Product1Seeder extends Seeder{
	public function run(){
		DB::table('product1')->insert([
			['name'=>'The Gioi','cate_id'=>'1'],
			['name'=>'Am Nhac','cate_id'=>'1'],
			['name'=>'The Thao','cate_id'=>'1'],
		]);
	}
}

class Product2Seeder extends Seeder{
	public function run(){
		DB::table('product2')->insert([
			['intro'=>'Web'],
			['intro'=>'MobileAdroid'],
			['intro'=>'MobileIos'],
			
		]);
	}
}

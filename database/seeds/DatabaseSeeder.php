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
        $this->call('KPTKhoaPhamTableSeeder');
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

class ImagesSeeder extends Seeder{
	public function run(){
		DB::table('images')->insert([
			['name'=>'hinh_quantennis_1.png','cate_id'=>1],
			['name'=>'hinh_quantennis_2.png','cate_id'=>1],
			['name'=>'hinh_quantennis_3.png','cate_id'=>1],
			['name'=>'hinh_quantennis_4.png','cate_id'=>1],
			['name'=>'hinh_quantennis_5.png','cate_id'=>2],
			['name'=>'hinh_quantennis_6.png','cate_id'=>2],
			
		]);
	}
}


class CarTableSeeder extends Seeder{
	public function run(){
		DB::table('cars')->insert([
			['name'=>'BMW','price'=>500000],
			['name'=>'Audi','price'=>510000],
			['name'=>'Honda','price'=>520000],
			['name'=>'Suzuki','price'=>530000],
			['name'=>'Porsche','price'=>540000],
			['name'=>'Huyndai','price'=>550000],
			['name'=>'BMW','price'=>560000]		
			
		]);
	}
}

class ColorTableSeeder extends Seeder{
	public function run(){
		DB::table('colors')->insert([
			['name'=>'red'],
			['name'=>'blue'],
			['name'=>'black'],
			['name'=>'white']
			
		]);
	}
}

Class CarColorTableSeeder extends Seeder{
	public function run(){
		DB::table('car_colors')->insert([
			['car_id'=>1,'color_id'=>1],
			['car_id'=>2,'color_id'=>1],
			['car_id'=>3,'color_id'=>2],
			['car_id'=>3,'color_id'=>3],
			['car_id'=>3,'color_id'=>4],
			['car_id'=>4,'color_id'=>4],
			['car_id'=>4,'color_id'=>3],
			['car_id'=>5,'color_id'=>4],
					
		]);
	}
}

Class KPTKhoaPhamTableSeeder extends Seeder{
	public function run(){
		DB::table('kpt_khoaphams')->insert([
			['monhoc'=>'Lap trinh PHP','giatien'=>20000,'giangvien'=>'Mr Tuan'],
			['monhoc'=>'Lap trinh JAVA','giatien'=>21000,'giangvien'=>'Ms Ngoc'],
			['monhoc'=>'Lap trinh RUBY','giatien'=>22000,'giangvien'=>'Mr Tuan'],
			['monhoc'=>'Lap trinh PYTHON','giatien'=>23000,'giangvien'=>'Ms Ngoc'],
			
					
		]);
	}
}
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('LinkTableSeeder');
	}
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('id'=> 1, 'email' => 'radek@rkarkut.pl', 'password' => '$2y$10$fxICI0pnkF7jFjorJXboz.pIE2ig6Jvpwq5o4ywd5GJ5tZM5xQ4va', 'confirmed'=>'1'));
    }
}

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array('id'=>'1', 'user_id' => 1, 'name' => 'Programowanie'));
        Category::create(array('id'=>'2', 'user_id' => 1, 'name' => 'Webdevelopment'));
        Category::create(array('id'=>'3', 'user_id' => 1, 'name' => 'Ważne'));
        Category::create(array('id'=>'4', 'user_id' => 1, 'name' => 'PHP'));
        Category::create(array('id'=>'5', 'user_id' => 1, 'name' => 'Laravel'));
        Category::create(array('id'=>'6', 'user_id' => 1, 'name' => 'Fotografia'));
    }
}

class LinkTableSeeder extends Seeder {

    public function run()
    {
        DB::table('links')->delete();

        Link::create(array('id' => '1', 'user_id' => '1', 'category_id' => 1, 'title' => 'Laravel', 'url' => 'http://laravel.com/'));        
    }
}

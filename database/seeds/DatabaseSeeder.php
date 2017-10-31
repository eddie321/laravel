<?php

use Illuminate\Database\Seeder;
use \App\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Movie::create (
            [
                'title' => 'Titanic',
                'year' => 1997,
                'plot' => 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.'
            ]);
        // *note* to run this command type 'php artisan db:seed' into terminal
        // *note* must use namespace for Movie class in order to create object
    }
    
}

<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        
        return [
            
            'name' => $faker->word,
            'price' => random_int ( 0 , 5000 ),
            'pic_url' => 'http://lorempixel.com/400/200',
            'producer_id' => 1,
            'description' => $faker->realText(),
             
        ];
    }
}

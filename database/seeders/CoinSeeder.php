<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coin;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;

class CoinSeeder extends Seeder
{

     /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all()->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Coin::create([
                'user_id' => $users[$i],
                'coins' => $this->faker->numberBetween(0,10000),
            ]);
        }
    }
}

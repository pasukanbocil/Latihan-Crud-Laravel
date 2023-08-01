<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $faker = faker::create();
            return [
                'name' => $faker->name(),
                'gender' => Arr::random(['L', 'P']),
                'nis' => mt_rand(00000001, 99999999),
                'class_id' => Arr::random([1, 2, 3, 4]),
            ];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
    }
}


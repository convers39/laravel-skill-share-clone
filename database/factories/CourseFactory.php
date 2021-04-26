<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pic_num = rand(1, 100);
        return [
            'title' => $this->faker->sentence(10),
            // 'user_id' => 2,
            'desc' => $this->faker->sentence(50),
            'cover_img' => "https://picsum.photos/id/{$pic_num}/300/300",
        ];
    }
}

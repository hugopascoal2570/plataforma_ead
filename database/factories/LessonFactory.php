<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{

    protected $model = Lesson::class;

    public function definition()
    {
        $name = $this->faker->unique()->name();

        return [
            'module_id' => Module::factory(),
            'name' => $name,
            'url' => Str::slug($name),
            'video' => Str::random()
        ];
    }
}

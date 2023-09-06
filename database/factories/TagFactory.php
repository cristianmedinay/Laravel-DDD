<?php

namespace Database\Factories;

use Domain\Blog\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;
    public function definition(): array
    {
        return [
            'name'=>$this->faker->unique()->word(),
        ];
    }
}

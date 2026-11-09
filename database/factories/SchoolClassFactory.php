<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    protected $model = SchoolClass::class;

    public function definition(): array
    {
        $schoolClasses = ['XII TKJ 1', 'XII AKL 1', 'XII BID 1', 'XII TKJ 2', 'XII AKL 2', 'XII BID 2'];

        return [
            'name' => fake()->unique()->randomElement($schoolClasses),
        ];
    }
}
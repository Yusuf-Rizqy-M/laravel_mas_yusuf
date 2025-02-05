<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->randomElement(['10 PPLG 1','10 PPLG 2', '11 PPLG 1','11 PPLG 2'])
        ];
    }

    public function relation(){
        $query = "select grade.id, grade.name as grade_name, department.name as department_name from grade join department on grade.department_id = department.id";
        return $query;
    }
}

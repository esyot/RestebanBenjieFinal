<?php

// database/factories/StudentFactory.php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_name' => $this->faker->firstName,
            'DOB' => $this->faker->date('Y-m-d', '2005-12-31'),
            'address' => $this->faker->address,
        ];
    }
}

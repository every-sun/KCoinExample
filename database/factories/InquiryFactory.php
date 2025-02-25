<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; 
use App\Models\Inquiry;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Inquiry::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' =>$this->faker->paragraph,
            'status' => 'W',
            'answer' => null,
            'answered_at' => null,
            'user_id' =>User::factory(),  
        ];
    }
}

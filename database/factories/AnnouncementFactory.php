<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; 
use App\Models\Announcement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Announcement::class;
    
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence,
            'content'=>$this->faker->paragraph,
            'user_id' =>User::factory(),  
        ];
    }
}

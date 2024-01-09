<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $uuid = Str::uuid()->toString();
        $title = $this->faker->text(40);
        $text = $this->faker->paragraph();

    
        return [
         
            'uuid' => $uuid,
            'user_id' => User::factory(), // Assuming you have a User model and a UserFactory
            'title' => $title,
            'text' => $text,
              
            
        ];
    }
}

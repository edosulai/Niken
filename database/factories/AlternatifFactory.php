<?php

namespace Database\Factories;

use App\Models\Stok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alternatif>
 */
class AlternatifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'stok_id' => $this->withFaker()->randomElements(Stok::all()->map(fn ($model) => $model->id))[0],
            'k_value' => json_encode([1,2,3,4,5]),
        ];
    }
}

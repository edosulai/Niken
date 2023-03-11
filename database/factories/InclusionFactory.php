<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Inclusion;
use App\Models\Stok;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inclusion>
 */
class InclusionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'stok_data' => $this->faker->randomElements(
                Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->get()
                    ->toArray()
            )[0],
            'jumlah' => $this->faker->numberBetween(1, 30)
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Inclusion $inclusion) {
            $stok = Stok::find($inclusion->stok_data['id']);
            $stok->stok = $stok->stok - $inclusion->jumlah;
            $stok->save();
        });
    }
}

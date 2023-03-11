<?php

namespace Database\Factories;

use App\Models\Expending;
use App\Models\Status;
use App\Models\Stok;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expending>
 */
class ExpendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->withFaker()->randomElements(User::whereHas('roles', fn ($q) => $q->where ('name', 'pemasok'))->get()->map(fn ($model) => $model->id))[0],
            'stok_data'=> $this->faker->randomElements(
                Stok::selectRaw('stoks.*, stok_images.image as image')
                    ->join('stok_images', 'stok_images.id', '=', DB::raw("(select id from `stok_images` where `stok_id` = `stoks`.`id` order by created_at limit 1)"))
                    ->get()
                    ->toArray()
            )[0],
            'status_id' => $this->withFaker()->randomElements(Status::all()->map(fn ($model) => $model->id))[0],
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
        return $this->afterCreating(function (Expending $inclusion) {
            $stok = Stok::find($inclusion->stok_data['id']);
            $stok->stok = $stok->stok + $inclusion->jumlah;
            $stok->save();
        });
    }
}

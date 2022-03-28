<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Multitenancy\Models\Tenant;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = $this->faker->unique()->company;

        return [
            'name' => $company,
            'domain' => $this->faker->unique()->domainName,
            'database' => Str::slug($company),
            'active' => $this->faker->randomElement([true, false]),
        ];
    }
}

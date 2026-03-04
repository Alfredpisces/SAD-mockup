<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class SyntheticTransactionFactory extends Factory {
    public function definition(): array {
        return [
            'archetype' => 'General',
            'sender_name' => fake()->name(),
            'receiver_name' => fake()->name(),
            'amount' => fake()->randomFloat(2, 500, 5000),
            'type' => 'Transfer',
            'is_fraud' => false,
            'transaction_at' => now(),
        ];
    }

    public function farmer() {
        return $this->state(fn () => [
            'archetype' => 'Farmer',
            'amount' => fake()->randomFloat(2, 25000, 150000),
            'type' => 'Cash-in',
        ]);
    }

    public function mule() {
        return $this->state(fn () => [
            'archetype' => 'Mule',
            'amount' => fake()->randomFloat(2, 800, 1500),
            'is_fraud' => true,
            'fraud_pattern' => 'Muling',
        ]);
    }
}

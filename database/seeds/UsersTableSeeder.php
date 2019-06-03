<?php

use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(User::class)->state('admin')->create([
            'email' => 'admin@example.com',
        ]);

        factory(User::class)->create([
            'email' => 'user@example.com',
        ]);
    }
}

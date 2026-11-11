<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class ProductionAdminSeeder extends Seeder
{
    public function run(): void
    {
        $name = 'Jay Louise Cedino';
        $email = 'cedinojay@gmail.com';
        $password = env('HERMIS_ADMIN_PASSWORD');

        if (!is_string($password) || strlen($password) < 12) {
            throw new RuntimeException(
                'Please configure HERMIS_ADMIN_PASSWORD in production environment variables.'
            );
        }

        $user = User::firstOrNew([
            'email' => $email,
        ]);

        $user->forceFill([
            'name' => $name,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ])->save();

        $this->command?->info(
            'HERMIS administrator account is ready.'
        );
    }
}
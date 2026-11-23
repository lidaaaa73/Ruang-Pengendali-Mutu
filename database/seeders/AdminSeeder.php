<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::where('slug', 'admin')->firstOrFail();

        User::updateOrCreate(
            ['email' => 'pengendalimutu.bapelkes@gmail.com'],
            [
                'name' => 'Admin Pengendalian Mutu',
                'password' => Hash::make('Dalmut2025'),
                'role_id' => $role->id,
                'department' => 'Pengendalian Mutu',
                'account_status' => 'approved',
            ]
        );
    }
}

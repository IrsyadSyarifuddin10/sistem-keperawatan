<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['BK', 'PK'];
        $units = ['UGD', 'RAWAT INAP', 'RAWAT JALAN', 'PERINATOLOGI', 'OK', 'ICU'];

        $users = [];

        foreach ($status as $statuss) {
            // Jika role adalah "PK", maka gabungkan dengan unit
            if ($statuss === 'PK') {
                $iter = 0;
                foreach ($units as $unit) {
                    $iter += 1;
                    $username = strtolower($statuss . '-' . str_replace(' ', '-', $unit));
                    $users[] = [
                        'nip' => $iter,
                        'name' => strtoupper($statuss) . ' - ' . $unit, // Nama lebih manusiawi
                        'email' => $username . '@sikep.com',
                        'password' => Hash::make('123'),
                        'status' => strtolower($statuss),
                        'unit' => $unit,
                        'role' => strtolower($statuss) . '-' . strtolower(str_replace(' ', '-', $unit)),
                        'created_at' => now(),
                    ];
                }
            } elseif ($statuss === 'BK') {
                // Untuk "BK" yang tidak memiliki unit
                $username = strtolower($statuss);
                $users[] = [
                    'nip' => '000',
                    'name' => strtoupper($statuss),
                    'email' => $username . '@sikep.com',
                    'password' => Hash::make('123'),
                    'status' => strtolower($statuss),
                    'unit' => 'bk', // Selalu diisi 'bk' untuk role BK
                    'role' => 'bk',
                    'created_at' => now(),
                ];
            }
        }

        DB::table('users')->insert($users);
        DB::table('users')->insert([
            'nip' => '666',
            'name' => 'admin',
            'email' => 'admin@sikep.com',
            'password' => Hash::make('123'),
            'status' => 'admin',
            'unit' => 'admin',
            'role' => 'admin',
            'created_at' => now(),
        ]);
    }
}
<?php

namespace Database\Seeders;

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
        $users = [
            ['nip' => '155820220013', 'nama_petugas' => 'Norani, Amd.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155871120014', 'nama_petugas' => 'Desi Purwandani, Amd.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155921720027', 'nama_petugas' => 'Lilik Krisnawati, Amd.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155941820073', 'nama_petugas' => 'Lismawati, Amd.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155921820123', 'nama_petugas' => 'Fitria Islamiati A.Md.,Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155952420338', 'nama_petugas' => 'Wiwien Istindary, A.Md.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155932420341', 'nama_petugas' => 'Erni Ramadhani, A.Md.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155972120206', 'nama_petugas' => 'Rani Eliza Oktafia RY, Amd.Keb', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155982220245', 'nama_petugas' => 'Meilinda Dhea Ayuningtias, Amd,Keb.', 'unit' => 'VK', 'status' => 'BK'],
            ['nip' => '155941810036', 'nama_petugas' => 'Muhamad Nurdin, Amd.Kep', 'unit' => 'OK', 'status' => 'PK'],
            ['nip' => '155721510031', 'nama_petugas' => 'Supriyadi, Amd.Kep', 'unit' => 'OK', 'status' => 'PK'],
            ['nip' => '155982210271', 'nama_petugas' => 'David Maldini, Amd.Kep', 'unit' => 'OK', 'status' => 'PK'],
            ['nip' => '155912220247', 'nama_petugas' => 'GUSTI AYU NYOMAN, Amd.Keb', 'unit' => 'OK', 'status' => 'PK'],
            ['nip' => '155800520030', 'nama_petugas' => 'Sri Wahyuni, Amd.Kep', 'unit' => 'OK', 'status' => 'PK'],
            ['nip' => '155992420345', 'nama_petugas' => 'Dwi Lestari, S.Keb', 'unit' => 'OK', 'status' => 'PRA PK'],
            ['nip' => '155971920125', 'nama_petugas' => 'Eva Agustina A.Md.,Kep', 'unit' => 'ICU', 'status' => 'PK'],
            ['nip' => '155862020193', 'nama_petugas' => 'Meti Redita Destalata A.Md.,Kep', 'unit' => 'ICU', 'status' => 'PK'],
            ['nip' => '155992120236', 'nama_petugas' => 'Firdha Khusnul Khatimah, Amd.Keb', 'unit' => 'ICU', 'status' => 'PK'],
            ['nip' => '155002320311', 'nama_petugas' => 'Ns. Dewi Milenia, S.Kep', 'unit' => 'ICU', 'status' => 'PK'],
            ['nip' => '155801820120', 'nama_petugas' => 'Desi Setya Rini A.Md.,Kep', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '000000000001', 'nama_petugas' => 'Bdn.Rizka Rachman.S.Keb', 'unit' => 'UGD', 'status' => 'PRA PK'],
            ['nip' => '155972020167', 'nama_petugas' => 'Zun Nuraini A.Md.,Kep', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '155962120218', 'nama_petugas' => 'Yohana Yulianti, Amd.Keb', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '155972120225', 'nama_petugas' => 'Bunga Nita', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '155982120226', 'nama_petugas' => 'Dewi Ratna Sari', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '155002220248', 'nama_petugas' => 'Wafiq Azizah, Amd,Keb', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '155942420314', 'nama_petugas' => 'Kartika Sari, A.Md.Keb', 'unit' => 'UGD', 'status' => 'PK'],
            ['nip' => '155022420329', 'nama_petugas' => 'Ardianti Fauziah, A.Md.Keb', 'unit' => 'UGD', 'status' => 'PRA PK'],
            ['nip' => '155951720025', 'nama_petugas' => 'Apriliyana Fransiska Dewi, Amd.Keb', 'unit' => 'RAWAT JALAN', 'status' => 'PK'],
            ['nip' => '155941720029', 'nama_petugas' => 'Suci Indah Anggraini Pane, Amd.Keb', 'unit' => 'RAWAT JALAN', 'status' => 'PK'],
            ['nip' => '155941720032', 'nama_petugas' => 'Desi Masnia, Amd.Kep', 'unit' => 'RAWAT JALAN', 'status' => 'PK'],
            ['nip' => '155002420340', 'nama_petugas' => 'Anisa Putri, A.Md.Keb', 'unit' => 'RAWAT JALAN', 'status' => 'PRA PK'],
            ['nip' => '155962420347', 'nama_petugas' => 'Elyza Oviyanda, A.Md.Keb', 'unit' => 'RAWAT JALAN', 'status' => 'PRA PK'],
            ['nip' => '155022420330', 'nama_petugas' => 'Mellyana Wati, A.Md.Kep', 'unit' => 'RAWAT JALAN', 'status' => 'PRA PK'],
            ['nip' => '155961920141', 'nama_petugas' => 'Melly Wulandari A.Md.,Keb', 'unit' => 'RAWAT JALAN', 'status' => 'PK'],
            ['nip' => '000000000002', 'nama_petugas' => 'Ns.Rizkiyani.,S.Kep', 'unit' => 'RAWAT INAP', 'status' => 'PRA PK'],
            ['nip' => '155022520351', 'nama_petugas' => 'Destri Puspita Sari, A.Md.Kep', 'unit' => 'RAWAT INAP', 'status' => 'PRA PK'],
            ['nip' => '155932420342', 'nama_petugas' => 'Yuyun Cahyani, A.Md.Keb', 'unit' => 'RAWAT INAP', 'status' => 'PRA PK'],
            ['nip' => '155032420344', 'nama_petugas' => 'Amelia, A.Md.Kep', 'unit' => 'RAWAT INAP', 'status' => 'PRA PK'],
            ['nip' => '155972420337', 'nama_petugas' => 'Ratna Rosita, A.Md.Keb', 'unit' => 'RAWAT INAP', 'status' => 'PRA PK'],
            ['nip' => '155992420324', 'nama_petugas' => 'Niken Safitri, A.Md.Keb', 'unit' => 'RAWAT INAP', 'status' => 'PRA PK'],
            ['nip' => '155002320283', 'nama_petugas' => 'Ambar Kurnia Ramadhani, A.Md.,Kep', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155992220250', 'nama_petugas' => 'Nur Fadilla, Amd.Kep', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155002220253', 'nama_petugas' => 'Melinia Eka Widiati, Amd,Kep', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155982020204', 'nama_petugas' => 'Agustina Lutfi Shzara S.Tr.,Keb', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155972120205', 'nama_petugas' => 'Ns. Alivia Ayu Kurniawati, S.Kep', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155931720028', 'nama_petugas' => 'Weni Ramadhani, Amd.Keb', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155921720026', 'nama_petugas' => 'Dwi Ambarwati, Amd.Keb', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155941620021', 'nama_petugas' => 'Rina Anggraini, Amd.Keb', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155951820101', 'nama_petugas' => 'Luluk Khairunisa A.Md.,Keb', 'unit' => 'RAWAT INAP', 'status' => 'PK'],
            ['nip' => '155892020190', 'nama_petugas' => 'Martini A.Md.,Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PK'],
            ['nip' => '155002120219', 'nama_petugas' => 'Tina Anjelita, Amd.Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PK'],
            ['nip' => '155992120242', 'nama_petugas' => 'Tasya Berliana, Amd.Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PK'],
            ['nip' => '155002220263', 'nama_petugas' => 'Zaqia Khoirunisa, A.Md Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PK'],
            ['nip' => '155012220264', 'nama_petugas' => 'Adevia, A.Md Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PK'],
            ['nip' => '155992220279', 'nama_petugas' => 'Prima Dinar Ainur Rofiq, S.Tr.Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PK'],
            ['nip' => '155992420320', 'nama_petugas' => 'Santika Widia Wati, A.Md.Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PRA PK'],
            ['nip' => '155032420348', 'nama_petugas' => 'Yola Agnesia, A.Md.Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PRA PK'],
            ['nip' => '155022520350', 'nama_petugas' => 'Cindy Claudia Meta, A.Md.Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PRA PK'],
            ['nip' => '000000000003', 'nama_petugas' => 'Faridatul Janah, AMd. Kep', 'unit' => 'PERINATOLOGI', 'status' => 'PRA PK'],
        ];

        // Tambahkan akun admin secara manual
        DB::table('users')->insert([
            'nip' => '666',
            'nama_petugas' => 'Admin',
            'unit' => 'admin',
            'status' => 'admin',
            'role' => 'admin',
            'email' => 'admin@sikep.com',
            'password' => Hash::make('666'), // Password default untuk admin
            'created_at' => now(),
        ]);

        foreach ($users as &$user) {
            // Pastikan unit dan status disimpan dalam lowercase
            $user['unit'] = strtolower($user['unit']);
            $user['status'] = strtolower($user['status']);

            // Atur role berdasarkan kondisi
            if ($user['status'] === 'bk') {
                $user['role'] = $user['status'];
            } elseif ($user['status'] === 'verifikator') {
                $user['role'] = $user['status'];
            } elseif ($user['status'] === 'pra pk') {
                $user['role'] = str_replace(' ', '-', $user['status']) . '-' . str_replace(' ', '-', $user['unit']);
            } else {
                $user['role'] = $user['status'] . '-' . str_replace(' ', '-', $user['unit']);
            }

            // Pastikan role juga dalam lowercase
            $user['role'] = strtolower($user['role']);

            // Buat email dan password
            $user['email'] = strtolower(str_replace([' ', ','], ['.', ''], explode(',', $user['nama_petugas'])[0])) . '@sikep.com';
            $user['password'] = Hash::make('123');
            $user['created_at'] = now();
        }

        DB::table('users')->insert($users);
    }
}

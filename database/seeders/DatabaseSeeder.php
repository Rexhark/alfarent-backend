<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Alfarentcar',
            'email' => 'alfarentcar@gmail.com',
            'password' => bcrypt('admin12345'),
        ]);

        DB::table('mobil')->insert([
            [
                'nama' => 'All New Avanza',
                'harga' => 350000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 7,
                'transmisi' => 'AT/MT',
                'bahan_bakar' => 'Bensin',
                'tahun' => '2020',
                'deskripsi' => 'Mobil keluarga dengan kenyamanan tinggi, cocok untuk perjalanan jauh maupun dalam kota.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Brio',
                'harga' => 300000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 5,
                'transmisi' => 'AT/MT',
                'bahan_bakar' => 'Bensin',
                'tahun' => '2020',
                'deskripsi' => 'Kendaraan city car yang efisien dan ekonomis, ideal untuk penggunaan harian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Terios',
                'harga' => 350000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 7,
                'transmisi' => 'AT/MT',
                'bahan_bakar' => 'Bensin',
                'tahun' => '2020',
                'deskripsi' => 'SUV dengan ground clearance tinggi, cocok untuk perjalanan dalam dan luar kota.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Innova',
                'harga' => 500000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 8,
                'transmisi' => 'AT/MT',
                'bahan_bakar' => 'Bensin/Solar',
                'tahun' => '2020',
                'deskripsi' => 'MPV premium dengan ruang kabin luas, nyaman untuk perjalanan jauh bersama keluarga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Xpander',
                'harga' => 400000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 8,
                'transmisi' => 'AT/MT',
                'bahan_bakar' => 'Bensin',
                'tahun' => '2020',
                'deskripsi' => 'MPV modern dengan desain stylish, cocok untuk mobilitas perkotaan dan perjalanan keluarga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pajero',
                'harga' => 950000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 8,
                'transmisi' => 'AT/MT',
                'bahan_bakar' => 'Solar',
                'tahun' => '2020',
                'deskripsi' => 'SUV mewah dengan fitur off-road, ideal untuk perjalanan menantang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hiace',
                'harga' => 1500000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 15,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Solar',
                'tahun' => '2020',
                'deskripsi' => 'Van besar dengan kapasitas tinggi, cocok untuk rombongan dengan kenyamanan ekstra.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bus Pariwisata (Full AC)',
                'harga' => 1500000,
                'view' => 0,
                'image' => '',
                'kapasitas' => 35,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Solar',
                'tahun' => '2020',
                'deskripsi' => 'Bus dengan kapasitas besar dan AC penuh, ideal untuk perjalanan wisata dan rombongan besar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('kontak')->insert([
            [
                'key'
                => 'kantor-pusat',
                'value' => 'Antara Residence, Tamalanrea Indah, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan 90245',
                'type' => 'Text',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'jam-operasional',
                'value' => 'Setiap hari 24 jam',
                'type' => 'Text',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'telepon',
                'value' => 'tel:+6285343968624',
                'type' => 'Text',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'whatsapp',
                'value' => 'https://wa.me/+6285343968624',
                'type' => 'Link',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'email',
                'value' => '-',
                'type' => 'Link',
                'is_visible' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'facebook',
                'value' => '-',
                'type' => 'Link',
                'is_visible' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'instagram',
                'value' => 'https://instagram.com/alfarentcar',
                'type' => 'Link',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'map',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15895.182583263175!2d119.4759123!3d-5.1365796!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd56d5fbe8e5%3A0x2edecd946040a67f!2sRental%20Mobil%20Alfa%20Rent%20Car!5e0!3m2!1sen!2sid!4v1739463601721!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'type' => 'Map',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Laptop & PC'          => 'Laptop, mini PC, monitor, dan komponen untuk bekerja dan ngoding.',
            'Periferal'            => 'Keyboard, mouse, webcam, dan perangkat tambahan untuk meja kerja.',
            'Gadget & Audio'       => 'Tablet, ponsel, smartwatch, headphone, dan perlengkapan audio.',
            'Jaringan & Storage'   => 'Router, switch, penyimpanan, dan kabel jaringan.',
            'Aksesori Meja Kerja'  => 'Meja, kursi, lampu, dan penataan ruang kerja yang nyaman.',
            'Buku & Belajar'       => 'Buku pemrograman, catatan, dan alat bantu belajar.',
        ];

        foreach ($categories as $name => $description) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $description,
            ]);
        }
    }
}

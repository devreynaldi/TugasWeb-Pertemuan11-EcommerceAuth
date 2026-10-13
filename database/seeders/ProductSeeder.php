<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/** 54 produk (9 per kategori), harga dalam Rupiah, dimiliki bergantian oleh 2 editor. */
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            'Laptop & PC' => [
                ['Laptop Lenovo LOQ 15 Ryzen 5 RTX 3050', 14999000],
                ['Laptop ASUS Zenbook 14 OLED Core Ultra 5', 13499000],
                ['Laptop Acer Swift Go 14 Core i5 16/512 GB', 10499000],
                ['Mini PC Intel Core i5 16/512 GB', 8299000],
                ['Laptop HP 245 G10 Ryzen 5 8/512 GB', 7299000],
                ['Monitor Gaming MSI 24 Inci 165Hz', 2399000],
                ['Raspberry Pi 5 8 GB Starter Kit', 1899000],
                ['RAM Laptop DDR4 16 GB 3200 MHz', 549000],
                ['SSD NVMe M.2 512 GB Gen3', 599000],
            ],
            'Periferal' => [
                ['Keyboard Mekanikal 75% Hot-Swap Wireless', 749000],
                ['Mouse Ergonomis Vertikal Wireless', 289000],
                ['Mouse Logitech MX Anywhere 3S', 1199000],
                ['Webcam Logitech C270 HD', 349000],
                ['Docking Station USB-C 9-in-1', 649000],
                ['Hub USB 3.0 4 Port', 89000],
                ['Mousepad Desk Mat XL 90x40 cm', 129000],
                ['Keycap PBT Dye-Sub 130 Keys', 249000],
                ['Capture Card HDMI ke USB 3.0', 399000],
            ],
            'Gadget & Audio' => [
                ['Tablet Samsung Galaxy Tab S9 FE 128 GB', 5299000],
                ['Smartphone Poco X6 Pro 8/256 GB', 3999000],
                ['Smartwatch Amazfit Active 2', 1299000],
                ['Headphone ANC Soundcore Q20i', 649000],
                ['TWS Earbuds Xiaomi Buds 4 Lite', 399000],
                ['Speaker Komputer Edifier MP230', 1099000],
                ['Mikrofon USB Condenser dengan Pop Filter', 499000],
                ['Power Bank 20000 mAh 65W PD', 689000],
                ['Charger GaN 65W 3 Port', 259000],
            ],
            'Jaringan & Storage' => [
                ['Router WiFi 6 TP-Link Archer AX23', 649000],
                ['Access Point Ceiling WiFi 6 PoE', 899000],
                ['Switch Gigabit 8 Port Unmanaged', 189000],
                ['Kabel LAN Cat6 UTP 10 Meter', 69000],
                ['NAS 2-Bay Synology DS223j', 3199000],
                ['Flashdisk USB 3.2 256 GB', 219000],
                ['SSD Eksternal Portable 1 TB', 1349000],
                ['Hard Disk Eksternal 2 TB', 1099000],
                ['Crimping Tool dan LAN Tester Set', 159000],
            ],
            'Aksesori Meja Kerja' => [
                ['Meja Standing Desk Elektrik 120 cm', 3299000],
                ['Kursi Ergonomis Mesh Sandaran Tinggi', 1699000],
                ['Monitor Arm Single Gas Spring', 349000],
                ['Stand Laptop Aluminium Lipat', 149000],
                ['Lampu Monitor LED Light Bar', 299000],
                ['Cable Tray Kolong Meja', 119000],
                ['Footrest Ergonomis Adjustable', 139000],
                ['Whiteboard Mini Meja 40x30 cm', 79000],
                ['Rak Monitor Kayu dengan Laci', 229000],
            ],
            'Buku & Belajar' => [
                ['Buku Clean Code Edisi Bahasa Indonesia', 149000],
                ['Buku Belajar Git dan GitHub', 89000],
                ['Buku Algoritma dan Pemrograman Python', 115000],
                ['Buku Desain Basis Data Relasional', 105000],
                ['Buku Pemrograman Web dengan Laravel 12', 135000],
                ['Buku Keamanan Aplikasi Web', 125000],
                ['Notebook Dot Grid A5 Hardcover', 59000],
                ['Sticky Notes Kode Warna Isi 6 Blok', 35000],
                ['Cheat Sheet Pemrograman Set 12 Kartu', 45000],
            ],
        ];

        $editorIds = User::where('role', User::ROLE_EDITOR)->pluck('id');
        $i = 0;

        foreach ($catalog as $categoryName => $items) {
            $category = Category::where('name', $categoryName)->firstOrFail();

            foreach ($items as [$name, $price]) {
                Product::create([
                    'category_id' => $category->id,
                    'user_id'     => $editorIds[$i++ % $editorIds->count()],
                    'name'        => $name,
                    'slug'        => Str::slug($name),
                    'description' => "{$name} — produk {$categoryName} pilihan Dev Store dengan kualitas terjamin. "
                        .'Garansi toko 7 hari dan pengiriman ke seluruh Indonesia.',
                    'price'       => $price,
                    'stock'       => fake()->numberBetween(5, 120),
                    'is_active'   => true,
                ]);
            }
        }
    }
}

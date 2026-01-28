<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MenuItem;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user should be created via registration form during setup
        // Production database should not contain demo credentials

        // Menu Items
        MenuItem::create([
            'name' => 'Bacot',
            'category' => 'Makanan',
            'description' => 'Bakso Kuah Coto',
            'price' => '$25k'
        ]);

        MenuItem::create([
            'name' => 'Soto Ayam',
            'category' => 'Makanan',
            'description' => 'Sup tradisional dengan bumbu khas',
            'price' => '$20k'
        ]);

        MenuItem::create([
            'name' => 'Coto Makassar',
            'category' => 'Makanan',
            'description' => 'Daging dengan kuah kental dan rempah istimewa',
            'price' => '$45k'
        ]);

        MenuItem::create([
            'name' => 'Ikan Bakar',
            'category' => 'Makanan',
            'description' => 'Ikan segar dengan bumbu bakar spesial',
            'price' => '$55k'
        ]);

        MenuItem::create([
            'name' => 'Rendang Daging',
            'category' => 'Makanan',
            'description' => 'Daging empuk dalam kuah santan yang gurih',
            'price' => '$50k'
        ]);

        MenuItem::create([
            'name' => 'Es Cendol',
            'category' => 'Minuman',
            'description' => 'Minuman segar tradisional',
            'price' => '$10k'
        ]);

        MenuItem::create([
            'name' => 'Es Kelapa Muda',
            'category' => 'Minuman',
            'description' => 'Air kelapa dengan daging kelapa muda',
            'price' => '$12k'
        ]);

        // Testimonials
        Testimonial::create([
            'message' => 'Rasanya dijamin bikin balik lagi!',
            'author' => 'Pelanggan Setia'
        ]);

        Testimonial::create([
            'message' => 'Masakan rumahan dengan cita rasa bintang lima.',
            'author' => 'Pengunjung'
        ]);

        Testimonial::create([
            'message' => 'Menu andalan kami ini selalu jadi favorit pelanggan.',
            'author' => 'Tim Rumah Amma'
        ]);

        Testimonial::create([
            'message' => 'Kami masak dengan hati, supaya kamu bisa makan dengan senyum 😊',
            'author' => 'Chef Amma'
        ]);

        Testimonial::create([
            'message' => 'Bukan kami yang bilang enak, tapi pelanggan kami!',
            'author' => 'Manajemen'
        ]);

        // Gallery
        Gallery::create([
            'image' => 'gallery/gallery-1.jpg',
            'title' => 'Makanan Lezat'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-2.jpg',
            'title' => 'Suasana Restoran'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-3.jpg',
            'title' => 'Menu Special'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-4.jpg',
            'title' => 'Hidangan Utama'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-5.jpg',
            'title' => 'Pengalaman Kuliner'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-6.jpg',
            'title' => 'Pelayanan Terbaik'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-7.jpg',
            'title' => 'Makanan Berkualitas'
        ]);

        Gallery::create([
            'image' => 'gallery/gallery-8.jpg',
            'title' => 'Spesial Kami'
        ]);
    }
}

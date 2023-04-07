<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Telefoane, Tablete',
            'Laptop, Desktop, IT, Birotica',
            'Gaming, Jocuri',
            'TV, Audio-Video, Foto',
            'Electrocasnice mari',
            'Electrocasnice mici, Vesela',
        ];

        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->save();
        }
    }
}

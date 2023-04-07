<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'Telefon SAMSUNG Galaxy A23 5G, 64GB, 4GB RAM, Dual SIM, Black',
                'Telefoane, Tablete',
                'Cameră cu mai multe obiective, fotografii cu mai multe perspective',
                'https://lcdn.altex.ro/resize/media/catalog/product/t/e/2bd48d28d1c32adea0e55139a4e6434a/telefon-samsung-galaxy-a23-5g-black-01_efaa5909.jpg',
                'https://altex.ro/telefon-samsung-galaxy-a23-5g-64gb-4gb-ram-dual-sim-black/cpd/SMTA236BK/',
            ],
            [
                'Tableta SAMSUNG Galaxy Tab A7, 10.4", 32GB, 3GB RAM, Wi-Fi, Gray',
                'Telefoane, Tablete',
                'Tableta super smart ultima generatie',
                'https://lcdn.altex.ro/resize/media/catalog/product/t/a/2bd48d28d1c32adea0e55139a4e6434a/tableta_samsung_galaxy_tab_a7_wi_fi_gray_01_e2b5e2e8.jpg',
                'https://altex.ro/tableta-samsung-galaxy-tab-a7-10-4-32gb-3gb-ram-wi-fi-gray/cpd/TABT503GR/',
            ],
            [
                'Laptop HP 15s-eq2007nq, AMD Ryzen 7 5700U pana la 4.3GHz, 15.6" Full HD, 16GB, SSD 512GB, AMD Radeon Graphics, Free DOS, argintiu',
                'Laptop, Desktop, IT, Birotica',
                'Subţire, uşor şi gata pentru călătorii. Vezi mai multe fotografii, videoclipuri şi proiecte pe un ecran cu ramă cu micro-margini de 6,5 mm.',
                'https://lcdn.altex.ro/resize/media/catalog/product/2/S/2bd48d28d1c32adea0e55139a4e6434a/2S966EA-1_82f633ed.jpg',
                'https://altex.ro/laptop-hp-15s-eq2007nq-amd-ryzen-7-5700u-pana-la-4-3ghz-15-6-full-hd-16gb-ssd-512gb-amd-radeon-graphics-free-dos-argintiu/cpd/LAP4Q7D6EA/',
            ],
            [
                'Combina frigorifica BOSCH KGE49AICA, 419 l, H 201 cm, Clasa C, inox',
                'Electrocasnice mari',
                'Sertar VitaFresh: păstrează prospețimea alimentelor pe o perioadă mai îndelungată de timp prin menținerea unei temperaturi scăzute pentru carne și pește și prin controlul umidității pentru fructe și legume',
                'https://lcdn.altex.ro/resize/media/catalog/product/K/G/2bd48d28d1c32adea0e55139a4e6434a/KGE49AICA_1.jpg',
                'https://altex.ro/combina-frigorifica-bosch-kge49aica-419-l-h-201-cm-clasa-c-inox/cpd/CBFKGE49AICA/',
            ],
            [
                'Televizor LED PHILIPS 43PFS5507, FullHD, 108cm',
                'TV, Audio-Video, Foto',
                'Cauţi un televizor compact cu performanţe mari? De la birou la bucătărie şi la dormitor, acest televizor atractiv se potriveşte oriunde. Este uşor şi se poate muta cu uşurinţă iar imaginea clară, vie, îţi asigură cea mai bună experienţă, orice ai viziona.',
                'https://lcdn.altex.ro/resize/media/catalog/product/l/e/2bd48d28d1c32adea0e55139a4e6434a/led43pfs5507_1__e78450ba.jpg',
                'https://altex.ro/televizor-led-philips-43pfs5507-fullhd-108cm/cpd/LED43PFS5507/',
            ],
            [
                'Telefon APPLE iPhone 12 5G, 64GB, Black',
                'Telefoane, Tablete',
                'Viteza 5G. Cel mai rapid chip dintr-un smartphone - A14 Bionic. Protectie ceramica de patru ori mai rezistenta. Night Mode pe fiecare camera. iPhone 12 le are pe toate - in doua marimi perfecte.',
                'https://lcdn.altex.ro/resize/media/catalog/product/A/p/2bd48d28d1c32adea0e55139a4e6434a/Apple-iPhone-12-5G-Black_2.jpg',
                'https://altex.ro/telefon-apple-iphone-12-5g-64gb-black/cpd/SMTIP126BK/',
            ],
        ];
        $count = count($products);
        foreach ($products as $productData) {
            $product = new Product();
            $categoryName = $productData[1];

            # Find that category in the categories table
            $categoryId = Category::where('name', '=', $categoryName)->pluck('id')->first();

            $product->created_at = Carbon::now()->subDays($count)->toDateTimeString();
            $product->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
            $product->title = $productData[0];
            $product->category_id = $categoryId;
            $product->description = $productData[2];
            $product->cover_url = $productData[3];
            $product->purchase_url = $productData[4];
            $product->save();
            $count--;
        }
    }
}

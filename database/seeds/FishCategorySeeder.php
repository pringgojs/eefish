<?php

use App\Models\Fish;
use App\Models\FishCategory;
use Illuminate\Database\Seeder;

class FishCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::beginTransaction();
        $categories = array(
            'Air Laut' => [
                'Kakap putih',
                'Kerapu tikus ',
                'Kerapu Lumpur',
                'Kerapu cantang',
                'Bandeng',
                'Kerapu macan',
                'Kerapu sunu',
                'Kerapu batik',
                'Baronang',
                'Kakap merah'
            ],
            'Air Payau' => [
                'Kerapu macan',
                'Bandeng ',
                'Kerapu Lumpur',
                'Kerapu cantang',
                'Kerapu tikus',
                'Belanak',
                'Kepiting',
                'Kakap putih',
                'Nila',
                'Mujair'
            ],
            'Air Tawar' => [
                'Arwana',
                'Arengan ',
                'Baung putih',
                'Belut',
                'Boja',
                'Barbus',
                'Bilis tembaga',
                'Cupang',
                'Cerutu strip putih',
                'Ciling ciling',
                'Cupi',
                'Gurami',
                'Hampala, barau',
                'Lele dumbo',
                'Lele putih/ biasa',
                'Lais timah',
                'Lais junggang',
                'Labiusa',
                'Langli',
                'Mola',
                'Mas',
                'Cabus',
                'Mas koki cina',
                'Nilem/paweh',
                'Patin',
                'Niasa',
                'Neon tetra',
                'Oscar'
            ],
            'Herbivora' => [
                'Big head carp',
                'Grass carp/ikan koan ',
                'Javanese ca',
                'Silver carp',
                'Gurami',
                'Bandeng',
                'Perch',
                'Rabbit fish/beronang',
                'Tilapia',
                'Siamemese gurami'
            ], 
            'Karnivora' => [
                'Black carp',
                'Catfish/ikan lele',
                'Grouper/ikan kerapu',
                'Atlantic salmon',
                'Pacific salmon',
                'Seabass/ikan kakap',
                'Brown trout',
                'Rainbow trout',
                'Ikan belut',
                'Ikan kakap'
            ],
            'Omnivora' => [
                'Channel catfish/lele amerika',
                'Common carp/ikan mas',
                'Grey mullet/ikan belanak',
                'Ikan mujair ',
                'ikan mas',
                'Ikan nila',
                'Ikan oskar',
                'Lele dumbo',
                'Lele putih/ biasa',
            ],
            'Planktoon' => [
                'Ikan terbang ',
                'Ikan cucut',
                'Gurami',
                'kowan',
                'tawes',
                'ikan mola',
                'bandeng',
                'sepat',
                'nilem',
                'Ikan tambakan',
            ],
        );
        foreach ($categories as $category => $fishes) {
            $model_category = FishCategory::where('fish_category_name', $category)->first() ? : new FishCategory;
            $model_category->fish_category_name = $category;
            $model_category->save();
            foreach ($fishes as $fish) {
                $model_fish = new Fish;
                $model_fish->fish_name = $fish;
                $model_fish->fish_fish_categories_id = $model_category->id;
                $model_fish->save();
            }
        }
        \DB::commit();
    }
}

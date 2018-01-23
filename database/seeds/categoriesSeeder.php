<?php

use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catsArr = [
            'املاک' => json_encode([]),
            'وسایل الکترونیک' => json_encode([]),
            'وسایل نقلیه' => json_encode([]),

        ];
        $subCatsArr = [
            'املاک' => [
                'خرید مسکونی' => json_encode([]),
                'اجاره مسکونی' => json_encode([]),
                'خرید تجاری' => json_encode([]),
                'اجاره تجاری' => json_encode([]),
                'ویلا' => json_encode([]),

            ],
            'وسایل الکترونیک' => [
                ' موبایل و تبلت' => json_encode([]),
                'سیم کارت' => json_encode([]),
                'کامپیوتر' => json_encode([]),
                'صوتی و تصویری' => json_encode([]),
                'کنسول و بازی' => json_encode([]),
                'تلفن رومیزی' => json_encode([]),

            ],
            'وسایل نقلیه' => [
                'خودرو سواری' => json_encode([]),
                'قطعات خودرد' => json_encode([]),
                'موتور سیکلت' => json_encode([]),
                'قایق' => json_encode([]),
                'ماشین سنگین' => json_encode([]),
            ],
        ];
        foreach ($catsArr as $catKey => $catArr) {
            $category = new App\categories();
            $category->name = $catKey;
            $category->field = $catArr;
            $category->save();
            if (array_key_exists($catKey, $subCatsArr)) {
                foreach ($subCatsArr[$catKey] as $subCatKey => $subCat) {
                    $subCategory = new App\categories();
                    $subCategory->name = $subCatKey;
                    $subCategory->field = $subCat;
                    $subCategory->parent_id = $category->id;
                    $subCategory->save();
                }
            }
        }
    }
}

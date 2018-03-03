<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'カテゴリ1',
                'children' => [
                    'カテゴリ1-1',
                    'カテゴリ1-2',
                    'カテゴリ1-3',
                ],
            ],
            [
                'name' => 'カテゴリ2',
                'children' => [
                    'カテゴリ2-1',
                    'カテゴリ2-2',
                    'カテゴリ2-3',
                ],
            ],
            [
                'name' => 'カテゴリ3',
                'children' => [
                    'カテゴリ3-1',
                    'カテゴリ3-2',
                    'カテゴリ3-3',
                ],
            ],
        ];

        foreach ($categories as $category) {
            $current = Category::where('name', '=', $category['name'])->first();
            if (!$current) {
                $current = new Category();
            }

            $current->name = $category['name'];
            $current->parent_id = null;
            $current->save();

            if (isset($category['children']) && count($category['children']) > 0) {
                if (!isset($current->id)) continue;
                foreach ($category['children'] as $c_name) {
                    $child = Category::where([
                      'name' => $c_name,
                      'parent_id' => $current->id,
                    ])->first();

                    if (!$child) {
                        $child = new Category();
                    }

                    $child->name = $c_name;
                    $child->parent_id = $current->id;
                    $child->save();
                }
            }
        }
    }
}

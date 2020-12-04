<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Appetizer', 'Salad', 'Vegetable', 'Main Dish', 'Side', 'Dessert', 'Drinks', 'Other'];

        $sortorder = 0;
        foreach ($items as $item) {
            $i = new \App\Models\Item;
            $i->name = $item;
            $i->sortorder = ++$sortorder * 10;
            $i->save();
        }
    }
}

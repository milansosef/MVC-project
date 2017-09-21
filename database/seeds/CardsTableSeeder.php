<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'name' => 'Tirion Fordring',
            'cardset' => 'Classic',
            'type' => 'Minion',
            'rarity' => 'Legendary',
            'cost' => '8',
            'attack' => '6',
            'health' => '6',
            'playerClass' => 'Paladin',
            'img' => 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/EX1_383.png',
        ]);

        DB::table('cards')->insert([
            'name' => 'Fireball',
            'cardset' => 'Basic',
            'type' => 'Spell',
            'rarity' => 'Free',
            'cost' => '4',
            'playerClass' => 'Mage',
            'img' => 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/CS2_029.png',
        ]);

        DB::table('cards')->insert([
            'name' => 'Northshire Cleric',
            'cardset' => 'Basic',
            'type' => 'Minion',
            'rarity' => 'Free',
            'cost' => '1',
            'attack' => '1',
            'health' => '3',
            'playerClass' => 'Priest',
            'img' => 'http://media.services.zam.com/v1/media/byName/hs/cards/enus/CS2_235.png',
        ]);
    }
}

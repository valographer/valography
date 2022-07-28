<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  
        \App\Models\Category::create([
            'name' => 'Familie',
            'slug' => 'kd',
        ]);

        \App\Models\Category::create([
            'name' => 'Landschaft',
            'slug' => 'lndscpe',
        ]);
        
        \App\Models\Category::create([
            'name' => 'Schwarzweiss',
            'slug' => 'blknwt',
        ]);
        
        \App\Models\Category::create([
            'name' => 'Andere',
            'slug' => 'thr',
        ]);
    }
}

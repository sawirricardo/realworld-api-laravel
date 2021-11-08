<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)
            ->has(\App\Models\Article::factory(10))
            ->create();

        \Spatie\Tags\Tag::findOrCreate(['Crypto']);
        \Spatie\Tags\Tag::findOrCreate(['Web3']);
        \Spatie\Tags\Tag::findOrCreate(['Javascript']);
        \Spatie\Tags\Tag::findOrCreate(['PHP']);
        \Spatie\Tags\Tag::findOrCreate(['WalletConnect']);
        \Spatie\Tags\Tag::findOrCreate(['Laravel']);
    }
}

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inbox;
use Faker\Generator as Faker;

$factory->define(Inbox::class, function (Faker $faker) {
    return [
        'nama' => $faker->name(),
        // unique email digunakan untuk membuat email unik
        // atau tidak sama dengan yang lain
        'email' => $faker->unique()->safeEmail,
        'subjek' => 'bertanya',
        'pesan' => $faker->text(),
        // 'status' => 'belum_dibaca'
    ];
});

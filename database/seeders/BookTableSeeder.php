<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'id' => 1,
                'title' => 'Slayer',
                'author' => 'Kiersten White',
                'genre' => 0,
                'quantity' => 20,
                'price' => 1314
            ],
            [
                'id' => 2,
                'title' => 'The Simple Wild',
                'author' => 'KA Tucker',
                'genre' => 0,
                'quantity' => 40,
                'price' => 1153
            ],
            [
                'id' => 3,
                'title' => 'The Hate You Give',
                'author' => 'Angie Thomas',
                'genre' => 2,
                'quantity' => 50,
                'price' => 227
            ],
            [
                'id' => 4,
                'title' => 'The Martian',
                'author' => 'Andy Weir',
                'genre' => 2,
                'quantity' => 50,
                'price' => 348
            ],
            [
                'id' => 5,
                'title' => 'The Beholder',
                'author' => 'Anna Bright',
                'genre' => 2,
                'quantity' => 50,
                'price' => 998
            ],
            [
                'id' => 6,
                'title' => 'Rich Dad Poor Dad',
                'author' => 'Robert Kiyosaki',
                'genre' => 1,
                'quantity' => 50,
                'price' => 998
            ],
           
            [
                'id' => 7,
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'genre' => 1,
                'price' => 130,
                'quantity' => 100,
            ],
            [
                'id' => 8,
                'title' => '1984',
                'author' => 'George Orwell',
                'genre' => 1,
                'price' => 109,
                'quantity' => 80,
            ],
            [
                'id' => 9,
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'genre' => 1,
                'price' => 99,
                'quantity' => 120,
            ],
            [
                'id' => 10,
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'genre' => 1,
                'price' => 115,
                'quantity' => 70,
            ],
            [
                'id' => 11,
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'genre' => 1,
                'price' => 469,
                'quantity' => 90,
            ],
            [
                'id' => 12,
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'genre' => 1,
                'price' => 1489,
                'quantity' => 110,
            ],
            [
                'id' => 13,
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'author' => 'J.K. Rowling',
                'genre' => 1,
                'price' =>999,
                'quantity' => 100,
            ],
            [
                'id' => 14,
                'title' => 'War and Peace',
                'author' => 'Leo Tolstoy',
                'genre' => 1,
                'quantity' => 50,
                'price' => 478
            ],
        ]);
    }
}

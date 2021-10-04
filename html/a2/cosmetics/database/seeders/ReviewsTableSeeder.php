<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I love this so much. The texture is amazing',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 2,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'Smells so good',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 1,
            'like' => '1,4,6',
            'dislike' => '2,8',
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'I like this so much. The texture is amazing',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 3,
            'like' => '10,3,5',
            'dislike' => '1,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It looks pretty',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 4,
            'like' => '2,',
            'dislike' => '3,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'You can wear it subtle or make it look extra play it up',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 5,
            'like' => '1,7,9',
            'dislike' => '3,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Found my new favourite product!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 6,
            'like' => '1,4,8',
            'dislike' => '10,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 1,
            'content' => 'Really good value for money!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 8,
            'like' => '2,4,3',
            'dislike' => '9,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'its such great deal to buy this!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 2,
            'like' => '1,9',
            'dislike' => '8,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Brought as a gift as its a good price.',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 10,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This product is definitely a must for anyone !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 9,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'What can we not love about this product!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 8,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'The formula is so buttery !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 7,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I would love to get a shade darker as well.!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 6,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Great consistency!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 5,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It does have a red undertone!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 2,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Like really red , but I Love it!!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 3,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'You all… this stuff is my jam!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 4,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Love that it comes in multiple shades!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 5,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'The brother was nice the formula was really good!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 6,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Feels great, goes on consistently.!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 7,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This is a really nice product !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 8,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I think I got a shade slightly to dark !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 9,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It works really well !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 10,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Easy and pretty, buildable product!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 6,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I have a medium-fair olive skin and Island ting is the best match!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 5,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Amazing product. Buildable!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 4,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Nice texture, easy to blend.',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 3,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'The perfect shade contour!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 2,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'I am so happy that I got this bronzer.. ',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 1,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Great shade range and under tones.',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 5,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'Easy, subtle color that adds just enough warmth to my look.',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 6,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This was my first ever bronzer purchase.',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 7,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'Amazing packaging!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 8,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Repurchased as I completely panned my first one!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 9,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Absolutely love this bronzer.!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 10,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'They apply smoothly and evenly without looking muddy!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 5,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I really like these bronzers. !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 6,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I cannot give this a 5 star yet, as this is the only bronzer i have used.',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 7,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'One of my favorites!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 8,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I love this powder bronzer!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 9,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Perfect bronzer colour for my skin colour!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 10,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This gives such a natural bronzing effect !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 7,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This bronzer is amazing for fair skin!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 6,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Been using it from last 3 years!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 5,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I absolutely love this product !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 4,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I have faked tanned!',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 3,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It applies really well !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 2,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I absolutely adore this bronzer!!! !',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 1,
            'like' => '1,4,5',
            'dislike' => '2,6',
        ]);
        
    }
}

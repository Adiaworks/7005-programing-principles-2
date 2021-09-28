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
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'Smells so good',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'I like this so much. The texture is amazing',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 3,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It looks pretty',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 4,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'You can wear it subtle or make it look extra play it up',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Found my new favourite product!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 1,
            'content' => 'Really good value for money!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 1,
            'user_id' => 8,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'its such great deal to buy this!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Brought as a gift as its a good price.',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 10,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This product is definitely a must for anyone !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 9,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'What can we not love about this product!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 8,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'The formula is so buttery !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 7,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I would love to get a shade darker as well.!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Great consistency!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 2,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It does have a red undertone!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 2,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Like really red , but I Love it!!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 3,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'You all… this stuff is my jam!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 4,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Love that it comes in multiple shades!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'The brother was nice the formula was really good!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Feels great, goes on consistently.!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 7,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This is a really nice product !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 8,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I think I got a shade slightly to dark !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 9,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It works really well !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 3,
            'user_id' => 10,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Easy and pretty, buildable product!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I have a medium-fair olive skin and Island ting is the best match!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Amazing product. Buildable!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 4,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Nice texture, easy to blend.',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 3,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'The perfect shade contour!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 2,
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'I am so happy that I got this bronzer.. ',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 4,
            'user_id' => 1,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Great shade range and under tones.',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'Easy, subtle color that adds just enough warmth to my look.',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This was my first ever bronzer purchase.',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 7,
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'content' => 'Amazing packaging!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 8,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Repurchased as I completely panned my first one!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 9,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Absolutely love this bronzer.!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 5,
            'user_id' => 10,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'They apply smoothly and evenly without looking muddy!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I really like these bronzers. !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I cannot give this a 5 star yet, as this is the only bronzer i have used.',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 7,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'One of my favorites!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 8,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I love this powder bronzer!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 9,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Perfect bronzer colour for my skin colour!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 6,
            'user_id' => 10,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This gives such a natural bronzing effect !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 7,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'This bronzer is amazing for fair skin!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 6,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'Been using it from last 3 years!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 5,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I absolutely love this product !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 4,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I have faked tanned!',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 3,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'It applies really well !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 2,
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'content' => 'I absolutely adore this bronzer!!! !',
            'review_created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'item_id' => 7,
            'user_id' => 1,
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subscribers = [
            [
                'name' => 'Michael Brown',
                'description' => 'YouTube content creator with millions of followers.',
                'photo' => 'images/subscribers/1.jpg',
                'subscriber_category_id' => 1,
                'video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ' // مثال على رابط يوتيوب
            ],
            [
                'name' => 'Emily Davis',
                'description' => 'TikTok influencer known for dance videos.',
                'photo' => 'images/subscribers/2.jpg',
                'subscriber_category_id' => 2,
                'video' => 'https://www.youtube.com/watch?v=kJQP7kiw5Fk'
            ],
            [
                'name' => 'John Smith',
                'description' => 'Gaming enthusiast and streamer on Twitch.',
                'photo' => 'images/subscribers/3.jpg',
                'subscriber_category_id' => 3,
                'video' => 'https://www.youtube.com/watch?v=3JZ_D3ELwOQ'
            ],
            [
                'name' => 'Alice Walker',
                'description' => 'Vlogger sharing lifestyle and beauty tips.',
                'photo' => 'images/subscribers/4.jpg',
                'subscriber_category_id' => 4,
                'video' => 'https://www.youtube.com/watch?v=9bZkp7q19f0'
            ],
            [
                'name' => 'Robert Johnson',
                'description' => 'Travel blogger with a passion for adventure.',
                'photo' => 'images/subscribers/5.jpg',
                'subscriber_category_id' => 1,
                'video' => 'https://www.youtube.com/watch?v=tL7X7HTv0sI'
            ],
            [
                'name' => 'Sophia Lee',
                'description' => 'Fitness guru and health coach on Instagram.',
                'photo' => 'images/subscribers/6.jpg',
                'subscriber_category_id' => 2,
                'video' => 'https://www.youtube.com/watch?v=p3mKqrQ2g9Q'
            ],
            [
                'name' => 'James Turner',
                'description' => 'Tech reviewer and unboxing expert on YouTube.',
                'photo' => 'images/subscribers/7.jpg',
                'subscriber_category_id' => 3,
                'video' => 'https://www.youtube.com/watch?v=Q5qV6PDB-8A'
            ],
            [
                'name' => 'Olivia Martinez',
                'description' => 'Cooking and recipe expert on TikTok.',
                'photo' => 'images/subscribers/8.jpg',
                'subscriber_category_id' => 2,
                'video' => 'https://www.youtube.com/watch?v=vjW8wmF5VWk'
            ],
            [
                'name' => 'Liam Williams',
                'description' => 'Expert in home decor and DIY projects.',
                'photo' => 'images/subscribers/9.jpg',
                'subscriber_category_id' => 4,
                'video' => 'https://www.youtube.com/watch?v=V3rfiFE2Cuk'
            ],
            [
                'name' => 'Charlotte Wilson',
                'description' => 'Gamer and streamer, specializing in RPG games.',
                'photo' => 'images/subscribers/10.jpg',
                'subscriber_category_id' => 3,
                'video' => 'https://www.youtube.com/watch?v=6dhHVqMbyqM'
            ],
            [
                'name' => 'Daniel Brown',
                'description' => 'Music producer and DJ with a massive following.',
                'photo' => 'images/subscribers/11.jpg',
                'subscriber_category_id' => 1,
                'video' => 'https://www.youtube.com/watch?v=V1bFr2SWP1I'
            ],
            [
                'name' => 'Ella Clark',
                'description' => 'Beauty and fashion influencer on Instagram.',
                'photo' => 'images/subscribers/12.jpg',
                'subscriber_category_id' => 2,
                'video' => 'https://www.youtube.com/watch?v=TkZzQskwrn0'
            ],
            [
                'name' => 'Mason Johnson',
                'description' => 'Tech enthusiast sharing the latest gadgets.',
                'photo' => 'images/subscribers/13.jpg',
                'subscriber_category_id' => 3,
                'video' => 'https://www.youtube.com/watch?v=jNQXAC9IVRw'
            ],
            [
                'name' => 'Isabella Davis',
                'description' => 'Adventure traveler and nature lover.',
                'photo' => 'images/subscribers/14.jpg',
                'subscriber_category_id' => 4,
                'video' => 'https://www.youtube.com/watch?v=GG6dPx39ymI'
            ],
            [
                'name' => 'Ethan Miller',
                'description' => 'Photography enthusiast sharing tips and tutorials.',
                'photo' => 'images/subscribers/15.jpg',
                'subscriber_category_id' => 1,
                'video' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4'
            ],
        ];

        foreach ($subscribers as $subscriber) {
            Subscriber::create($subscriber);
        }
    }
}

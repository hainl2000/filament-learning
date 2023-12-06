<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Fee;
use App\Models\Food;
use App\Models\SubFood;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        $data = [
//            [
//                'fee1' => 100,
//                'fee2' => 100,
//                'fee3' => 100,
//                'fee4' => 100,
//                'type' => 1
//            ],
//            [
//                'fee1' => 200,
//                'fee2' => 200,
//                'fee3' => 200,
//                'fee4' => 200,
//                'type' => 2
//            ],
//            [
//                'fee1' => 300,
//                'fee2' => 300,
//                'fee3' => 300,
//                'fee4' => 300,
//                'type' => 2
//            ],
//            [
//                'fee1' => 400,
//                'fee2' => 400,
//                'fee3' => 400,
//                'fee4' => 400,
//                'type' => 1
//            ],
//            [
//                'fee1' => 500,
//                'fee2' => 500,
//                'fee3' => 500,
//                'fee4' => 500,
//                'type' => 1
//            ],
//        ];
//
//        Fee::query()->insert($data);

        $data = [
            [
                'name' => 'food 1',
                'image' => 'https://9mobi.vn/cf/images/2015/03/nkk/hinh-anh-de-thuong-1.jpg',
                'price' => 100
            ],
            [
                'name' => 'food 2',
                'image' => 'https://9mobi.vn/cf/images/2015/03/nkk/hinh-anh-de-thuong-1.jpg',
                'price' => 200
            ],
            [
                'name' => 'food 3',
                'image' => 'https://9mobi.vn/cf/images/2015/03/nkk/hinh-anh-de-thuong-1.jpg',
                'price' => 300
            ],
            [
                'name' => 'food 4',
                'image' => 'https://9mobi.vn/cf/images/2015/03/nkk/hinh-anh-de-thuong-1.jpg',
                'price' => 400
            ],
        ];

        $datas = [
            [
                'name' => 'sub food 1',
                'food_id' => 4,
                'price' => 100
            ],
            [
                'name' => 'sub food 2',
                'food_id' => 4,
                'price' => 200
            ],
        ];

        Food::query()->insert($data);
        SubFood::query()->insert($datas);
    }
}

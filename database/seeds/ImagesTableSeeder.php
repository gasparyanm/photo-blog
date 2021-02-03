<?php

use App\Image;
use App\User;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    CONST DEFAULT_IMAGES_COUNT = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersIds = User::all()->pluck('id');
        $usersIdsCount = count($usersIds);

        // calculate how many images should have each user
        $eachUserImagesCount = self::DEFAULT_IMAGES_COUNT / $usersIdsCount;

        for ($i = 0; $i < $usersIdsCount; $i++) {
            $currentUserId = $usersIds[$i];

            // add images with equal counts for each user e
            factory(Image::class, $eachUserImagesCount)
                ->create(['user_id' => $currentUserId]);
        }
    }
}

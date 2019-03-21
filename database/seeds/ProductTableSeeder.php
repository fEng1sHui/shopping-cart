<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'https://www.billleonebookseller.com/pictures/7594.jpg?v=1429646836', 
        	'title' => 'Harry Potter',
        	'description' => 'Super cool - at least as a child.',
        	'price' => 31
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://t2.gstatic.com/images?q=tbn:ANd9GcSxX_GpGRpwqu51_E3Vos9aEFIIk3s7MsuMAiqNkELbvapHXcj3', 
        	'title' => 'A Game of Thrones',
        	'description' => 'A Song of Ice and Fire',
        	'price' => 29
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://prodimage.images-bn.com/pimages/9780735219090_p0_v10_s600x595.jpg', 
        	'title' => 'Where the Crawdads Sing',
        	'description' => 'A Reese Witherspoon x Hello Sunshine Book Club Pick',
        	'price' => 9
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://prodimage.images-bn.com/pimages/9781538700129_p0_v1_s600x595.jpg', 
        	'title' => 'Run Away (B&N Exclusive Edition)',
        	'description' => 'A perfect family is shattered in RUN AWAY, the new thriller from the master of domestic suspense, Harlan Coben.',
        	'price' => 17
        ]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'https://prodimage.images-bn.com/pimages/9780062857903_p0_v1_s600x595.jpg', 
        	'title' => 'The Right Side of History: How Reason and Moral Purpose Made the West Great',
        	'description' => 'America has a God-shaped hole in its heart, argues New York Times bestselling author Ben Shapiro, and we shouldnt fill it with politics and hate.',
        	'price' => 19
        ]);
        $product->save();

                $product = new \App\Product([
        	'imagePath' => 'https://prodimage.images-bn.com/pimages/9780062843395_p0_v1_s600x595.jpg', 
        	'title' => 'The Longevity Paradox: How to Die Young at a Ripe Old Age',
        	'description' => 'From the author of the New York Times bestseller The Plant Paradox comes a groundbreaking plan for living a long, healthy, happy life.',
        	'price' => 17
        ]);
        $product->save();
    }
}

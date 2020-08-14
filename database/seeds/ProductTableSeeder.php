<?php

use App\Product;
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
        $color = ["AliceBlue", "AntiqueWhite", "Aqua", "Aquamarine", "Azure", "Beige", "Bisque", "Black", "BlanchedAlmond", "Blue", "BlueViolet", "Brown", "BurlyWood", "CadetBlue", "Chartreuse", "Chocolate", "Coral", "CornflowerBlue", "Cornsilk", "Crimson", "Cyan", "DarkBlue", "DarkCyan", "DarkGoldenRod", "DarkGray", "DarkGrey", "DarkGreen", "DarkKhaki", "DarkMagenta", "DarkOliveGreen", "DarkOrange", "DarkOrchid", "DarkRed", "DarkSalmon", "DarkSeaGreen", "DarkSlateBlue", "DarkSlateGray", "DarkSlateGrey", "DarkTurquoise", "DarkViolet", "DeepPink", "DeepSkyBlue", "DimGray", "DimGrey", "DodgerBlue", "FireBrick", "FloralWhite", "ForestGreen", "Fuchsia", "Gainsboro", "GhostWhite", "Gold", "GoldenRod", "Gray", "Grey", "Green", "GreenYellow", "HoneyDew", "HotPink", "IndianRed", "Indigo", "Ivory", "Khaki", "Lavender", "LavenderBlush", "LawnGreen", "LemonChiffon", "LightBlue", "LightCoral", "LightCyan", "LightGoldenRodYellow", "LightGray", "LightGrey", "LightGreen", "LightPink", "LightSalmon", "LightSeaGreen", "LightSkyBlue", "LightSlateGray", "LightSlateGrey", "LightSteelBlue", "LightYellow", "Lime", "LimeGreen", "Linen", "Magenta", "Maroon", "MediumAquaMarine", "MediumBlue", "MediumOrchid", "MediumPurple", "MediumSeaGreen", "MediumSlateBlue", "MediumSpringGreen", "MediumTurquoise", "MediumVioletRed", "MidnightBlue", "MintCream", "MistyRose", "Moccasin", "NavajoWhite", "Navy", "OldLace", "Olive", "OliveDrab", "Orange", "OrangeRed", "Orchid", "PaleGoldenRod", "PaleGreen", "PaleTurquoise", "PaleVioletRed", "PapayaWhip", "PeachPuff", "Peru", "Pink", "Plum", "PowderBlue", "Purple", "RebeccaPurple", "Red", "RosyBrown", "RoyalBlue", "SaddleBrown", "Salmon", "SandyBrown", "SeaGreen", "SeaShell", "Sienna", "Silver", "SkyBlue", "SlateBlue", "SlateGray", "SlateGrey", "Snow", "SpringGreen", "SteelBlue", "Tan", "Teal", "Thistle", "Tomato", "Turquoise", "Violet", "Wheat", "White", "WhiteSmoke", "Yellow", "YellowGreen"];

        Product::create(['name' => '1', 'price' => random_int(5, 100), 'image' => 'product/1_1597374342.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Big img 01', 'price' => random_int(5, 100), 'image' => 'product/big-img-01_1597374342.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Big img 02', 'price' => random_int(5, 100), 'image' => 'product/big-img-02_1597374343.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Big img 03', 'price' => random_int(5, 100), 'image' => 'product/big-img-03_1597374343.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Blog one', 'price' => random_int(5, 100), 'image' => 'product/blog-one_1597374344.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Blog three', 'price' => random_int(5, 100), 'image' => 'product/blog-three_1597374344.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Blog two', 'price' => random_int(5, 100), 'image' => 'product/blog-two_1597374345.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Gallery 1', 'price' => random_int(5, 100), 'image' => 'product/gallery1_1597374345.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Gallery 2', 'price' => random_int(5, 100), 'image' => 'product/gallery2_1597374346.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Gallery 3', 'price' => random_int(5, 100), 'image' => 'product/gallery3_1597374346.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Gallery 4', 'price' => random_int(5, 100), 'image' => 'product/gallery4_1597374347.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Girl 1', 'price' => random_int(5, 100), 'image' => 'product/girl1_1597374347.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Girl 2', 'price' => random_int(5, 100), 'image' => 'product/girl2_1597374348.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Girl 3', 'price' => random_int(5, 100), 'image' => 'product/girl3_1597374348.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Iframe 1', 'price' => random_int(5, 100), 'image' => 'product/iframe1_1597374349.png', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Iframe 2', 'price' => random_int(5, 100), 'image' => 'product/iframe2_1597374349.png', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Iframe 3', 'price' => random_int(5, 100), 'image' => 'product/iframe3_1597374383.png', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Img 1', 'price' => random_int(5, 100), 'image' => 'product/img-1_1597374383.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Img 2', 'price' => random_int(5, 100), 'image' => 'product/img-2_1597374384.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Img 3', 'price' => random_int(5, 100), 'image' => 'product/img-3_1597374384.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Img pro 01', 'price' => random_int(5, 100), 'image' => 'product/img-pro-01_1597374385.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Img pro 02', 'price' => random_int(5, 100), 'image' => 'product/img-pro-02_1597374385.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Man four', 'price' => random_int(5, 100), 'image' => 'product/man-four_1597374386.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Man one', 'price' => random_int(5, 100), 'image' => 'product/man-one_1597374386.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Man two', 'price' => random_int(5, 100), 'image' => 'product/man-two_1597374387.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Man three', 'price' => random_int(5, 100), 'image' => 'product/man-three_1597374387.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'One', 'price' => random_int(5, 100), 'image' => 'product/one_1597374387.png', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 1', 'price' => random_int(5, 100), 'image' => 'product/product1_1597374388.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 2', 'price' => random_int(5, 100), 'image' => 'product/product2_1597374389.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 3', 'price' => random_int(5, 100), 'image' => 'product/product3_1597374389.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 4', 'price' => random_int(5, 100), 'image' => 'product/product4_1597374390.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 5', 'price' => random_int(5, 100), 'image' => 'product/product5_1597374390.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 6', 'price' => random_int(5, 100), 'image' => 'product/product6_1597374416.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 7', 'price' => random_int(5, 100), 'image' => 'product/product7_1597374417.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 8', 'price' => random_int(5, 100), 'image' => 'product/product8_1597374417.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 9', 'price' => random_int(5, 100), 'image' => 'product/product9_1597374418.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 10', 'price' => random_int(5, 100), 'image' => 'product/product10_1597374418.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 11', 'price' => random_int(5, 100), 'image' => 'product/product11_1597374419.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Product 12', 'price' => random_int(5, 100), 'image' => 'product/product12_1597374419.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Recomend 1', 'price' => random_int(5, 100), 'image' => 'product/recommend1_1597374420.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Recomend 2', 'price' => random_int(5, 100), 'image' => 'product/recommend2_1597374420.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Shirt img', 'price' => random_int(5, 100), 'image' => 'product/shirt-img_1597374421.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Shoes img', 'price' => random_int(5, 100), 'image' => 'product/shoes-img_1597374421.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Similar 1', 'price' => random_int(5, 100), 'image' => 'product/similar1_1597374422.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Similar 2', 'price' => random_int(5, 100), 'image' => 'product/similar2_1597374422.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Similar 3', 'price' => random_int(5, 100), 'image' => 'product/similar3_1597374423.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Smp img 01', 'price' => random_int(5, 100), 'image' => 'product/smp-img-01_1597374423.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Smp img 02', 'price' => random_int(5, 100), 'image' => 'product/smp-img-02_1597374424.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Smp img 03', 'price' => random_int(5, 100), 'image' => 'product/smp-img-03_1597374450.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Three', 'price' => random_int(5, 100), 'image' => 'product/three_1597374451.png', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'T-shirt img', 'price' => random_int(5, 100), 'image' => 'product/t-shirts-img_1597374451.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Two', 'price' => random_int(5, 100), 'image' => 'product/two_1597374452.png', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Wallet img', 'price' => random_int(5, 100), 'image' => 'product/wallet-img_1597374452.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Women bag img', 'price' => random_int(5, 100), 'image' => 'product/women-bag-img_1597374453.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
        Product::create(['name' => 'Women shoes img', 'price' => random_int(5, 100), 'image' => 'product/women-shoes-img_1597374453.jpg', 'size' => random_int(10, 50), 'color' => $color[array_rand($color, 1)], 'publication_status' => 0, 'category_id' => random_int(1, 10), 'manufacture_id' => random_int(1, 7)]);
    }
}

<?php
    class Product{

        private const PRODUCTS = [
            [
                'id' => 0,
                'name' => 'Red Jersey',
                'description' => 'Manchester United Home Jersey, red, sponsored by Chevrolet',
                'price' => 59.99,
                'pic' => '../src/images/red_jersey.jpg',
                'qty_in_stock' => 200,
            ],
            [
                'id' => 1,
                'name' => 'White Jersey',
                'description' => 'Manchester United Away Jersey, white, sponsored by Chevrolet',
                'price' => 49.99,
                'pic' => '../src/images/white_jersey.jpg',
                'qty_in_stock' => 133,
            ],
            [
                'id' => 2,
                'name' => 'Black Jersey',
                'description' => 'Manchester United Extra Jersey, black, sponsored by Chevrolet',
                'price' => 54.99,
                'pic' => '../src/images/black_jersey.jpg',
                'qty_in_stock' => 544,
            ],
            [
                'id' => 3,
                'name' => 'Blue Jacket',
                'description' => 'Blue Jacket for cold and raniy weather',
                'price' => 129.99,
                'pic' => '../src/images/blue_jacket.jpg',
                'qty_in_stock' => 14,
            ],
            [
                'id' => 4,
                'name' => 'Snapback Cap',
                'description' => 'Manchester United New Era Snapback Cap- Adult',
                'price' => 24.99,
                'pic' => '../src/images/cap.jpg',
                'qty_in_stock' => 655,
            ],
            [
                'id' => 5,
                'name' => 'Champion Flag',
                'description' => 'Manchester United Champions League Flag',
                'price' => 24.99,
                'pic' => '../src/images/champion_league_flag.jpg',
                'qty_in_stock' => 1230,
            ],
        ];

        
            static public function productList(){
                $products = self::PRODUCTS;
                $content = null;

                if($products == []){
                    echo "The product list doesn't contain any value.";
                }
                else{
                    $content = "<h1>Product List</h1>";
                    for ($i = 0; $i < count($products); $i++) {
                        if($products[$i]['qty_in_stock'] > 0){
                            $content .= "<div class='product'>
                                <img src='{$products[$i]['pic']}'>
                                <h1 class='name'>{$products[$i]['name']}</h1>
                                <p class='description'>{$products[$i]['description']}</p>
                                <p class='price'>{$products[$i]['price']}</p>
                            </div>";
                        }
                    }
                }

                return $content;
            } 

    }
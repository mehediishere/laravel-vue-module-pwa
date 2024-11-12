<?php
//sidebar_links.php

return [
    [
        'name' => 'Products',
        'route' => 'product.index',  // Named route
    ],
    [
        'group' => 'Product Crud',
        'links' => [
            [
                'name' => 'Add Product',
                'route' => 'product.add',
            ],
            [
                'name' => 'Update Product',
                'route' => 'product.update',
            ],
            [
                'name' => 'View Products',
                'route' => 'product.view',
            ],
        ],
    ],
];

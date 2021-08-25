<?php
const CART = "session_cart";
return [
    'user' => [
        'gender' => [
            'male' => 1,
            'female' => 0,
        ],
        'role' => [
            'user' => 1,    
            'admin' => 100,
        ]
    ],
    'invoice' => [
        'status' => [
            'cho_duyet' => 1,
            'dang_xu_ly' => 2,
            'dang_giao_hang' => 3,
            'da_giao_hang' => 4,
            'da_huy' => 5,
            'chuyen_hoan' => 6,
        ]
    ],
    'product_order_by' => [
        1 => "Price: Low to High",
        2 => "Price: High to Low",
    ],
];

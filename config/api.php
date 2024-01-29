<?php
   
return [

    // KYC 
    'kyc' => [
        //API Headers 
        'headers' => [
            'content_type' =>  'application/json',
            'accept' => 'application/json',
            'authorization' =>  env('AUTH_KEY')
        ],
        //Unique key for Brands (This is just for now , we will discuss this with client)
        'brands_unique_key' => [
            0 => 'orcapay',
            1 => 'canapay'
        ]
    ],

    'admin' => [
        //API Headers 
        'headers' => [
            'content_type' =>  'application/json',
            'accept' => 'application/json'
        ],
       
    ],

    'status' => [
        'active' => '1',
        'deactive' => '0',
    ]
];

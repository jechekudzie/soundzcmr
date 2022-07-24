<?php

$streaming_platforms = [

    [
        'name'=>'Free',
        'price'=>0.00,
        'duration'=>12,
        'duration_days'=>360,
        'has_ads'=>1,
        'created_at'=>now(),
        'updated_at'=>now()
    ],

    [
        'name'=>'Standard',
        'price'=>3000.00,
        'duration'=>3,
        'duration_days'=>90,
        'has_ads'=>0,
        'created_at'=>now(),
        'updated_at'=>now()
    ],

    [
        'name'=>'Premium',
        'price'=>6000.00,
        'duration'=>6,
        'duration_days'=>180,
        'has_ads'=>0,
        'created_at'=>now(),
        'updated_at'=>now()
    ],



];
return $streaming_platforms;

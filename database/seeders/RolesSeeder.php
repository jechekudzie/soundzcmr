<?php

$roles = [
    [
        'name'=>'System Admin',
        'description'=>'Have Access to all the system and maintains and updates system modules',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Customer',
        'description'=>'general access to subscribed content ',
        'created_at'=>now(),
        'updated_at'=>now()
    ],

    [
        'name'=>'Artist',
        'description'=>'general access to subscribed content .',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Curator',
        'description'=>'manages content.',
        'created_at'=>now(),
        'updated_at'=>now()
    ],

];
return $roles;

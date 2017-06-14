<?php
return [
    'names' => [
        0 => '农作物',
        1 => '积分兑换',
        2 => '土地鱼塘',
        3 => '农作物消耗品',
        4 => '管家',
        5 => '管家粮食'
    ],
    'fields' => [
        0 => [
            'expired' => [
                'name' => '生长周期（天）',
                'desc' => '生成周期',
                'unit' => '天'
            ],
            'income' => [
                'name' => '每天收益',
                'desc' => '每天收益',
                'unit' => ''
            ],
            'price' => [
                'name' => '金币',
                'desc' => '金币',
                'unit' => '个'
            ]
        ],
        1 => [
            'price' => [
                'name' => '金币',
                'desc' => '金币'
            ],
            'integral' => [
                'name' => '积分',
                'desc' => '积分'
            ]
        ],
        2 => [
            'price' => [
                'name' => '金币',
                'desc' => '金币'
            ],
            'count' => [
                'name' => '增加几块',
                'desc' => '增加土地'
            ]
        ],
        4 => [
            'price' => [
                'name' => '金币',
                'desc' => '金币'
            ]
        ],
        5 => [
            'price' => [
                'name' => '金币',
                'desc' => '金币'
            ],
            'expired' => [
                'name' => '有效时间',
                'desc' => '有效时间'
            ]
        ]
    ],
    'map' => [
        0 => \App\Common\Buy\Normally::class,
        1 => \App\Common\Buy\Integral::class,
        2 => \App\Common\Buy\MyExtend::class,
        4 => \App\Common\Buy\Farmer::class,
        5 => \App\Common\Buy\FarmerFood::class,
    ]

];
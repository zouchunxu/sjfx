<?php
return [
    'names' => [
        0 => '农作物',
        1 => '积分兑换',
        2 => '土地鱼塘',
        3 => '农作物消耗品',
        4 => '管家'
    ],
    'fields' => [
        0 => [
            'expired' => [
                'name' => '有效时间（小时）',
                'desc' => '有效时间'
            ],
            'income' => [
                'name' => '收益（120-130）',
                'desc' => '收益'
            ],
            'price' => [
                'name' => '金币',
                'desc' => '金币'
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
            'count' => [
                'name' => '增加几块'
            ]
        ],
        4 => [
            'price' => [
                'name' => '金币',
                'desc' => '金币'
            ]
        ]
    ],
    'map' => [
        0 => \App\Common\Buy\Normally::class,
        1 => \App\Common\Buy\Integral::class,
        4 => \App\Common\Buy\Far
    ]

];
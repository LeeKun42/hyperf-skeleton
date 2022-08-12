<?php
return [
    'enable' => [
        'discovery' => true,
        'register' => true,
    ],
    'consumers' => [],
    'providers' => [],
    'drivers' => [
        'nacos' => [
            'host' => '192.168.1.22',
            'port' => 8848,
            'username' => 'nacos',
            'password' => 'nacos',
            'guzzle' => [
                'config' => null,
            ],
            'group_name' => 'api',
            'namespace_id' => '3aa74d23-ed62-4acf-ba8e-af9bf0d464e5',// 命名空间ID
            'heartbeat' => 5,
            'ephemeral' => false,
        ],
    ],
];

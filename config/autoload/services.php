<?php
return [
    'enable' => [
        'discovery' => true,
        'register' => true,
    ],
    'consumers' => value(function () {
        $consumers = [];
        // 这里示例自动创建代理消费者类的配置形式，顾存在 name 和 service 两个配置项，这里的做法不是唯一的，仅说明可以通过 PHP 代码来生成配置
        // 下面的 FooServiceInterface 和 BarServiceInterface 仅示例多服务，并不是在文档示例中真实存在的
        $services = [
            'CalculatorService' => App\JsonRpc\CalculatorServiceInterface::class,
        ];
        foreach ($services as $name => $interface) {
            $consumers[] = [
                'name' => $name,
                'service' => $interface,
                'protocol' => 'jsonrpc',
                'registry' => [
                    'protocol' => 'nacos',
                    'address' => 'http://192.168.31.136:8848',
                ]
            ];
        }
        return $consumers;
    }),
    'providers' => [],
    'drivers' => [
        'nacos' => [
            'host' => '192.168.31.136',
            'port' => 8848,
            'username' => 'nacos',
            'password' => 'nacos',
            'guzzle' => [
                'config' => null,
            ],
            'group_name' => 'rpc',
            'namespace_id' => '613b450c-7902-47b5-9162-5e7c65a2eee0',// 命名空间ID
            'heartbeat' => 5,
            'ephemeral' => true,
        ],
    ],
];

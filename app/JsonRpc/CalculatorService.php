<?php


namespace App\JsonRpc;

use App\JsonRpc\CalculatorServiceInterface;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="CalculatorService", protocol="jsonrpc", server="jsonrpc", publishTo="nacos")
 */
class CalculatorService implements CalculatorServiceInterface
{
    public function add(int $a, int $b): int
    {
        // 这里是服务方法的具体实现
        return $a + $b;
    }
}
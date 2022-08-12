<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Exception\ApiException;
use App\Model\AdminUser;
use Carbon\Carbon;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Kafka\Producer;
use Hyperf\Logger\LoggerFactory;
use Psr\Log\LoggerInterface;

/**
 * @Controller(prefix="/index")
 */
class IndexController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(LoggerFactory $loggerFactory)
    {
        $this->logger = $loggerFactory->get('log', 'default');
    }

    /**
     * @RequestMapping(path="index", methods="get,post")
     */
    public function index(Producer $producer)
    {
        $method = $this->request->getMethod();
        $this->logger->info('test log', [111]);
        $user = AdminUser::where('id', 1)->first();
        return [
            'method' => $method,
            'datetime' => Carbon::now()->toDateTimeString(),
            'kafka' => config('database'),
        ];
    }

    /**
     * @RequestMapping(path="index2", methods="get")
     */
    public function index2(Cus $producer)
    {
        $method = $this->request->getMethod();
        $producer->send('test', $this->request->input('name'), 'name');

        return [
            'method' => $method,
            'datetime' => Carbon::now()->toDateTimeString(),
            'kafka' => config('kafka')
        ];
    }

    /**
     * @RequestMapping(path="login", methods="get,post")
     */
    public function login()
    {
        $method = $this->request->getMethod();
        $user = AdminUser::where('id', 1)->first();
        $token = auth()->login($user);
        return [
            'method' => $method,
            'token' => $token,
        ];
    }
}

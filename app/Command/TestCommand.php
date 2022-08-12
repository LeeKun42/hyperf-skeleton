<?php

declare(strict_types=1);

namespace App\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;
use Swoole\Coroutine;
use Swoole\Runtime;
use function Swoole\Coroutine\run;

/**
 * @Command
 */
#[Command]
class TestCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    protected $signature = 'test:test';

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct();
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Demo Command');
    }

    public function handle()
    {
//        Runtime::enableCoroutine();
//        $this->line('Coroutine begin', 'info');
//        $s = microtime(true);
//        co(function() {
//            for ($c = 100; $c--;) {
//                Coroutine::create(function () {
//                    for ($n = 100; $n--;) {
//                        echo '123'."\r\n";
//                    }
//                });
//            }
//        });
//        echo 'use ' . (microtime(true) - $s) . ' s'."\r\n";
//        $this->line('Coroutine end', 'info');
//        $this->line(strtotime(date('Y-m-d', strtotime('+1day')). ' 00:00:00'), 'info');
//        $this->line(date('Y-m-d H:i:s', 1657987200), 'info');
//        $this->line('abcdefgh', 'info');
//        $this->line(strrev('abcdefgh'), 'info');
//        var_dump(str_split('abcdefgh', 3));
//        var_dump(str_contains('abcdefgh', 'ed'));
//        var_dump(strpos('abcDefghD', 'd'));
//        var_dump(strrpos('abcdefghD', 'd'));
//        var_dump(strripos('abcdefghD', 'd'));
//        $str = 'you have a apple,eat Apple';
//        var_dump(str_replace('apple', 'dog',$str));
//        var_dump(str_ireplace('apple', 'dog',$str));
//        var_dump(str_pad('apple', 10, '0', STR_PAD_LEFT));
//        var_dump(str_shuffle($str));
//        $arr = [1, 2, 3, 4, 5, 2, 2, 3];
//        var_dump($arr);

//        $ret = array_slice($arr,0, 3);
//        var_dump($arr);
//        var_dump(shuffle($arr));
//
//        var_dump($arr);
//        var_dump(array_shift($arr));
//        var_dump($arr);
//        var_dump(array_push($arr, 6));
//        var_dump($arr);
//        $arr = array_unique($arr);
//        $arr2 = [1,3,5];
//        var_dump(array_intersect($arr, $arr2));
//        var_dump(array_diff($arr, $arr2));
//        $a = 5;
//        $b = 8;
//        $a = $a ^ $b;
//        var_dump('$a='.$a.',$b='.$b );
//        $b = $b ^ $a;
//        var_dump('$a='.$a.',$b='.$b );
//        $a = $a ^ $b;
//        var_dump('$a='.$a.',$b='.$b );
        $total = 20*100; //20元
        $count = 20;
        var_dump($this->genPack($total, $count));
    }

    public function genPack($total, $count)
    {
        $avg = intval($total / 20);
        $min = 1;
        $ret = [];
        $remaining = $total;
        for ($i=0; $i<$count; $i++){
            if ($i===$count-1){
                $ret[] = $remaining;
            }else{
                $num = rand($min , $avg*2);
                $remaining = $remaining - $num;
                $ret[] = $num;
                $avg = intval($remaining / 20);
            }
        }
        return $ret;
    }
}

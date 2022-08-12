<?php

declare(strict_types=1);

namespace App\Kafka\Consumer;

use Hyperf\Kafka\AbstractConsumer;
use Hyperf\Kafka\Annotation\Consumer;
use longlang\phpkafka\Consumer\ConsumeMessage;

///**
// * @Consumer(topic="test", groupId="hyperf", autoCommit=true, nums=1)
// */
//#[Consumer(topic: 'test', groupId: 'hyperf', autoCommit: true, nums: 1)]
class KafkaConsumer extends AbstractConsumer
{
    public function consume(ConsumeMessage $message)
    {
        var_dump($message->getKey() . '=>' . $message->getValue());
    }
}

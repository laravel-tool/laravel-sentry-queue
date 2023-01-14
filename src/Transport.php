<?php

namespace LaravelTool\LaravelSentryQueue;

use GuzzleHttp\Promise\PromiseInterface;
use LaravelTool\LaravelSentryQueue\Jobs\SendJob;
use LaravelTool\LaravelSentryQueue\Transport\Promise;
use Sentry\Event;
use Sentry\Transport\TransportInterface;

class Transport implements TransportInterface
{
    public function send(Event $event): PromiseInterface
    {
        dispatch(new SendJob($event));

        return new Promise;
    }

    public function close(?int $timeout = null): PromiseInterface
    {
        return new Promise;
    }
}

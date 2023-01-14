<?php

namespace LaravelTool\LaravelSentryQueue\Transport;

use GuzzleHttp\Promise\PromiseInterface;

class Promise implements PromiseInterface
{

    public function then(callable $onFulfilled = null, callable $onRejected = null)
    {
        // TODO: Implement then() method.
    }

    public function otherwise(callable $onRejected)
    {
        // TODO: Implement otherwise() method.
    }

    public function getState()
    {
        // TODO: Implement getState() method.
    }

    public function resolve($value)
    {
        // TODO: Implement resolve() method.
    }

    public function reject($reason)
    {
        // TODO: Implement reject() method.
    }

    public function cancel()
    {
        // TODO: Implement cancel() method.
    }

    public function wait($unwrap = true)
    {
        // TODO: Implement wait() method.
    }
}

<?php

namespace LaravelTool\LaravelSentryQueue\Transport;

use GuzzleHttp\Promise\PromiseInterface;

class Promise implements PromiseInterface
{

    public function then(?callable $onFulfilled = null, ?callable $onRejected = null): PromiseInterface
    {
        return $this;
    }

    public function otherwise(callable $onRejected): PromiseInterface
    {
        return $this;
    }

    public function getState(): string
    {
        return '';
    }

    public function resolve($value): void
    {
        // TODO: Implement resolve() method.
    }

    public function reject($reason): void
    {
        // TODO: Implement reject() method.
    }

    public function cancel(): void
    {
        // TODO: Implement cancel() method.
    }

    public function wait($unwrap = true)
    {
        // TODO: Implement wait() method.
    }
}

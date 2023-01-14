<?php

namespace LaravelTool\LaravelSentryQueue;

use Sentry\Options;
use Sentry\Transport\TransportFactoryInterface;
use Sentry\Transport\TransportInterface;

class TransportFactory implements TransportFactoryInterface
{
    public function create(Options $options): TransportInterface
    {
        return new Transport();
    }
}

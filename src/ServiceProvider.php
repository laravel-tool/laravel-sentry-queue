<?php

namespace LaravelTool\LaravelSentryQueue;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Sentry\ClientBuilderInterface;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sentry_queue.php', 'sentry_queue');

        $this->app->resolving(ClientBuilderInterface::class, function (ClientBuilderInterface $clientBuilder) {
            $clientBuilder->setTransportFactory(new TransportFactory());
        });
    }
}

<?php

namespace LaravelTool\LaravelSentryQueue\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Sentry\Client;
use Sentry\ClientBuilder;
use Sentry\Event;
use Throwable;

class SendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected const LARAVEL_SPECIFIC_OPTIONS = [
        'tracing',
        'breadcrumbs',
        'integrations',
        'breadcrumbs.sql_bindings',
        'controllers_base_namespace',
    ];

    public function __construct(
        protected Event $event
    ) {
        $this->onQueue(config('sentry_queue.queue_name'));
    }

    public function handle()
    {
        try {
            $this->getClient()->captureEvent($this->event);
        } catch (Throwable) {

        }
    }

    public function getClient(): Client
    {
        $clientBuilder = ClientBuilder::create($this->getOptions());
        return $clientBuilder->getClient();
    }

    protected function getOptions(): array
    {
        $basePath = base_path();
        $userConfig = $this->getUserConfig();

        foreach (static::LARAVEL_SPECIFIC_OPTIONS as $laravelSpecificOptionName) {
            unset($userConfig[$laravelSpecificOptionName]);
        }

        $options = \array_merge(
            [
                'prefixes' => [$basePath],
                'in_app_exclude' => ["{$basePath}/vendor"],
            ],
            $userConfig
        );

        // When we get no environment from the (user) configuration we default to the Laravel environment
        if (empty($options['environment'])) {
            $options['environment'] = app()->environment();
        }

        return $options;
    }

    protected function getUserConfig(): array
    {
        $config = app('config')['sentry'];

        return empty($config) ? [] : $config;
    }
}

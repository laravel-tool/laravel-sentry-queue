# Laravel Sentry via Queue
# CAUTION
This package replace Transport for sending via Queue, use "AS IS".
# INSTALLATION
```bash
composer require laravel-tool/laravel-sentry-queue
```
# CONFIGURE
```php
return [
    'queue_name' => env('SENTRY_QUEUE_NAME'), // Queue name
];
```


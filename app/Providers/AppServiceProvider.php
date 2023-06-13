<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\YourInterface;
use App\YourConcreteImplementation;
use Illuminate\Support\Facades\Event;
use App\Events\SomeEvent;
use App\Listeners\SomeListener;
use App\Http\Middleware\YourMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(YourInterface::class, YourConcreteImplementation::class);

    }

    public function boot(): void
    {
        Event::listen(SomeEvent::class, SomeListener::class);


        $this->app['router']->aliasMiddleware('your_middleware', YourMiddleware::class);

        $this->configureAdditionalSettings();
    }

    private function configureAdditionalSettings(): void
    {
        // Coloque aqui qualquer configuração adicional que você precise
        // por exemplo, configurar conexões de banco de dados, serviços externos, etc.
    }
}

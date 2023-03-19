<?php

namespace InboundAsia\Starter;

use Illuminate\Support\ServiceProvider;
use InboundAsia\Starter\Commands\LaravelStarterCommand;

class LaravelStarterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                LaravelStarterCommand::class,
            ]);
        }
    }
}

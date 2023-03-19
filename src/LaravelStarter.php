<?php

namespace InboundAsia\Starter;

use Illuminate\Support\Facades\Facade;

class LaravelStarter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \InboundAsia\LaravelStarter\LaravelStarter::class;
    }
}
<?php

namespace Nihilsen\LaravelBladeTerse\Tests;

use Nihilsen\LaravelBladeTerse\LaravelBladeTerseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelBladeTerseServiceProvider::class,
        ];
    }
}

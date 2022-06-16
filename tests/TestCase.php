<?php

namespace Nihilsen\LaravelBladeTerse\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Nihilsen\LaravelBladeTerse\LaravelBladeTerseServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelBladeTerseServiceProvider::class,
        ];
    }
}

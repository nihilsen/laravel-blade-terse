<?php

namespace Nihilsen\LaravelBladeTerse;

use Nihilsen\LaravelBladeTerse\View\Compilers\TerseTagCompiler;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBladeTerseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('laravel-blade-terse');
    }

    public function packageBooted()
    {
        // Register the terse tag precompiler
        if (method_exists($this->app['blade.compiler'], 'precompiler')) {
            $this->app['blade.compiler']->precompiler(function ($string) {
                return app(TerseTagCompiler::class)->compile($string);
            });
        }
    }
}

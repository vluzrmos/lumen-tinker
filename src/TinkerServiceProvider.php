<?php

namespace Vluzrmos\Tinker;

use Illuminate\Support\ServiceProvider;

/**
 * Class TinkerServiceProvider.
 */
class TinkerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            TinkerCommand::class,
        ]);
    }
}

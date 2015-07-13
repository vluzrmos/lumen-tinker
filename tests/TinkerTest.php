<?php

namespace Vluzrmos\Tinker\Testing;

use Vluzrmos\Tinker\TinkerShell;

class TinkerTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function itShouldRegisterTheProvider()
    {
        $this->app->register('Vluzrmos\Tinker\TinkerServiceProvider');

        $console = $this->app->make('Illuminate\Contracts\Console\Kernel');

        $tinker = new TinkerShell($console);

        $shell = $tinker->getShell();

        $this->assertInstanceOf('Psy\Shell', $shell);
    }
}

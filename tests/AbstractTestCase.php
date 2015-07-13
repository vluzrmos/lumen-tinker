<?php

namespace Vluzrmos\Tinker\Testing;

use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase;

/**
 * Class AbstractTestCase.
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * @return Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap.php';
    }
}

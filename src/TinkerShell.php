<?php

/*
 * This is a partial modification of Illuminate\Framework
 * and that is licenced by MIT License (MIT)
 * Copyright (c) <Taylor Otwell>
 */

namespace Vluzrmos\Tinker;

use Illuminate\Contracts\Console\Kernel as Console;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Laravel\Lumen\Application;
use Psy\Configuration;
use Psy\Shell;

/**
 * Class TinkerShell.
 */
class TinkerShell
{
    /**
     * Lumen Console Kernel.
     * @var \Laravel\Lumen\Console\Kernel
     */
    protected $console;

    /**
     * PsySH Shell.
     * @var Shell
     */
    protected $shell;

    /**
     * artisan commands to include in the tinker shell.
     *
     * @var array
     */
    protected $commandWhiteList = [
        'migrate',
    ];

    /**
     * @param Console $console
     */
    public function __construct(Console $console)
    {
        $this->console = $console;
    }

    /**
     * Set files that should be included on shell.
     *
     * @param $include
     * @return $this
     */
    public function setIncludes($include)
    {
        $this->getShell()->setIncludes($include);

        return $this;
    }

    /**
     * Get instance of the Shell.
     * @return \Psy\Shell
     */
    public function getShell()
    {
        if (! $this->shell) {
            $config = new Configuration();

            $config->getPresenter()->addCasters(
                $this->getCasters()
            );

            $this->shell = new Shell($config);

            $this->shell->addCommands($this->getCommands());
        }

        return $this->shell;
    }

    /**
     * Get an array of Laravel tailored casters.
     *
     * @return array
     */
    protected function getCasters()
    {
        return [
            Application::class => 'Vluzrmos\Tinker\TinkerCaster::castApplication',
            Collection::class => 'Vluzrmos\Tinker\TinkerCaster::castCollection',
            Model::class => 'Vluzrmos\Tinker\TinkerCaster::castModel',
        ];
    }

    /**
     * Get artisan commands to pass through to PsySH.
     *
     * @return array
     */
    protected function getCommands()
    {
        $commands = [];

        foreach ($this->console->all() as $name => $command) {
            if (in_array($name, $this->commandWhiteList)) {
                $commands[] = $command;
            }
        }

        return $commands;
    }

    /**
     * Run the shell.
     */
    public function run()
    {
        $this->getShell()->run();
    }
}

<?php

/*
 * This is a partial modification of Illuminate\Framework
 * and that is licenced by MIT License (MIT)
 * Copyright (c) <Taylor Otwell>
 */

namespace Vluzrmos\Tinker;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class TinkerCommand.
 */
class TinkerCommand extends Command
{
    /**
     * Command Name.
     * @var string
     */
    protected $name = 'tinker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interact with your application';

    protected $shell;

    public function __construct(TinkerShell $shell)
    {
        parent::__construct();

        $this->shell = $shell;
    }

    /**
     *  Performs the event.
     */
    public function fire()
    {
        $this->getApplication()->setCatchExceptions(false);

        $this->shell->setIncludes($this->argument('include'))->run();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['include', InputArgument::IS_ARRAY, 'Include file(s) before starting tinker'],
        ];
    }
}

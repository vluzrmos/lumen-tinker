<?php

/*
 * This is a partial modification of Illuminate\Framework
 * and that is licenced by MIT License (MIT)
 * Copyright (c) <Taylor Otwell>
 */

namespace Vluzrmos\Tinker;

use Illuminate\Console\Command;
use Psy\Configuration;
use Psy\Shell;
use Symfony\Component\Console\Input\InputArgument;
use Vluzrmos\Tinker\Presenters\EloquentModelPresenter;
use Vluzrmos\Tinker\Presenters\LumenApplicationPresenter;
use Vluzrmos\Tinker\Presenters\IlluminateCollectionPresenter;

class TinkerCommand extends Command{

	/**
	 * Command Name
	 * @var string
	 */
	protected $name = "tinker";

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Interact with your application";

	/**
	 * artisan commands to include in the tinker shell.
	 *
	 * @var array
	 */
	protected $commandWhitelist = [
		'clear-compiled', 'down', 'env', 'inspire', 'migrate', 'optimize', 'up',
	];

	/**
	 *  Performs the event
	 */
	public function fire()
	{
		$this->getApplication()->setCatchExceptions(false);

		$config = new Configuration;

		$config->getPresenterManager()->addPresenters(
			$this->getPresenters()
		);

		$shell = new Shell($config);
		$shell->addCommands($this->getCommands());
		$shell->setIncludes($this->argument('include'));

		$shell->run();
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

	/**
	 * Get an array of Laravel tailored Presenters.
	 *
	 * @return array
	 */
	protected function getPresenters()
	{
		return [
			new EloquentModelPresenter,
			new IlluminateCollectionPresenter,
			new LumenApplicationPresenter,
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

		foreach ($this->getApplication()->all() as $name => $command)
		{
			if (in_array($name, $this->commandWhitelist)) $commands[] = $command;
		}

		return $commands;
	}
}

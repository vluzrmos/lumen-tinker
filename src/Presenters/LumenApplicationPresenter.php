<?php

/*
 * This is a partial modification of Illuminate\Framework
 * and that is licenced by MIT License (MIT)
 * Copyright (c) <Taylor Otwell>
 */

namespace Vluzrmos\Tinker\Presenters;

use Exception;
use ReflectionClass;
use Psy\Presenter\ObjectPresenter;
use Laravel\Lumen\Application;

class LumenApplicationPresenter extends ObjectPresenter {

	/**
	 * Lumen Application methods to include in the presenter.
	 *
	 * @var array
	 */
	protected static $appProperties = [
		'environment',
		'version',
		'basePath',
		'databasePath',
		'storagePath',
		'isDownForMaintenance'
	];

	/**
	 * Determine if the presenter can present the given value.
	 *
	 * @param  mixed  $value
	 * @return bool
	 */
	public function canPresent($value)
	{
		return $value instanceof Application;
	}

	/**
	 * Get an array of Application object properties.
	 *
	 * @param  object  $value
	 * @param  \ReflectionClass  $class
	 * @param  int  $propertyFilter
	 * @return array
	 */
	public function getProperties($value, ReflectionClass $class, $propertyFilter)
	{
		$properties = [];

		foreach (self::$appProperties as $property)
		{
			try
			{
				$val = $value->$property();

				if ( ! is_null($val)) $properties[$property] = $val;
			}
			catch (Exception $e)
			{
				//
			}
		}

		return $properties;
	}

}

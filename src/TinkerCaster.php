<?php

/*
 * This is a partial modification of Illuminate\Framework
 * and that is licenced by MIT License (MIT)
 * Copyright (c) <Taylor Otwell>
 */

namespace Vluzrmos\Tinker;

use Exception;
use Illuminate\Support\Collection;
use Laravel\Lumen\Application;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Caster\Caster;

/**
 * Class TinkerCaster.
 */
class TinkerCaster
{
    /**
     * Illuminate application methods to include in the presenter.
     *
     * @var array
     */
    private static $appProperties = [
        'environment',
        'basePath',
        'databasePath',
        'resourcePath',
        'storagePath',
        'version',
        'getRoutes',
    ];

    /**
     * Get an array representing the properties of an application.
     *
     * @param  \Laravel\Lumen\Application  $app
     * @return array
     */
    public static function castApplication(Application $app)
    {
        $results = [];
        foreach (self::$appProperties as $property) {
            try {
				if (method_exists($app, $property)) {
					$val = $app->$property();
					
					if (! is_null($val)) {
						$results[Caster::PREFIX_VIRTUAL.$property] = $val;
					}
				}
            } catch (Exception $e) {
                //
            }
        }

        return $results;
    }

    /**
     * Get an array representing the properties of a collection.
     *
     * @param \Illuminate\Support\Collection $collection
     * @return array
     */
    public static function castCollection(Collection $collection)
    {
        return [
            Caster::PREFIX_VIRTUAL.'all' => $collection->all(),
        ];
    }

    /**
     * Get an array representing the properties of a model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return array
     */
    public static function castModel(Model $model)
    {
        $attributes = array_merge(
            $model->getAttributes(),
            $model->getRelations()
        );

        $visible = array_flip(
            $model->getVisible() ?: array_diff(array_keys($attributes), $model->getHidden())
        );

        $results = [];

        foreach (array_intersect_key($attributes, $visible) as $key => $value) {
            $results[(isset($visible[$key]) ? Caster::PREFIX_VIRTUAL : Caster::PREFIX_PROTECTED).$key] = $value;
        }

        return $results;
    }
}

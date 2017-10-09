<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Traits;

trait AuthenticatesWithFirebase
{
	/**
	 * @var array | Events
	 *
	 * Maps Eloquent events to Trait methods
	 */
	protected $dispatchesEvents = [
		'created' => 'createItem',
		'deleted' => 'deleteItem',
		'updating' => 'updateItem',
		'saving' => 'saveItem'
	];

	/**
	 * Set up listeners for all Item Types.
	 * Named events are mapped to trait methods in $dispatchedEvents array above
	 *
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();

		foreach(static::getModelEvents() as $event) {
			static::$event(function($item) use ($event){
				$item = static::$dispatchesEvents[$event];
				$item->action($item);
			});
		}
	}

	/**
	 * Retrieve events the model needs listeners for.
	 *
	 * @return array
	 */
	protected static function getModelEvents()
	{
		if(isset(static::$ModelEvents)) {
			return static::$modelEvents;
		}
		return [
			'created', 'deleted', 'updating', 'saving'
		];
	}

	public function createItem($item)
    {
        //runs when created event is dispatched
    }

    public function updateItem($item)
    {
        //runs when updating event is dispatched
    }

    public function saveItem($item)
    {
        //runs when saving event is dispatched
    }

    public function deleteItem($item)
    {
        //runs when deleted event is dispatched
    }
}
<?php

echo 'A simple PHP Hooks system for registering hookable events, adding callbacks to registered events, and running callback associated with registered events.';

/**
 * Hooks.php | A simple system for:
 * 1. Registering hookable events,
 * 2. Adding callbacks to registered events, 
 * 3. Running callbacks associated with a registered event
 * 
 * @version 0.1.0
 * @link https://github.com/WyattCast44/Hooks
 * @todo 1. Add way to specify event action running order
 * 
 */

class Hooks
{
	/**
	 * Holds the class instance
	 */
	private static $instance = null;
	
	/**
	 * Holds all the registered events and their associated
	 * callbacks
	 */
	private $hookable_events = [];

	/**
	 * Adds a hookable event to $hookable_events
	 * @param string $event_handle: The name of the event you wish to register
	 */
	public function add_hookable_event(string $event_handle)
	{
		if ( !array_key_exists($event_handle, $this->hookable_events) ) :
			$this->hookable_events[$event_handle] = [];
		endif;
	}

	/**
	 * Adds a callback to a registered event
	 * @param string $event_handle: The name of the event you wish to register
	 * @param string $callback_name: The name of the callback you wish to associate with the event
	 * @param string $autoCreateEventIfNotExists: Optional, Default: true
	 * @throws Exception
	 */
	public function add_action(string $event_handle, string $callback_name, bool $autoCreateEventIfNotExists = true)
	{
		if ( array_key_exists($event_handle, $this->hookable_events) ) :
			array_push($this->hookable_events[$event_handle], $callback_name);
		else:
			if ($autoCreateEventIfNotExists) :
				$this->add_hookable_event($event_handle);
				$this->add_action($event_handle, $callback_name);
			else:
				throw new Exception("Error add_action cannot add callbacks to: " . $event_handle . '. Event not registered.', 1);
			endif;			
		endif;
	}

	/**
	 * Adds a callback to a registered event
	 * @param string $event_handle: The name of the event you wish to register
	 */
	public function get_event_hooks(string $event_handle)
	{
		if ( array_key_exists($event_handle, $this->hookable_events) ) :
			return $this->hookable_events[$event_handle];
		endif;
		return [];
	}

	/**
	 * Runs all valid callbacks associated with a registered event
	 * @param string $event_handle: The name of the event you wish to run the actions for
	 */
	public function run_actions(string $event_handle)
	{
		if ( array_key_exists($eventName, $this->hookableEvents) ) {
			$hooks = $this->getEventHooks($eventName);
			foreach ($hooks as $callback) {
				if (function_exists($callback)) {
					call_user_func($callback);
				}
			}
		}
	}
	
	/**
	 * Returns instance of class
	 */
	public static function getInstance()
	{
		if ( self::$instance === null )
		{
			self::$instance = new self;
		}
		return self::$instance;
	}
}

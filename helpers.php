<?php

require_once 'Hooks.php';

/**
 * Add a hookable event
 */
function add_hookable_event(string $event_handle)
{
	Hooks::getInstance()->add_hookable_event($event_handle);
}

/**
 * Add callbacks to a registered event
 */
function add_action(string $event_handle, string $callback_name, bool $autoCreateEventIfNotExists = true)
{
	Hooks::getInstance()->add_action($event_handle, $callback_name, $autoCreateEventIfNotExists);
}

/**
 * Get an array of all callback names for a registered event
 * @return array
 */
function get_event_hooks(string $event_handle)
{
	return Hooks::getInstance()->get_event_hooks($event_handle);
}

/**
 * Runs all the callbacks registered to an event
 * @return array
 */
function run_actions(string $event_handle)
{
	Hooks::getInstance()->run_actions($event_handle);
}
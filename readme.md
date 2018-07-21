# Hooks.php
A simple PHP Hooks system for registering hookable events, adding callbacks to registered events, and running callback associated with registered events.

# Usage
You can use the Hooks class directly or by using some of the helper functions in helper.php

## Using Directly

Step 1. Add Hookable Event

```php
// Method 1
Hooks::getInstance()->add_hookable_event('header');
// Method 2
$hooks = Hooks::getInstance();
$hooks->add_hookable_event('header');
```

Step 2. Add some callbacks to the event

```php
// Method 1
Hooks::getInstance()->add_action('header', 'myFunction'); // Where myFunction is a valid function
Hooks::getInstance()->add_action('header', 'include_css'); // Where include_css is a valid function
// Method 2
$hooks = Hooks::getInstance();
$hooks->add_action('header', 'myFunction'); // Where myFunction is a valid function
$hooks->add_action('header', 'include_css'); // Where include_css is a valid function
```

Step 3. Run the callbacks associated with the event

```php
// Method 1
Hooks::getInstance()->run_actions('header');
// Method 2
$hooks = Hooks::getInstance();
$hooks->->run_actions('header')
```

## Using the Helpers

Step 1. Add Hookable Event

```php
add_hookable_event('footer');
```

Step 2. Add some callbacks to the event

```php
add_action('footer', 'myFunction'); // Where myFunction is a valid function
```

Step 3. Run the callbacks associated with the event

```php
run_actions('footer');
```

# To Do
- Add a way to specify the running order of actions registered to an event
- Maybe tags like: run_after, run_before, run_first, run_last?
- Make a way to call a callback with an array of data 
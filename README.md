Ratchetio
=========

Ratchetio Component is the way to integrate [ratchet.io](http://ratchet.io/) service with your Yii application.
Ratchet.io aggregates and analyzes your application errors and deploys.

Installation
------------

1. Download [ratchetio.php](https://raw.github.com/ratchetio/ratchetio-php/master/ratchetio.php)
   and put it in the same directory where `RatchetioComponent.php` and `RatchetioErrorHandler.php` are.
   For example, `protected/extensions/yiiext/components/RatchetioComponent`.

2. Add `ratchetio` component to the `main.php` config:

```php
// ...
'components' => array(
	// ...
	'ratchetio'=>array(
		'class' => 'ext.yiiext.components.RatchetioComponent', // adjust path if needed
		'accessToken' => 'your_serverside_ratchetio_token',
	),
),
```

3. Adjust `main.php` config to preload the component:

```php
'preload'=>array('log', 'ratchetio'),
```

4. Set `RatchetioErrorHandler` as error handler:

```php
'components' => array(
	// ...
	'errorHandler'=>array(
		'class'=>'ext.yiiext.components.ratchetio.RatchetioErrorHandler',
		// ...
	),
),
```

You can also pass some additional ratchet.io options in the component config:
`environment`, `branch`, `maxErrno`, `baseApiUrl` etc.

A good idea is to specify `environment` as:

```php
'environment' => isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'cli_'.php_uname("n"),
```

You can specify alias of your project root directory for linking stack traces (`'application'` by default):
```php
'rootAlias' => 'root',
```
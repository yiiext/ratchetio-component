Ratchetio
=======================

Ratcherio Component is the way to integrate [ratchet.io](http://ratchet.io/) service with our Yii app. NB: Ratchet monitors and analyzes your app's errors and deploys.

Installation
------------

0. Put `Ratchetio.php` you got after sign up on the service inside the `protected/extensions/yiiext/components/RatchetioComponent` directory.

1. Add ratchetio as a Yii component in the config:

  ~~~
  'ratchetio'=>array(
    'class' => 'ext.yiiext.components.RatchetioComponent',
    'accessToken' => 'your_ratchetio_token'
  ),
  ~~~

2. Make the component preloadable (in most cases log component is also preloaded in Yii app):

  `'preload'=>array('log', 'ratchetio'),`

3. Set RatchetioErrorHandler as error handler:

  ~~~
  'errorHandler'=>array(
    'class'=>'ext.yiiext.components.ratchetio.RatchetioErrorHandler',
    'errorAction'=>'site/error', # or some another value
  ),
  ~~~

You can also pass some additional ratchet.io options in the component config, such as `environment`, `branch`, `maxErrno` or `baseApiUrl` etc.

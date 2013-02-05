<?php
require_once 'ratchetio.php';

class RatchetioErrorHandler extends CErrorHandler
{
  protected function handleException($exception)
  {
    $ignored = ($exception instanceof CHttpException && $exception->statusCode == 404);
    if (!$ignored) {
      Ratchetio::report_exception($exception);
    }
    parent::handleException($exception);
  }
}

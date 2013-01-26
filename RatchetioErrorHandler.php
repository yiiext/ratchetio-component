<?php
Yii::import("ext.yiiext.components.ratchetio.Ratchetio");

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

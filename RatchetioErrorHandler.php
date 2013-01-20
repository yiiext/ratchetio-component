<?php
Yii::import("ext.yiiext.components.ratchetio.Ratchetio");

class RatchetioErrorHandler extends CErrorHandler
{
  protected function handleException($exception)
  {
    Ratchetio::report_exception($exception);
    parent::handleException($exception);
  }
}

<?php

namespace Acquia\Blt\Custom\Hooks;

use Acquia\Blt\Robo\BltTasks;

/**
 * Class ValidateAllCommandHook implements EdW specific validate.
 *
 * @package Acquia\Blt\Custom\Hooks
 */
class AllCommandHook extends BltTasks {

  /**
   * Override validate:all command.
   *
   * @see \Acquia\Blt\Robo\Commands\Validate\AllCommand::all()
   *
   * @hook replace-command validate
   */
  public function all() {
    $status_code = $this->invokeCommands([
      'validate:composer',
      'validate:lint',
      'validate:yaml',
      'validate:twig',
    ]);

    return $status_code;
  }

}

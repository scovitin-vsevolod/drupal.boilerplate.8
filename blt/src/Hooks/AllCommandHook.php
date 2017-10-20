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

  /**
   * Setup function.
   *
   * @see \Acquia\Blt\Robo\Commands\Setup\AllCommand::setup()
   *
   * @hook replace-command setup
   */
  public function setup() {
    $this->say("Setting up local environment for site '{$this->getConfigValue('site')}' using drush alias @{$this->getConfigValue('drush.alias')}");

    $commands = [
      'setup:build',
      'setup:hash-salt',
    ];

    if (isset($argv)) {
      var_dump($argv);
    }
    return;
    switch ($this->getConfigValue('setup.strategy')) {
      case 'install':
        $commands[] = 'setup:drupal:install';
        break;

      case 'sync':
        $commands[] = 'setup:refresh-db';
        break;

      case 'import':
        $commands[] = 'setup:import';
        $commands[] = 'setup:update';
        break;
    }

    $this->invokeCommands($commands);
  }

}

<?php

namespace Acquia\Blt\Custom\Commands;

use Acquia\Blt\Robo\BltTasks;

/**
 * Custom setup function for Custom setup function.
 */
class SetupCustomCommand extends BltTasks {

  /**
   * Refresh the project without db and files.
   *
   * @command setup:refresh
   */
  public function customRefreshNoDb() {
    $commands = [
      'setup:build',
      'setup:hash-salt',
      'setup:toggle-modules',
      'setup:config-import',
    ];

    $this->invokeCommands($commands);
  }

  /**
   * Refresh the project with db and files.
   *
   * @command setup:refresh-db
   */
  public function customRefreshDb() {
    $commands = [
      'setup:build',
      'setup:hash-salt',
      'sync:db',
      'setup:config-import',
      'setup:toggle-modules',
    ];

    $this->invokeCommands($commands);
  }

  /**
   * Refresh the project without db and files.
   *
   * @command deploy:refresh
   */
  public function deployRefresh() {
    $commands = [
      'setup:hash-salt',
      'setup:config-import',
      'setup:toggle-modules',
    ];

    $this->invokeCommands($commands);
  }

}

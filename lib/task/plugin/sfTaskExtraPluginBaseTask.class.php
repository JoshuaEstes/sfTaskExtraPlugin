<?php

/**
 * Plugin plugin base task.
 * 
 * @package     sfTaskExtraPlugin
 * @subpackage  task
 * @author      Kris Wallsmith <kris.wallsmith@symfony-project.com>
<<<<<<< HEAD
 * @version     SVN: $Id: sfTaskExtraPluginBaseTask.class.php 12756 2008-11-08 10:24:46Z Kris.Wallsmith $
=======
 * @version     SVN: $Id: sfTaskExtraPluginBaseTask.class.php 25037 2009-12-07 19:45:39Z Kris.Wallsmith $
>>>>>>> ba8708782531e237c25c55f198c7eacc5feee572
 */
abstract class sfTaskExtraPluginBaseTask extends sfPluginBaseTask
{
  /**
   * @see sfTaskExtraBaseTask
   */
  public function checkPluginExists($plugin, $boolean = true)
  {
<<<<<<< HEAD
    return sfTaskExtraBaseTask::checkPluginExists($plugin, $boolean);
=======
    return sfTaskExtraBaseTask::doCheckPluginExists($this, $plugin, $boolean);
>>>>>>> ba8708782531e237c25c55f198c7eacc5feee572
  }
}

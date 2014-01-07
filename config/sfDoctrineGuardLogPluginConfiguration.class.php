<?php

/**
 * sfDoctrineGuardLogPlugin configuration.
 * 
 * @package     sfDoctrineGuardLogPlugin
 * @subpackage  config
 * @author      adnen <adnen.chouibi@gmail.com>
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 07-01-2014 12:00:12 Adnen.Chouibi $
 */
class sfDoctrineGuardLogPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $this->dispatcher->connect('user.change_authentication', array('UserLoginHistoryTable', 'writeLoginHistory'));
  }
}

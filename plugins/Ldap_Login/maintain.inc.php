<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

include_once('class.ldap.php');

/**
 * This class is used to expose maintenance methods to the plugins manager
 * It must extends PluginMaintain and be named "PLUGINID_maintain"
 * where PLUGINID is the directory name of your plugin
 */
class Ldap_Login_maintain extends PluginMaintain
{
  /*
   * My pattern uses a single installation method, which handles both installation
   * and activation, where Piwigo always calls 'activate' just after 'install'
   * As a result I use a marker in order to not execute the installation method twice
   *
   * The installation function is called by main.inc.php and maintain.inc.php
   * in order to install and/or update the plugin.
   *
   * That's why all operations must be conditionned :
   *    - use "if empty" for configuration vars
   *    - use "IF NOT EXISTS" for table creation
   */
  private $installed = false;
  
  /**
   * plugin installation
   *
   * perform here all needed step for the plugin installation
   * such as create default config, add database tables,
   * add fields to existing tables, create local folders...
   */
  function install($plugin_version, &$errors=array())
  {
    global $conf;
    $config=new Ldap();
    
    if (file_exists(LDAP_LOGIN_PATH.'data.dat' )) {
    $config->load_config();
    }
    
    else {
    $config->load_default_config();
    }

    $config->save_config();

    $this->installed = true;
  }

  /**
   * plugin activation
   *
   * this function is triggered after installation, by manual activation
   * or after a plugin update
   * for this last case you must manage updates tasks of your plugin in this function
   */
  function activate($plugin_version, &$errors=array())
  {
    if (!$this->installed)
    {
      $this->install($plugin_version, $errors);
    }
  }
  
  function deactivate()
  {
  }

  function uninstall()
  {
  }

}
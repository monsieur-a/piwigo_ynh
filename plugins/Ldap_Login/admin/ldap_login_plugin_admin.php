<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
 
$me = get_plugin_data($plugin_id);
 
if (isset($_POST['submit']))
{
  $me->config['host'] = $_POST['HOST'];
  $me->config['basedn'] = $_POST['BASEDN'];
  $me->config['pref'] = $_POST['PREF'];
  $me->save_config();
}
 
global $template;
$template->set_filenames( array('plugin_admin_content' => dirname(__FILE__).'/ldap_login_plugin_admin.tpl') );
 
$template->assign('HOST', $me->config['host']);
$template->assign('BASEDN', $me->config['basedn']);
$template->assign('PREF', $me->config['pref']);
 
$template->assign_var_from_handle( 'ADMIN_CONTENT', 'plugin_admin_content');
?>
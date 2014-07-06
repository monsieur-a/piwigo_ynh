<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template;
$template->set_filenames( array('plugin_admin_content' => dirname(__FILE__).'/configuration.tpl') );
$template->assign(
  array(
    'PLUGIN_ACTION' => get_root_url().'admin.php?page=plugin-Ldap_Login-configuration',
    'PLUGIN_CHECK' => get_root_url().'admin.php?page=plugin-Ldap_Login-configuration',
    ));

$me = new Ldap();
$me->load_config();
//$me = get_plugin_data($plugin_id);

$template->assign('HOST', 	$me->config['host']);
$template->assign('BASEDN',	$me->config['basedn']); // racine !
$template->assign('PORT', 	$me->config['port']);
$template->assign('LD_ATTR',	$me->config['ld_attr']);
$template->assign('LD_USE_SSL',	$me->config['ld_use_ssl']);
$template->assign('LD_BINDPW',	$me->config['ld_bindpw']);
$template->assign('LD_BINDDN',	$me->config['ld_binddn']);

if (isset($_POST['save'])){
	$me->config['host'] 	 = $_POST['HOST'];
	$me->config['basedn']    = $_POST['BASEDN'];
	$me->config['port']      = $_POST['PORT'];
	$me->config['ld_attr']   = $_POST['LD_ATTR'];
	$me->config['ld_binddn'] = $_POST['LD_BINDDN'];
	$me->config['ld_bindpw'] = $_POST['LD_BINDPW'];

	if (isset($_POST['LD_USE_SSL'])){
		$me->config['ld_use_ssl'] = True;
	} else {
		$me->config['ld_use_ssl'] = False;
	}
}

// Save LDAP configuration
if (isset($_POST['save'])){
	$me->save_config();
}

// Check LDAP configuration
if (isset($_POST['check_ldap'])){
$check = $me->ldap_name($_POST['USERNAME']);
$error = $me->check_ldap();

	if ($me->ldap_bind_as($_POST['USERNAME'],$_POST['PASSWORD'])){
	$template->assign('LD_CHECK_LDAP','<p style="color:green;">Configuration LDAP OK : '.$check.'</p>');
	}
	else {
	$template->assign('LD_CHECK_LDAP','<p style="color:red;">Error :'.$error.' test '.$me->config['uri'].' '.$check.'</p>');
	}
}

$template->assign_var_from_handle( 'ADMIN_CONTENT', 'plugin_admin_content');
?>
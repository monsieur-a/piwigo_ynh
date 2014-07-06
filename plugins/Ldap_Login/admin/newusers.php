<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template;
$template->set_filenames( array('plugin_admin_content' => dirname(__FILE__).'/newusers.tpl') );
$template->assign(
  array(
    'PLUGIN_NEWUSERS' => get_root_url().'admin.php?page=plugin-Ldap_Login-newusers',
    ));

$me = new Ldap();
$me->load_config();
//$me = get_plugin_data($plugin_id);

$template->assign('ALLOW_NEWUSERS',	$me->config['allow_newusers']);
$template->assign('ADVERTISE_ADMINS',	$me->config['advertise_admin_new_ldapuser']);
$template->assign('SEND_CASUAL_MAIL',	$me->config['send_password_by_mail_ldap']);

if (isset($_POST['save'])){

	if (isset($_POST['ALLOW_NEWUSERS'])){
		$me->config['allow_newusers'] = True;
	} else {
		$me->config['allow_newusers'] = False;
	}
	
	if (isset($_POST['ADVERTISE_ADMINS'])){
		$me->config['advertise_admin_new_ldapuser'] = True;
	} else {
		$me->config['advertise_admin_new_ldapuser'] = False;
	}
	
	if (isset($_POST['SEND_CASUAL_MAIL'])){
		$me->config['send_password_by_mail_ldap'] = True;
	} else {
		$me->config['send_password_by_mail_ldap'] = False;
	}
}

// Save LDAP configuration
if (isset($_POST['save'])){
	$me->save_config();
}

// do we allow to create new piwigo users in case of auth along the ldap ?
// does he have to belong an ldap group ?
// does ldap groups give some power ?
// what do we do when there's no mail in the ldap ?
// do we send mail to admins ?

$template->assign_var_from_handle( 'ADMIN_CONTENT', 'plugin_admin_content');
?>
<?php
/*
Plugin Name: Ldap_Login
Version: 1.0.1
Description: Permet de se logger via une authentification ldap
Plugin URI: http://www.22decembre.eu
Author: 22decembre
Author URI:http://www.22decembre.eu
___________________________________

Language Name: Dansk [DK]
*/
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Alle LDAP-brugere kan om nødvendigt benytte deres LDAP-adgangskode over alt i Piwigo.';
$lang['New users when ldap auth is successfull'] = 'Nye bruger ved vellykket LDAP-autentifikation';
$lang['Ldap_Login Plugin'] = 'Ldap_Login Plugin';
$lang['Ldap_Login configuration'] = 'Opsætning af Ldap_Login';
$lang['Warning: LDAP Extension missing.'] = 'Advarsel: LDAP-udvidelse mangler.';

// ldap server connection

$lang['Ldap server host connection'] = 'LDAP-server';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Hvis tomt benyttes standard-protokolporte af programmellet.';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Hvis tomt benyttes localhost og standard-protokolporte i opsætningen.';
$lang['Ldap server host'] = 'LDAP-værtsadresse';
$lang['Secure connexion'] = 'Sikker forbindelse (ldaps)';
$lang['Ldap port'] = 'LDAP-port';

// ldap attributes

$lang['Ldap attributes'] = 'LDAP-attributer';
$lang['Base DN'] = 'Base DN hvor LDAP-brugerne findes (f.eks.: ou=users,dc=example,dc=com):';
$lang['Attribute corresponding to the user name'] = 'Attribut der svarer til brugernavnet';

// ldap connection credentials
$lang['Ldap connection credentials'] = 'LDAP-loginoplysninger';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Hvis LDAP accepterer anonyme logins, skal felterne være tomme.';
$lang['Bind DN, field in full ldap style'] = 'Bind DN på LDAP-form (f.eks.: cn=admin,dc=example,dc=com).';
$lang['Bind password'] = 'Bind-adgangskode';

// test and save

$lang['Username'] = 'Dit LDAP-brugernavn';
$lang['Your password'] = 'Din LDAP-adgangskode.';
$lang['Ldap_Login Test'] = 'Test af Ldap_Login';
$lang['You must save the settings with the Save button just up there before testing here.'] = 'Du skal gemme indstillingerne med knappen Gem herover, før du kan afprøve dem.';
$lang['Save'] = 'Gem';
$lang['Test Settings'] = 'Afprøv indstillingerne';

// new piwigo users

$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'Skal nye brugere modtage en mail på samme måde som tilfældige brugere?';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'Må Piwigo oprette nye brugere, når de med succes autentificeres i LDAP?';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Skal administratorerne have besked pr. mail i tilfælde af at nye brugere oprettes ved login via LDAP?';

$lang['Ldap filter :'] = 'LDAP-filter';
?>
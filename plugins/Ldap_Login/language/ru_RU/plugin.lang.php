<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['Base DN'] = 'Базовый DN для нахождения пользователей (например, ou=пользователи, dc=com):';
$lang['Bind DN, field in full ldap style'] = 'Привязка DN в стиле LDAP (например, cn=админ, dc=com).';
$lang['New users when ldap auth is successfull'] = 'Новый пользователь, успешно аутентифицированный в LDAP ';
$lang['Save'] = 'Сохранить';
$lang['Secure connexion'] = 'Безопасное соединение ( LDAPS )';
$lang['Test Settings'] = 'Проверка настроек';
$lang['Username'] = 'Введите имя пользователя LDAP ';
$lang['Warning: LDAP Extension missing.'] = 'Внимание: отсутствует расширение LDAP!';
$lang['You must save the settings with the Save button just up there before testing here.'] = 'Вы должны сохранить настройки, нажав на кнпку "Сохранить", и только затем переходить к проверке этих настроек.';
$lang['Your password'] = 'Ваш LDAP-пароль';
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Все пользователи LDAP могут использовать свой LDAP-пароль всюду на Piwigo, там где это необходимо.';
$lang['Attribute corresponding to the user name'] = 'Атрибут, соответствующий имени пользователя';
$lang['Bind password'] = 'Привязка пароля';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'Вы разрешаете создание нового пользователи Piwigo, если посетитель успешно верифицировался на LDAP?';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Хотите направлять админам сообщения, что произошло создание нового пользователя после его входа в LDAP?';
$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'Вы хотите отправить почту новым пользователям, как её получают обычные пользователи Piwigo?';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Если поле пустое, то локальный и стандартные порты протокола будут использоваться в конфигурации.';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Если поле пустое, то стандартный протокол портов будет использоваться программным обеспечением.';
$lang['Ldap attributes'] = 'Свойства LDAP';
$lang['Ldap connection credentials'] = 'Учетные данные подключения LDAP';
$lang['Ldap filter :'] = 'LDAP фильтр:';
$lang['Ldap port'] = 'LDAP порт';
$lang['Ldap server host'] = 'LDAP хост сервера';
$lang['Ldap server host connection'] = 'Подключение к серверу LDAP';
$lang['Ldap_Login Plugin'] = 'Плагин LDAP_Login';
$lang['Ldap_Login Test'] = 'Тест LDAP_Login';
$lang['Ldap_Login configuration'] = 'Конфигурация LDAP_Login';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Оставьте эти поля пустыми, если разрешается LDAP принимать анонимные подключения.';
?>
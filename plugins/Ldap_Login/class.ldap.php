<?php
global $conf;
class Ldap {
	var $cnx;
	var $config;

	// for debug
	public function write_log($message){
		@file_put_contents('/var/log/ldap_login.log',$message."\n",FILE_APPEND);
	}

	/**
	 * check ldap configuration
	 *
	 * Dans le cas ou l'acces au ldap est anonyme il faut impérativement faire une recherche
	 * pour tester la connection.
	 *
	 * When OpenLDAP 2.x.x is used, ldap_connect() will always return a resource as it does not actually connect
	 * but just initializes the connecting parameters. The actual connect happens with the next calls
	 * to ldap_* funcs, usually with ldap_bind().
	 */
	public function check_ldap(){

		if (!$this->ldap_conn()) {
			return $this->getErrorString();
		}

		// test du compte root si renseigné
		if (!empty($this->config['ld_binddn']) && !empty($this->config['ld_bindpw'])){ // if empty ld_binddn, anonymous search
			// authentication with rootdn and rootpw for search
			if (!$this->ldap_bind_as($this->config['ld_binddn'],$this->config['ld_bindpw'])){
				return $this->getErrorString();
			}
		} else {
			// sinon recherche du basedn (cf comportement ldap_connect avec OpenLDAP)
			if (!$this->ldap_check_basedn()){ // search userdn
				return $this->getErrorString();
			}
		}
		return true;
	}
	
	public function load_default_config()
	{
		$this->config['host'] = 'localhost';
		$this->config['basedn'] = 'ou=people,dc=example,dc=com'; // racine !
		$this->config['port'] = ''; // if port is empty, I count on the software to care of it !
		$this->config['ld_attr'] = 'uid';
		$this->config['ld_use_ssl'] = False;
		$this->config['ld_bindpw'] ='';
		$this->config['ld_binddn'] ='';
		
		$this->config['allow_newusers'] = False;
		$this->config['advertise_admin_new_ldapuser'] = False;
		$this->config['send_password_by_mail_ldap'] = False;
	}
	
	function load_config() {
		// first we load the base config
		$conf_file = @file_get_contents( LDAP_LOGIN_PATH.'data.dat' );
		if ($conf_file!==false)
		{
			$this->config = unserialize($conf_file);
		}
	}

	function save_config()
	{
		$file = fopen( LDAP_LOGIN_PATH.'/data.dat', 'w' );
		fwrite($file, serialize($this->config) );
		fclose( $file );
	}

	function ldap_admin_menu($menu)
	{
		array_push($menu,
		array(
		'NAME' => 'Ldap Login',
		'URL' => get_admin_plugin_menu_link(LDAP_LOGIN_PATH.'/admin.php') )
		);
		return $menu;
	}

	public function ldap_conn(){
		if ($this->config['ld_use_ssl'] == 1){
			if (empty($this->config['port'])){
				$this->config['uri'] = 'ldaps://'.$this->config['host'];
			}
			else {
			$this->config['uri'] = 'ldaps://'.$this->config['host'].':'.$this->config['port'];
			}
		}
		
		// now, it's without ssl
		else {
			if (empty($this->config['port'])){
				$this->config['uri'] = 'ldap://'.$this->config['host'];
			}
			else {
				$this->config['uri'] = 'ldap://'.$this->config['host'].':'.$this->config['port'];
			}
		}

		if ($this->cnx = @ldap_connect($this->config['uri'])){
			@ldap_set_option($this->cnx, LDAP_OPT_PROTOCOL_VERSION, 3); // LDAPv3 if possible
			return true;
		}
		return false;
		
		// connect with rootdn in case not anonymous.
		if (!empty($obj->config['ld_binddn']) && !empty($obj->config['ld_bindpw'])){ // if empty ld_binddn, anonymous work
		
		// authentication with rootdn and rootpw for dn search
		// carefull ! rootdn should be in full ldap style ! Nothing is supposed (to be one of the users the plugin auth…).
		if (@ldap_bind($obj->config['ld_binddn'],$obj->config['ld_bindpw'])){
		return false;
		}
	}
	}

	// return ldap error
	public function getErrorString(){
		return ldap_err2str(ldap_errno($this->cnx));
	}
	
	// return the name ldap understand
	public function ldap_name($name){
	return $this->config['ld_attr'].'='.$name.','.$this->config['basedn'];
	}

	// authentication
	public function ldap_bind_as($user,$user_passwd){
		if (@ldap_bind($this->cnx,$this->ldap_name($user),$user_passwd)){
			return true;
		}
		return false;
	}

	public function ldap_mail($name){
	
		//echo $this->cnx;
		//echo $this->ldap_name($name);
		$sr=@ldap_read($this->cnx, $this->ldap_name($name), "(objectclass=*)", array('mail'));
		$entry = @ldap_get_entries($this->cnx, $sr);
		
		if (!empty($entry[0]['mail'])) {
			return $entry[0]['mail'][0];
			}
		return False;
	}
	
	// return userdn (and username) for authentication
	/* public function ldap_search_dn($to_search){
		$filter = str_replace('%s',$to_search,$this->config['ld_filter']);
		//$this->write_log('$filter '.$filter);

		if ($search = @ldap_search($this->cnx,$this->config['basedn'],$filter,array('dn',$this->config['ld_attr']),0,1)){
			$entry = @ldap_get_entries($this->cnx, $search);
			if (!empty($entry[0][strtolower($this->config['ld_attr'])][0])) {
				return $entry;
			}
		}
		return false;
	} */
	
	
	public function getAttr() {
	$search = @ldap_read($this->cnx, "cn=subschema", "(objectClass=*)", array('*', 'subschemasubentry'));
	$entries = @ldap_get_entries($this->cnx, $search);
	echo count($entries);
	}
	
	public function getRootDse() {

        $search = @ldap_read($this->cnx, NULL, 'objectClass=*', array("*", "+"));
        $entries = @ldap_get_entries($this->cnx, $search);
        return $entries[0];
	}


	public function ldap_check_basedn(){
		if ($read = @ldap_read($this->cnx,$this->config['basedn'],'(objectClass=*)',array('dn'))){
			$entry = @ldap_get_entries($this->cnx, $read);
			if (!empty($entry[0]['dn'])) {
				return true;
			}
		}
		return false;
	}

}
?>
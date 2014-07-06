<div class="titrePage">
  <h2>Ldap_Login PlugIn</h2>
</div>

<p>Configuration du plugin Ldap_Login</p>

<form method="post" action="{$TESTPLUGIN_F_ACTION}" class="general">
<fieldset>
	<legend>Ldap_Login PlugIn</legend>
    <label>Hote du serveur Ldap
	   <input type="text" name="HOST" value="{$HOST}" />
    </label>
    <br />
    <label>Arbre ldap à explorer : basedn = ",ou=utilisateurs,dc=22decembre,dc=eu". L'arbre doit commencer par une virgule !
	   <input type="text" name="BASEDN" value="{$BASEDN}" />
    </label>
    <br />
        <label>prefixe à utiliser. Les plus communs sont "uid=".
	   <input type="text" name="PREF" value="{$PREF}" />
    </label>
</fieldset>
 
<p><input type="submit" value="Enregistrer" name="submit" /></p>
</form>
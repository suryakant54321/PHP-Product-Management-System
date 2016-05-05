  <form method="post"><fieldset>
    <legend><h3>Enter User Name and Password</h3></legend>
    <font color="red"><?php echo $error_msg; ?></font><br />
<?php if (USE_USERNAME) echo 'Login:<br /><input type="input" name="access_login" /><br/><br/>Password:<br />'; ?>
    <input type="password" name="access_password" /><p></p><br/><input type="submit" name="Submit" value="Submit" />
  </fieldset></form>
  <br />

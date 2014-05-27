<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<form method='post'>
	<{if $error}>
	<span style='color:red;font-weight:bold;'><{$error}></span><br/>
	<{/if}>
	username:<br/>
	<input type="text" name="username" id="" /><br/><br/>
	password:<br/>
	<input type="password" name="password" id="" /><br/><br/>
	<input type="hidden" name="backurl" value="<{$backurl}>" />
	<input type="submit" value="Login" />
</form>
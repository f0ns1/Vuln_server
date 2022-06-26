<html>

<header>
vulnerable server
</header>

<body>
	<?php 
	if(isset($_GET["cmd"])){
		system($_GET["cmd"]);  
	}
	echo "index of application allow rce with parameter ?cmd="
	?>
	
	<h1> Helloooo guys ! </h1>
	
	 <table>
  	<tr>
    		<th>Vulnerablity</th>
    		<th>Example </th>
    		<th>access</th>
  	</tr>
  	<tr>
    		<td>rce</td>
    		<td>cmd=whoami</td>
    		<td><a href="/index_app.php">index_app.php</a></td>
  	</tr>
  	<tr>
    		<td>SQL Injection simple union based </td>
    		<td>' or 1=1 union select 1,2,3,4;-- -</td>
    		<td><a href="/sqli_app.php">sqli_app.php</a></td>
  	</tr>
  	<tr>
    		<td>SQL Injection blind boolean based</td>
    		<td>cmd=whoami</td>
    		<td><a href="/sqliblind_boolean_app.php">sqliblind_boolean_app.php</a></td>
  	</tr>
  	<tr>
    		<td>SQL Injection blind time based </td>
    		<td>cmd=whoami</td>
    		<td><a href="/sqliblind_time_app.php">sqliblind_time_app.php</a></td>
  	</tr>
	</table>
	
</body>

</html>

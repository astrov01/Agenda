<html>
<title>Simple Agenda</title>


  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  

<script type="text/javascript">
function validateForm()
{ var name=document.form.name.value;
  var phone=document.form.phone.value;
  if(name=="" && phone!="")
  {	  
  document.getElementById("errorMessage").innerHTML="Please enter name";return false;	}
  if(name!="" && phone=="")
  {	   document.getElementById("errorMessage").innerHTML="Please enter phone number"; return false;	}
  if(name=="" && phone=="")
	  {	 document.getElementById("errorMessage").innerHTML="Please enter name & phone number";return false;	}
}
</script>


<body>
<div class="container">

	<h1>Simple Agenda</h1>
	
	<div class="five columns">
	<?PHP 
	if (isset($_REQUEST['action']) && $_REQUEST['action']=='edit') {
	?>
	<form id="form" name="form" class="u-full-width" method="post" action="update.php?id=<?PHP echo $_REQUEST['id']; ?>" onSubmit="return validateForm();">
	<div class="row">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?PHP echo $_REQUEST['name']; ?>" class="twelve columns"/>
	    
	    <label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="<?PHP echo $_REQUEST['phone']; ?>" class="twelve columns"/>	 
	</div>	
	<div class="row">	
		<input type="submit" name="submit" id="submit" value="Save" class="button-primary"/> 
		<input type="reset" name="Reset" id="Reset" value="Reset" />
	</div>
	</form>
	<?PHP
		
	}
	else
	{
	?>
	<form id="form" name="form" class="u-full-width" method="post" action="insert.php" onSubmit="return validateForm();">
		<div class="row"> 
			 <label for="name">Name</label>
			 <input type="text" name="name" id="name" value="" class="twelve columns"/>
			 
			 <label for="phone">Phone</label>
			 <input type="text" name="phone" id="phone" value="" class="twelve columns"/>
		</div>
		<div class="row"> 
			 <input type="submit" name="submit" id="submit" value="Save" class="button-primary"/> 
			 <input type="reset" name="Reset" id="Reset" value="Reset" />
		</div>
	</form>
	<?PHP } ?>
	<p id="errorMessage" style="color:#C00; font-style:italic;"></p>
	
	</div>
	
	<?php
	require_once('conn.php');
	$res = $db->query("SELECT * FROM `users`");

	echo "<table class='u-full-width'>";
	echo "<thead><tr> <th>Name</th> <th>Phone</th> <th colspan='2'>Actions</th> </tr></thead><tbody>";
	while($row=$res->fetchArray())
	{ 

	$idn=$row['id'];
	$name=$row['name'];
	$phone=$row['phone'];
	   echo "<tr>";
	   echo "<td>".$name." </td>";
	   echo "<td>".$phone."</td>";
	   echo "<td><a href='delete.php?id=$idn'>Delete</a></td><td><a href='home.php?id=$idn&action=edit&name=$name&phone=$phone'>Edit</a></td>";
	   echo "</tr>";
	}
	echo "</tbody></table>";

	$db->close();
	?>

</div>
</body>
</html>
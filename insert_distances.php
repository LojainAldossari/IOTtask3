<!DOCTYPE html>
<html>
<title> insert distancess</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>
<style>
body {
  background-image: url("pic/back3.jpg");
  background-size: cover;
  background-position: center;
  align-items: center;
  display: flex;
  justify-content: center; 
  display: inline-block;
}


.button {
  border: none;
  color: white;
  padding: 15px 28px;
  text-decoration: none;
 
  
}

.box_background{
	background: rgba(211, 211, 211, 0.5);
	padding: 50px;
	
	
}

</style>
</head>
<body >
  

<div class="button box_background" >

  <div class="w3-container w3-purple " >
    <h4>Please enter the distances in meters for the following directions:</h4>
  </div>
  <form class="w3-container " action="insert_distances.php" method="post" >
    <p>      
    <label class="w3-text-purple"><b>Forward</b></label>
    <input class="w3-input w3-border" name="forward" type="number"></p>
    <p>      
    <label class="w3-text-purple"><b>Right</b></label>
    <input class="w3-input w3-border" name="right" type="number"></p>
     <p>      
    <label class="w3-text-purple"><b>Left</b></label>
    <input class="w3-input w3-border" name="left" type="number"></p>
    <p>
    <button class="w3-btn w3-purple" name="save">Save</button>
    
    <button class="w3-btn w3-purple" name="delete">Delete</button>
     <script src="clear.js"></script>
   
	
  </form>
</div>

<?php

// php code to Insert distances into mysql database from input number
if(isset($_POST['save']) )

{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "remote_control";
    
    

    $forward = $_POST['forward'];
	$right = $_POST['right'];
	$left = $_POST['left'];
	
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

    $query = "INSERT INTO `distances`(`forward`, `right`, `left`)
	VALUES ('$forward','$right', '$left')";
    
    $result = mysqli_query($connect,$query);

    
    // check if mysql query successful

   /* if($result)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    
    mysqli_free_result($result);
  
    mysqli_close($connect);*/



$sql = mysqli_query($connect, "SELECT * FROM distances ORDER BY id DESC limit 3") ; 

$print_data= mysqli_fetch_row ($sql);

?>
<div style="margin:100px;">

<table border="1px" style="width:600px; line-height:40px; 
 border-color:purple; ">
<tr ><th>Forward:</th><td><?php echo $print_data[1]; ?></td>
</tr>
<tr><th>Right  :</th><td><?php echo $print_data[2]; ?></td>
</tr>
<tr><th>Left   :</th><td><?php echo $print_data[3]; ?></td>
</tr>
</table>

</div>
<div class="box_background" style="text-align:center;">
<?php

//pint the arrows depend on number of distances	
	
for($x=0; $x<$print_data[1]; $x++){
	echo '<img src="pic/f.png" alt="Trulli" width="35" height="30"><br>';
	
}
for($x=0; $x<$print_data[2]; $x++){
	echo '<img src="pic/r.png" alt="Trulli" width="40" height="30">';
	
}
echo"<br>";
for($x=0; $x<$print_data[3]; $x++){
	echo '<img src="pic/l.png" alt="Trulli" width="40" height="30">';
	
}
echo"<br>";
?>

</div>
	
<?php	
}
?>


</body>
</html>

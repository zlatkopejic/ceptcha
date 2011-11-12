<?php


session_start();


?>

<html>
<head>
     
</head>
<body>
<img src="picture.php" id='ceptcha'/>
<form method="post" action="">
<input type ="text" name="niz" />
<button type="submit">Test</button>
</form>


<a href="#" onclick="document.getElementById('ceptcha').src = 'picture.php?'+Math.random()">Refresh</a>

<?php 

if(isset ($_POST['niz'])){
if($_POST['niz']==$_SESSION['niz']){
    echo 'Success';
}else{
    echo "Error";
}
}

?>

   
   
</body>
</html>

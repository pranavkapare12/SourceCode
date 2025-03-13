<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>
<style>

</style>

<body>
    <div>
        <?php
         $a=$_SESSION["user_id"];
         if( $a < 4){
            header("Location: ../index.php");
         }
        include('Sidenavbar.php');
        ?>
        
    </div>
</body>

</html>
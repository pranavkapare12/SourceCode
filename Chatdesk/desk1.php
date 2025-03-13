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
        session_start();
        $a=$_SESSION["user_id"];
        if( $a < 1){
                header("Location: ../index.php");
             }
            include('Sidenavbar.php');
         ?>
    </div>
    <div>
        <?php
        // include('midlescreen.php')
        ?>
    </div>
</body>

</html>
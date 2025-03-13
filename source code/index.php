<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    session_start(); // Start the session
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    function toquery($email,$password,$connection)
    {
        // $query = "select * from users where email='$email' and password='$password';";
        $query ="select user_id,uname,password from users where email='$email' and password='$password';";
        $a=pg_query($connection,$query);
        if($a){
            $row = pg_fetch_array($a);
            if($row){
                $_SESSION['user_id']=$row[0];
                $_SESSION['uname']=$row[1];
                header("Location: ./Desktop/desk1.php");
            }
        }

    }
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email == NULL || $password == NULL){
        echo"The value of Email or Password cannot be NULL";
        return;
    }
    $connection = pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
    if($connection)
    {
        toquery($email,$password,$connection);
    }
    else{
        echo"<form> Cannot connect</form>";
    }  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Times New Roman', Times, seri1;
}
*::-webkit-scrollbar{
  width: 0px;
}

@media screen {}

.active {
    background-color: #dbd8e3;
    z-index: 100;
    filter: drop-shadow(0 0 20px #dbd8e3);
    border: #222831;
}

.stl {
    height: 100vh;
    width: 100vw;
    background-color: #000;
    display: grid;
    grid-template-columns: repeat(33, 1fr);
    grid-template-rows: repeat(30, 1fr);
    overflow: hidden;
}

span {
    height: 30px;
    width: 30px;
    margin: 0.5rem;
    background-color: #222831;
    color: white;
    position: relative;
    z-index: 0;
    border-radius: 0.2rem;
}


form {
    padding-left: 2rem;
    padding-top: 2rem;
    z-index: 101;
    background: rgb(0, 0, 0, .2);
    box-shadow: 0 25px 45px rgba(0, 0, 0, .1);
    border-radius: 1rem;
    border: 2px solid #fff;
    position: absolute;
    top: 19vh;
    margin-left: 35%;
    min-height: 60vh;
    width: 30vw;
    color: #fff;
    backdrop-filter: blur(10px);
    display: grid;
    grid-template-rows: 60% 40%;

}

.login {
    /* background-color: #fff; */
    position: relative;
    width: 90%;
    padding-top: 10%;
}

.Section {
    font-family: "Poppins", sans-serif;
    font-weight: 800;
    font-style: normal;
    font-size: xx-large;
}

.formlabel {
    font-size: large;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

a {
    color: #fff;
}

.inputbox {
    width: 100%;
    height: 50px;
    margin-top: 30px;
}

.inputbox1 {
    padding-top: 5vh;
}

.inputbox2 {
    padding-bottom: 3vh;
}

input {
    height: 100%;
    width: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid #fff;
    border-radius: 1rem;
    padding-left: 1vw;
    font-family: "Poppins", sans-serif;
    font-weight: 600;
    font-size: larger;
    color: #fff;
}

input::placeholder {
    color: #fff;
    font-family: "Poppins", sans-serif;
    font-weight: 585;
    font-style: normal;
}

i {
    position: relative;
    top: -75%;
    left: 24.5vw;
    font-size: x-large;
}

.btn {
    margin-left: 0.8vw;
    width: 100%;
    height: 5vh;
    border: none;
    border-radius: 1rem;
    margin-bottom: 2vh;
}

.regis {
    text-align: center;
    font-family: "Poppins", sans-serif;
}


</style>

<body>
    <div class="stl">
        <!-- ./Desktop/desk1.php -->
        <form method='POST'>
            <div class="Section">
                Login
            </div>
            <div class="login">
                <div class="inputbox inputbox1">
                    <input type="email" name="email" placeholder="Enter email" required><i class='bx bxs-user'></i><br><br>
                </div>
                <div class="inputbox inputbox2">
                    <input type="password" name="password" placeholder="Enter Password" required><i class='bx bx-lock'></i>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="regis">
                    Don't have any account?<a href="Registration.php">Register</a><br>
                    <a href="./Forgot_password/forgot.php">Forgot password</a>
                </div>
            </div>
        </form>

    </div>
</body>
<script>
let grids = document.querySelectorAll('.stl');

function addElements() {
    let b = document.getElementsByClassName("stl")[0];
    for (let i = 0; i < 750; i++) {
        let a = document.createElement("span");
        a.className = "";
        b.append(a);
    }
}

function addRandomIntervalClass() {
    grids.forEach(grid => {
        let spans = grid.querySelectorAll('span');
        let randomIndex = Math.floor(Math.random() * spans.length);
        spans[randomIndex].classList.add('active');

        // Remove active class after a rondom Time
        let removeTime = Math.floor(Math.random() * 5000) + 500;
        setTimeout(() => {
            spans[randomIndex].classList.remove('active');
        }, removeTime)
    });

}

function addRandomInterval() {
    let interval = Math.floor(Math.random() + 30);
    addRandomIntervalClass();
    setTimeout(addRandomInterval, interval);
}
addElements();
addRandomInterval();
</script>

</html>
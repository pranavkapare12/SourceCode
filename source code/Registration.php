<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
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

.active {
    background-color: #dbd8e3;
    z-index: 100;
    filter: drop-shadow(0 0 20px #dbd8e3);
    border: #222831;
}

.stl {
    height: 100vh;
    width: 100vw;
    background-color: #393e46;
    background-size: cover;
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
    height: 60vh;
    width: 30vw;
    color: #fff;
    backdrop-filter: blur(10px);
    
}

.login {
    /* background-color: #fff; */
    position: relative;
    width: 90%;
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
    margin-top: 20px;
}

.inputbox1{
    padding-top: 10%;
}

.inputbox2{
    padding-bottom: 3vh;
}

input{
    height: 80%;
    width: 100%;
    background:transparent;
    border:none;
    outline:none;
    border:2px solid #fff;
    border-radius:1rem;
    padding-left: 1vw;
    font-family: "Poppins", sans-serif;
    font-weight: 600;
    font-size: larger;
    color: #fff;
}

input::placeholder{
    color: #fff;
    font-family: "Poppins", sans-serif;
    font-weight: 800;
    font-style: normal;
}
i{
    position: relative;
    top: -75%;
    left: 24.5vw;
    font-size: x-large;
}

.btn{
    margin-left: 0.8vw;
    width:100%;
    height:5vh;
    border:none;
    border-radius: 1rem;
    margin-bottom: 2vh;
    font-family: "Poppins", sans-serif;
    font-weight: 800;
}
.regis{
    text-align: center;
    font-family: "Poppins", sans-serif;
}
</style>

<body>
    <div class="stl">
        <form method='POST'>
            <div class="Section">
             Register
            </div>
            <div class="login">
                <div class="inputbox inputbox1">
                    <input type="text" name="name" placeholder="Enter Name">
                </div>
                <div class="inputbox ">
                <input type="tel" name="phone"  placeholder="Enter PhoneNumber">
                </div>
                <div class="inputbox">
                    <input type="email" name="email" placeholder="Enter email">
                </div>
                <div class="inputbox inputbox2">
                    <input type="password" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn">New Account</button>
            </div>
        </form>
        <?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    function toquery($name,$phoneno,$email,$password,$connection)
    {
        $rdate=date("Y/m/d");
        $query = "INSERT INTO users (uname, email, password, phoneno,rdate) 
        VALUES ('$name', '$email', '$password', '$phoneno','$rdate')";
        (pg_query($connection,$query));
    }
    $name=$_POST['name'];
    $phoneno=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $connection = pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
    if($connection)
    {
        toquery($name,$phoneno,$email,$password,$connection);
        header("Location: /index.php");
    }
    else{
        echo"<form> Cannot connect</form>";
    }
    
}
?>

    </div>
</body>
<script>
let grids = document.querySelectorAll('.stl');

function addElements() {
    let b = document.getElementsByClassName("stl")[0];
    for (let i = 0; i < 650; i++) {
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

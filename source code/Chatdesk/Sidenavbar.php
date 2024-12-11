<?php
// session_start();
// $a=$_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Navbar Pure CSS</title>
    <link rel="stylesheet" href="./Sidenavbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--Google Fonts 0001-->
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Rubik+Wet+Paint&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Tiny5&display=swap"
        rel="stylesheet">
    <!--Google Fonts 0001-->
    <script src=".././../jquery.js"></script>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="nav-bar">
        <input id="nav-toggle" type="checkbox" />
        <div id="nav-header"><a id="nav-title" href="" target="_blank">Source Code</a>
            <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
            <hr />
        </div>
        <div id="nav-content">
            <a href="/Desktop/desk1.php">
                <div class="nav-button"><i type="solid" class="fas box bx bx-user"></i><span>Account</span></div>
            </a>
            <a href="/desk2/desk2.php">
                <div class="nav-button"><i class="fas box bx bx-code-alt"></i><span>CODE</span></div>
            </a>
            <a href="./desk1.php">
                <div class="nav-button"><i class="fas box bx bx-message-dots"></i><span>Chats</span></div>
            </a>
            <a href="../addSnippet/desk2.php">
                <div class="nav-button"><i class="fas box bx bx-message-square-add"></i><span>ADD</span></div>
            </a>
            <!-- <a href="">
            <div class="nav-button"><i class="fas box bx bx-cog"></i><span>Setting</span></div>
            </a> -->
        </div>
        <!-- <input id="nav-footer-toggle" type="checkbox" /> -->
    </div>

    <!-- -------------------- SIDE SCREEN CONTENT ------------------------- -->
    <!-- Google Fonts no 0001 -->
    <div class="sidescreen space-mono-bold">
        <div class="users" id="followers">
            <div class="header">
                <label>Users</label><br>
                <input type="search" placeholder="Search">
            </div>
            <hr>
            <div class="contener">
            <label> Pranav Kapare </label>
            </div>            
        </div>
        <div class="users_chat" id="following">
            <div class="contenertop">
                PranavKapare
            </div>
            <div class="contenercenter">
                <div class="conmessage">
                    <label>hello</label>
                </div>
                <div class="conmessageright">
                    <label>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, blanditiis consectetur? Blanditiis ullam odit nisi natus deserunt aspernatur unde provident?</label>
                </div>
            </div>
            <div class="contenerbottom">
                <input type="text" placeholder="Message"><button style="min-width: 3rem; border-radius:2rem;"><i class='bx bx-send' style="font-size: 1.5rem;"></i></button>
            </div>
        </div>
    </div>
</body>
<script>
</script>

</html>
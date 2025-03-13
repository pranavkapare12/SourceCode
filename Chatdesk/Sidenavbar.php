<?php
// session_start();
$a=$_SESSION["user_id"];
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
    <script src="../jquery.js"></script>
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
        <div class="users" id="users">

        </div>
        <div class="users_chat" id="user_chat">

        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    var userid = "<?php echo "$a"; ?>";
    $.ajax({
        type: "POST",
        url: "Users.php",
        data: {
            userid
        },
        success: function(Data) {
            $("#users").html(Data);
            $(".contener").click(function() {
                messagedesk($(this).attr("uid"));
            })
        }
    });

    function messagedesk(reciver_id) {
        $.ajax({
            type: "POST",
            url: "messagedesk.php",
            data: {
                userid,
                reciver_id
            },
            success: function(data) {
                $("#user_chat").html(data);
                $("button").click(function() {
                    message_send(userid, reciver_id);
                    message_refresh(userid, reciver_id);
                    // setInterval(() => {
                    //     message_refresh(userid, reciver_id);
                    // }, 2000); // Poll every 2 seconds
                });
            }
        })
    }

    function message_send(userid, reciver_id) {
        var message = $("#input").val();
        if (message === null || message.trim() === "") {
            return;
        }
        $.ajax({
            type: "POST",
            url: "sendmessage.php",
            data: {
                userid,
                reciver_id,
                message
            },
            success: function(data) {
                $("#input").val("");
            }
        })
    }



    function message_refresh(userid, reciver_id) {
        $.ajax({
            type: "POST",
            url: "message_ref.php",
            data: {
                userid,
                reciver_id
            },
            success: function(data) {
                $(".contenercenter").html("");
                $(".contenercenter").html(data);
            }
        })
    }


})
</script>

</html>
<?php
session_start();
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
            <a href=".././../Chatdesk/desk1.php">
                <div class="nav-button"><i class="fas box bx bx-message-dots"></i><span>Chats</span></div>
            </a>
            <a href="../../addSnippet/desk2.php">
                <div class="nav-button"><i class="fas box bx bx-message-square-add"></i><span>ADD</span></div>
            </a>
        </div>
        <!-- <input id="nav-footer-toggle" type="checkbox" /> -->
    </div>

    <!-- -------------------- SIDE SCREEN CONTENT ------------------------- -->
    <!-- Google Fonts no 0001 -->
    <div class="sidescreen space-mono-bold">
        <div class="followers" id="followers">
            
        </div>
        <div class="following" id="following">
            
        </div>
        <div class="details" id="details">

        </div>

    </div>
</body>
<script>
$(document).ready(function() {
    var user_id="<?php echo"$a"?>";
    function sugg_operation() {
        $.ajax({
            url: "Suggestion.php",
            type: "POST",
            data:{userid : user_id},
            success: function(data) {
                $("#details").html(data);
                $("#details input[type='button']").click(function() {
                    var follower_id=$(this).attr("value1");
                    console.log(follower_id);
                    $.ajax({
                        url:"SuggestionData.php",
                        type:"POST",
                        data:{userid : user_id,follower : follower_id},
                        success : function(data){
                            console.log(data);
                            sugg_operation();
                            follow_operation();
                        }
                    })
                })
            }
        })
    }
    function follow_operation(){
        $.ajax({
            url:"Followers.php",
            type:"POST",
            data:{userid : user_id},
            success :function(data){
                $("#followers").html(data);
                $("#followers input[type='button']").click(function(){
                    var follower_id=$(this).attr("value1");
                    console.log(follower_id);
                    $.ajax({
                        url:"FollowersData.php",
                        type:"POST",
                        data:{userid : user_id,follower : follower_id},
                        success : function(data){
                            sugg_operation();
                            follow_operation();
                            following_operation();
                        }
                    })
                })
            }
        })
    }
    function following_operation(){
        $.ajax({
            url:"Following.php",
            type:"POST",
            data:{userid : user_id},
            success :function(data){
                $("#following").html(data);
                $("#following input[type='button']").click(function(){
                    var follower_id=$(this).attr("value1");
                    console.log(follower_id);
                    $.ajax({
                        url:"FollowingData.php",
                        type:"POST",
                        data:{userid : user_id,follower : follower_id},
                        success : function(data){
                            following_operation();
                            follow_operation();
                        }
                    })
                })
            }
        })
    }
    follow_operation();
    sugg_operation();
    following_operation();
})
</script>

</html>
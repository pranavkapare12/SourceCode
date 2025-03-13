<?php
    include('../Codeformating.php');
    $connect=pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
    $sessionid=$_SESSION['user_id'];
    $query="select users.uname,(select count(*) as following from following_table,users where following_table.user_id=users.user_id and following_table.following_id=$sessionid),(select count(*) as follower from follower_table,users where follower_table.user_id=users.user_id and follower_table.follower_id=$sessionid),(select count(*) as Snippet from snippet where snippet.user_id=users.user_id) from users where users.user_id=$sessionid;";
    $query1="select snippet.stitle,snippet.lang,snippet.description from snippet where snippet.user_id=$sessionid;";
    $result=pg_query($connect,$query);
    $result1=pg_query($connect,$query1);
    $ffcount=pg_fetch_row($result);
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
                <div class="nav-button"><i type="solid" class="fas box bx bx-user"></i><span>Account</span></div>
            <a href="/desk2/desk2.php">
                <div class="nav-button"><i class="fas box bx bx-code-alt"></i><span>CODE</span></div>
            </a>
            <a href="../Chatdesk/desk1.php">
                <div class="nav-button"><i class="fas box bx bx-message-dots"></i><span>Chats</span></div>
            </a>
            <a href="/addSnippet/desk2.php">
                <div class="nav-button"><i class="fas box bx bx-message-square-add"></i><span>ADD</span></div>
            </a>
        </div>
        <!-- <input id="nav-footer-toggle" type="checkbox" /> -->
    </div>

    <!-- -------------------- SIDE SCREEN CONTENT ------------------------- -->
    <div class="sidescreen space-mono-bold">
        <!-- Google Fonts no 0001 -->
        <div class="leftcontent">
            <h2><?php echo $ffcount[0]; ?></h2>
            <!--ADD USER NAME-->
            <div class="biocontent">
                <label class="Bio">
                    <label
                        style="background-color:gray;border-radius:.5rem; padding-left: 0.4rem ; padding-right:0.4rem;">
                        BIO </label><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, temporibus?
                    <!--ADD BIO-->
                </label><br><br>
                <hr>
                <br>
                <a href="./FFdesk/desk1.php">
                    <label class="Bio fw">Follower :: <?php echo $ffcount[2];?>
                        <!--ADD TOTAL FOLLOWERS-->
                    </label><br><br>
                    <label class="Bio fw">Following :: <?php echo $ffcount[1];?>
                        <!--ADD TOTAL FOLLOWING-->
                    </label><br><br>
                </a>
                <a href="./UserCodeSnippet/CodeSequrity.php">
                    <label>Total No Code :: <?php echo $ffcount[3];?>
                        <!--ADD TOTAL FOLLOWING-->
                    </label><br><br>
                </a>
            </div>
            <hr class="biohr">
            <?php
            while(($row=pg_fetch_row($result1))!=NULL){
                $snippet_title="<label>TITLE :: </label><label>$row[0]</label><br>";
                $snippet_type="<label>TYPE ::</label><label style='background-color:gray;border-radius:.5rem; padding-left: 0.4rem ; padding-right:0.4rem;'>$row[1] </label><br>";
                $snippet_desc="<label>DESCRIPTION ::</label><label>$row[2]</label>";
                $code_snippet="<div class='codesnippet'>$snippet_title $snippet_type $snippet_desc</div>";
                echo"$code_snippet";
            }
                ?>
            <hr class="biohr">
        </div>

    </div>

</body>

</html>
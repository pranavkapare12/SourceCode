<?php
$connect=pg_connect("host=localhost user=postgres dbname=sourcecode password=Pranav@123") or die("Cannot connect");
$query="select users.uname,stitle,scontent,lang,created_at,modify_at,description,snippet.sid from users,snippet where users.user_id=snippet.user_id order by snippet.created_at DESC;";
$result=pg_query($connect,$query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Navbar Pure CSS</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--Google Fonts 0001-->
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Rubik+Wet+Paint&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Tiny5&display=swap"
        rel="stylesheet">
    <!--CODE FORMATING LINK-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/default.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Sidenavbar.css">

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
            <!-- <div class="butt">
                <button>Home</button>
                <button>Recent</button>
                <button>Friends</button>
                <button>Images</button>
                <button>Files</button>
                <button>Recent Modify</button>
            </div> -->
            <h3><?php echo date("d/m/Y") ?></h3>
            <hr class="biohr">
            <?php 
            while(($row=pg_fetch_row($result)) != NULL){
                $code="<pre><code class='language-$row[3] $row[3]'> $row[2] </code></pre><hr style='color:aliceblue;'>";
                $code_title="<div class='codetitle'><label style='padding-left: 2.4rem;'>$row[1]</label></div><hr style='color:aliceblue;'>";
                $code_desc="
                <div class='action'>
                    <div class='like' value='$row[7]'><i class='bx bx-like'></i></div>
                    <div class='commen' value='$row[7]'><i class='bx bx-comment'></i></div>
                </div>
                        <div class='codedescr'>
                        SNIPPET TITLE :: $row[1]<br>
                        LANGUAGE :: $row[3]<br>
                        CREATE DATE :: $row[4]<br>
                        LAST MODIFY :: $row[5]<br>
                        DESCRIPTION :: $row[6]<br>
                    </div>";
                $code_screen="<div class='codescreen container'>$code_title $code $code_desc</div><br>";
                echo"$code_screen";    
            }
            ?>
        </div>
        <div class="rightcontent">
            <div class="header">
                <div class="header"><label>Add To Numbers</label></div>
            </div>
            <div class="content">
                <div class="message">
                    <label class="User">Data Not Found</label><br>
                </div>
            </div>
            <div class="send">
                <input type="text" name="Message" placeholder="Comment.." id="Message"><button id="Send"><i class='bx bxs-send' ></i></button>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>
<script>hljs.highlightAll();</script>
<script src="./../jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.like').click(function(){
            var id= $(this).attr('value');
            console.log(id);
        })
        $('.commen').click(function(){
            var id=$(this).attr('value');
            $.ajax({
                url:"./Comment/comment.php",
                type:"POST",
                data:{
                    id,
                },
                success : function(data){
                    $(".rightcontent").html("");
                    $(".rightcontent").html(data);
                    $('#Send').click(function(){
                        // console.log("Executed");
                        refresh(id);
                    });
                }   
            })
        })
    });
    function refresh(id){
        var message=$('#Message').val();
        $('#Message').val("");
        if(message === ""){
            return;
        }
        $.ajax({
            url:"./Comment/refreshmessage.php",
            type:"POST",
            data:{
                id,
                message,
            },
            success: function(data){
                console.log(data);
                $(".content").html("");
                $(".content").html(data);
            }
        })
    }
</script>
</html>
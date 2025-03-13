<?php
function changehtmltag($a)
{
    $a = str_replace("<", "&lt;", $a);
    $a = str_replace(">", "&gt;", $a);
    $a = str_replace("$", "\$", $a);
    $a = str_replace("&lt;br&gt;", "&lt;br&gt;<br>", $a);
    return $a;
}

function changetag($a)
{
    $a = str_replace("<", "&lt;", $a);
    $a = str_replace(">", "&gt;", $a);
    $a = str_replace("$", "\$", $a);
    return $a;
}

$user_id = $_SESSION['user_id'];
$query="select sid,stitle,likes_count,comment_count from snippet where user_id=$user_id;";
$connect=pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
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

    <div class="sidescreen space-mono-bold">
        <div class="codes">
            <div class="searchsnippet">
                <label>Snippet</label><br>
                <input type="search" class="space-mono-bold" name="Search" id="Search" placeholder="Search">
            </div>

            <div class="snippet">
                <?php
                while($row = pg_fetch_row($result)){
                    $content="<div class='content' value='{$row[0]}'>
                    <label>Name :: </label><label>$row[1]</label><br>
                    <label class='li'>Likes</label><label class='li'>$row[2]</label> <label class='li'>Comment</label><label
                        class='li'>$row[3]</label>
                     </div>";
                     echo $content;
                }?>
            </div>
        </div>
        <div class="dash">
            <div class="dash-snippet">
                <!--  -->

            </div>
            <div class="snippet-comment">

            </div>
        </div>
    </div>
</body>

<script src="./../../jquery.js"></script>
<script>
$(document).ready(function() {
    function refresh(key, comment) {
        $.ajax({
            url: "./Snippet/comment.php",
            type: "POST",
            data: {
                key,
                comment,
            },
            success: function(data) {
                $(".contentmt").html(" ");
                $(".contentmt").html(data);
            }
        })
    }

    $('button').click(function() {
        console.log("Hello");
    })
    $('#Search').keyup('input', function() {
        console.log($(this).val());
    })

    $('.content').click(function() {
        // console.log($('.content').val("4"));
        $(".dash-snippet").html("");
        $(".snippet-comment").html("");
        var Key = $(this).attr('value');
        console.log(Key);
        $.ajax({
            url: "./Snippet/Snippet.php",
            type: "POST",
            data: {
                Key
            },
            success: function(data) {
                // console.log(data);
                $(".dash-snippet").html(data);
                $('#like').click(function() {
                    console.log("Like");
                })
                $('#comment').click(function() {
                    console.log("Comment")
                    $.ajax({
                        url: "./Snippet/snippet_comment.php",
                        type: "POST",
                        data: {
                            Key,
                        },
                        success: function(data) {
                            //console.log(data);
                            $(".snippet-comment").html(" ");
                            $(".snippet-comment").html(data);
                            //console.log(data);
                            $("#send").click(function() {
                                // console.log("Send");
                                var comment = $("#Message_send").val();
                                $("#Message_send").val("");
                                // console.log(comment);
                                if (comment === "") {
                                    return;
                                }
                                refresh(Key, comment);
                                // refresh(Key);//////////////////////////////////////////////////
                                // refresh(Key);////////////////////////////////////////////////////////////////
                            })
                        }
                    })
                })
            }
        })
    })
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>
<script>
hljs.highlightAll();
</script>

</html>
<a href=""></a>
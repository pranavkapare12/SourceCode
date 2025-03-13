<?php
// Snippet Header 
// $user_name=$_SESSION['uname'];
$key = $_POST['Key'];

$connect=pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123");
$query="select stitle,scontent,lang,created_at,modify_at,description,tags,likes_count,comment_count from snippet where snippet.sid=$key;";
$result=pg_query($connect,$query);
$row=pg_fetch_row($result);

$user_name="Pranav";
$snippet_right="<div class='snippet-right'><div class='first'></div><div class='second'></div><div class='third'></div></div>";
$snippet_left="<div class='snippet-left'> {$user_name} </div>";
$snippet_header="<div class='snippet-header'> {$snippet_left} {$snippet_right} </div>";

////////////////////////////////////////////////////////////////////////
// Snippet Content________________________________________________________________
$snippet_content="<div class='snippet-content'>
                    <pre class='language-{$row[2]}' tabindex='0'>
                        <code class='{$row[2]} language-{$row[2]} hljs'>
{$row[1]}
                        </code>
                    </pre>
                </div>";
// ________________________________________________________________________
// snippet footer   

$action="<div class='action'><div class='likecomment'><div class='likes' id='like' value='{$key}'><i class='bx bx-like'></i></div><div class='comment' id='comment' value='{$key}'><i class='bx bx-message-alt-dots'></i></div></div></div>";

$snippet_td1="<div class='snippet_tdl size'><label>{$row[0]}</label><br><label>{$row[2]}</label><br></div>";
$data="<div class='date size'><label>{$row[3]}</label><br><label>{$row[4]}</label></div>";
$like_comment="<div class='likes_comment size'><label>{$row[5]}</label><br><label>Likes - </label><label>{$row[7]}</label><br><label>Comment - </label><label>{$row[8]}</label></div>";
$tags="<div class='size tags'><label>{$row[6]}</label></div>";
$snippet_info="<div class='snippet-info'>{$snippet_td1} {$data} {$like_comment} {$tags}</div>";
$snippet_footer="<div class='snippet-footer'> {$action} {$snippet_info} </div>";

// ----------------------------------------------------------------
// Final output

$dash_snippet="{$snippet_header} {$snippet_content} {$snippet_footer}";
echo $dash_snippet;
?>
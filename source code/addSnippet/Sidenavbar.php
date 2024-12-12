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

function pgoperation($sname, $slang, $sdesc, $stag, $scode, $created_at)
{
    $user_id = $_SESSION['user_id'];
    $connect = pg_connect("host=localhost dbname=sourcecode user=postgres password=Pranav@123") or die("Cannot connect");
    $query = "insert into snippet (user_id,Stitle,SContent,Lang,created_at,modify_at,Description,Tags) values($user_id,'$sname','$scode','$slang','$created_at','$created_at','$sdesc','$stag');";
    pg_query($connect, $query);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sname = $_POST['Snippet_Title'];
    $slang = $_POST['Snippet_Language'];
    $sdesc = $_POST['Snippet_Description'];
    $stag = $_POST['Snippet_Tags'];
    $scode = $_POST['Snippet_Code'];
    $created_at = date("Y-m-d");
    if ($slang == "html" || $slang == "xml") {
        $scode = changehtmltag($scode); 
    } else {
        $scode = changetag($scode);
    }
    pgoperation($sname, $slang, $sdesc, $stag, $scode, $created_at);
}
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
            <a href="desk2.php">
                <div class="nav-button"><i class="fas box bx bx-message-square-add"></i><span>ADD</span></div>
            </a>
        </div>
        <!-- <input id="nav-footer-toggle" type="checkbox" /> -->
    </div>

    <!-- -------------------- SIDE SCREEN CONTENT ------------------------- -->
    <div class="sidescreen space-mono-bold">
        <!-- Google Fonts no 0001 -->
        <form method="post">

            <div class="leftcontent space-mono-bold">
                <h1>Create Snippet</h1>
                <input type="text" placeholder="Snippet Title" name="Snippet_Title"><br><br>
                <select name="Snippet_Language">
                    <option value="1c">1C</option>
                    <option value="abnf">ABNF</option>
                    <option value="actionscript">ActionScript</option>
                    <option value="ada">Ada</option>
                    <option value="apache">Apache</option>
                    <option value="applescript">AppleScript</option>
                    <option value="arcade">Arcade</option>
                    <option value="arduino">Arduino</option>
                    <option value="armasm">ARM Assembly</option>
                    <option value="asciidoc">AsciiDoc</option>
                    <option value="aspectj">AspectJ</option>
                    <option value="autohotkey">AutoHotkey</option>
                    <option value="autoit">AutoIt</option>
                    <option value="avrasm">AVR Assembly</option>
                    <option value="awk">Awk</option>
                    <option value="bash">Bash</option>
                    <option value="basic">Basic</option>
                    <option value="bnf">BNF</option>
                    <option value="brainfuck">Brainfuck</option>
                    <option value="c">C</option>
                    <option value="cal">C/AL</option>
                    <option value="capnproto">Cap Proto</option>
                    <option value="ceylon">Ceylon</option>
                    <option value="clean">Clean</option>
                    <option value="clojure">Clojure</option>
                    <option value="cmake">CMake</option>
                    <option value="coffeescript">CoffeeScript</option>
                    <option value="coq">Coq</option>
                    <option value="cos">Classic ASP</option>
                    <option value="crmsh">Crmsh</option>
                    <option value="crystal">Crystal</option>
                    <option value="cs">C#</option>
                    <option value="csp">CSP</option>
                    <option value="css">CSS</option>
                    <option value="d">D</option>
                    <option value="dart">Dart</option>
                    <option value="delphi">Delphi</option>
                    <option value="diff">Diff</option>
                    <option value="django">Django</option>
                    <option value="dns">DNS Zone file</option>
                    <option value="dockerfile">Dockerfile</option>
                    <option value="dos">DOS .bat</option>
                    <option value="dsconfig">dsconfig</option>
                    <option value="dts">DTS (Device Tree)</option>
                    <option value="dust">Dust</option>
                    <option value="ebnf">EBNF</option>
                    <option value="elixir">Elixir</option>
                    <option value="elm">Elm</option>
                    <option value="erb">ERB</option>
                    <option value="erlang">Erlang</option>
                    <option value="excel">Excel</option>
                    <option value="fsharp">F#</option>
                    <option value="fix">FIX</option>
                    <option value="fortran">Fortran</option>
                    <option value="gams">GAMS</option>
                    <option value="gauss">GAUSS</option>
                    <option value="gcode">G-code</option>
                    <option value="gherkin">Gherkin</option>
                    <option value="glsl">GLSL</option>
                    <option value="gml">GML</option>
                    <option value="go">Go</option>
                    <option value="golo">Golo</option>
                    <option value="gradle">Gradle</option>
                    <option value="graphql">GraphQL</option>
                    <option value="groovy">Groovy</option>
                    <option value="haml">HAML</option>
                    <option value="handlebars">Handlebars</option>
                    <option value="haskell">Haskell</option>
                    <option value="haxe">Haxe</option>
                    <option value="hsp">HSP</option>
                    <option value="http">HTTP</option>
                    <option value="hy">Hy</option>
                    <option value="inform7">Inform 7</option>
                    <option value="ini">INI</option>
                    <option value="irpf90">IRPF90</option>
                    <option value="isbl">ISBL</option>
                    <option value="java">Java</option>
                    <option value="javascript">JavaScript</option>
                    <option value="jboss-cli">JBoss CLI</option>
                    <option value="json">JSON</option>
                    <option value="julia">Julia</option>
                    <option value="kotlin">Kotlin</option>
                    <option value="lasso">Lasso</option>
                    <option value="latex">LaTeX</option>
                    <option value="ldif">LDIF</option>
                    <option value="leaf">Leaf</option>
                    <option value="less">Less</option>
                    <option value="lisp">Lisp</option>
                    <option value="livecodeserver">LiveCode</option>
                    <option value="llvm">LLVM</option>
                    <option value="lsl">LSL</option>
                    <option value="lua">Lua</option>
                    <option value="makefile">Makefile</option>
                    <option value="markdown">Markdown</option>
                    <option value="mathematica">Mathematica</option>
                    <option value="matlab">Matlab</option>
                    <option value="maxima">Maxima</option>
                    <option value="mel">MEL</option>
                    <option value="mercury">Mercury</option>
                    <option value="mipsasm">MIPS Assembly</option>
                    <option value="mizar">Mizar</option>
                    <option value="mongodb">MongoDB</option>
                    <option value="moonscript">MoonScript</option>
                    <option value="n1ql">N1QL</option>
                    <option value="nginx">Nginx</option>
                    <option value="nim">Nim</option>
                    <option value="nix">Nix</option>
                    <option value="node-repl">Node REPL</option>
                    <option value="nsis">NSIS</option>
                    <option value="objectivec">Objective-C</option>
                    <option value="ocaml">OCaml</option>
                    <option value="openscad">OpenSCAD</option>
                    <option value="oxygene">Oxygene</option>
                    <option value="parser3">Parser3</option>
                    <option value="perl">Perl</option>
                    <option value="pf">pf</option>
                    <option value="pgsql">PostgreSQL</option>
                    <option value="php">PHP</option>
                    <option value="plaintext">Plain text</option>
                    <option value="pony">Pony</option>
                    <option value="powershell">PowerShell</option>
                    <option value="processing">Processing</option>
                    <option value="profile">Profile</option>
                    <option value="prolog">Prolog</option>
                    <option value="properties">.properties</option>
                    <option value="protobuf">Protocol Buffers</option>
                    <option value="puppet">Puppet</option>
                    <option value="purebasic">PureBasic</option>
                    <option value="python">Python</option>
                    <option value="qml">QML</option>
                    <option value="r">R</option>
                    <option value="reasonml">ReasonML</option>
                    <option value="rib">RenderMan RIB</option>
                    <option value="roboconf">Roboconf</option>
                    <option value="routeros">RouterOS</option>
                    <option value="rsl">RenderMan RSL</option>
                    <option value="ruby">Ruby</option>
                    <option value="rust">Rust</option>
                    <option value="sas">SAS</option>
                    <option value="scala">Scala</option>
                    <option value="scheme">Scheme</option>
                    <option value="scss">SCSS</option>
                    <option value="shell">Shell</option>
                    <option value="smali">Smali</option>
                    <option value="smalltalk">Smalltalk</option>
                    <option value="sml">SML</option>
                    <option value="sql">SQL</option>
                    <option value="stan">Stan</option>
                    <option value="stata">Stata</option>
                    <option value="step21">STEP Part 21</option>
                    <option value="stylus">Stylus</option>
                    <option value="subunit">SubUnit</option>
                    <option value="swift">Swift</option>
                    <option value="taggerscript">TaggerScript</option>
                    <option value="yaml">YAML</option>
                    <option value="tap">TAP</option>
                    <option value="tcl">Tcl</option>
                    <option value="thrift">Thrift</option>
                    <option value="tp">TP</option>
                    <option value="twig">Twig</option>
                    <option value="typescript">TypeScript</option>
                    <option value="vala">Vala</option>
                    <option value="vbnet">VB.NET</option>
                    <option value="vbscript">VBScript</option>
                    <option value="vbscript-html">VBScript in HTML</option>
                    <option value="verilog">Verilog</option>
                    <option value="vhdl">VHDL</option>
                    <option value="vim">Vim Script</option>
                    <option value="x86asm">x86 Assembly</option>
                    <option value="xml">XML</option>
                    <option value="xquery">XQuery</option>
                    <option value="zephir">Zephir</option>
                </select><br><br>
                <input type="text" placeholder="Snippet Description" name="Snippet_Description"><br><br>
                <input type="text" placeholder="Snippet Tags" name="Snippet_Tags"><br><br>
                <textarea rows="18" cols="40" placeholder="Snippet Code" name="Snippet_Code"></textarea><br><br>
                <button type="submit">Submit</button>

            </div>
        </form>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>

<script>
    hljs.highlightAll();
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Google Fonts 0001-->

    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Rubik+Wet+Paint&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Tiny5&display=swap"
        rel="stylesheet">
    <link href='./forgot.css' rel='stylesheet'>

</head>

<body>
    <div class="desk">
        <div class="form">
            <div class="header"><Label class="itim-regular">Forgot Password</Label></div>
            <div class="content">
                <div class="phoneno" id="phoneno">
                    <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number"
                        pattern="^\+[0-9]{1,3} [0-9]{10}$" required>
                </div>
                <div class="otp">
                    <input type="number" id="otp" name="otp" placeholder="Enter OTP" minlength="4" maxlength="6"
                        required><button id="Verify">Verify</button>
                </div>
                <div class="password">
                    <input type="password" placeholder="Password" name="" id="Password_one"><button id="Showpassone"><i
                            class='bx bx-lock-alt' id="passone"></i></button>
                </div>
                <div class="cpassword">
                    <input type="password" placeholder="Confirm Password" name="" id="Password_two"><button
                        id="Showpasstwo"><i class='bx bx-lock-alt' id="passtwo"></i></button>
                </div>
                <div class="cpassword" id="submit">
                    <button id="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./../jquery.js"></script>
<script>
    $(document).ready(function() {
        let number;
        function RandomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        let otp, verify;
        $('#phone').keyup(function() {
            number = $(this).val();
            if (number > 999999999) {
                otp = RandomNumber(100000, 999999);
                //console.log("Execute",otp);
                $.ajax({
                    type: "POST",
                    url: "email.php",
                    data: {
                        number,
                        otp
                    },
                    success(data) {

                    }
                })
            }
        })
        $('#Verify').click(function() {
            if ($('#otp').val() == otp) {
                alert("Success");
                $('#Verify').css("color", "lime");
                verify = true;
            } else {
                alert("Not - Success");
                $('#Verify').css("color", "red");
                verify = false;
            }
        })
        $('#Showpassone').click(function() {
            let passwordfield = $('#Password_one');
            let icon = $('#passone');
            if (passwordfield.attr('type') === "text") {
                passwordfield.attr('type', 'password');
                if(icon.hasClass('bx-lock-open-alt')){
                    icon.removeClass('bx-lock-open-alt');
                    icon.addClass('bx-lock-alt');
                }
            } else{
                passwordfield.attr('type', 'text');
                if(icon.hasClass('bx-lock-alt')){
                    icon.removeClass('bx-lock-alt');
                    icon.addClass('bx-lock-open-alt');
                }
            }
        })
        $('#Showpasstwo').click(function() {
            let passwordfield = $('#Password_two');
            let icon = $('#passtwo');
            if (passwordfield.attr('type') === "text"){
                passwordfield.attr('type', 'password');
                if(icon.hasClass('bx-lock-open-alt')){
                    icon.removeClass('bx-lock-open-alt');
                    icon.addClass('bx-lock-alt');
                }
            }
            else{
                passwordfield.attr('type', 'text');
                if(icon.hasClass('bx-lock-alt')){
                    icon.removeClass('bx-lock-alt');
                    icon.addClass('bx-lock-open-alt');
                }
            }
        });
        $('#submit').click(function(){
            // console.log("Execute");
            let password_one,password_two;
            password_one = $('#Password_one').val();
            password_two = $('#Password_two').val();
            if(password_one === '' || password_two === ''){
                alert("Password Cannot Be NULL");
            }else{
                if(password_one != password_two)
                  alert("Password and Confirm Password is not equal");
                else{
                    console.log(number);
                    if(verify){
                        $.ajax({
                            type: "POST",
                            url: "update.php",
                            data: {
                                number,
                                password_one,
                            },
                            success(data) {
                                alert("Password Updated Successfully");
                                window.location.href = "./../index.php";
                            }
                        })
                    }else{
                        alert("Please verify your Account");
                    }
                }
            }
        })

    });
</script>
</html>
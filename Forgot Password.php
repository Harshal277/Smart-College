<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">

    <title>Reset Password</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #fafafa;
        }

        .top-nav {
            display: flex;
            background: #343a40;
            color: white;
            text-align: center;
        }

        .top-nav .banner {
            flex: 1;
        }

        .top-nav .title {
            flex: 9;
        }

        h1 {
            font-weight: 400;
            font-size: 30px;
        }

        h2 {
            font-weight: 400;
            font-size: 22px;
            letter-spacing: 3px;
        }


        form {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -45%);
            background: white;
            width: 30vw;
            height: 70vh;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px 0px rgba(0, 0, 0, .1);
            border-radius: 0 0 8px 8px;
        }

        form:hover {
            box-shadow: 0 0 20px 0px rgba(0, 0, 0, .2);
        }

        input {
            border-radius: 5px;
            border: none;
            border: 1px solid #9e9e9e;
            width: 60%;
            padding: 10px;
            margin: 5px;
            margin-bottom: 25px;
        }

        a {
            margin-top: 30px;
            text-decoration: none;
            font-size: 16px;
            color: grey;
        }

        a:hover {
            color: #086bec;
        }

        input:focus {
            outline: none;
        }

        input:hover {
            border: 1px solid #0080ff;
        }

        #name {
            margin-top: 20px;
        }

        button {
            border: none;
            width: 66%;
            padding: 13px;
            background: linear-gradient(to right, #139ff0, #047ef1);
            border: 1px solid #086bec;
            color: white;
            font-size: 15px;
            margin-top: 10px;
            border-radius: 5px;
        }

        button:hover {
            background: linear-gradient(to left, #04baf1, #047ef1);
            cursor: pointer;
        }

        button:focus {
            border: 1px solid #0080ff;
        }

        @media(max-width:600px) {
            .top-nav {
                height: 70px;
            }

            .top-nav .banner {
                flex: 1;
                margin-left: 20px;
            }

            .top-nav .title {
                flex: 6;
                text-align: left;
                padding-left: 70px;
            }

            h1 {
                font-size: 25px;
            }

            h2 {
                transform: translateX(-20px);
                font-size: 20px;
                letter-spacing: 3px;
            }

            h2,
            input {
                transform: translateY(-30px);
            }

            img {
                width: 45px;
            }

            form {
                width: 80vw;
            }

            button {
                width: 67%;
            }
        }
    </style>

    <script>

    </script>
</head>

<body>

    <!--//PHP Code -->
    <?php
    include_once("Database.php");
    include("Error.php");

    $msg = ".";
    $e = "";
    $error = ".";
    $account = "default";
    $btn = "<button onclick='check()'>Reset</button>";
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $res = mysqli_query($con, "SELECT * FROM admin WHERE aEmail='$email'");
        $row = mysqli_num_rows($res);
        if ($row == 1) {
            $admin = true;
        }
        echo "Admin : " . $row;
        if ($row == 0) {
            $res = mysqli_query($con, "SELECT * FROM students WHERE emailid='$email'");
            $row = mysqli_num_rows($res);
            if ($row == 1) {
                $stud = true;
            }
            echo "Student : " . $row;

            if ($row == 0) {
                $res = mysqli_query($con,"SELECT * FROM teacher WHERE email='$email'");
                $row = mysqli_num_rows($res);
                if ($row == 1) {
                    $teach = true;
                }
                echo "Teacher : " . $row;
            }
        }

        if ($row == 1) {
            $dataPass = mysqli_fetch_array($res);
            $account = "true";
            $e = $email;
            $btn = "<button onclick='resetPass(),check()'>Reset Password</button>";
        } else {
            $msg = "No Account Found";
            $account = "false";
        }
    }
    ?>
    <!-- HTML Code -->
    <nav class="top-nav">
        <div class="banner">
            <img src="img/sdpc_logo.png" alt="Icon" id="banner" width="55px">
        </div>
        <div class="title">
            <h1>Smart College</h1>
        </div>
    </nav>
    <form action="" method="POST" name="myform">
        <h2>RESET PASSWORD</h2>
        <input type="text" name="email" placeholder="Enter Your Email" id="email" required autocomplete="off" value=<?php echo "$e"; ?>>
        <?php
        if ($account == "true") {
            echo "<input type='password' name='pass' placeholder='Enter new Password' id='pass' autocomplete='off' required>";
            echo "<p id='err'></p>";
        }
        if ($account == "default") {
            echo "<script>
                    document.getElementById('email').style.borderColor = 'grey';
                </script>";
        }
        if ($account == "false") {
            echo "<script>
                    document.getElementById('email').style.borderColor = 'red';
                    document.write('$msg');
                </script>";
        }
        echo $btn;
        ?>
        <a href="Login.php">Login Here</a>
    </form>

    <script>
        var email = document.getElementById("email");
        var pass = document.getElementById("pass");

        function check() {
            if (email.value == "") {
                email.style.borderColor = "red";
                return false;
            }
            if (pass.value == "") {
                pass.style.borderColor = "red";
                return false;
            }
        }

        function resetPass() {
            <?php
            include_once("Database.php");
            $error = "default";

            if (isset($_POST['email']) && isset($_POST['pass'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                if ($admin) {
                    $update = mysqli_query($con, "UPDATE admin SET aPass='$pass' WHERE aEmail='$email'");
                }
                if ($stud) {
                    $update = mysqli_query($con, "UPDATE students SET sPass='$pass' WHERE emailid='$email'");
                }
                if ($teach) {
                    $update = mysqli_query($con, "UPDATE teacher SET tPass='$pass' WHERE email='$email'");
                }
                if ($res) {
                    $error = "true";
                } 
                else {
                    echo "document.write('Error while changing data');";
                    $error = "false";
                }
            }
            ?>
        }
    </script>
</body>

</html>
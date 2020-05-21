<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/img/favicon.ico">
    <link rel="stylesheet" href="css/login-design.css?<?=filemtime("css/login-design.css")?>">
    <link rel="icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <title>SDPC - Login</title>
    <style>
        body{
            background-image: url('img/login.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <!--//PHP Code -->
    <?php
    include_once("Database.php");

    $valid = "default";
    $msg = null;
    $admin = false;
    $stud = false;
    $teach = false;
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $res = mysqli_query($con, "SELECT * FROM admin WHERE aUser='$user' AND aPass='$pass'") or die(mysqli_error($con));
        $row = mysqli_num_rows($res);
        if ($row == 1) {
            $admin = true;
        }
        echo "<script>console.log('Admin : $row');</script>";
        if ($row == 0) {
            $res = mysqli_query($con,"SELECT * FROM students WHERE sUser='$user' AND sPass='$pass'");
            $row = mysqli_num_rows($res);
            if ($row == 1) {
                $stud = true;
            }
            echo "<script>console.log('Student : $row');</script>";

            if ($row == 0) {
                $res = mysqli_query($con,"SELECT * FROM teacher WHERE tUser='$user' AND tPass='$pass'");
                $row = mysqli_num_rows($res);
                if ($row == 1) {
                    $teach = true;
                }
                echo "<script>console.log('Teacher : $row');</script>";
            }
        }
        if ($res) {
            $row = mysqli_fetch_array($res);
            $valid = "invalid";
            $msg = "Check Username or Password";
            session_start();
            $_SESSION['logged'] = $user;
            if ($admin) {
                if ($row['aUser'] == $user && $row['aPass'] == $pass) {
                    $valid = "valid";
                    $msg = "Login Successfull";
                    header("Location:Admin Dashborad.php");
                    exit();
                }
            } else if ($stud) {
                if ($row['sUser'] == $user && $row['sPass'] == $pass) {
                    $valid = "valid";
                    $msg = "Login Successfull";
                    header("Location:Student Dashboard.php");
                    exit();
                }
            } else if ($teach) {
                if ($row['tUser'] == $user && $row['tPass'] == $pass) {
                    $valid = "valid";
                    $msg = "Login Successfull";
                    header("Location:Admin Dashborad.php");
                    exit();
                }
            } 
        }
    }
    ?>

    <!-- HTML Code -->
    <div class="form-panel" id="form-panel">
        <?php
        echo "<div class='top-indicator $valid' id='indicator'></div>";
        ?>
        <form name="login-form" action="Login.php" method="POST">
            <h1>Sign In</h1>
            <input type="text" placeholder="Username" name="username" id="user" required>
            <div class="pass">
                <input type="password" placeholder="Password" name="password" id="pass" required style="margin:0;border:none;flex:9;">
                <span onclick="showPass()" id="icon" class="fa fa-eye"></span>
            </div>
            <button onclick="checkLogin()">Login</button>
            <?php
            echo "<h4 id='msg'>$msg</h4>";
            ?>
            <span>Reset <a href="Forgot Username.php">Username</a> | <a href="Forgot Password.php">Password</a></span>
            <span><b>Create account</b> <a href="Staff Registration.php" id="btn-Signup">Teacher</a><a href="Student Registration.php" id="btn-Signup">Student</a></span>
        </form>
    </div>


    <!-- JS Code -->
    <script>
        function showPass() {
            var p = document.getElementById("pass");
            var icon = document.getElementById("icon");
            if (p.type === "password") {
                p.type = "text";
                icon.classList.remove("fa-eye")
                icon.classList.add("fa-lock")
            } else {
                p.type = "password";
                icon.classList.remove("fa-lock")
                icon.classList.add("fa-eye")
            }
        }

        function checkLogin() {
            var status = document.getElementById("indicator")
            var username = document.getElementById("user")
            var password = document.getElementById("pass")
            var message = document.getElementById("msg")

            if ((username.value == "") && (password.value == "")) {
                status.classList.remove("default")
                status.classList.remove("valid")
                status.classList.add("invalid")
                msg.innerText = "Enter username or password"
                return false;
            }
        }
    </script>

</body>

</html>
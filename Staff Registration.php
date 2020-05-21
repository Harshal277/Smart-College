
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <link rel="stylesheet" href="./css/login-design.css">
    <title>SDPC - Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #fafafa;
			background-image: url('img/bgreg.jpg');
			background-attachment: fixed;
            background-size: cover;
        }

        .form-panel {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .top-indicator {
            border-radius: 8px 8px 0 0;
            height: 6px;
            width: 100%;
        }

        .default {
            background-image: linear-gradient(-71deg, #4c7af1, #15c39a 95%);
        }

        .invalid {
            background-image: linear-gradient(-71deg, hsl(0, 100%, 50%), #f112a7 95%);
        }

        .valid {
            background-image: linear-gradient(-71deg, #07cef1, #b20df3 95%);
        }

        form {
            background: white;
            width: 30vw;
            height: auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px 0px rgba(0, 0, 0, .1);
            border-radius: 0 0 8px 8px;
        }

        h1 {
            color: #313131;
            font-weight: 400;
            text-transform: uppercase;
            transform: translateY(2vh);	
        }

        input {
            border: none;
            border: 1px solid #9e9e9e;
            width: 60%;
            padding: 10px;
            margin: 5px;
            margin-bottom: 15px;
        }

        input:focus {
            border: 1px solid #0080ff;
        }

        input:hover {
            border-color: #1246f1;
        }

        button {
            border: none;
            width: 65%;
            padding: 13px;
            background: linear-gradient(to right, #139ff0, #047ef1);
            border: 1px solid #086bec;
            color: white;
            font-size: 16px;
            margin-top: 10px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        button:hover {
            background: linear-gradient(to left, #04baf1, #047ef1);
            cursor: pointer;
        }

        button:focus {
            border: 1px solid #0080ff;
        }

        span {
            font-size: 15px;
            font-weight: 300;
            padding: 10px;

        }

        a {
            font-weight: 400;
            color: #515152;
            text-decoration: none;
        }

        a:hover {
            color: #044ff1;
        }

        h4 {
            font-weight: 400;
            font-size: 14px;
            color: crimson;
        }
		

        #btn-Signup {
            margin: 5px;
            padding: 6px 15px;
            background: #1da9fa;
            color: white;
            border-radius: 5px;
        }

        #btn-Signup:hover {
            background: #278bf0;
        }
        #dept{
            padding: 10px 20px;
            width: 65%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="form-panel">
        <div class="top-indicator default" id="indicator"></div>
        <form name="register-form" action="staffregister.php" method="POST" target="_self">
            <h1>Staff Register</h1>
            <input type="text" placeholder="First Name" name="first_name" id="first_name" required>
            <input type="text" placeholder="Last Name" name="last_name" id="last_name" required>
			<input type="text" placeholder="Abbrevation" name="abbrevation" id="abbrevation" required>
            <select name="dept" id="dept">
                <option disabled selected>Select Department</option>
                <option value="CO">Computer Engg.</option>
                <option value="CE">Civil Engg.</option>
				<option value="ME">Mechanical Engg.</option>
				<option value="EJ">Electronics & Telecommunication Engg.</option>
				<option value="EE">Electrical Engg.</option>
            </select>
		    <input type="email" placeholder="Email Id" name="email" id="email" required>
            <input type="text" placeholder="Username" name="aUser" id="aUser" required>		   
		   <input type="password" placeholder="Password" name="aPass" id="aPass" required>
		   
            <input type="text" placeholder="Mobile No" name="mobile" id="mobile" size="25" required>
			<button onclick="checkLogin()">Register</button>
            
        </form>
    </div>

    </div>
	
    
    
</body>
</html>
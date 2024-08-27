<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Health Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f7f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #555;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .text-center {
            text-align: center;
            color: #555;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .text-center a:hover {
            color: #0056b3;
        }

        .signup-link {
            margin-top: 15px;
            text-align: center;
        }

        .signup-link a {
            color: #555;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: #007bff;
        }

        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 8px 8px 0 0;
        }
    </style>
</head>
<body>
    <h1>IOT Based Health Monitoring System</h1>
    <div class="container">
        <h2>Login</h2>
        
        <form action="/model/ulogin.php" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <select class="form-control" id="role" name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="patients">Patient</option>
                    <option value="doctors">Doctor</option>
                    <option value="nurses">Nurse</option>
                </select>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="text-center signup-link">Don't have an account? <a href="signup.php">Sign up here</a></p>
       <!-- <p class="text-center"><a href="/model/forget_pass.php">Forgot Password?</a></p>-->
    </div>
</body>
</html>

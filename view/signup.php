<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - IOT Based Advance Health Monitoring System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 15px;
        }

        h2 {
            text-align: center;
            color: #343a40;
            font-size: 36px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        label {
            color: #495057;
            font-weight: 500;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button[type="submit"]:active {
            background-color: #004494;
            transform: translateY(0);
        }

        .specialization-field {
            display: none;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>IOT Based Advance Health Monitoring System</h1>
    </div>

    <div class="container">
        <h2>Signup</h2>
        <form action="/model/signup_process.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role" required onchange="toggleSpecializationField()">
                    <option value="patients">Patient</option>
                    <option value="doctors">Doctor</option>
                    <option value="nurses">Nurse</option>
                </select>
            </div>
            <div class="form-group specialization-field" id="specializationField">
                <label for="specialization">Specialization</label>
                <select class="form-control" id="specialization" name="specialization">
                    <option value="pediatrician">Pediatrician</option>
                    <option value="orthopedist">Emergency physician</option>
                    <option value="cardiologist">Cardiologist</option>
                    <option value="neurologist">Neurologist</option>
                    <option value="gynecologist">Gynecologist</option>
                    <option value="dentist">Dentist</option>
                    <option value="ophthalmologist">Ophthalmologist</option>
                    <option value="psychiatrist">Psychiatrist</option>
                    <option value="dermatologist">Dermatologist</option>
                    <option value="endocrinologist">Endocrinologist</option>
                    <option value="gastroenterologist">Gastroenterologist</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="/view/login.php">Login here</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
            var role = document.getElementById('role').value;

            if (name.trim() === '' || email.trim() === '' || password.trim() === '' || phone.trim() === '' || address.trim() === '') {
                alert('All fields are required');
                return false;
            }

            var atposition = email.indexOf("@");
            var dotposition = email.lastIndexOf(".");
            if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
                alert("Please enter a valid e-mail address");
                return false;
            }

            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (!password.match(passw)) {
                alert("Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");
                return false;
            }

            var phoneno = /^\d{11}$/;
            if (!phone.match(phoneno)) {
                alert("Please enter a valid phone number");
                return false;
            }

            var addrRegex = /^[a-zA-Z0-9\s,.'-]{3,}$/;
            if (!address.match(addrRegex)) {
                alert("Please enter a valid address");
                return false;
            }

            return true;
        }

        function toggleSpecializationField() {
            const role = document.getElementById('role').value;
            const specializationField = document.getElementById('specializationField');
            specializationField.style.display = role === 'doctors' ? 'block' : 'none';
        }
    </script>
</body>
</html>

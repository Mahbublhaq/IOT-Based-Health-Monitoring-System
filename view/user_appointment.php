<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Appointment Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>User Appointment Booking</h2>
        <form action="/model/user_appointment_process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="specialization">Select Specialization:</label>
                <select class="form-control" id="specialization" name="specialization" required>
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
            <button type="submit" class="btn btn-primary">Find Doctor</button>
        </form>
    </div>
</body>
</html>

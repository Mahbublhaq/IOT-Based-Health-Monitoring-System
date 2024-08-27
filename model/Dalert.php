<?php
// Start session
// session_start();

// Check if user is logged in and role is patient
// if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'patients') {
//     header("Location: login.php");
//     exit;
// }

// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve patient information
// $id = $_SESSION['id'];
// $sql = "SELECT * FROM patients WHERE id=$id";
// $result = $mysqli->query($sql);
// $patient = $result->fetch_assoc();

//select last data from health_data table
$sql1="SELECT * FROM health_data ORDER BY id DESC LIMIT 1";
$result1 = $mysqli->query($sql1);
$health_data = $result1->fetch_assoc();



// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Data - Health Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.4.0/justgage.min.js"></script>
</head>
<style>
   
.header{
    background-color: white;
    color: black;
    padding: 20px 0;
    text-align: center;

}
.header h1{
    margin-bottom: 20px;
}
.header h3{
    margin-bottom: 20px;
    background-color: black;
    color: white;
    width:20%;
    margin-left: 40%;
}

.pid{
    margin-bottom: 20px;
}
.head{
    margin-left: 60%;
    padding: auto;

}
.gos{
   margin-left: 10%;
    padding: auto;
    margin-top: 3%;
}


</style>
<body>
    <div class="header">
        <h1 style= background-color:aquamarine;height:50px;>IOT Base Smart Health Monitoring System</h1>
     
       
   
            <div class="head">   <?php include("../header/doctor_header.php"); ?></div>
         
            <div class="gos">
                <div class="row">
                    <!-- Display health data parameters with gauges -->
                    <div class="col-md-4">
                        <h5>Humidity</h5>
                        <div id="gauge-humidity"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>Temperature</h5>
                        <div id="gauge-temperature"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>ECG Value</h5>
                        <div id="gauge-ecgValue"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>Body Temperature</h5>
                        <div id="gauge-bodyTemp"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>SpO2</h5>
                        <div id="gauge-SpO2"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>BPM</h5>
                        <div id="gauge-bpm"></div>
                    </div>
                    <!-- Repeat the same structure for other health data parameters -->
                    <!-- You can adjust the layout as needed -->

                    <!-- Display other patient information -->
                    
                </div>
            </div>
        </div>
      

    </div>
   

       

    <script>
        // Initialize gauges for each health data parameter
        var gaugeHumidity = new JustGage({
            id: "gauge-humidity",
            value: <?php echo $health_data['humidity']; ?>,
            min: 0,
            max: 100,
            title: "Humidity"
        });

        var gaugeTemperature = new JustGage({
            id: "gauge-temperature",
            value: <?php echo $health_data['temperature']; ?>,
            min: 0,
            max: 100,
            title: "Temperature"
        });

        var gaugeEcgValue = new JustGage({
            id: "gauge-ecgValue",
            value: <?php echo $health_data['ecgValue']; ?>,
            min: 0,
            max: 1000,
            title: "ECG Value"
        });

        var gaugeBodyTemp = new JustGage({
            id: "gauge-bodyTemp",
            value: <?php echo $health_data['bodyTemp']; ?>,
            min: 0,
            max: 100,
            title: "Body Temperature"
        });

        var gaugeSpO2 = new JustGage({
            id: "gauge-SpO2",
            value: <?php echo $health_data['SpO2']; ?>,
            min: 0,
            max: 100,
            title: "SpO2"
        });

        var gaugeBpm = new JustGage({
            id: "gauge-bpm",
            value: <?php echo $health_data['bpm']; ?>,
            min: 0,
            max: 100,
            title: "BPM"
        });
        //alert make for all sensor
        //temprature>30 then give alert 
        if(<?php echo $health_data['temperature']; ?> > 30){
            alert("Temperature is high");
        }
        //humidity>70 then give alert
        if(<?php echo $health_data['humidity']; ?> > 70){
            alert("Humidity is high");
        }
        //ecgValue>1000 then give alert
        if(<?php echo $health_data['ecgValue']; ?> > 900){
            alert("ECG Value is high");
        }
        //bodyTemp>37 then give alert
        if(<?php echo $health_data['bodyTemp']; ?> > 37){
            alert("Body Temperature is high");
        }
        //SpO2>90 then give alert
        if(<?php echo $health_data['SpO2']; ?> > 90){
            alert("SpO2 is high");
        }
        //bpm>100 then give alert
        if(<?php echo $health_data['bpm']; ?> > 100){
            alert("BPM is high");
        }   else {
            alert("All Parameters are normal");
        }
      //auto refresh page in every 5 seconds
        setTimeout(function(){
            location.reload();
        },10000);

    </script>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.4.0/justgage.min.js"></script>

</body>
</html>

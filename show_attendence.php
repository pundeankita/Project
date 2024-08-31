<?php
include("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
    // Escape the date value to prevent SQL injection
    $date = mysqli_real_escape_string($con, $_POST['date']);
    
    // Query to fetch data from attendence_record based on the date
    $query = "SELECT * FROM attendence_record WHERE date = '$date'";
    
    // Execute the query
    $result = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>index</title>
    <style>
        /* Style for the navbar */
        .navbar {
            background-color: gray;
            color: white;
            text-align: center; /* Center align the text */
            padding: 8px;
            border-radius: 15px;
        }
        .btn {
            background-color: #007bff; /* Blue background color */
            color: #fff; /* White text color */
            text-decoration: none; /* Remove default underline */
            padding: 8px 16px; /* Adjust padding as needed */
            border-radius: 4px; /* Rounded corners */
            transition: background-color 0.3s; /* Smooth transition */
        }

        /* Hover effect */
        .btn:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
        }
    </style>
</head>
<body>
<div class="navbar">
        <h3>STAFF / STUDENT ATTENDANCE  SYSTEM</h3>
    </div>
<div class="header">
<h1> Attendance View TY.Bcs(computer science)</h1> 
</div>
<div class="container">
     <form action="index.php" method="POST">
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
           
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col"><a class="btn" href="add_stud.php">Add Student</a></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"><a class="btn" href="index.php">Back</a></th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Date input field -->
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <input type="date" name="date" required>
            <button type="submit" class="btn btn-primary">View Attendance</button>
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col">sr.no.</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Roll No</th>
                        <th scope="col">Attendance Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result)) {
                        $serialnumber = 0;
                        $counter = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $serialnumber++;
                    ?>
                            <tr>
                                <td><?php echo $serialnumber; ?></td>
                                <td><?php echo $row['student_name']; ?></td>
                                <td><?php echo $row['roll_no']; ?></td>
                                <td>
                                    <input type="radio" name="attendence_status[<?php echo $counter; ?>]"<?php if($row['attendence_status']=="Present") echo "checked=checked"; ?> value="Present"
                                    >Present
                                    <input type="radio" name="attendence_status[<?php echo $counter; ?>]"<?php if($row['attendence_status']=="Absent") echo "checked=checked"; ?> value="Absent">Absent
                                </td>
                            </tr>
                    <?php
                            $counter++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit Attendance</button>
     </form>
</div>
</body>
</html>

<?php
include("connection.php");



?>
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
<h1> Attendance View By Date</h1> 
</div>
<div class="container">
     
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
           
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col"><a class="btn" href="add_stud.php">Add Student</a></th>
                        <th scope="col"><a class="btn" href="index.php">Student Attendence</a></th>
                        <th scope="col"></th>
                        <th scope="col"><a class="btn" href="index.php">Back</a></th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col">Serial no:</th>
                        <th scope="col">Dates:</th>
                        <th scope="col">Show Attendence</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT distinct date FROM attendence_record");
                    $serialnumber = 0;

                    while ($row = mysqli_fetch_array($query)) {
                        $serialnumber++;
                    ?>
                        <tr>
                            <td><?php echo $serialnumber; ?></td>
                            <td><?php echo $row['date']; ?>
                            </td>
                            <td>
                                <form action="show_attendence.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['date']?>" name="date">
                                    <input type="submit" value="show attendence" class="btn btn-primary">
                                </form>
                            </td>
                            <td></td>
                            
                            
                        </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
</body>
</html>

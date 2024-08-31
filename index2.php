<?php
include("connection.php");
$flag = 0;
$result = 0;

if (isset($_POST['submit'])) {
    $date = date("Y-m-d");

    $records = mysqli_query($con, "SELECT * FROM attendence_record2 WHERE date='$date'");
    $num = mysqli_num_rows($records);
    
    if ($num) {
        foreach ($_POST['attendence_status'] as $id => $attendance_status) {
            $staff_name = $_POST['staff_name'][$id];
            $sub = $_POST['sub'][$id]; // Use $subject instead of $sub
            $result = mysqli_query($con, "UPDATE attendence_record2 SET attendence_status='$attendance_status' WHERE staff_name='$staff_name' AND sub='$sub' AND date='$date'");
            if ($result) {
                $result = 1;
            }
        }
    } else {
        foreach ($_POST['attendence_status'] as $id => $attendance_status) {
            $staff_name = $_POST['staff_name'][$id];
            $sub= $_POST['sub'][$id]; // Use $subject instead of $sub
            $result = mysqli_query($con, "INSERT INTO attendence_record2 (staff_name, sub, attendence_status, date) VALUES ('$staff_name', '$sub', '$attendance_status', '$date')");
            if ($result) {
                $flag = 1;
            }
        }
    }
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
<h1> Attendance View Of TY.Bcs(Computer Science)</h1> 
<h3>Staff</h3>
</div>
<div class="container">
     <form action="index2.php" method="POST">
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
           
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col"><a class="btn" href="add_stud.php">Add Student</a></th>
                        <th scope="col"><a class="btn" href="add_staff.php">Add Staff</a></th>
                        <th scope="col"><a class="btn" href="index.php">Student Attendence</a></th>
                        <th scope="col"><a class="btn" href="">View All</a></th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <?php if($flag) { ?>
        <div class="alert alert-success">Attendance Data Successfully Inserted</div>
    <?php } ?>

    <?php if($result) { ?>
        <div class="alert alert-success">Staff Attendance Updated Successfully</div>
    <?php } ?>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col">sr.no.</th>
                        <th scope="col">Staff Name</th>
                        <th scope="col">subject</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $date = date("Y-m-d");
                    $query = mysqli_query($con, "SELECT * FROM attendence_staff ");
                    $serialnumber = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $serialnumber++;
                ?>
                        <tr>
                            <td><?php echo $serialnumber; ?></td>
                            <td><?php echo $row['staff_name']; ?>
                            <input type="hidden" value="<?php echo $row['staff_name']; ?>" name="staff_name[]">
                            </td>
                            <td><?php echo $row['subject']; ?>
                            <input type="hidden" value="<?php echo $row['subject']; ?>" name="sub[]">
                            </td>
                           
                        </tr>
                    <?php
                    $counter++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
     
     </form>
</div>
</body>
</html>

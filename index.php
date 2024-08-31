<?php
include("connection.php");
$flag = 0;
$result = 0;

if (isset($_POST['submit'])) 
{
    $date = date("Y-m-d");

    // Fetch all records for the current date
    $records = mysqli_query($con, "SELECT * FROM attendence_record WHERE date='$date'");
    $num = mysqli_num_rows($records);
    
    if ($num) 
    {
        foreach ($_POST['attendence_status'] as $id => $attendance_status) {
            $student_name = $_POST['student_name'][$id];
            $roll_no = $_POST['roll_no'][$id];
            // Update each record individually
            $result = mysqli_query($con, "UPDATE attendence_record SET attendence_status='$attendance_status' WHERE student_name='$student_name' AND roll_no='$roll_no' AND date='$date'");
            if ($result)
             {
                $result = 1;
            }
        }
    } else 
    {
        foreach ($_POST['attendence_status'] as $id => $attendance_status) {
            $student_name = $_POST['student_name'][$id];
            $roll_no = $_POST['roll_no'][$id];
            // Insert each record individually
            $result = mysqli_query($con, "INSERT INTO attendence_record (student_name, roll_no, attendence_status, date) VALUES ('$student_name', '$roll_no', '$attendance_status', '$date')");
            if ($result)
             {
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
</div>
<div class="container">
     <form action="index.php" method="POST">
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
           
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col"><a class="btn" href="add_stud.php">Add Student</a></th>
                        <th scope="col"><a class="btn" href="add_staff.php">Add Staff</a></th>
                        <th scope="col"><a class="btn" href="index2.php">View Staff</a></th>
                        <th scope="col"><h3>Date:<?php echo date("Y-m-d");?></h3></th>
                        <th scope="col"><a class="btn" href="view_all.php">View All</a></th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <?php if($flag) { ?>
        <div class="alert alert-success">Attendance Data Successfully Inserted</div>
    <?php } ?>

    <?php if($result) { ?>
        <div class="alert alert-success">Student Attendance Updated Successfully</div>
    <?php } ?>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <table class="table text-center table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col">sr.no.</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Roll_no</th>
                        <th scope="col">Attendance Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Assuming $date is defined earlier in your script
                    $date = date("Y-m-d");

                    // Execute the SQL query using $date
                    $query = mysqli_query($con, "SELECT * FROM attendence ");
                    $serialnumber = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $serialnumber++;
                ?>
                        <tr>
                            <td><?php echo $serialnumber; ?></td>
                            <td><?php echo $row['student_name']; ?>
                            <input type="hidden" value="<?php echo $row['student_name']; ?>" name="student_name[]">
                            </td>
                            <td><?php echo $row['roll_no']; ?>
                            <input type="hidden" value="<?php echo $row['roll_no']; ?>" name="roll_no[]">
                            </td>
                            <td>
                                <input type="radio" name="attendence_status[<?php echo $counter; ?>]" value="Present" <?php if(isset($_POST['attendence_status'][$counter]) && ($_POST['attendence_status'][$counter]=="Present")) { echo "checked='checked'"; } ?> required>Present
                                <input type="radio" name="attendence_status[<?php echo $counter; ?>]" value="Absent" <?php if(isset($_POST['attendence_status'][$counter]) && ($_POST['attendence_status'][$counter]=="Absent")) { echo "checked='checked'"; } ?> required>Absent
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
     <button type="submit" name="submit" class="btn btn-primary">Submit Attendance</button>
     </form>
</div>
</body>
</html>

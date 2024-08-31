<?php 
require("header.php");
require("connection.php");

$flag = 0;
if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $roll = mysqli_real_escape_string($con, $_POST['roll']); // Corrected variable name

    $query = "INSERT INTO attendence(student_name, roll_no) VALUES ('$name', '$roll')"; // Corrected variable name
    
    // Execute the query
    $result = mysqli_query($con, $query);
    
    if($result) {
        $flag = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_student</title>
    <style>
        /* Styles for the panel header */
        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-container {
            position: relative;
            display: flex;
            flex-direction: row;
            padding: 100px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }
        .form-container img {
            width: 300px;
            height: 300px;
            margin-left: -50px;
            border-radius: 15px;
            opacity: 0.9; /* Adjust the opacity value as needed (0 to 1) */
        }
       
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #000;;
        }

        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            font-size: 16px;
        }

        .input-box .icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #888;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 40px;
            transform: translateY(-50%);
            color: #888;
            pointer-events: none;
            transition: 0.3s;
        }

        .input-box input:focus + label,
        .input-box input:valid + label {
            top: 10px;
            font-size: 12px;
            color: #333;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Add Student in TY.Bcs(computer science)</h2>
    
    <div class="form-container">
        <?php if($flag){?>
            <div>
                <strong>Success!</strong> Your Student has been successfully inserted. 
            </div>
        <?php }?>
        
        <form action="add_stud.php" method="POST">
            <h2>Add Student</h2>

            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="text" name="name" id="name" required>
                <label>Student Name</label>
            </div>

            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="int" name="roll" id="roll" required>
                <label>Roll_No</label>
            </div>

            <button type="submit" class="login-btn" name="submit">Submit</button>
            <br>
            <button><a class="btn btn-info" href="index.php">Attendance</a></button>
        </form>
    </div>
</body>
</html>

<?php
include 'connet.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM npi_clg WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "No student found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $updateSQL = "UPDATE npi_clg SET 
                    fullName='$fullName',
                    email='$email',
                    phone='$phone',
                    address='$address'
                  WHERE id=$id";

    if ($conn->query($updateSQL) === TRUE) {
        header("Location: student-list.php");
        exit;
    } else {
        echo "Update failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #00a9b0;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-submit {
            margin-top: 20px;
            background-color: #00a9b0;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #008b94;
        }

        .back-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #444;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Student</h2>
    <form method="POST">
        <label>Full Name:</label>
        <input type="text" name="fullName" value="<?= htmlspecialchars($row['fullName']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required>

        <label>Address:</label>
        <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required>

        <button type="submit" class="btn-submit">Update</button>
        <a href="student-list.php" class="back-link">← Back to List</a>
    </form>
</div>

</body>
</html>

<?php
include 'connet.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM npi_clg WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "❌ No student found with this ID.";
        exit;
    }
} else {
    echo "⚠️ Invalid Request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #00a9b0;
        }

        .info {
            margin-top: 20px;
        }

        .info label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        .info p {
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            background-color: #00a9b0;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #008b94;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>👤 Student Details</h2>
    
    <div class="info">
        <label>Full Name:</label>
        <p><?= htmlspecialchars($row['fullName']) ?></p>

        <label>Email:</label>
        <p><?= htmlspecialchars($row['email']) ?></p>

        <label>Phone:</label>
        <p><?= htmlspecialchars($row['phone']) ?></p>

        <label>Address:</label>
        <p><?= htmlspecialchars($row['address']) ?></p>
    </div>

    <a href="student-list.php" class="btn-back">← Back to List</a>
</div>

</body>
</html>

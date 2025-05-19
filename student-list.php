<?php
include 'connet.php';

$sql = "SELECT * FROM npi_clg"; 
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        
        table {
            text-aling : center;
            border-collapse: collapse;
            width: 100%;
        }
        h2{
            font-variant: small-caps;
            font-size : 40px;
            margin-left : 550px;
            color :  #00a9b0;
        }

        th, td {
            font-size : 20px;
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #00a9b0;
            color: white;
        }
        .btn {
            padding: 7px 14px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            color: white;
            cursor: pointer;
            margin: 3px 6px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-view {
            background-color:rgb(73, 91, 5);
        }

        .btn-edit {
            background-color:rgb(33, 148, 243);
        }

        .btn-delete {
            background-color:rgb(231, 17, 17);
        }
    </style>
</head>
<body>

<h2>Student Admission List</h2>

<table>
    <tr>
        <th>SL No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>

    <?php 
    $sl = 1;
    foreach ($result as $row): 
        $firstName = $row['fullName'] ?? '';
        $email = $row['email'] ?? '';
        $phone = $row['phone'] ?? '';
        $address = $row['address'] ?? '';
    ?>
        <tr>
            <td><?= $sl++ ?></td>
            <td><?= htmlspecialchars(trim($firstName . ' ')) ?></td>
            <td><?= htmlspecialchars($email) ?></td>
            <td><?= htmlspecialchars($phone) ?></td>
            <td><?= htmlspecialchars($address) ?></td>

            <td class="btn">
                <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-view">View</a>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-delete" ;">Delete</a>
            </td>
          
        </tr>
            
    <?php endforeach; ?>
</table>

</body>
</html>
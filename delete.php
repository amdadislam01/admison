<?php
include 'connet.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM npi_clg WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: student-list.php?msg=deleted");
        exit();
    } else {
        header("Location: student-list.php?msg=error");
        exit();
    }
} else {
    header("Location: student-list.php?msg=invalid");
    exit();
}
?>

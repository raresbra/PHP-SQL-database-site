<?php
    include("conectarephp.php");

    if(isset($_GET["id"])) {
        $sql = "DELETE FROM laborant WHERE `idlaborant` = ?";
        $stmt = $conectare->prepare($sql);
        $stmt->bind_param("i", $_GET["id"]);

        if ($stmt->execute()) {
            echo "<div style='text-align: center; width: 100%; position: absolute; top: 50%; transform: translateY(-50%);'>Record deleted successfully.</div>";
        } else {
            echo "Error deleting record: " . mysqli_error($conectare);
        }

        $stmt->close();
    }

    mysqli_close($conectare);
?>
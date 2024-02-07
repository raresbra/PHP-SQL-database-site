<!DOCTYPE html>
<?php

include("conectarephp.php");


$sql = "DELETE FROM conferinte WHERE IDc ='" . $_GET["id"] . "'";
if (mysqli_query($conectare, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conectare);
}
mysqli_close($conectare);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    header("Location:" . BASE_URL . "/checkout/confirmation.php");
}
<?php
if(isset($_SESSION['rol'])){
session_unset();    
session_destroy();
header('Location: login.php');
}
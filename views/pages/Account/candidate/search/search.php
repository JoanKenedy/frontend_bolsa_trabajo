<?php

if (isset($_POST['btnSearch'])) {
   if (empty($_POST['job-title'])) {
      $jobLocation = strtolower($_POST['job-location']);
      $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
      $sql = "SELECT * FROM crear_vacantes WHERE lugar_de_trabajo LIKE '" . $jobLocation . "%'";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows == 0) {
         include "views/modules/search_error.php";
      } else {
         include "views/modules/search_result.php";
      }
   } else if (empty($_POST['job-location'])) {
      $jobTitle = strtolower($_POST['job-title']);
      $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
      $sql = "SELECT * FROM crear_vacantes WHERE title_vacante LIKE '" . $jobTitle . "%'";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows == 0) {
         include "views/modules/search_error.php";
      } else {
         include "views/modules/search_result.php";
      }
   } else {
      $jobTitle = strtolower($_POST['job-title']);
      $jobLocation = strtolower($_POST['job-location']);
      $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
      $sql = "SELECT * FROM crear_vacantes WHERE title_vacante LIKE '" . $jobTitle . "%' and lugar_de_trabajo='" . $jobLocation . "%'";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows == 0) {
         include "views/modules/search_error.php";
      } else {
         include "views/modules/search_result.php";
      }
   }
}

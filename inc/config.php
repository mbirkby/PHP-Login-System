<?php
  if (!defined('__CONFIG__')) {
      exit('You do not have a config file');
  }

  //Sessions are turned on
  if(!isset($_SESSION)) {
    session_start();
  }
  
  //Show errors
  error_reporting(-1);
  ini_set('display_errors','On');
  
  //include DB
  include_once "classes/DB.php";
  include_once "classes/Filter.php";
  include_once "functions.php";

  $con = DB::getConnection();
?>
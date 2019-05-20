<?php
/**
 * Created by PhpStorm.
 * User: SARA PERERA
 * Date: 9/18/2018
 * Time: 10:08 PM
 */

session_start();
session_destroy();
header("location: MemberLogin.php");

?>
<?php

/**
 * Created by PhpStorm.
 * User: SARA PERERA
 * Date: 9/18/2018
 * Time: 8:39 PM
 */

function email_exists($email,$db){

    $result = mysqli_query($db, "SELECT memberId FROM members WHERE email= '$email'");

    //print_r($result->num_rows);
    if ($result->num_rows > 0)
    {
        return true;
    }
    else {
        return false;
    }

}


function logged_in(){

    if(isset($_SESSION ['email']))
    {
        return true;
    }
    else {
        return false;
    }


}

?>
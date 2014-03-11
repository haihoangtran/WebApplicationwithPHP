<?php

/*
 * Title: Modify user information
 * This code is designed to be able to change user information PROVIDED that
 * they are logged in.
 * Name: Michael Tran
 * Date: 11/29/2012
 * Date Approved:
 * Name of Approver:
 *
 *
 *
 * Names of files accessed:
 * Names of files changed:
 *
 * Faults:
 */
include ("include.php");

class modify {

    // UNFINISHED CODE
    function changeMemberPassword() {
        //$number = (GET THIS AFTER SOMEONE IS LOGGED IN)
        $password = $_POST['password'];
        $query = "UPDATE Members SET m_passw='$password' WHERE m_number='$number'";
        mysql_query($query) or die(mysql_error());
    }

    // UNFINISHED CODE
    function changeProviderPassword() {
        //$number = (GET THIS AFTER SOMEONE IS LOGGED IN)
        $password = $_POST['password'];
        $query = "UPDATE Providers SET p_passw='$password' WHERE p_number='$number'";
        mysql_query($query) or die(mysql_error());
    }

}

?>

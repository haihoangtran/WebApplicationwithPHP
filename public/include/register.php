<?php

/*
 * Title: Register a user to the database
 * This code will check and fix any input, then query the information
 * into the database, effectively registering the user to the website.
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

class register {
    /*
     * The following 3 functions submit the member information into the database.
     */

    function RegisterMember() {
        $formvars = array();
        $this->CollectMemberRegistrationSubmission($formvars);
        //$this->checkMemberLogin($formvars['username']);
        $this->insertMemberToDatabase($formvars);
    }

    function CollectMemberRegistrationSubmission(&$formvars) {
        $formvars['name'] = $this->Sanitize($_POST['name']);
        $formvars['street'] = $this->Sanitize($_POST['street']);
        $formvars['city'] = $this->Sanitize($_POST['city']);
        $formvars['state'] = $this->Sanitize($_POST['state']);
        $formvars['zipcode'] = $this->Sanitize($_POST['zipcode']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['username'] = $this->Sanitize($_POST['username']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
    }

    function insertMemberToDatabase($formvars) {
        $name = $formvars['name'];
        $street = $formvars['street'];
        $city = $formvars['city'];
        $state = $formvars['state'];
        $zipcode = $formvars['zipcode'];
        $email = $formvars['email'];
        $username = $formvars['username'];
        $password = $formvars['password'];
        $query = "INSERT INTO Members (m_name, m_status, m_fee, m_street, m_city, m_state, m_zip, m_login, m_passw, m_email)
                   VALUES ('$name', 'A', 0, '$street', '$city', '$state', '$zipcode', '$username', '$password', '$email')";
        mysql_query($query) or die(mysql_error());
    }

    function checkMemberLogin($username) {
        $query = "SELECT m_login FROM Members WHERE m_login='$username'";

        $result = mysql_query($query);

        if(mysql_num_rows($result) > 0)
        {

        }
    }

    /*
     * The following 3 functions submit the provider information into the database.
     */

    function RegisterProvider() {
        $formvars = array();
        $this->CollectProviderRegistrationSubmission($formvars);
        $this->insertProviderToDatabase($formvars);
    }

    function CollectProviderRegistrationSubmission(&$formvars) {
        $formvars['name'] = $this->Sanitize($_POST['name']);
        $formvars['type'] = $_POST['type'];
        $formvars['street'] = $this->Sanitize($_POST['street']);
        $formvars['city'] = $this->Sanitize($_POST['city']);
        $formvars['state'] = $this->Sanitize($_POST['state']);
        $formvars['zipcode'] = $this->Sanitize($_POST['zipcode']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['username'] = $this->Sanitize($_POST['username']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
    }

    function insertProviderToDatabase($formvars) {
        $name = $formvars['name'];
        $type = $formvars['type'];
        $street = $formvars['street'];
        $city = $formvars['city'];
        $state = $formvars['state'];
        $zipcode = $formvars['zipcode'];
        $email = $formvars['email'];
        $username = $formvars['username'];
        $password = $formvars['password'];
        $query = "INSERT INTO Providers (p_name, p_type, p_street, p_city, p_state, p_zip, p_login, p_passw, p_email)
                    VALUES ('$name', '$type', '$street', '$city', '$state', '$zipcode', '$username', '$password', '$email')";
        mysql_query($query) or die(mysql_error());
    }

    /*
      Sanitize() function removes any potential threat from the
      data submitted. Prevents email injections or any other hacker attempts.
      if $remove_nl is true, newline chracters are removed from the input.
     */

    function Sanitize($str, $remove_nl=true) {
        $str = $this->StripSlashes($str);

        if ($remove_nl) {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
            );
            $str = preg_replace($injections, '', $str);
        }

        return $str;
    }

    function StripSlashes($str) {
        if (get_magic_quotes_gpc ()) {
            $str = stripslashes($str);
        }
        return $str;
    }

}

?>

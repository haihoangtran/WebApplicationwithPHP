<?PHP
/*
 * Title: Member Registration Page
 * This code will allow the members to register for the website.
 * Name: Michael Tran
 * Date: 11/29/2012
 * Date Approved:
 * Name of Approver:
 *
 * $validator ensures that the text boxes are filled and up to standards before
 *  adding to the database.
 *
 * Names of files accessed:
 * Names of files changed:
 *
 * Faults:
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?PHP
        require_once "./include/formvalidator.php";
        require_once "./include/register.php";

        $show_form = true;
        if (isset($_POST['Submit'])) {
            //Validate the text boxes before submitting
            //Add more validations here as required
            $validator = new FormValidator();
            $validator->addValidation("name", "req", "Please fill in Name");
            $validator->addValidation("street", "req", "Please fill in Street");
            $validator->addValidation("city", "req", "Please fill in City");
            $validator->addValidation("state", "req", "Please fill in State");
            $validator->addValidation("city", "req", "Please fill in City");
            $validator->addValidation("zipcode", "req", "Please fill in Zip-Code");
            $validator->addValidation("email", "email",
                    "The input for Email should be a valid email value");
            $validator->addValidation("email", "req", "Please fill in Email");
            $validator->addValidation("username", "req", "Please fill in Username");
            $validator->addValidation("password", "req", "Please fill in Password");
            if ($validator->ValidateForm() && isset($_POST['submitted'])) {
                //$register will submit the data to the database
                $register = new register();
                $register->RegisterMember();
                echo "<h2>Thanks for registering!</h2><p>";
                echo "<a href=index.php>Click here to return.</a>";
                $show_form = false;
            } else {
                echo "<B>Validation Errors:</B>";
                $error_hash = $validator->GetErrors();
                foreach ($error_hash as $inpname => $inp_err) {
                    echo "<p>$inpname : $inp_err</p>\n";
                }
            }
        }
        if (true == $show_form) {
        ?>

        </body>

        <form id='register' action='' method='post'
              accept-charset='UTF-8'>
            <fieldset >
                <legend>Member Registration</legend>
                <input type='hidden' name='submitted' id='submitted' value='1'/>

                Note: All fields are required.
                <p>
                <table border="0">
                    <tr>
                        <th><label for='name' >Your Full Name: </label></th>
                        <th><input type='text' name='name' id='name' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='street' >Street: </label></th>
                        <th><input type='text' name='street' id='street' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='city' >City: </label></th>
                        <th><input type='text' name='city' id='city' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='state' >State: </label></th>
                        <th><input type='text' name='state' id='state' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='zipcode' >Zip-code: </label></th>
                        <th><input type='text' name='zipcode' id='zipcode' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='email' >Email Address: </label></th>
                        <th><input type='text' name='email' id='email' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='username' >UserName: </label></th>
                        <th><input type='text' name='username' id='username' maxlength="50" /></th>
                    </tr>
                    <tr>
                        <th><label for='password' >Password: </label></th>
                        <th><input type='password' name='password' id='password' maxlength="50" /></th>
                    </tr>
                </table>
                <input type='submit' name='Submit' value='Submit' />
            </fieldset>
        </form>

    <?PHP
        }//true == $show_form
    ?>


</html>

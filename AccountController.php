<?php

/*
 * Title: AccountController (CONTROLLER)
 * These functions control the actions made by the views
 * Name: Michael Tran
 * Date: 12/02/2012
 * Date Approved:
 * Name of Approver:
 *
 * $validator ensures that the text boxes are filled and up to standards before
 *  adding to the database.
 *
 * Names of files accessed: TEAM6OFHS Database
 * Names of files changed: TEAM6OFHS Database
 *
 * Faults:
 */

// ./application/controllers/AccountController.php

include ("./include/include.php");
include ("./include/formvalidator.php");

class AccountController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    // VIEW/ACTION: addmember
    // Allows a user to register as a member
    public function addmemberAction() {
        $form = new Application_Form_Members();
        $form->submit->setLabel('Add');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $name = $form->getValue('name');
                $street = $form->getValue('street');
                $city = $form->getValue('city');
                $state = $form->getValue('state');
                $zipcode = $form->getValue('zipcode');
                $email = $form->getValue('email');
                $username = $form->getValue('username');
                $password = $form->getValue('password');

                //check if username is in use
                $query = "SELECT m_login FROM Members WHERE m_login='$username'";
                $result = mysql_query($query);
                if (mysql_num_rows($result) > 0) {
                    echo "Oops, someone already is using that login.";
                } else {
                    $members = new Application_Model_DbTable_Members();
                    $members->addMembers($name, 'A', '0', $street, $city, $state, $zipcode, $username, $password, $email);
                    $this->_helper->redirector('index');
                }
            } else {
                $form->populate($formData);
            }
        }
    }

    // VIEW/ACTION: addprovider
    // Allows a user to register as a provider
    public function addproviderAction() {
        $form = new Application_Form_Providers();
        $form->submit->setLabel('Add');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $name = $form->getValue('name');
                $type = $form->getValue('type');
                $street = $form->getValue('street');
                $city = $form->getValue('city');
                $state = $form->getValue('state');
                $zipcode = $form->getValue('zipcode');
                $email = $form->getValue('email');
                $username = $form->getValue('username');
                $password = $form->getValue('password');

                //check if username is in use
                $query = "SELECT p_login FROM Providers WHERE p_login='$username'";
                $result = mysql_query($query);
                if (mysql_num_rows($result) > 0) {
                    echo "Oops, someone already is using that login.";
                } else {
                    $providers = new Application_Model_DbTable_Providers();
                    $providers->addProviders($name, $type, $street, $city, $state, $zipcode, $username, $password, $email);
                    $this->_helper->redirector('index');
                }
            } else {
                $form->populate($formData);
            }
        }
    }

    // VIEW/ACTION: edit
    // Allows a user to edit information, it is required that they are logged in
    // $userid is obtained from $_COOKIE['id']
    public function editAction() {

        $members = new Application_Model_DbTable_Members();
        $providers = new Application_Model_DbTable_Providers();
        $userInfo = Zend_Auth::getInstance()->getStorage()->read();
        if ($userInfo->p_number != null) {
            $userid = $userInfo->p_number;
        } else {
            $userid = $userInfo->m_number;
        }
        //check if a certain submit button has been clicked, then do modify/delete
        // MEMBER CHECKS
        if (isset($_POST['SubmitMemberName'])) {
            $validator = new FormValidator();
            $validator->addValidation("name", "req", "Please fill in Name");
            if ($validator->ValidateForm()) {
                $members->changeMemberName($userid);
            }
        }
        if (isset($_POST['SubmitMemberCity'])) {
            $validator = new FormValidator();
            $validator->addValidation("city", "req", "Please fill in City");
            if ($validator->ValidateForm()) {
                $members->changeMemberCity($userid);
            }
        }
        if (isset($_POST['SubmitMemberState'])) {
            $validator = new FormValidator();
            $validator->addValidation("state", "req", "Please fill in State");
            if ($validator->ValidateForm()) {
                $members->changeMemberState($userid);
            }
        }
        if (isset($_POST['SubmitMemberZipcode'])) {
            $validator = new FormValidator();
            $validator->addValidation("zipcode", "req", "Please fill in Zipcode");
            if ($validator->ValidateForm()) {
                $members->changeMemberZipcode($userid);
            }
        }
        if (isset($_POST['SubmitMemberEmail'])) {
            $validator = new FormValidator();
            $validator->addValidation("email", "req", "Please fill in Email");
            $validator->addValidation("email", "email", "The input for Email should be a valid email value");
            if ($validator->ValidateForm()) {
                $members->changeMemberEmail($userid);
            }
        }
        if (isset($_POST['SubmitMemberPassword'])) {
            $validator = new FormValidator();
            $validator->addValidation("password", "req", "Please fill in New Password");
            if ($validator->ValidateForm()) {
                $members->changeMemberPassword($userid);
            }
        }

        // PROVIDER CHECKS
        if (isset($_POST['SubmitProviderName'])) {
            $validator = new FormValidator();
            $validator->addValidation("name", "req", "Please fill in Name");
            if ($validator->ValidateForm()) {
                $providers->changeProviderName($userid);
            }
        }
        if (isset($_POST['SubmitProviderCity'])) {
            $validator = new FormValidator();
            $validator->addValidation("city", "req", "Please fill in Name");
            if ($validator->ValidateForm()) {
                $providers->changeProviderCity($userid);
            }
        }
        if (isset($_POST['SubmitProviderState'])) {
            $validator = new FormValidator();
            $validator->addValidation("state", "req", "Please fill in Name");
            if ($validator->ValidateForm()) {
                $providers->changeProviderState($userid);
            }
        }
        if (isset($_POST['SubmitProviderZipcode'])) {
            $validator = new FormValidator();
            $validator->addValidation("zipcode", "req", "Please fill in Name");
            if ($validator->ValidateForm()) {
                $providers->changeProviderZipcode($userid);
            }
        }
        if (isset($_POST['SubmitProviderEmail'])) {
            $validator = new FormValidator();
            $validator->addValidation("email", "req", "Please fill in Name");
            $validator->addValidation("email", "email", "The input for Email should be a valid email value");
            if ($validator->ValidateForm()) {
                $providers->changeProviderEmail($userid);
            }
        }

        if (isset($_POST['SubmitProviderPassword'])) {
            $validator = new FormValidator();
            $validator->addValidation("password", "req", "Please fill in New Password");
            if ($validator->ValidateForm()) {
                $providers->changeProviderPassword($userid);
            }
        }
        // DELETEING ACCOUNTS
        if (isset($_POST['SubmitDeleteMember'])) {
            $members->deleteMembers($userid);
            //logout of the account
            //include("logout.php");
            //redirect to the index
            $this->_helper->redirector('index');
        }
        if (isset($_POST['SubmitDeleteProvider'])) {
            $providers->deleteProviders($userid);
            //logout of the account
            //include("logout.php");
            //redirect to the index
            $this->_helper->redirector('index');
        }
    }

}


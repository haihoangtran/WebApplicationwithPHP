<?php

class TestimonialController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $testDat = new Application_Model_DbTable_Testmonials();
        $this->view->testInfo = $testDat->fetchAll();

        $accountDat = new Application_Model_DbTable_Account();
        $this->view->accountInfo = $accountDat->fetchAll();
    }

    public function writeTestimonialAction() {

        $this->view->isSet = false;
        $request = new Zend_Controller_Request_Http();

        if ($activeUser = $request->getCookie("USER")) {
            
            $form = new Application_Form_Testimonial();

            $this->view->form = $form;

            $this->view->activeUser = $activeUser;

            if ($this->getRequest()->isPost()) {

                $formData = $this->getRequest()->getPost();

                if ($form->isValid($formData)) {
                    $this->view->isSet = true;
                    
                    $con = new Application_Model_DbTable_Testmonials();

                    //$this->view->formDat = $form->getValue('body');

                    $testDat = $con->fetchAll();
                    
                    $highestVal = 0;
                    foreach ($testDat as $dat):
                        if($dat->TESTMONIAL_ID > $highestVal)
                                $highestVal = $dat->TESTMONIAL_ID;
                    endforeach;
                    $highestVal++;

                    $insertData = array(
                        'TESTMONIAL_ID' => $highestVal,
                        'ACCOUNT_ID' => $activeUser,
                        'TEST_TEXT' => $form->getValue('body'),
                        'DATE' => date('h-i-s, j-m-y, it is w Day'),
                    );

                    $con->insert($insertData);

                    $this->_helper->redirector('index', 'testimonial');

                } else {

                    $form->populate($formData);
                }
            }
        }
        else{
            $activeUser = NULL;
            $this->view->activeUser = $activeUser;
        }
    }

    public function searchTestimonialsAction() {
        // action body
        $form = new Application_Form_SearchTestimonial();
        $this->view->form = $form;
/*
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            $con = new Application_Model_DbTable_Testmonials();
            $testDat = $con->fetchAll();
            /*
            foreach ($testDat as $dat):
                preg_match($formData, $dat->TEST_TEXT, $matches);
            endforeach;
            
            foreach($testDat as $key => $value):
                preg_match($formData, $testDat->TEST_TEXT, $value);
                $matches[$key] = $value;
            endforeach;
            //return matches?
            $this->_helper->redirector('index', 'testimonial');

        }else {
            $form->populate($formData);
        }
*/
    }
}
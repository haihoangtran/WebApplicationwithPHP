<?php

class Application_Model_DbTable_Account extends Zend_Db_Table_Abstract
{

    protected $_name = 'ACCOUNT';
    protected $_primary = 'ACCOUNT_ID';

    
    public function getUserName($account_id)
    {
        
        $id = (int)$account_id;

        $sql = $this->_db->query('SELECT NAME FROM ACCOUNT WHERE ACCOUNT_ID = 1');
        $row = $sql->fetchAll();

        //$row = $this->fetchAll();
        //if (!$row) {
        //    throw new Exception("Could not find row $id");
        //}

        return $row;
    }
}


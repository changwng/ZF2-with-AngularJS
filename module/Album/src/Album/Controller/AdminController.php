<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AdminController extends AbstractRestfulController {

    protected $_userTable;

    public function getList() {
        //
    }

    public function get($id) {
        //
    }

    public function create($data) {
        $userInfo = $this->getUserTable()->getUser($data);
        //error_log(print_r($userInfo,1));
        $data = array();
        if(count($userInfo)) {
            $userInfo = $userInfo[0];
            $data['status'] = 1;
            $data['userInfo'] = $userInfo;
        } else {
            $data['status'] = 0;
        }
        return new JsonModel($data);
    }

    public function update($id, $data) {
        //
    }

    public function delete($id) {
        //
    }

    public function getUserTable()
    {
        if (!$this->_userTable) {
            $sm = $this->getServiceLocator();
            $this->_userTable = $sm->get('Album\Model\UserTable');
        }
        return $this->_userTable;
    }
}

<?php

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class UserTable
{
    protected $table = 'admin_user';
    protected $tableGateway;

    public function __construct($tableGateway)
    {
        $this->tableGateway = new TableGateway($this->table, $tableGateway, null,new HydratingResultSet());
    }

    public function getUser($data)
    {
        $userName = $data['username'];
        $password = $data['password'];
        $resultSet = $this->tableGateway->select(function (Select $select) use ($userName, $password) {
            $select->columns(array('user_id', 'firstname', 'lastname', 'username'));
            $select->where(array('admin_user.username'=>$userName));
            $select->where("admin_user.password = MD5($password)");
        });

        return $resultSet->toArray();
    }
}

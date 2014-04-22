<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AlbumController extends AbstractRestfulController {

    protected $_albumTable;

    public function getList() {
        $results = $this->getAlbumTable()->fetchAll();
        $data = array();
        foreach($results as $result) {
            $data[] = $result;
        }

        return new JsonModel(array(
                'data' => $data)
        );
    }

    public function get($id) {
        $album = $this->getAlbumTable()->getAlbum($id);
        return new JsonModel(array('data' =>$album));
    }

    public function create($data) {
        $albumId = $this->getAlbumTable()->saveAlbum($data);
        return new JsonModel(array(
            'data' => $this->getAlbumTable()->getAlbum($albumId),
        ));
    }

    public function update($id, $data) {
        $data['id'] = $id;
        $albumId = $this->getAlbumTable()->saveAlbum($data);
        return new JsonModel(array(
            'data' => $this->getAlbumTable()->getAlbum($id),
        ));
    }

    public function delete($id) {
        $this->getAlbumTable()->deleteAlbum($id);
        return new JsonModel(array(
            'data' => 'deleted',
        ));
    }

    public function getAlbumTable()
    {
        if (!$this->_albumTable) {
            $sm = $this->getServiceLocator();
            $this->_albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->_albumTable;
    }
}

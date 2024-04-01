<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminRegionsController extends AdminContentController {
    public $name = 'AdminRegions';
    public $uses = array('Region');

    public $paginate = array(
        'fields' => array('id', 'title', 'sorting'),
        'order' => array('sorting' => 'ASC'),
        'limit' => 20
    );
}

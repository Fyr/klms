<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminDealersController extends AdminContentController {
    public $name = 'AdminDealers';
    public $uses = array('Dealer', 'Region');

    public $paginate = array(
        'fields' => array('region_id', 'title', 'address', 'phone', 'email', 'url'),
        'order' => array('id' => 'asc'),
        'limit' => 20
    );

    public function beforeRender() {
        parent::beforeRender();
        $this->set('aRegions', $this->Region->getOptions());
    }
}

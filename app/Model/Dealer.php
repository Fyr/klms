<?php
App::uses('AppModel', 'Model');
class Dealer extends AppModel {
    protected $objectType = 'Dealer';
/*
    var $hasOne = array(
        'Media' => array(
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Dealer', 'Media.main' => 1),
            'dependent' => true
        ),
    );
*/
}

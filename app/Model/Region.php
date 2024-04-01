<?php
App::uses('AppModel', 'Model');
class Region extends AppModel {
    protected $objectType = 'Region';

    var $hasOne = array(
        'Media' => array(
            'foreignKey' => 'object_id',
            'conditions' => array('Media.media_type' => 'image', 'Media.object_type' => 'Region', 'Media.main' => 1),
            'dependent' => true
        ),
    );

}

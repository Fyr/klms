<?php
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
class Page extends Article {
    protected $objectType = 'Page';

    var $hasOne = array(
        'Seo' => array(
            'className' => 'Seo.Seo',
            'foreignKey' => 'object_id',
            'conditions' => array('Seo.object_type' => 'Page'),
            'dependent' => true
        )
    );
}

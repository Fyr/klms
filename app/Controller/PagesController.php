<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
App::uses('Page', 'Model');
App::uses('News', 'Model');
App::uses('Product', 'Model');
class PagesController extends AppController {
	public $uses = array('Media.Media', 'Page', 'News', 'Product', 'Category', 'Subcategory');
	public $helpers = array('Core.PHTime');

	public function home() {
		$pageSlugs = array('home', 'home-text', 'home-text2');
		$aPages = array();
		foreach($pageSlugs as $slug) {
			$aPages[$slug] = $this->Page->findBySlug($slug);
		}

		// hot news
		$conditions = array('published' => 1, 'featured' => 1);
		$order = array('modified' => 'desc');
		$limit = 3;
		$aNews = $this->News->find('all', compact('conditions', 'order', 'limit'));

		$aCategories = $this->Category->findAllByPublished(1, null, array('Category.sorting' => 'ASC'));
		$aSubcategories = $this->Subcategory->findAllByPublished(1, null, array('Subcategory.sorting' => 'ASC'));
		$aSubcategories = Hash::combine($aSubcategories, '{n}.Subcategory.id', '{n}', '{n}.Subcategory.parent_id');
		$this->set(compact('aPages', 'aNews', 'aCategories', 'aSubcategories'));

		/*
		$conditions = array('Product.published' => 1, 'Product.featured' => 1);
		$order = 'RAND()';
		$aProducts = $this->Product->find('all', compact('conditions', 'order', 'limit'));
		$this->set(compact('page', 'aSlider', 'aNews', 'aProducts'));
		*/

	}

	public function view($slug) {
		$this->set('article', $this->Page->findBySlug($slug));
		$this->currMenu = ucfirst($slug);
	}
}

<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
App::uses('Page', 'Model');
App::uses('News', 'Model');
App::uses('Product', 'Model');
App::uses('Tag', 'Model');
class PagesController extends AppController {
	public $uses = array('Media.Media', 'Page', 'News', 'Product', 'Category', 'Subcategory', 'Tag');
	public $helpers = array('Core.PHTime', 'Media', 'Html');

	public function home() {
		$aArticles = $this->Page->find('all', array('conditions' => array('slug LIKE "home%"')));
		$aPages = array();
		foreach($aArticles as $article) {
			$aPages[$article['Page']['slug']] = $article;
		}

		// hot news
		$conditions = array('published' => 1, 'featured' => 1);
		$order = array('modified' => 'desc');
		$aNews = $this->News->find('all', compact('conditions', 'order'));

		$aCategories = $this->Category->findAllByPublished(1, null, array('Category.sorting' => 'ASC'));
		$aSubcategories = $this->Subcategory->findAllByPublished(1, null, array('Subcategory.sorting' => 'ASC'));
		$aFeaturedSubcategories = array();
		foreach($aSubcategories as $subcategory) {
			if ($subcategory['Subcategory']['featured']) {
				$aFeaturedSubcategories[] = $subcategory;
			}
		}
		$aSubcategories = Hash::combine($aSubcategories, '{n}.Subcategory.id', '{n}', '{n}.Subcategory.parent_id');

		$conditions = array('Product.published' => 1, 'Product.featured' => 1);
		$order = array('Product.created' => 'desc');
		$aProducts = $this->Product->find('all', compact('conditions', 'order'));

		$aTags = $this->Tag->find('all');

		$this->set(compact('aPages', 'aNews', 'aCategories', 'aSubcategories', 'aFeaturedSubcategories', 'aProducts', 'aTags'));
	}

	public function view($slug) {
		$this->set('article', $this->Page->findBySlug($slug));
		$this->currMenu = ucfirst($slug);
	}
}

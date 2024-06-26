<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
App::uses('Page', 'Model');
App::uses('News', 'Model');
App::uses('Product', 'Model');
App::uses('Tag', 'Model');
class PagesController extends AppController {
	public $uses = array('Media.Media', 'Page', 'News', 'Product', 'Category', 'Subcategory', 'Tag', 'Region', 'Dealer');
	public $helpers = array('Core.PHTime', 'Media');

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

		if ($slug == 'dealers') {
			$aRegions = Hash::combine($this->Region->find('all'), '{n}.Region.id', '{n}.Region');
			$aDealers = $this->Dealer->find('all');
			$aDealers = Hash::combine($aDealers, '{n}.Dealer.id', '{n}.Dealer', '{n}.Dealer.region_id'); // group by region
			$this->set(compact('aRegions', 'aDealers'));
		}
	}

	public function dealer($id) {
		$this->set('dealer', $this->Dealer->findById($id));

		$aRegions = Hash::combine($this->Region->find('all'), '{n}.Region.id', '{n}.Region');
		$this->set('aRegions', $aRegions);
	}
}

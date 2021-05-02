<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
class ProductsController extends AppController {
	public $name = 'Products';
	public $uses = array('Media.Media', 'Product', 'Category', 'Subcategory', 'Tag');

	public function beforeRender() {
		$order = 'Category.sorting';
		$aCategories = $this->Category->find('all', compact('order'));
		$order = 'Subcategory.sorting';
		$aSubcategories = $this->Subcategory->find('all', compact('order'));
		$order = 'Tag.sorting';
		$aTags = $this->Tag->find('list', compact('order'));
		$this->set(compact('aCategories', 'aSubcategories', 'aTags'));

		$this->currMenu = 'Products';
		parent::beforeRender();
	}

	public function categories() {
	}

	private function _getFilter() {
		$filter = array();
		if ($cat_id = $this->request->query('cat_id')) {
			$filter['cat_id'] = $cat_id;
		}
		if ($subcat_id = $this->request->query('subcat_id')) {
			$filter['subcat_id'] = $subcat_id;
		}
		if ($q = $this->request->query('q')) {
			$filter['OR'] = array('Product.title LIKE ' => "%$q%", 'Product.teaser LIKE ' => "%$q%");
		}
		return $filter;
	}

	public function index() {
		$filter = $this->_getFilter();
		$this->paginate = array(
			'Product' => array(
				'conditions' => array_merge(array('Product.published' => 1), $filter),
				'order' => array('modified' => 'desc'),
				'limit' => 8
			)
		);
		$this->set('filter', $filter);
		$this->set('aArticles', $this->paginate('Product'));
		$this->set('lDirectSearch', $this->request->query('q') && true);
	}

	public function view($id) {
		$article = $this->Product->findById($id);
		$aMedia = $this->Media->getList(
			array('object_type' => 'Product', 'object_id' => $id),
			array('created' => 'asc')
		);
		$aProducts = $this->Product->find('all', compact('conditions', 'order'));
		$this->set(compact('article', 'aMedia', 'aProducts'));
	}


}

<?php
App::uses('Category', 'Model');
App::uses('Product', 'Model');
class AppController extends Controller {
	public $components = array(
		'Auth' => array(
			'authorize'      => array('Controller'),
			'loginAction'    => array('plugin' => '', 'controller' => 'pages', 'action' => 'home', '?' => array('login' => 1)),
			'loginRedirect'  => array('plugin' => '', 'controller' => 'user', 'action' => 'index'),
			'ajaxLogin' => 'Core.ajax_auth_failed',
			'logoutRedirect' => '/',
			'authError'      => 'You must sign in to access that page'
		),
	);

	protected $aCategories, $currUser, $aNavBar, $currMenu, $aBottomLinks, $currLink;

	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}

	protected function _beforeInit() {
		$this->helpers = array_merge(array('ArticleVars', 'Media', "Html"), $this->helpers); // 'ArticleVars', 'Media.PHMedia', 'Core.PHTime', 'Media', 'ObjectType'
	}

	protected function _afterInit() {
		// after construct actions here
		$this->Settings = $this->loadModel('Settings');
		$this->Settings->initData();
	}

	public function loadModel($modelClass = null, $id = null) {
		if ($modelClass === null) {
			$modelClass = $this->modelClass;
		}

		$this->uses = ($this->uses) ? (array)$this->uses : array();
		if (!in_array($modelClass, $this->uses, true)) {
			$this->uses[] = $modelClass;
		}

		list($plugin, $modelClass) = pluginSplit($modelClass, true);

		$this->{$modelClass} = ClassRegistry::init(array(
			'class' => $plugin . $modelClass, 'alias' => $modelClass, 'id' => $id
		));
		if (!$this->{$modelClass}) {
			throw new MissingModelException($modelClass);
		}
		return $this->{$modelClass};
	}


	public function isAuthorized($user) {
		return Hash::get($user, 'active');
	}

	public function redirect404() {
		// return $this->redirect(array('controller' => 'pages', 'action' => 'notExists'), 404);
		throw new NotFoundException();
	}

	protected function _getCurrMenu() {
		foreach($this->aNavBar as $curr => $item) {
			if ($this->request->controller == $item['url']['controller'] && $this->request->action == $item['url']['action']) {
				return $curr;
			}
		}
		return '';
	}

	public function beforeFilter() {
		$this->beforeFilterLayout();
	}

	public function beforeFilterLayout() {
		$this->aNavBar = array(
			'Home' => array('title' => __('Home'), 'url' => array('controller' => 'pages', 'action' => 'home')),
			'News' => array('title' => __('News'), 'url' => array('controller' => 'news', 'action' => 'index')),
			'Products' => array('title' => __('Products'), 'url' => array('controller' => 'products', 'action' => 'index')),
			'Brands' => array('title' => __('Brands'), 'url' => array('controller' => 'brands', 'action' => 'index')),
			'About-us' => array('title' => __('About us'), 'url' => array('controller' => 'pages', 'action' => 'view', 'about-us')),
			'Dealers' => array('title' => __('Dealers'), 'url' => array('controller' => 'pages', 'action' => 'view', 'dealers')),
			'Contacts' => array('title' => __('Contacts'), 'url' => array('controller' => 'pages', 'action' => 'view', 'contacts')),
		);
		$this->currMenu = $this->_getCurrMenu();
		$this->set('aBottomLinks', $this->aNavBar);
		// $this->currLink = $this->_currMenu;
		$this->Auth->allow(array('home', 'view', 'index', 'login'));
		$this->currUser = array();
		$this->cart = array();
	}

	public function beforeRender() {
		$this->beforeRenderLayout();
	}

	/*
	protected function _getNavBar() {
	}
	*/

	protected function beforeRenderLayout() {
		// $this->set('lang', Configure::read('Config.language'));
		$this->set('currUser', $this->currUser);
		$this->set('currMenu', $this->currMenu);

		$this->Category = $this->loadModel('Category');
		$aCategories = $this->Category->findAllByPublished(1, null, array('Category.sorting' => 'ASC'));
		$aCategories = Hash::combine($aCategories, '{n}.Category.id', '{n}');

		$this->Subcategory = $this->loadModel('Subcategory');
		$aSubcategories = $this->Subcategory->findAllByPublished(1, null, array('Subcategory.sorting' => 'ASC'));
		$aSubcategories = Hash::combine($aSubcategories, '{n}.Subcategory.id', '{n}', '{n}.Subcategory.parent_id');

		$this->Product = $this->loadModel('Product');
		$aProducts = $this->Product->findAllByPublished(1);
		$aProducts = Hash::combine($aProducts, '{n}.Product.id', '{n}', '{n}.Product.subcat_id');

		foreach($aCategories as $cat_id => $category) {
			$submenu = array();
			if (isset($aSubcategories[$cat_id]) && $aSubcategories[$cat_id]) {
				foreach($aSubcategories[$cat_id] as $subcat_id => $subcat) {
					$productsMenu = array();
					if (isset($aProducts[$subcat_id]) && $aProducts[$subcat_id]) {
						foreach($aProducts[$subcat_id] as $id => $product) {
							$productsMenu[] = array(
								'title' => $product['Product']['title'],
								'url' => array('controller' => 'products', 'action' => 'view', $id)
							);
						}
					}
					$submenu[] = array(
						'title' => $subcat['Subcategory']['title'],
						'submenu' => $productsMenu,
						'url' => $productsMenu ? '' : array('controller' => 'products', 'action' => 'index', '?' => compact('subcat_id'))
					);
				}
			}

			$this->aNavBar['Products']['submenu']['cat_'.$cat_id] = array(
				'title' => $category['Category']['title'],
				'submenu' => $submenu,
				'url' => $submenu ? '' : array('controller' => 'products', 'action' => 'index', '?' => compact('cat_id'))
			);
		}

		$this->Brand = $this->loadModel('Brand');
		$aPartners = $this->Brand->findAllByPublished(1);
		foreach($aPartners as $brand) {
			$this->aNavBar['Brands']['submenu'][] = array(
				'title' => $brand['Brand']['title'],
				'url' => array('controller' => 'brands', 'action' => 'view', $brand['Brand']['id'])
			);
		}
		$this->set('aPartners', $aPartners);
		$this->set('aNavBar', $this->aNavBar);

		// init slider - could be on every page or only on home
		$this->Page = $this->loadModel('Page');
		$this->Media = $this->loadModel('Media.Media');

		$slider = $this->Page->findBySlug('slider');
		$slider['Slides'] = $this->Media->findAllByObjectTypeAndObjectId($slider['Page']['object_type'], $slider['Page']['id']);
		$this->set('slider', $slider);
		// $this->set('aBottomLinks', $this->aBottomLinks);
		// $this->set('currLink', $this->currLink);
	}
/*
	protected function _refreshUser($lForce = false) {
		if ($lForce) {
			$this->loadModel('User');
			$user = $this->User->findById($this->currUser['id']);
			$this->Auth->login($user['User']);
		}

		$this->currUser = AuthComponent::user();
	}
*/
}

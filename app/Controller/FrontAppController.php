<?php
App::uses('AppController', 'Controller');

class FrontAppController extends AppController {
    public $theme = "Front";
    public $helpers = array('Html', 'Form', 'Session', 'Text', 'Time', 'Js', 'Paginator');
	public $components = array('Tool','Session','RequestHandler','Cookie','Paginator');
    
    public function beforeFilter() {
		$numberOrder = 0;
		$login = false;
		if($this->Session->check('cart'))
		{
			$order = $this->Session->read('cart');
			$numberOrder = count($order);
		}
		if($this->Session->check('user'))
		{
			$login = true;
		}
		$leftMenu = $this->loadLeftMenu();
		$topView = $this->loadMoreView();
		$listnews = $this->newsCate();
		$newNews = $this->loadNewNews();
		$mobileDeteted = $this->RequestHandler->isMobile();
		$productCategories  = $this->loadProductCate();
		$imageProduct = $this->loadImageProduct();
		$this->set(compact('order','numberOrder','leftMenu','listnews','topView','newNews','mobileDeteted','productCategories','imageProduct','login'));
		
    }
    public function loadLeftMenu()
	{
		$this->loadModel('ProductCategory');
		$parentCate  = $this->ProductCategory->find('all',array(
													'fields'=>array('id','code','name'),
													'conditions'=>array('parent'=>'','status'=>0,'publish'=>1),
													'recursive'=>-1	
											));
		if(!empty($parentCate))
		{
			foreach($parentCate as $key=>$val)
			{
				$chillCate = $this->ProductCategory->find('all',array(
													'fields'=>array('id','name','code'),
													'conditions'=>array('parent'=>$val['ProductCategory']['id'],'status'=>0,'publish'=>1),
													'recursive'=>-1	
											));
				$parentCate[$key]['child'] = $chillCate;
			}
		}
		return $parentCate;
	}
	// load listnews
	 public function newsCate(){
	 	$this->loadModel('NewsCategory');
	 	return $this->NewsCategory->find('all',array(
	 		'conditions' => array('NewsCategory.publish'=>1,'NewsCategory.status'=>0)
	 	));
	 }
	public function loadMoreView()
	{
		$this->loadModel('Product');
		$moreView = $this->Product->find('all',array(
			'conditions'=>array('Product.status'=>0,'Product.publish'=>1),
			'order'=>array('Product.num_view'=>'desc'),
			'limit'=>5

			));
		return $moreView;
	}
	public function loadNewNews()
	{
		$this->loadModel('News');
		$newNews = $this->News->find('all',array(
			'conditions'=>array('News.status'=>0,'News.publish'=>1),
			'order'=>array('News.updated'=>'desc'),
			'limit'=>5
			));
		return $newNews;
	}
	public function loadProductCate(){
		$this->loadModel('ProductCategory');
		return $this->ProductCategory->find('list',array(
			'conditions'=>array('ProductCategory.status'=>0,'ProductCategory.publish'=>1),
			'recursive'=>-1));
		
	
	}
	public function loadImageProduct()
	{
		$this->loadModel('Product');
		$product = $this->Product->find('all',array('fields'=>array('Product.code','Product.image'),'conditions'=>array('Product.status'=>0,'Product.publish'=>1),'recursive'=>-1));
		return $product;
	}

	
}
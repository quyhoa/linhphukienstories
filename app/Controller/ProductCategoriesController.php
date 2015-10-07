<?php
App::uses('AdminAppController', 'Controller');
/**
 * ProductCategories Controller
 *
 * @property ProductCategory $ProductCategory
 * @property PaginatorComponent $Paginator
 */
class ProductCategoriesController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$model = "ProductCategory";
		$this->Paginator->settings = array(
							// 'conditions'=>array('ProductCategory.status'=>1),
							'order' 	=>array('ProductCategory.position'=>'asc'),
							'limit'     => LIMIT,
							'recursive' => 1
						);
		$productCategories = $this->Paginator->paginate($model);
		
		$this->set(compact('model','productCategories'));

	}

/**
 * admin_add method
 * 
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {

			// set data
			$data 		= $this->request->data;
			$flag 		= true;
			$flagExits 	= true;
			$slug 		= '';
			if(!empty($data['ProductCategory']['name'])){
				// chuyen qua slug
				$slug = $this->to_slug($data['ProductCategory']['name']);
				// kiểm tra ton tại
				$checkExits = $this->ProductCategory->find('first',array(
								'conditions' => array('code'=>$slug,'status'=>0),
								'recursive'  => -1
				));
				if(empty($checkExits)){
					$data['ProductCategory']['code'] = $slug;
				}else{
					$flagExits = false;
				}
			}else{
				$flag = false;
			}

			if($flag){
				if($flagExits){
					$this->ProductCategory->create();
					if ($this->ProductCategory->save($data)) {
						$this->Session->setFlash(__('The product category has been saved.'),'success');
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The product category has been fail.'),'error');
						$this->redirect($this->referer());
					}
				}else{
					$this->Session->setFlash(__('The product category has been existed.'),'error');
					$this->redirect($this->referer());
				}
			}else{
				// name ko duoc rong
				$this->Session->setFlash(__('The product category has been fail.'),'error');
				$this->redirect($this->referer());
			}		
		}
		$parentCate = $this->ProductCategory->find('list',array('conditions'=>array(
																		       'status'=>0,
																		       'publish'=>1,
																		       'parent'=>''
																),'recursive'=>-1)
													);
		$this->set(compact('parentCate'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProductCategory->exists($id)) {
			throw new NotFoundException(__('Invalid product category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// kiem tra ton tai
			$data 		= $this->request->data;
			$flag 		= true;
			$flagExits 	= true;
			$slug 		= '';
			if(!empty($data['ProductCategory']['name'])){
				// chuyen qua slug
				$slug = $this->to_slug($data['ProductCategory']['name']);
				// kiểm tra ton tại
				$checkExits = $this->ProductCategory->find('first',array(
								'conditions' => array('code'=>$slug,'id <>'=>$id),
								'recursive'  => -1
				));
				if(empty($checkExits)){
					$data['ProductCategory']['code'] = $slug;
				}else{
					$flagExits = false;
				}
			}else{
				$flag = false;
			}
			// check conditions
			if($flag){
				if($flagExits){
						// set id for ProductCategory
						$this->ProductCategory->id = $id;
					if ($this->ProductCategory->save($this->request->data)) {
						$this->Session->setFlash(__('The product category has been saved.'),'success');
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The product category has been saved.'),'error');
						$this->redirect($this->referer());
					}
				}else{
					$this->Session->setFlash(__('The product category has been saved.'),'error');
					$this->redirect($this->referer());
				}
			}else{
				// name ko duoc rong
				$this->Session->setFlash(__('Name ko duoc rong'));
				$this->redirect($this->referer());
			}
		} else {
			$options = array('conditions' => array('ProductCategory.' . $this->ProductCategory->primaryKey => $id));
			$this->request->data = $this->ProductCategory->find('first', $options);
		}
		$parentCate = $this->ProductCategory->find('list',array('conditions'=>array(
																		       'status'=>0,
																		       'publish'=>1,
																		       'parent'=>''
																),'recursive'=>-1)
													);
		$this->set(compact('parentCate'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		// set ID
		$this->ProductCategory->id = $id;
		try {
                if($this->ProductCategory->delete()){
                    $this->Session->setFlash(DELETE_SUCCESS,'success');
                }else{
                    $this->Session->setFlash(MS_DELETE_FAIL,'error');
                }
            } catch (Exception $e) {
                $this->Session->setFlash(DELETE_FAIL,'error');
            }
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check name category is exist
 * @created 2015-08-01
 * @author haipt
 * @return boolean
 */
	public function checkNameExist()
	{
		$this->layout = false;
		$this->autoRender= false;
		if($this->request->is(array('post')))
		{
			$name = trim($this->request->data['name']);
			$id = trim($this->request->data['id']);
			//add category
			if($id == '')
			{
				$conditions = array('ProductCategory.name'=>$name,'ProductCategory.status'=>0);
			}

			//edit category
			else{
				$conditions = array('ProductCategory.id !='=>$id,'ProductCategory.name'=>$name,'ProductCategory.status'=>0);
			}
			$isExist = $this->ProductCategory->find('count',array('conditions'=>$conditions));
			if($isExist)
			{
				echo 'false';exit;
			}
			else{
				echo 'true';exit;
			}

			
		}
		echo 'true';exit;
	}
/**
 * admin_pulish method
 * Description: publish a category
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_publish($cateId = null)
	{
		$this->ProductCategory->id = $cateId;
		if($this->ProductCategory->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish product\'s category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish product\'s category is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_unpulish method
 * Description: unpublish a category
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_unpublish($cateId = null)
	{
		$this->ProductCategory->id = $cateId;
		if($this->ProductCategory->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish product\'s category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish product\'s category is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_delete_all method
 * Description: deleting category is selected
 * @created 2015-08-01
 * @author haipt
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->ProductCategory->recursive = -1;
			$data = $this->request->data['ProductCategory'];
			$aId = array();
			foreach($data as $key=>$value)
			{
				if(!empty($value['id']))
				{
					$aId[]= $value['id'];
				}
			}
			if(!empty($aId))
			{
				$this->ProductCategory->updateAll(array('ProductCategory.status'=>1),array('ProductCategory.id'=>$aId));
				$this->Session->setFlash(__('Delete product category is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a category before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}	
}

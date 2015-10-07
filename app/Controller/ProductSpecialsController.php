<?php
App::uses('AdminAppController', 'Controller');
/**
 * ProductSpecials Controller
 *
 * @property ProductSpecial $ProductSpecial
 * @property PaginatorComponent $Paginator
 */
class ProductSpecialsController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @author hoalqq
 * @return void
 * @created day: 2015-08-03
 */
	public function admin_index() {
		$model = "ProductSpecial";
		$this->Paginator->settings = array(
							'conditions'=>array('ProductSpecial.status'=>0),
							'order' 	=>array('ProductSpecial.sort'=>'asc'),
							'limit'     => LIMIT,
						);
		$productCategories = $this->Paginator->paginate($model);
		$this->set(compact('model','productCategories'));
	}


/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProductSpecial->id = $id;
		if (!$this->ProductSpecial->exists()) {
			throw new NotFoundException(__('Invalid product special'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductSpecial->delete()) {
			$this->Session->setFlash(__('The product special has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product special could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
		/**
 * admin_unpulish method
 * Description: unpublish a category
 * @created 2015-08-03
 * @author hoalqq
 * @return null
 */
	public function admin_unpublish($cateId = null)
	{
		$this->ProductSpecial->id = $cateId;
		if($this->ProductSpecial->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish hot product\'s category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish hot product\'s category is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
	/**
 * admin_pulish method
 * Description: publish a category
 * @created 2015-08-03
 * @author hoalqq
 * @return null
 */
	public function admin_publish($cateId = null)
	{
		$this->ProductSpecial->id = $cateId;
		if($this->ProductSpecial->saveField('publish',1))
		{
			$this->Session->setFlash(__('Unpublish hot product\'s category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish hot product\'s category is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
	/**
 * admin_delete_all method
 * Description: deleting category is selected
 * @created 2015-08-03
 * @author hoalqq
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->ProductSpecial->recursive = -1;
			$data = $this->request->data['ProductSpecial'];
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
				$this->ProductSpecial->updateAll(array('ProductSpecial.status'=>1),array('ProductSpecial.id'=>$aId));
				$this->Session->setFlash(__('Delete hot product is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a category before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}
}

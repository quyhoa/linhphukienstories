<?php
App::uses('AdminAppController', 'Controller');
/**
 * BlockCategories Controller
 *
 * @property BlockCategory $BlockCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BlockCategoriesController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BlockCategory->recursive = 0;
		$this->Paginator->settings = array(
			'conditions'=>array('BlockCategory.status'=>0),
			'limit'=>LIMIT,
			'order'=>array('BlockCategory.position'=>'asc')
			);
		$model = 'BlockCategory';
		$blockCategories = $this->Paginator->paginate($model);
		$this->set(compact('blockCategories', 'model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlockCategory->exists($id)) {
			throw new NotFoundException(__('Invalid block category'));
		}
		$options = array('conditions' => array('BlockCategory.' . $this->BlockCategory->primaryKey => $id));
		$this->set('blockCategory', $this->BlockCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->BlockCategory->create();
			$data['BlockCategory']['code'] = $this->to_slug($data['BlockCategory']['name']);
			if ($this->BlockCategory->save($data)) {
				$this->Session->setFlash(__('The block category has been saved.'),'sucess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The block category could not be saved. Please, try again.'),'error');
			}
		}
		$cateParent = $this->BlockCategory->find('list',array('conditions'=>array('BlockCategory.status'=>0,'BlockCategory.parent'=>''),'recursive'=>-1));
		$this->set(compact('cateParent'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlockCategory->exists($id)) {
			throw new NotFoundException(__('Invalid block category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['BlockCategory']['code'] = $this->to_slug($data['BlockCategory']['name']);
			if ($this->BlockCategory->save($data)) {
				$this->Session->setFlash(__('The block category has been saved.'),'sucess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The block category could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('BlockCategory.' . $this->BlockCategory->primaryKey => $id));
			$this->request->data = $this->BlockCategory->find('first', $options);
		}
		$cateParent = $this->BlockCategory->find('list',array('conditions'=>array('BlockCategory.status'=>0,'BlockCategory.parent'=>''),'recursive'=>-1));
		$this->set(compact('cateParent'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BlockCategory->id = $id;
		if (!$this->BlockCategory->exists()) {
			throw new NotFoundException(__('Invalid block category'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->BlockCategory->saveField('status','1')) {
			$this->Session->setFlash(__('The block category has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The block category could not be deleted. Please, try again.'),'error');
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
				$conditions = array('BlockCategory.name'=>$name,'BlockCategory.status'=>0);
			}

			//edit category
			else{
				$conditions = array('BlockCategory.id !='=>$id,'BlockCategory.name'=>$name,'BlockCategory.status'=>0);
			}
			$isExist = $this->BlockCategory->find('count',array('conditions'=>$conditions));
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
		$this->BlockCategory->id = $cateId;
		if($this->BlockCategory->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish block\'s category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish block\'s category is unsuccessfull'),'error');
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
		$this->BlockCategory->id = $cateId;
		if($this->BlockCategory->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish block\'s category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish block\'s category is unsuccessfull'),'error');
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
			$this->BlockCategory->recursive = -1;
			$data = $this->request->data['BlockCategory'];
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
				$this->BlockCategory->updateAll(array('BlockCategory.status'=>1),array('BlockCategory.id'=>$aId));
				$this->Session->setFlash(__('Delete block category is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a category before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}	
}

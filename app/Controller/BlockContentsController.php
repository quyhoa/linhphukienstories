<?php
App::uses('AdminAppController', 'Controller');
/**
 * BlockContents Controller
 *
 * @property BlockContent $BlockContent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BlockContentsController extends AdminAppController {

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
	public function admin_index($cateId = null) {
		$this->BlockContent->recursive = 0;
		if(!empty($cateId))
		{
			$conditions = array('BlockContent.status'=>0,'BlockContent.block_category_id'=>$cateId);
		}
		else{
			$conditions = array('BlockContent.status'=>0);
		}
		$this->Paginator->settings = array(
			'conditions'=>$conditions,
			'limit'=>LIMIT,
			'order'=>array('BlockContent.position'=>'asc')
			);
		$model = 'BlockContent';
		$blockContents  = $this->Paginator->paginate($model);
		$this->set(compact('blockContents', 'model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlockContent->exists($id)) {
			throw new NotFoundException(__('Invalid block content'));
		}
		$options = array('conditions' => array('BlockContent.' . $this->BlockContent->primaryKey => $id));
		$this->set('blockContent', $this->BlockContent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BlockContent->create();
			$data = $this->request->data;
			$data['BlockContent']['code'] = $this->to_slug($data['BlockContent']['name']);
			if ($this->BlockContent->save($data)) {
				$this->Session->setFlash(__('The block content has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The block content could not be saved. Please, try again.'),'error');
			}
		}
		$blockCategories = $this->BlockContent->BlockCategory->find('list',array('conditions'=>array('BlockCategory.status'=>0)));
		$type = array('1'=>__('Nomal'),'2'=>__('Image'),__('File'));
		$this->set(compact('blockCategories','type'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlockContent->exists($id)) {
			throw new NotFoundException(__('Invalid block content'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['BlockContent']['code'] = $this->to_slug($data['BlockContent']['name']);
			if ($this->BlockContent->save($data)) {
				$this->Session->setFlash(__('The block content has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The block content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlockContent.' . $this->BlockContent->primaryKey => $id));
			$this->request->data = $this->BlockContent->find('first', $options);
		}
		$blockCategories = $this->BlockContent->BlockCategory->find('list',array('conditions'=>array('BlockCategory.status'=>0)));
		$type = array('1'=>__('Nomal'),'2'=>__('Image'),__('File'));
		$this->set(compact('blockCategories','type'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BlockContent->id = $id;
		if (!$this->BlockContent->exists()) {
			throw new NotFoundException(__('Invalid block content'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->BlockContent->saveField('status',1)) {
			$this->Session->setFlash(__('The block content has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The block content could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check name block content is exist
 * @created 2015-08-02
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
				$conditions = array('BlockContent.name'=>$name,'BlockContent.status'=>0);
			}

			//edit category
			else{
				$conditions = array('BlockContent.id !='=>$id,'BlockContent.name'=>$name,'BlockContent.status'=>0);
			}
			$isExist = $this->BlockContent->find('count',array('conditions'=>$conditions));
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
		$this->BlockContent->id = $cateId;
		if($this->BlockContent->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish block\'s content is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish block\'s content is unsuccessfull'),'error');
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
		$this->BlockContent->id = $cateId;
		if($this->BlockContent->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish block\'s content is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish block\'s content is unsuccessfull'),'error');
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
			$this->BlockContent->recursive = -1;
			$data = $this->request->data['BlockContent'];
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
				$this->BlockContent->updateAll(array('BlockContent.status'=>1),array('BlockContent.id'=>$aId));
				$this->Session->setFlash(__('Delete block content is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a content before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}	
}

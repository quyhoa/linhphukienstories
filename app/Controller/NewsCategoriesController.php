<?php
App::uses('AdminAppController', 'Controller');
/**
 * NewsCategories Controller
 *
 * @property NewsCategory $NewsCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NewsCategoriesController extends AdminAppController {

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
		$this->NewsCategory->recursive = 0;
		$this->Paginator->settings = array(
			'conditions'=>array('NewsCategory.status'=>0),
			'limit'=>LIMIT
			);
		$model = 'NewsCategory';
		$newsCategories = $this->Paginator->paginate($model);
		$this->set(compact('newsCategories','model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->NewsCategory->exists($id)) {
			throw new NotFoundException(__('Invalid news category'));
		}
		$options = array('conditions' => array('NewsCategory.' . $this->NewsCategory->primaryKey => $id));
		$this->set('newsCategory', $this->NewsCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->NewsCategory->create();
			$data = $this->request->data;
			$data['NewsCategory']['code'] = $this->to_slug($data['NewsCategory']['name']);
			if ($this->NewsCategory->save($data)) {
				$this->Session->setFlash(__('The news category has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news category could not be saved. Please, try again.'),'error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->NewsCategory->exists($id)) {
			throw new NotFoundException(__('Invalid news category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['NewsCategory']['code'] = $this->to_slug($data['NewsCategory']['name']);
			if ($this->NewsCategory->save($data)) {
				$this->Session->setFlash(__('The news category has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news category could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('NewsCategory.' . $this->NewsCategory->primaryKey => $id));
			$this->request->data = $this->NewsCategory->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->NewsCategory->id = $id;
		if (!$this->NewsCategory->exists()) {
			throw new NotFoundException(__('Invalid news category'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->NewsCategory->saveField('status',1)) {
			$this->Session->setFlash(__('The news category has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The news category could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check news category is exist
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
			//add page
			if($id == '')
			{
				$conditions = array('NewsCategory.name'=>$name,'NewsCategory.status'=>0);
			}

			//edit page
			else{
				$conditions = array('NewsCategory.id !='=>$id,'NewsCategory.name'=>$name,'NewsCategory.status'=>0);
			}
			$isExist = $this->NewsCategory->find('count',array('conditions'=>$conditions));
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
 * Description: publish a news category
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_publish($pageId = null)
	{
		$this->NewsCategory->id = $pageId;
		if($this->NewsCategory->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish news category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish news category is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_unpulish method
 * Description: unpublish a news category
 * @created 2015-08-02
 * @author haipt
 * @return null
 */
	public function admin_unpublish($pageId = null)
	{
		$this->NewsCategory->id = $pageId;
		if($this->NewsCategory->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish news category is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish news category is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_delete_all method
 * Description: deleting news category is selected
 * @created 2015-08-02
 * @author haipt
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->NewsCategory->recursive = -1;
			$data = $this->request->data['NewsCategory'];
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
				$this->NewsCategory->updateAll(array('NewsCategory.status'=>1),array('NewsCategory.id'=>$aId));
				$this->Session->setFlash(__('Delete news category is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a news category before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}
}

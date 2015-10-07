<?php
App::uses('AdminAppController', 'Controller');
/**
 * PageLists Controller
 *
 * @property PageList $PageList
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PageListsController extends AdminAppController {

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
		$this->PageList->recursive = 0;
		$this->Paginator->settings = array(
			'conditions'=>array('PageList.status'=>0),
			'limit'=>LIMIT,
			'order'=>array('PageList.position'=>'asc')
			);
		$model = 'PageList';
		$pageLists = $this->Paginator->paginate($model);
		$this->set(compact('pageLists','model'));
	}
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PageList->exists($id)) {
			throw new NotFoundException(__('Invalid page list'));
		}
		$options = array('conditions' => array('PageList.' . $this->PageList->primaryKey => $id));
		$this->set('page', $this->PageList->find('first', $options));
	}


/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PageList->create();
			if ($this->PageList->save($this->request->data)) {
				$this->Session->setFlash(__('The page list has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page list could not be saved. Please, try again.'),'error');
			}
		}
		$pageParent = $this->PageList->find('list',array(
			'conditions'=>array('PageList.status'=>0,'PageList.parent'=>'')
			));
		$this->set(compact('pageParent'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {

		if (!$this->PageList->exists($id)) {
			throw new NotFoundException(__('Invalid page list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PageList->save($this->request->data)) {
				$this->Session->setFlash(__('The page list has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page list could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('PageList.' . $this->PageList->primaryKey => $id));
			$this->request->data = $this->PageList->find('first', $options);
		}
		$pageParent = $this->PageList->find('list',array(
			'conditions'=>array('PageList.status'=>0,'PageList.parent'=>'','PageList.id !='=>$id)
			));
		$this->set(compact('pageParent'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PageList->id = $id;
		if (!$this->PageList->exists()) {
			throw new NotFoundException(__('Invalid page list'));
		}
		$this->request->allowMethod('post', 'delete','put','get');
		if ($this->PageList->saveField('status',1)) {
			$this->Session->setFlash(__('The page list has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The page list could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check page is exist
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
				$conditions = array('PageList.name'=>$name,'PageList.status'=>0);
			}

			//edit page
			else{
				$conditions = array('PageList.id !='=>$id,'PageList.name'=>$name,'PageList.status'=>0);
			}
			$isExist = $this->PageList->find('count',array('conditions'=>$conditions));
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
	public function admin_publish($pageId = null)
	{
		$this->PageList->id = $pageId;
		if($this->PageList->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish page is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish page is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_unpulish method
 * Description: unpublish a page
 * @created 2015-08-02
 * @author haipt
 * @return null
 */
	public function admin_unpublish($pageId = null)
	{
		$this->PageList->id = $pageId;
		if($this->PageList->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish page is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish page is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_delete_all method
 * Description: deleting page is selected
 * @created 2015-08-02
 * @author haipt
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->PageList->recursive = -1;
			$data = $this->request->data['PageList'];
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
				$this->PageList->updateAll(array('PageList.status'=>1),array('PageList.id'=>$aId));
				$this->Session->setFlash(__('Delete page is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a page before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}
}

<?php
App::uses('AdminAppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NewsController extends AdminAppController {

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
		$this->News->recursive = 0;
		$this->Paginator->settings = array(
			'conditions'=>array('News.status'=>0),
			'limit'=>LIMIT
			);
		$model = 'News';
		$newss = $this->Paginator->paginate($model);
		$this->set(compact('newss', 'model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->News->create();
			$data = $this->request->data;
			$data['News']['code'] = $this->to_slug($data['News']['title']);
			if ($this->News->save($data)) {
				$this->Session->setFlash(__('The news has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'),'error');
			}
		}
		$newsCategories = $this->News->NewsCategory->find('list',array('conditions'=>array('NewsCategory.status'=>0)));
		$this->set(compact('newsCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['News']['code'] = $this->to_slug($data['News']['title']);
			
			if ($this->News->save($data)) {
				$this->Session->setFlash(__('The news has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
		$newsCategories = $this->News->NewsCategory->find('list',array('conditions'=>array('NewsCategory.status'=>0)));
		$this->set(compact('newsCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->News->saveField('status',1)) {
			$this->Session->setFlash(__('The news has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The news could not be deleted. Please, try again.'),'error');
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
			//add news
			if($id == '')
			{
				$conditions = array('News.title'=>$name,'News.status'=>0);
			}

			//edit news
			else{
				$conditions = array('News.id !='=>$id,'News.title'=>$name,'News.status'=>0);
			}
			$isExist = $this->News->find('count',array('conditions'=>$conditions));
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
 * Description: publish a news
 * @created 2015-08-01
 * @author haipt
 * @return null
 */
	public function admin_publish($pageId = null)
	{
		$this->News->id = $pageId;
		if($this->News->saveField('publish',1))
		{
			$this->Session->setFlash(__('Publish news is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Publish news is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_unpulish method
 * Description: unpublish a news
 * @created 2015-08-02
 * @author haipt
 * @return null
 */
	public function admin_unpublish($newsId = null)
	{
		$this->News->id = $newsId;
		if($this->News->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish news is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish news is unsuccessfull'),'error');
		}
		$this->redirect('index');

	}
/**
 * admin_delete_all method
 * Description: deleting news is selected
 * @created 2015-08-02
 * @author haipt
 * @return null
 */	
	public function admin_delete_all()
	{
		if($this->request->is(array('post')))
		{
			$this->News->recursive = -1;
			$data = $this->request->data['News'];
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
				$this->News->updateAll(array('News.status'=>1),array('News.id'=>$aId));
				$this->Session->setFlash(__('Delete news is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a news before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}
}

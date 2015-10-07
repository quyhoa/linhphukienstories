<?php
App::uses('AdminAppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('User');
    public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->Paginator->settings = array(
			'conditions'=>array('User.status'=>0),
			'order'=>array('User.created'=>'desc')
			);
		$users =  $this->Paginator->paginate('User');
		$model = 'User';
		$this->set(compact('users','model'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid User'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('User', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$data = $this->request->data;
			$data['User']['password'] = md5($data['User']['password']);
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('The User has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid User'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['User']['password'] = md5($data['User']['password']);
			if ($this->User->save($data)) {
				$this->Session->setFlash(__('The User has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->User->saveField('status',1)) {
			$this->Session->setFlash(__('The User has been deleted.'));
		} else {
			$this->Session->setFlash(__('The User could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * checkNameExist method
 * Description: check name User is exist
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
				$conditions = array('User.email'=>$name);
			}

			//edit category
			else{
				$conditions = array('User.id !='=>$id,'User.email'=>$name);
			}
			$isExist = $this->User->find('count',array('conditions'=>$conditions));
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
}

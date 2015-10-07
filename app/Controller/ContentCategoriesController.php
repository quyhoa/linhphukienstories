<?php
App::uses('AppController', 'Controller');
/**
 * ContentCategories Controller
 *
 * @property ContentCategory $ContentCategory
 * @property PaginatorComponent $Paginator
 */
class ContentCategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContentCategory->recursive = 0;
		$this->set('contentCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ContentCategory->exists($id)) {
			throw new NotFoundException(__('Invalid content category'));
		}
		$options = array('conditions' => array('ContentCategory.' . $this->ContentCategory->primaryKey => $id));
		$this->set('contentCategory', $this->ContentCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContentCategory->create();
			if ($this->ContentCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The content category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ContentCategory->exists($id)) {
			throw new NotFoundException(__('Invalid content category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ContentCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The content category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ContentCategory.' . $this->ContentCategory->primaryKey => $id));
			$this->request->data = $this->ContentCategory->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ContentCategory->id = $id;
		if (!$this->ContentCategory->exists()) {
			throw new NotFoundException(__('Invalid content category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ContentCategory->delete()) {
			$this->Session->setFlash(__('The content category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The content category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ContentCategory->recursive = 0;
		$this->set('contentCategories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ContentCategory->exists($id)) {
			throw new NotFoundException(__('Invalid content category'));
		}
		$options = array('conditions' => array('ContentCategory.' . $this->ContentCategory->primaryKey => $id));
		$this->set('contentCategory', $this->ContentCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ContentCategory->create();
			if ($this->ContentCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The content category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.'));
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
		if (!$this->ContentCategory->exists($id)) {
			throw new NotFoundException(__('Invalid content category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ContentCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The content category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ContentCategory.' . $this->ContentCategory->primaryKey => $id));
			$this->request->data = $this->ContentCategory->find('first', $options);
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
		$this->ContentCategory->id = $id;
		if (!$this->ContentCategory->exists()) {
			throw new NotFoundException(__('Invalid content category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ContentCategory->delete()) {
			$this->Session->setFlash(__('The content category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The content category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

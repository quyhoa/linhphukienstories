<?php
App::uses('AdminAppController', 'Controller');
/**
 * ProductNews Controller
 *
 * @property ProductNews $ProductNews
 * @property PaginatorComponent $Paginator
 */
class ProductNewsController extends AdminAppController {

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
		$model = "ProductNews";
		$this->Paginator->settings = array(
							'conditions'=>array('ProductNews.status'=>0),
							'order' 	=>array('ProductNews.sort'=>'asc'),
							'limit'     => LIMIT,
						);
		$productCategories = $this->Paginator->paginate($model);
		$this->set(compact('model','productCategories'));
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
		$this->ProductNews->id = $cateId;
		if($this->ProductNews->saveField('publish',0))
		{
			$this->Session->setFlash(__('Unpublish product new is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish product new is unsuccessfull'),'error');
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
		$this->ProductNews->id = $cateId;
		if($this->ProductNews->saveField('publish',1))
		{
			$this->Session->setFlash(__('Unpublish product new is successfull'),'success');
		}
		else{
			$this->Session->setFlash(__('Unpublish product new is unsuccessfull'),'error');
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
			$this->ProductNews->recursive = -1;
			$data = $this->request->data['ProductNews'];
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
				$this->ProductNews->updateAll(array('ProductNews.status'=>1),array('ProductNews.id'=>$aId));
				$this->Session->setFlash(__('Delete new product is successfull'),'success');
			}
			else{
				$this->Session->setFlash(__('Please select a category before'),'error');
			}
			
		}
		
		$this->redirect('index');
	}
}

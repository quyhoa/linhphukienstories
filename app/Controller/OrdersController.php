<?php
App::uses('AdminAppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrdersController extends AdminAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
   	public  $cities = array(158=>"Hà Nội",
				159=>"TP-Hồ Chí Minh",
				160=>"Đà Nẵng",
				161=>"An Giang",
				162=>"Bà Rịa - Vũng Tàu",
				163=>"Bạc Liêu",
				164=>"Bắc Kạn",
				165=>"Bắc Giang",
				166=>"Bắc Ninh",
				167=>"Bến Tre",
				168=>"Bình Dương",
				169=>"Bình Định",
				170=>"Bình Phước",
				171=>"Bình Thuận",
				172=>"Cà Mau",
				173=>"Cao Bằng",
				174=>"Cần Thơ (TP)",
				176=>"Đắk Lắk",
				177=>"Đắk Nông",
				178=>"Điện Biên",
				179=>"Đồng Nai",
				180=>"Đồng Tháp",
				181=>"Gia Lai",
				182=>"Hà Giang",
				183=>"Hà Nam",
				184=>"Hà Tỉnh",
				185=>"Hải Dương",
				186=>"Hải Phòng (TP)",
				187=>"Hòa Bình",
				188=>"Hậu Giang",
				189=>"Hưng Yên",
				190=>"Khánh Hòa",
				191=>"Kiên Giang",
				192=>"Kon Tum",
				193=>"Lai Châu",
				194=>"Lào Cai",
				195=>"Lạng Sơn",
				196=>"Lâm Đồng",
				197=>"Long An",
				198=>"Nam Định",
				199=>"Nghệ An",
				200=>"Ninh Bình",
				201=>"Ninh Thuận",
				202=>"Phú Thọ",
				203=>"Phú Yên",
				204=>"Quảng Bình",
				205=>"Quảng Nam",
				206=>"Quảng Ngãi",
				207=>"Quảng Ninh",
				208=>"Quảng Trị",
				209=>"Sóc Trăng",
				210=>"Sơn La",
				211=>"Tây Ninh",
				212=>"Thái Nguyên",
				213=>"Thanh Hóa",
				214=>"Thừa Thiên - Huế",
				215=>"Tiêng Giang",
				216=>"Trà Vinh",
				217=>"Tuyên Quang",
				218=>"Vĩnh Long",
				219=>"Vĩnh Phúc",
				220=>"Yên Bái");
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Order->recursive = 0;
		$model = 'Order';
		$limit = 10;
		$conditions = array();
		if($this->request->is('POST'))
		{
			$data = $this->request->data;
			$limit = $data['Order']['limit'];
			if(!empty($data['Order']['created'])){
				$conditions = array('Order.created'=>$data['Order']['created']);
			}
			
	
		}
		else{
			
	
		}
		$this->Paginator->settings=array(
				'conditions'=>$conditions,
				'limit'=>$limit,
				'order'=>array('Order.created'=>'desc')
			);
		$orders = $this->Paginator->paginate();
		$cities = $this->cities;
		$this->set(compact('orders','model','cities'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$users = $this->Order->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete','get');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Đặt hàng đã bị xóa.'),'success');
		} else {
			$this->Session->setFlash(__('Không thể xóa đặt hàng này.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_release($id)
	{
        $this->Order->id = $id;
		if($this->Order->saveField('status',1))
		{
			$this->Session->setFlash(__('Bạn đã cập nhật trạng thái đặt hàng'),'success');
		}
		else{
			$this->Session->setFlash(__('Trạng thái đặt hàng chưa được cập nhật'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

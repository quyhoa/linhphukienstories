<?php
App::uses('AppModel', 'Model');
/**
 * ProductSpecial Model
 *
 * @property Product $Product
 */
class ProductSpecial extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'product_special';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

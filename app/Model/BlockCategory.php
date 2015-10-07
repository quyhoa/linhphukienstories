<?php
App::uses('AppModel', 'Model');
/**
 * BlockCategory Model
 *
 * @property BlockContent $BlockContent
 */
class BlockCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BlockContent' => array(
			'className' => 'BlockContent',
			'foreignKey' => 'block_category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BlockCategoryParent'=>array(
			'className'=>'BlockCategoryParent',
			'foreignKey'=>'parent'
			)
	);
}

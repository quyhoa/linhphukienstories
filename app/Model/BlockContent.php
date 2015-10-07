<?php
App::uses('AppModel', 'Model');
/**
 * BlockContent Model
 *
 * @property BlockCategory $BlockCategory
 */
class BlockContent extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BlockCategory' => array(
			'className' => 'BlockCategory',
			'foreignKey' => 'block_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

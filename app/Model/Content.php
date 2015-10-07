<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 * @property ContentCategory $ContentCategory
 */
class Content extends AppModel {

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
		'ContentCategory' => array(
			'className' => 'ContentCategory',
			'foreignKey' => 'content_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

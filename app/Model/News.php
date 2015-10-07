<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 * @property NewsCategory $NewsCategory
 */
class News extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'NewsCategory' => array(
			'className' => 'NewsCategory',
			'foreignKey' => 'news_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

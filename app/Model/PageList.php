<?php
App::uses('AppModel', 'Model');
/**
 * PageList Model
 *
 */
class PageList extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $belongsTo = array(
		'PageListParent'=>array(
			'className'=>'PageListParent',
			'foreignKey'=>'parent'
			)

		);

}

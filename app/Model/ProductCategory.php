<?php
App::uses('AppModel', 'Model');
/**
 * ProductCategory Model
 *
 */
class ProductCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $belongsTo = array(
		'ProductCategoryParent'=>array(
									'className'=>'ProductCategoryParent',
									'foreignKey'=>'parent'
								)
		);

}

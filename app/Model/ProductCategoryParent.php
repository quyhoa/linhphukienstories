<?php
App::uses('AppModel', 'Model');
/**
 * ProductCategory Model
 *
 */
class ProductCategoryParent extends AppModel {

/**
 * Display field
 *
 * @var string
 */ 
	public $useTable = 'product_categories';
	public $displayField = 'name';
	
}

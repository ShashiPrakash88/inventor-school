<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}
class Inventor_Schools_Field_Type{

    public static function init() {self::includes();}
	
	
    public static function includes() {
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/workhours.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/student1.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/student2.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/result1.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/result2.php';
    }
}

Inventor_Schools_Field_Type::init();

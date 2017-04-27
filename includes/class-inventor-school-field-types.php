<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}
class Inventor_Schools_Field_Type{

    public static function init() {self::includes();}
	
	
    public static function includes() {
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/working_hours.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/student_primary.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/student_secondary.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/result_primary.php';
		require_once INVENTOR_SCHOOLS_DIR . 'includes/field-types/result_secondary.php';
    }
}

Inventor_Schools_Field_Type::init();

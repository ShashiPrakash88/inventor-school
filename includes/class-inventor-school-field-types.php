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

		//for fixing the input widths
		add_action( 'admin_enqueue_scripts', 'load_wp_admin_style' );
    }
}

Inventor_Schools_Field_Type::init();


function load_wp_admin_style() {
        wp_register_style( 'wp_admin_css', plugins_url('inventor-schools/').'/assets/styles/admin.css', false, '1.0.0');
        wp_enqueue_style( 'wp_admin_css' );
}
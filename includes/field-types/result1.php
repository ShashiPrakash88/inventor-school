<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}

     class Inventor_Schools_Field_Types_result1
	 {
		public static function init() 
		{
        add_filter( 'cmb2_render_result1', array( __CLASS__, 'render' ), 10, 5 );
        add_filter( 'cmb2_sanitize_result1', array( __CLASS__, 'sanitize' ), 12, 4 );
        }   
// Adding new field type
        public static function render( $field, $value, $object_id, $object_type, $field_type_object )
		{
			echo Inventor_Template_Loader::load( 'controls/result_1', array(
			
                    'field'             => $field,
                    'value'             => $value,
                    'object_id'         => $object_id,
                    'object_type'       => $object_type,
                    'field_type_object' => $field_type_object
                  ), INVENTOR_SCHOOLS_DIR );
       }
// Sanitising the value
        public static function sanitize( $override_value, $value, $object_id, $field_args ) 
		{return $value; }
// Escapes the value
        public static function escape( $value ) 
		{return $value;}
     }
Inventor_Schools_Field_Types_result1::init();
<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}

     class Inventor_Schools_Field_Types_working_hours
	 {
		public static function init() 
		{
        add_filter( 'cmb2_render_working_hours', array( __CLASS__, 'render' ), 10, 5 );
        add_filter( 'cmb2_sanitize_working_hours', array( __CLASS__, 'sanitize' ), 12, 4 );
        }   
// Adding new field type
        public static function render( $field, $value, $object_id, $object_type, $field_type_object )
		{
			echo Inventor_Template_Loader::load( 'controls/working_hours', array(
			
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
Inventor_Schools_Field_Types_working_hours::init();
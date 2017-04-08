<?php

    if ( ! defined( 'ABSPATH' ) ) 
	{
		exit;
	}
/**
 * Class Inventor_Schools_Post_Type_Schools
 *
 * @class Inventor_Schools_Post_Type_School
 * @package Inventor/Classes/Post_Types
 * @author Pragmatic Mates
 */
    class Inventor_Schools_Post_Type_Schools 
    {
/**
* Initialize custom post type
*
* @access public
* @return void
*/
      public static function init() 
       {        
         add_action( 'init', array( __CLASS__, 'definition' ), 11 );
         add_action( 'cmb2_init', array( __CLASS__, 'fields' ) );
         add_filter( 'inventor_shop_allowed_listing_post_types', array( __CLASS__, 'allowed_purchasing' ) );
         add_filter( 'inventor_claims_allowed_listing_post_types', array( __CLASS__, 'allowed_claiming' ) );
    }
/**
* Defines if post type can be purchased
*
* @access public
* @param array $post_types
* @return array
*/
      public static function allowed_purchasing( $post_types ) 
       {
        $post_types[] = 'school';
		return $post_types;
       }
/**
* Defines if post type can be claimed
*
* @access public
* @param array $post_types
* @return array
*/
      public static function allowed_claiming( $post_types )
      {
        $post_types[] = 'school';
		return $post_types;
      }
/**
* Custom post type definition
*
* @access public
* @return void
*/
      public static function definition() 
	  {
        $labels = array(
            'name'                  => __( 'Schools', 'inventor-schools' ),
            'singular_name'         => __( 'School', 'inventor-schools' ),
            'add_new'               => __( 'Add New School', 'inventor-schools' ),
            'add_new_item'          => __( 'Add New School', 'inventor-schools' ),
            'edit_item'             => __( 'Edit School', 'inventor-schools' ),
            'new_item'              => __( 'New School', 'inventor-schools' ),
            'all_items'             => __( 'Schools', 'inventor-schools' ),
            'view_item'             => __( 'View Schools', 'inventor-schools' ),
            'search_items'          => __( 'Search Schools', 'inventor-schools' ),
            'not_found'             => __( 'No Schools found', 'inventor-schools' ),
            'not_found_in_trash'    => __( 'No Schools Found in Trash', 'inventor-schools' ),
            'parent_item_colon'     => '',
            'menu_name'             => __( 'Schools', 'inventor-schools' ),
            'icon'                  => apply_filters( 'inventor_listing_type_icon', 'inventor-poi-single-house', 'school' )
        );

        register_post_type( 'school', array(
            'labels'            => $labels,
            'show_in_menu'	    => 'listings',
            'supports'          => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
            'has_archive'       => true,
            'rewrite'           => array( 'slug' => _x( 'schools', 'URL slug', 'inventor-schools' ) ),
            'public'            => true,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'categories'        => array(),
        ));
      }
/**
* Defines custom fields
*
* @access public
* @return array
*/
      public static function fields()
	  {
        $post_type = 'school';
		if ( ! is_admin() ) 
		{
            Inventor_Post_Types::add_metabox( $post_type, array( 'general' ) );
        }
// 1st Metabox -- Basic Details
    $metabox_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'Basic Details';
    $details = new_cmb2_box( array(
            'id'            => $metabox_id,
            'title'         => __( 'Basic Details', 'inventor-schools' ),
            'object_types'  => array( $post_type ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_in_rest'  => true,
			'hookup'       => false,
        'save_fields'  => false
        ) );

//1st field -- year	       
    $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'year';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'Year of Establishment', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'text_small',
                'attributes'        => array(
                    'type'      => 'number',
                    'pattern'   => '\d*',
                    'min'       => 1800,
					'max'       => 2017
                ),
            ) );
		}
//2nd field --  setting 
        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'location';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'Location of the school', 'inventor-schools' ),
                'description'       => __( 'Select the location rural/urban', 'inventor-schools' ),
                 'id'                => $field_id,
                'type'              => 'radio_inline',
		        'show_option_none'  => false,
		        'options'           => array (
                     'custom' => __('Rural', 'cmb2'),
                     'urban'     => __('Urban', 'cmb2')
                                              )
            ));
        }
// 3rd field -- organisation		
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'gender';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'Gender', 'inventor-schools' ),
                'description'       => __( 'Select the organisation of school', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'radio_inline',
				'show_option_none'  => false,
		        'options'           => array (
                     'custom' => __('Only for Girls', 'cmb2'),
                     'boys'     => __('Only for Boys', 'cmb2'),
					 'coed'     => __('Co-education', 'cmb2'),
                                              )
		    ));
        }
//4th field -- type 		
		        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'type';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'School type', 'inventor-schools' ),
				'description'       => __( 'Select the type of school', 'inventor-schools' ),
                'id'                => $field_id,
                'type'              => 'radio',
				'show_option_none'  => false,
		        'options'           => array (
                     'nonr' => __('Not Residential', 'cmb2'),
                     'ashram'   => __('Residential -> Ashram', 'cmb2'),
					 'nonash'     => __('Residential -> Non-Ashram(Govt)', 'cmb2'),
					 'kgbv'     => __('Residential -> KGBV', 'cmb2'),
					 'model'     => __('Residential -> Model_school', 'cmb2'),
					 'res'     => __('Residential -> no_type', 'cmb2'),
					 'resna'     => __('Not Applicable', 'cmb2'),
					 
                                              )
            ));
        }
//5th field -- mngt
		        $field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'mngt';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'School Management', 'inventor-schools' ),
				'description'       => __( 'Select the school management', 'inventor-schools' ),
                'id'                => $field_id,
                 'type'              => 'radio',
				'show_option_none'  => false,
	            'options' => array(
		                     'edu' => 'Dept. of Education',
		                     'trib' => 'Tribal/Social Welfare Dept.',
		                     'local' => 'Local body',
							 'pvt' => 'Private Aided',
		                     'unaided' => 'Private Unaided',
		                     'center' => 'Central Government',
							 'madarsa' => 'Madarsa Recognised',		                     
		                     'no_madarsa' => 'Madarsa Unrecognised',
		                     'unrecog' => 'Unrecognised',
							'other' => 'Other',
							   )
            ));
        }
//6th field -- board 		
		$field_id = INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'board';
        if ( apply_filters( 'inventor_metabox_field_enabled', true, $metabox_id, $field_id, $post_type ) ) {
            $details->add_field( array(
                'name'              => __( 'School Board', 'inventor-schools' ),
			    'desc'              => 'Select the Board of the School',
                'id'                => $field_id,
                'type'              => 'select',
			    'show_option_none' => false,
	            'default'          => 'custom', 
		        'options'           => array (
				       'custom' => __( 'CBSE', 'cmb2' ),
					   'icse'     => __('ICSE', 'cmb2'),
					   'state'     => __('State', 'cmb2'),
					   'inter'     => __('International', 'cmb2'),
					   'none'     => __('Other', 'cmb2')
                                              )
            ));
        }
// End of the first metabox. 
         Inventor_Post_Types::add_metabox( 'school', array( 'banner', 'gallery', 'video', 'location', 'contact', 'flags', 'listing_category' ) );
         Inventor_Post_Types::remove_metabox('school', array('Shop configuration') );
           
       } 
      
	}  

Inventor_Schools_Post_Type_Schools::init();
?>

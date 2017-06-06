<?php
     if ( ! defined( 'ABSPATH' ) ) {exit;}
/**
 * Class Inventor_Schools_Logic
 * @package Inventor/Classes
 * @author Bhaargavi Agrawal
 */
     class Inventor_Schools_Logic 
     {
	   public static function init() 
	   {
         add_action( 'inventor_after_listing_detail_overview', array( __CLASS__, 'special_sections' ) );
       }

//Renders special sections for school
     
       public static function special_sections() 
	   {
        echo Inventor_Template_Loader::load( 'controls/design',    array(), INVENTOR_SCHOOLS_DIR );
        
		}
      }
Inventor_Schools_Logic::init();
?>
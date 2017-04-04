<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Inventor_Schools_Logic
 *
 * @class Inventor_Schools_Logic
 * @package Inventor/Classes
 * @author Pragmatic Mates
 */
class Inventor_Schools_Logic {
    /**
     * Initialize school system
     *
     * @access public
     * @return void
     */
    public static function init() {
        add_action( 'inventor_after_listing_detail_overview', array( __CLASS__, 'special_sections' ) );
        add_filter( 'inventor_attribute_value', array( __CLASS__, 'attribute_value' ), 10, 2 );
    }

    /**
     * Renders special sections for school type
     *
     * @access public
     * @return void
     */
    public static function special_sections() {
        echo Inventor_Template_Loader::load( 'valuation', array(), INVENTOR_SCHOOL_PREFIX );
    }

   
}

Inventor_Schools_Logic::init();

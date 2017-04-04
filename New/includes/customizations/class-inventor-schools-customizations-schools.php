<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Inventor_Schools_Customizations_Schools
 *
 * @class Inventor_Schools_Customizations_Schools
 * @package Inventor_Properties/Classes/Customizations
 * @author Pragmatic Mates
 */
class Inventor_Schools_Customizations_Schools {
    /**
     * Initialize customization type
     *
     * @access public
     * @return void
     */
    public static function init() {
        add_action( 'customize_register', array( __CLASS__, 'customizations' ) );
    }

    /**
     * Customizations
     *
     * @access public
     * @param object $wp_customize
     * @return void
     */
    public static function customizations( $wp_customize ) {
        $wp_customize->add_section( 'inventor_schools', array(
            'title'     => __( 'Inventor Schools', 'inventor-schools' ),
            'priority'  => 1,
        ) );

        // Unassigned amenities
        $wp_customize->add_setting( 'inventor_schools_hide_unassigned_amenities', array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'inventor_schools_hide_unassigned_amenities', array(
            'type'     => 'checkbox',
            'label'    => __( 'Hide unasigned amenities', 'inventor-schools' ),
            'section'  => 'inventor_schools',
            'settings' => 'inventor_schools_hide_unassigned_amenities',
        ) );
    }
}

Inventor_Schools_Customizations_Schools::init();

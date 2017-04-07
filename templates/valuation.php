<!-- VALUATION -->
<?php do_action( 'inventor_before_listing_detail_school_valuation' ); ?>

<?php $valuation = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'valuation', true ); ?>

<?php if ( ! empty( $valuation ) && is_array( $valuation ) && ! empty( $valuation[0] ) ) : ?>
    <div class="listing-detail-section" id="listing-detail-section-school-valuation">
        <h2 class="page-header"><?php echo __( 'Valuation', 'inventor-schools' ); ?></h2>

        <div class="listing-detail-school-valuation">
            <?php foreach ( $valuation as $v ) : ?>
                <?php $key = esc_attr( $v[ INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'valuation_key' ] ); ?>
                <?php $value = esc_attr( $v[ INVENTOR_LISTING_PREFIX . INVENTOR_SCHOOL_PREFIX . 'valuation_value' ] ); ?>

                <div class="listing-detail-school-valuation-item">
                    <dt><?php echo $key; ?></dt>
                    <dd>
                        <div class="bar-valuation"
                             style="width: <?php echo $value; ?>%"
                             data-percentage="<?php echo $value; ?>">
                        </div>
                    </dd>
                    <span class="percentage-valuation"><?php echo $value; ?> %</span>
                </div><!-- /.school-valuation-item -->
            <?php endforeach; ?>
        </div><!-- /.listing-detail-school-valuation-->
    </div><!-- /.listing-detail-section -->
<?php endif; ?>

<?php do_action( 'inventor_after_listing_detail_school_valuation' ); ?>

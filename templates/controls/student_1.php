<?php $classes =  array(
				'C1B'   => __( 'C1B', 'inventor-schools' ),
				'C1G'   => __( 'C1G', 'inventor-schools' ),
				'C2B'   => __( 'C2B', 'inventor-schools' ),
				'C2G'   => __( 'C2G', 'inventor-schools' ),
				'C3B'   => __( 'C3B', 'inventor-schools' ),
				'C3G'   => __( 'C3G', 'inventor-schools' ),
				'C4B'   => __( 'C4B', 'inventor-schools' ),
				'C4G'   => __( 'C4G', 'inventor-schools' ),
				'C5B'   => __( 'C5B', 'inventor-schools' ),
				'C5G'   => __( 'C5G', 'inventor-schools' ),
				);?>
<table>
    <thead>
        <tr>
		    <th><?php echo __( 'Class-Boys/Girls', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Disabled', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'SC', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'ST', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'OBC', 'inventor-schools' ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0; ?>
        <?php foreach( $classes as $key => $display ): ?>
            <tr>
              <?php $dis  = ''; ?>
              <?php $sc   = ''; ?>
              <?php $st   = ''; ?>
			  <?php $obc  = ''; ?>
              <?php if ( is_array( $field->value ) ) : ?>
               <?php foreach( $field->value as $class ) : ?>
               <?php if( $class['listing_day'] == $key ) : ?>
               <?php
$dis = !empty( $class['dis'] ) ? $class['dis'] : '';
$sc  = !empty( $class['sc'] )  ? $class['sc']  : '';
$st  = !empty( $class['st'] )  ? $class['st']  : '';
$obc = !empty( $class['obc'] ) ? $class['obc'] : '';
                         ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
<td>
<label for="class_<?php echo $index; ?>_no.class"></label>
<input type="hidden" name="class[<?php echo $index; ?>][no.class]" id="class_<?php echo $index; ?>_no.class" value="<?php echo $key; ?>"><?php echo $display; ?>
</td>

<td>
<label for="class_<?php echo $index; ?>_disabled"></label>
<input type="number"  min="0" max='24'  name="class_[<?php echo $index; ?>][disabled]" id="class_<?php echo $index; ?>_disabled" value="<?php echo $dis ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_scaste"></label>
<input type="number"  min="0"  name="class_[<?php echo $index; ?>][scaste]" id="class_<?php echo $index; ?>scaste" value="<?php echo $sc ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_scategory"></label>
<input type="number"  min="0" name="class_[<?php echo $index; ?>][scategory]" id="class_<?php echo $index; ?>_scategory" value="<?php echo $st ?>">
</td>

<td>
<label for="class_<?php echo $index; ?>_other"></label>
<input type="number"  min="0"  name="class_[<?php echo $index; ?>][other]" id="class_<?php echo $index; ?>_other" value="<?php echo $obc ?>">
</td>
</tr>                                                 
            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
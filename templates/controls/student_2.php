<?php $classes =  array(
				'C6B'   => __( 'C6B', 'inventor-schools' ),
				'C6G'   => __( 'C6G', 'inventor-schools' ),
				'C7B'   => __( 'C7B', 'inventor-schools' ),
				'C7G'   => __( 'C7G', 'inventor-schools' ),
				'C8B'   => __( 'C8B', 'inventor-schools' ),
				'C8G'   => __( 'C8G', 'inventor-schools' ),
				'C9B'   => __( 'C9B', 'inventor-schools' ),
				'C9G'   => __( 'C9G', 'inventor-schools' ),
				'C10B'  => __( 'C10B', 'inventor-schools' ),
				'C10G'  => __( 'C10G', 'inventor-schools' ),
				'C11B'  => __( 'C11B', 'inventor-schools' ),
				'C11G'  => __( 'C11G', 'inventor-schools' ),
				'C12B'  => __( 'C12B', 'inventor-schools' ),
				'C12G'  => __( 'C12G', 'inventor-schools' ),
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
               <?php foreach( $field->value as $classes ) : ?>
               <?php if( $classes['listing_day'] == $key ) : ?>
               <?php
$dis = !empty( $classes['dis'] ) ? $classes['dis'] : '';
$sc  = !empty( $classes['sc'] )  ? $classes['sc']  : '';
$st  = !empty( $classes['st'] )  ? $classes['st']  : '';
$obc = !empty( $classes['obc'] ) ? $classes['obc'] : '';
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
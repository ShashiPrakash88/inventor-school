<?php $work =  array(
				'workday'    => __( 'Days', 'inventor-schools' ),
				'workhrs'    => __( 'Hrs(teachers)', 'inventor-schools' ),
				'workhrs2'   => __( 'Hrs(students)', 'inventor-schools' ),
				);?>

<?php
//for handling default values
    $value = wp_parse_args( $value, array(
        'work'              => '',
        'pre_primary'       => '',
        'primary'           => '',
        'secondary'         => '',
        'hr_secondary'      => ''
    ) );
?>


<table>
    <thead>
        <tr>
            <th><?php echo __( 'Work', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Pre Primary', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Primary', 'inventor-schools' ); ?></th>
            <th><?php echo __( 'Secondary', 'inventor-schools' ); ?></th>
			<th><?php echo __( 'Hr-Secondary', 'inventor-schools' ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0; ?>
        <?php foreach( $work as $key => $display ): ?>
        <tr>
        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[work_'.$index.']' ),
                'id'    => $field_type_object->_id( '_work_'.$index ),
                'value' => $key,
                'type'  => 'hidden',
                'desc'  => '',
            ) ); 
            echo $display;
            ?>
        </td>         

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[pre_primary_'.$index.']'),
                'id'    => $field_type_object->_id( '_pre_primary_'.$index ),
                'value' => $value['pre_primary_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[primary_'.$index.']'),
                'id'    => $field_type_object->_id( '_primary_'.$index ),
                'value' => $value['primary_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[secondary_'.$index.']'),
                'id'    => $field_type_object->_id( '_secondary_'.$index ),
                'value' => $value['secondary_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[hr_secondary_'.$index.']'),
                'id'    => $field_type_object->_id( '_hr_secondary_'.$index ),
                'value' => $value['hr_secondary_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>
        
    </tr>

            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
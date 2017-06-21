<?php
//for handling default values
    $value = wp_parse_args( $value, array(
        'class_num' => '',
        'dis'       => '',
        'sc'        => '',
        'st'        => '',
        'obc'       => ''
    ) );
?>

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
        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[class_num_'.$index.']' ),
                'id'    => $field_type_object->_id( '_class_num_'.$index ),
                'value' => $key,
                'type'  => 'hidden',
                'desc'  => '',
            ) ); 
            echo $display;
            ?>
        </td>         

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[dis_'.$index.']'),
                'id'    => $field_type_object->_id( '_dis_'.$index ),
                'value' => $value['dis_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[sc_'.$index.']'),
                'id'    => $field_type_object->_id( '_sc_'.$index ),
                'value' => $value['sc_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[st_'.$index.']'),
                'id'    => $field_type_object->_id( '_st_'.$index ),
                'value' => $value['st_'.$index],
                'type'  => 'number',
                'desc'  => '',
                'class' => 'table_num',
                'min'   => 0
            ) ); 
            ?>
        </td>

        <td>
            <?php echo $field_type_object->input( array(
                'name'  => $field_type_object->_name( '[obc_'.$index.']'),
                'id'    => $field_type_object->_id( '_obc_'.$index ),
                'value' => $value['obc_'.$index],
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
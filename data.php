<?php

/* 
 * Manage functionality of Form 3 NESTED Repeater Real Property
 * */


add_filter('gform_pre_render_3', 'populate_property_roles');
add_filter('gform_pre_validation_3', 'populate_property_roles');
add_filter('gform_pre_submission_filter_3', 'populate_property_roles');

function populate_property_roles($form)
{

    foreach ($form['fields'] as &$field) {
        if ($field->type != 'radio' || strpos($field->cssClass, 'bs-input-spouses') === false) {
            continue;
        }


        $spouse_a = $value = rgpost('input_25');
        $spouse_b = $value = rgpost('input_26');


        // Insert spouses names into array
        $choices=array(
            array('text' => $spouse_a,
                    'value' => $spouse_a),
            array('text' => $spouse_b,
                    'value' => $spouse_b),
        );

        $field->choices = $choices;
    }
 
    return $form;
}

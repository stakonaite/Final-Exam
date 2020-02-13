<?php

function validate_fields_match($filtered_input, &$form, $params)
{
    $match = true;

    foreach ($params as $field_id) {
        $ref_value = $ref_value ?? $filtered_input[$field_id];
        if ($ref_value != $filtered_input[$field_id]) {
            $match = false;
            break;
        }
    }

    if (!$match) {
        $form['fields'][$field_id]['error'] = 'Laukai nesutampa!';
        return false;
    }

    return true;
}

function validate_not_empty($field_value, &$field)
{
    if (strlen($field_value) == 0) {
        $field['error'] = 'Laukas negali būti tuščias';
    } else {
        return true;
    }
}

function validate_is_number($field_value, &$field)
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Įveskite skaičių!';
    } else {
        return true;
    }
}

function validate_is_positive($field_value, &$field)
{
    if ($field_value < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių.';
    } else {
        return true;
    }
}

function validate_no_space($field_value, &$field)
{
    if (preg_match('/\s/', $field_value)) {
        $field['error'] = 'Laukelyje neturi buti tarpo';
    } else {
        return true;
    }
}

function validate_phone_number($field_value, &$field)
{
    if (!preg_match("/^\+3706[0-9]{7}$/", $field_value)) {
        $field['error'] = 'Telefono numeris ivestas klaidingai';
    } else {
        return true;
    }
}

function validate_string_length($field_value, &$field, $params)
{
    if (strlen($field_value) >= $params['max']['value']) {
        $field['error'] = $params['max']['message'];
        return false;
    }
    return true;
}

function validate_no_numbers_and_symbols($field_value, &$field)
{
    if (!preg_match("/^([^0-9]+)$/", $field_value)) {
        $field['error'] = 'Laukelyje negali būti skaičių ar simbolių';
    } else {
        return true;
    }
}

function validate_email_syntax($field_value, &$field)
{
    $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if (!preg_match($regex, $field_value)) {
        $field['error'] = 'Klaidingas el. pašto adresas';
    } else {
        return true;
    }
}

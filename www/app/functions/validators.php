<?php

function validate_login($filtered_input, &$form) {
    $login_success = \App\App::$session->login(
            $filtered_input['email'],
            $filtered_input['password']
    );

    if (!$login_success) {
        $form['fields']['password']['error'] = 'Prisijungimo slaptažodis neteisingas!';
        $form['fields']['password']['value'] = '';
        return false;
    }
    return true;
}

function validate_mail_unique($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if ($users) {
        $field['error'] = 'Vartotojas tokiu el.paštu jau registruotas!';
        return false;
    }

    return true;
}

function validate_mail_exists($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if (!$users) {
        $field['error'] = 'Šiuo el. paštu neregistruotas joks vartotojas!';
        return false;
    }

    return true;
}
<?php


namespace App\Feedback\Views;


class ApiForm extends \Core\Views\Form
{
    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'feedback' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_string_length' => [
                                'max' => [
                                    'value' => 500,
                                    'message' => 'Komentaras negali viršyti 500 simbolių',
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }
}
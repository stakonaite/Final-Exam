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
                            'validate_max_500_characters',
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
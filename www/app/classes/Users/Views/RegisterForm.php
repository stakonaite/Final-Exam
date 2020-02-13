<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form
{

    public function __construct($data = [])
    {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail_unique',
                        ]
                    ],
                ],
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_numbers_and_symbols',
                            'validate_string_length' => [
                                'max' => [
                                    'value' => 40,
                                    'message' => 'Vardas negali viršyti 40 simbolių',
                                ]
                            ]
                        ]
                    ]
                ],
                'surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_numbers_and_symbols',
                            'validate_string_length' => [
                                'max' => [
                                    'value' => 40,
                                    'message' => 'Pavardė negali viršyti 40 simbolių'
                                ]
                            ]
                        ]
                    ]
                ],
                'phone' => [
                    'label' => 'Phone number (eg:+3706...)',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_space',
                            'validate_phone_number',
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Register',
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
            ]
        ];
    }
}

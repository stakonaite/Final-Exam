<?php


namespace App\Feedback\Views;


class BaseForm extends \Core\Views\Form
{
    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'feedback' => [
                    'label' => 'Your Feedback',
                    'type' => 'text',
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ]
            ]
        ];
    }
}

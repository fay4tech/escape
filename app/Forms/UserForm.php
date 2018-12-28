<?php

namespace App\Forms;

use App;
use App\Company;
use Illuminate\Support\Facades\Storage;

class UserForm extends Form
{
    /**
     * @var string
     */
    protected $resource = 'users';

    /**
     * we give the value to the key for data base storage
     * @return mixed
     */
    public function avatar()
    {
        $avatars = Storage::files('users');
        foreach ($avatars as $key => $value){
            $avatar[$value] =  $value;
        }
        return $avatar;
    }


    /**
     * @return mixed|void
     */
    public function buildForm()
    {
        parent::buildForm();
        $this
            ->add('name', 'text', [
                'label' => 'Name',
                'rules' => 'required|min:3'
            ])

            ->add('email', 'email', [ 'label' => 'E-Mail' ] )

            ->add('password', 'repeated', [
                    'type' => 'password',
                    'second_name' => 'password_confirmation',
                    'first_options' => ['label' => 'Password'],
                    'second_options' => ['label' => 'Confirm Password']
                ])

            ->add('lvl', 'select',
                [
                    'choices' => [
                        '1' => 'Normal User',
                        '8' => 'Admin Company',
                        '9' => 'Editor',
                        '10' => 'Super Admin',
                    ],
                ])
            ->add('active', 'select',
                [
                    'choices' => [
                        '1' => 'Activ',
                        '0' => 'No Active',
                    ],
                ])
            /*->add('avatar','select',
                [
                    'choices' => $this->avatar(),
                    'attr' => ['class' => 'custom-select'],
                    'label' => 'Avatar',

                ])*/

            ->add('submit', 'submit',
                [
                    'label' => 'send',
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                ])
            ->add('company_id','select',
                [
                    'choices' => Company::all()->sortBy('name')->pluck('name', 'id')->toArray(),
                    'rules' => 'required',
                    'attr' => ['class' => 'custom-select'],
                    'label' => 'Company:',

                ])
        ;
    }
}

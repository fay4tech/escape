<?php

namespace App\Forms;

use App;

class CompanyForm extends Form
{
    protected $resource = 'companies';

    public function buildForm()
    {
        parent::buildForm();
        $this
            ->add('name', 'text', [
                'label' => 'Company Name:'
            ])
            ->add('avis', 'textarea', [
                    'label' => 'Avis:'
                ])
            ->add('adress', 'text', [
                'label' => 'Company Address:',
                'attr' => ['placeholder' => 'Address']
                ])
            ->add('city', 'text', [
                'label_show' => FALSE,
                'attr' => ['placeholder' => 'city']
                ])
            ->add('region', 'text', [
                    'label_show' => FALSE,
                    'attr' => ['placeholder' => 'Region']
                ])
            ->add('zip', 'text', [
                'label_show' => FALSE,
                'attr' => ['placeholder' => 'Zip']
                ])
            ->add('country', 'text', [
                'label_show' => FALSE,
                'attr' => ['placeholder' => 'country']
                ])
            ->add('open', 'time', ['label' => 'Open at:'])
            ->add('close', 'time', ['label' => 'Close at:'])
            ->add('pricemin', 'number',[
                'rules' => 'min:0',
                'label_show' => FALSE,
                'attr' => ['step' => '0.01', 'placeholder' => 'Min €']
                ])
            ->add('pricemax', 'number', [
                'rules' => 'min:0',
                'label_show' => FALSE,
                'attr' => ['step' => '0.01', 'placeholder' => 'Max €']
                ])
            ->add('email', 'email', [
                    'label' => 'Email:',
                    'attr' => ['placeholder' => 'Email@example.com']
                ])
            ->add('url', 'text', [
                    'label' => 'Website:',
                    'attr' => ['placeholder' => 'www.example.com']
                ])
            ->add('tel', 'text', [
                    'label' => 'Tel:',
                    'attr' => ['placeholder' => '+331xxxxxxxxxx']
                ])
            ->add('roomNb', 'number', [
                    'label' => 'Number of Rooms:',
                    'rules' => 'min:0'
                ])
            ->add('sale', 'textarea', [
                    'label' => 'Special offer',
                    'attr' => ['cols' => 1, 'row' => 1]
                ])
            ->add('image', 'file', [
                    'label' => 'Image:',
                    'attr' => ['class' => 'btn btn-primary hugo']
                ])

            ->add('submit', 'submit',
                [
                    'label' => 'send',
                    'attr' => ['class' => 'btn btn-primary'],
                ])
        ;
    }
}

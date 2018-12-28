<?php

namespace App\Forms;
use App\Company;
use App;

class RoomForm extends Form
{
    protected $resource = 'rooms';

    public function buildForm()
    {

        parent::buildForm();
        $this
            ->add('name', 'text', [
                'label' => __('Nom'),
                'rules' => 'required|min:3'
            ])

            ->add('theme_fr', 'text', [
                    'label' => 'Thème',
            ])
            ->add('theme_en', 'text', [
                'label' => __('Thème'),
            ])

            ->add('pitch_fr', 'textarea', [
                    'label' => __('Pitch Fr'),
                    'attr' => [
                        'class' => 'form-control',
                        'rows' => '9',
                        'cols' => '50'
                    ]
            ])
            ->add('pitch_en', 'textarea', [
                'label' => __('Pitch Fr'),
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '9',
                    'cols' => '50'
                ]
            ])
            
            ->add('resum_fr', 'textarea',[
                'label' => __('Résumé des salles'),
                'rules' => 'max:250',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '8',
                    'cols' => '50'
                ]
            ])
            ->add('resum_en', 'textarea',[
                'label' => __('Résumé des salles'),
                'rules' => 'max:250',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '8',
                    'cols' => '50'
                ]
            ])

            ->add('image', 'file', [
                    'attr' => [
                        'enctype' => 'multipart/form-data',
                        'class' => 'file btn btn-primary'
                    ],
                    'rules' => 'max:2048|mimes:jpg,jpeg,png,gif',
                    'label' => __('Image'),

                ])

            ->add('lvl', 'select',
                [
                    'choices' => [
                        '0' => __('Très facile'),
                        '1' => __('Facile'),
                        '2' => __('Normale'),
                        '3' => __('Dur'),
                        '4' => __('Très dur'),
                        '5' => __('Personnalisable')
                    ],
                ])

            ->add('minplayers', 'number',['rules' => 'required|min:0'])

            ->add('maxplayers', 'number',['rules' => 'required|min:0'])

            ->add('timeplay', 'number',['rules' => 'required|min:0', 'label' => __('Temps de jeu')])

            ->add('success', 'number',['rules' => 'min:0|max:100', 'label' => __('Réussite %')])

            ->add('clear', 'reset', [
                'label' => __('Videz'),
                'attr'  => [
                    'class' => 'btn-default btn-danger'
                ]
            ])
            ->add('company_id','select',
                [
                    'choices' => Company::all()->pluck('name', 'id')->toArray(),
                    'label' => __('Enseignes').':',
                    'attr' => ['class' => 'custom-select'],

                ])
            ->add('playDate', 'date', [
                    'label' => __('Jouè le').':',
                    'value' => '12/12/2008',
                    'attr' => [
                        'class' => 'form-control',
                    ]
                ])
            ->add('teams', 'text', [
                    'label' => __('La Team:')
                ])
            ->add('timePlayMax', 'number', [
                    'rules' => 'required|min:0',
                    'label' => __('Temps de jeux: Mn')
                ])
            ->add('wins', 'select', [
                    'choices' => [
                        '0' => __('Gagnè'),
                        '1' => __('Perdu'),
                        '2' => __('Pas joué'),
                    ],
                    'label' => __('On a').':'
                ])
            ->add('avis_fr', 'textarea', [
                    'label' => __('Notre avis:'),
                    'attr' => [
                        'class' => 'form-control',
                        'rows' => '8',
                        'cols' => '50'
                    ]
                ])
            ->add('avis_en', 'textarea', [
                'label' => __('Notre avis:'),
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '8',
                    'cols' => '50'
                ]
            ])
            ->add('positive_fr', 'textarea', [
                    'label' => __('On a aimé').':',
                    'attr' => [
                        'class' => 'form-control',
                        'rows' => '8',
                        'cols' => '50'
                    ]
                ])
            ->add('positive_en', 'textarea', [
                'label' => __('On a aimé').':',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '8',
                    'cols' => '50'
                ]
            ])
            ->add('negative_fr', 'textarea', [
                    'label' => __('On n’a pas aimé').':',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '8',
                    'cols' => '50'
                ]
                ])
            ->add('negative_en', 'textarea', [
                'label' => __('On n’a pas aimé').':',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '8',
                    'cols' => '50'
                ]
            ])
            ->add('submit', 'submit',
                [
                    'label' => __('Envoyer'),
                    'attr' => ['class' => 'btn btn-primary'],
                ])
            ->add('activ', 'select', [
                    'choices' => [
                        '0' => __('Cacher'),
                        '1' => __('Afficher'),
                    ],
                    'label' => __('Status')
                ])
            ->add('search', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Fouille').':  max: 10/10'
            ])
            ->add('enigmas', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Cohérence').':  max:  10/10'
            ])
            ->add('immersion', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Décors').':  max: 10/10'
            ])
            ->add('enigmas_ench', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Enchainement').':  max: 10/10'
            ])
            ->add('enigmas_quant', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Q / T / J').':  max: 10/10'
            ])
            ->add('enigmas_orig', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Originalité').':  max: 10/10'
            ])
            ->add('immersion_ambi', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Ambiance').':  max: 10/10'
            ])
            ->add('immersion_hist', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Histoire / Pitch').' max: 10/10'
            ])
            ->add('divertissement', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('Divertissement').': max: 10/10'
            ])
            ->add('note_mj', 'number',[
                'rules' => 'required|min:0|max:10',
                'label' => __('MJ / Aides / (Dé)Brief').': max: 10/10'
            ])
            ->add('dispo_id', 'text',[
                'label' => 'ID de la sale pour Escape.paris'
            ])
        ;

    }
}

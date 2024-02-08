<?php

namespace App\Form;

use App\Entity\Registro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Intl\Countries;


class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $countries = Countries::getNames();

        foreach($countries as $country =>  $name) {

            $countries2[$name] = $name;
        }
        $years = array_combine(range(date("Y"), 1950), range(date("Y"), 1950));


        $builder
            ->add('nombre')
            ->add('etapa', ChoiceType::class,[
                    'choices'  => [
                        'Estudiante de Doctorado' => 'Doctorado',
                        'Estudiante de Posdoctorado' => 'Posdoctorado',
                        'Profesor Junior'=>'Profesor Junior',
                        'Profesor Asistente'=>'Profesor Asistente',
                    ],
                    'placeholder' => 'Seleccionar',
                    'label'=> 'Etapa profesional']
            )
            ->add('doctorado', ChoiceType::class,[
                    'choices'  => $years,
                    'placeholder' => 'Seleccionar',
                    'label'=> 'Año de doctorado (o año provisional de doctorado)']
            )


            ->add('instituciondoc',null,['label'=>'Institución de doctorado'])
            ->add('institucion',null,['label'=>'Institución actual'])

            ->add('profesor',null,['label'=>'Nombre del supervisor de doctorado o mentor postdoctoral'])
            ->add('pais', ChoiceType::class, [
                'choices' => $countries2,
                'label'=>'País de residencia',
                'placeholder'  => 'Seleccionar'
                ,
            ])
            ->add('publicaciones',null,['label'=>'Lista de publicaciones'])
            ->add('proyectos',null,['label'=>'Lista de los 3 temas de proyectos preferidos, en el orden de preferencia'])
            ->add('viaje', ChoiceType::class, [
                'choices'  => [
                    'Sí' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'placeholder' => 'Seleccionar',
                'label'=>'BIRS/CMO proporciona alojamiento y comida durante el taller, pero no proporciona financiación para viajes.
                Actualmente estamos solicitando financiación de otras fuentes, pero no está garantizada. ¿De ser admitido, podría viajar 
                a Oaxaca con sus propios fondos? Si necesita solicitar fondos para viajes, calcule cuánto dinero (en USD) necesitaría.'
            ])
            ->add('correo', null, array(
                'label'=>'Correo electrónico',
            ))
            ->add('monto', null, array(
                'label'=>'Monto que solicita en USD',
            ))
            ->add('razones',null,['label'=>'¿Por qué quieres asistir a este taller?'])


        ;
    }





    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Registro::class,
        ]);
    }
}

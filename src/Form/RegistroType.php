<?php

namespace App\Form;

use App\Entity\Registro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
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
            ->add('profesor',null,['label'=>'Nombre del supervisor de doctorado o mentor postdoctoral'])
            ->add('pais',CountryType::class,['placeholder' => 'Seleccionar','label'=>'País'])
            ->add('publicaciones',null,['label'=>'Lista de publicaciones'])
            ->add('proyectos',null,['label'=>'Listade los 3 temas de proyectos preferidos, en el orden de preferencia'])
            ->add('viaje', ChoiceType::class, [
                'choices'  => [
                    'Sí' => 'Si',
                    'No' => 'No',
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

        ;
    }





    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Registro::class,
        ]);
    }
}
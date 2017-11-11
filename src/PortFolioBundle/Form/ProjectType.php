<?php
namespace PortFolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PortFolioBundle\Entity\Project;

class ProjectType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('title', TextType::class, array(
                                        'label' => 'Nom'
                    ))
                 ->add('date', TextType::class, array(
                                        'label' => 'Date du projet'
                    ))
                 ->add('url', TextType::class, array(
                                        'label'    => 'Url',
                                        'required' => false
                    ))
                 ->add('github', TextType::class, array(
                                        'label' => 'Github'
                    ))
        		 ->add('content', TextareaType::class, array(
                                        'label' => 'Contenu'
                    ))
                 ->add('new', SubmitType::class, array(
                                        'label' => 'Enregister'
                    ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Project::class,
        ));
    }

    public function getName()
    {
        return 'project';
    }
}
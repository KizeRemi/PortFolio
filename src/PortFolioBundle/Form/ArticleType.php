<?php
namespace PortFolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PortFolioBundle\Entity\Article;

class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('title', TextType::class, array(
                                        'label' => 'Nom'
                    ))
                 ->add('date', TextType::class, array(
                                        'label' => 'Date de l\'article'
                    ))
                 ->add('resume', TextareaType::class, array(
                                        'label' => 'Résumé'
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
            'data_class' => Article::class,
        ));
    }

    public function getName()
    {
        return 'article';
    }
}
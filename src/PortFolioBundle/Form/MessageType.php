<?php
namespace PortFolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PortFolioBundle\Entity\Message;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('email', TextType::class, array(
                                        'label' => 'E-mail'
                    ))
                 ->add('title', TextType::class, array(
                                        'label' => 'Objet'
                    ))
        		 ->add('content', TextareaType::class, array(
                                        'label' => 'Contenu du message'
                    ))
                 ->add('send', SubmitType::class, array(
                                        'label' => 'Envoyer'
                    ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Message::class,
        ));
    }

    public function getName()
    {
        return 'message';
    }
}
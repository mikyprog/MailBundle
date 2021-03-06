<?php

namespace Miky\Bundle\MailBundle\Form\Back;

use Miky\Bundle\LBCBundle\Entity\LBCLocation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailTypeAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("location", EntityType::class, array(
                "class" => LBCLocation::class,
                'choice_label' => 'postalCode',
                'required' => true,
                'label' => "miky.ui.location"
            ))
        ->add("email", TextType::class, array('label'=> 'miky.ui.email'))
        ->add("password", TextType::class, array('label'=> 'miky.ui.password'))
        ->add("emailPassword", TextType::class, array('label'=> 'miky.ui.emailPassword'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Miky\Bundle\MailBundle\Entity\MailType'
        ));
    }

    public function getName()
    {
        return 'miky_admin_mail_type';
    }
}

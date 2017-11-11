<?php

namespace PortFolioBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
/**
 * @Annotation
 */
class Email extends Constraint
{
    public $message = 'Tu dois écrire une adresse valide si tu veux être recontacté ;-)';
}
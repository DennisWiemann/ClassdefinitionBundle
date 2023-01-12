<?php

namespace DennisWiemann\ClassdefinitionBundle;

use DennisWiemann\ClassdefinitionBundle\DependencyInjection\ClassdefinitionExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ClassdefinitionBundle extends AbstractBundle
{

    public function getContainerExtension(): ClassdefinitionExtension
    {
        return new ClassdefinitionExtension();
    }
}
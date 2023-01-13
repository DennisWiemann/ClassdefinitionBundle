<?php

namespace Classdefinition;

use Classdefinition\DependencyInjection\ClassdefinitionExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ClassdefinitionBundle extends AbstractBundle
{

    public function getContainerExtension(): ClassdefinitionExtension
    {
        return new ClassdefinitionExtension();
    }
}
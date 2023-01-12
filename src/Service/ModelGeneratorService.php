<?php

namespace DennisWiemann\ClassdefinitionBundle\Service;



use Twig\Environment;

class ModelGeneratorService
{
public function __construct(protected Environment $twig)
{
}


    public function generate(array $classdefinition){
        var_dump($classdefinition);
var_dump($this->writePHPFile($classdefinition));
    }

    protected function writePHPFile(array $classdefinition): string{
    return $this->twig->render("model.php.twig",["namespace" => "abc"]);


return "";
    }
}
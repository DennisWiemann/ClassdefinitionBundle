<?php

namespace DennisWiemann\ClassdefinitionBundle\Command;

use DennisWiemann\ClassdefinitionBundle\Service\ModelGeneratorService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Twig\Environment;

#[AsCommand(name: 'classdefinition:create')]
class ModelGeneratorCommand extends Command
{

    public function __construct(
        protected ModelGeneratorService $modelGeneratorService,
        protected Environment $twig
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("hello");

        $test = [
            "namespace" => "App\Entity",
            "use" => [
                "Doctrine\ORM\Mapping as ORM",
                "Doctrine\DBAL\Types\Types"
            ],
            "properties" => [
                [
                    "type" => "Table",
                    "settings" => [
                        "name" => "`user`"
                    ]
                ]
            ],
            "className" => "Product",
            "fields" => [
                [
                    "name" => "id",
                    "type" => "int",
                    "properties" => [
                        [
                            "type" => "Column",
                        ],
                        [
                            "type" => "GeneratedValue"
                        ],
                        [
                            "type" => "Id"
                        ]
                    ]
                ],
                [
                    "name" => "productname",
                    "type" => "string",
                    "properties" => [
                        [
                            "type" => "Column",
                            "settings" => [
                                "length" => 255,
                                "nullable" => true
                            ]
                        ],
                    ]
                ],
                [
                    "name" => "creationDate",
                    "type" => "datetime",
                    "properties" => [
                        [
                            "type" => "Column",
                            "settings" => [
                                "nullable" => true,
                                "type" => "Types::DATETIME_MUTABLE"
                            ]
                        ],
                    ]
                ]
            ]

        ];
        $this->twig->render("model.php.twig",[
            "namespace" => "abc"
        ]);
        $this->modelGeneratorService->generate($test);
        return Command::SUCCESS;
    }

}
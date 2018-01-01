<?php

namespace AppBundle\Renderer;

use AppBundle\EntityManager\EntityManagerInterface;

class CsvRenderer
{
    private $templatingService;

    public function __construct(
        $templatingService
    ) {
        $this->templatingService = $templatingService;
    }

    public function render(EntityManagerInterface $entityManager)
    {
        $templatingService->render(
            "csv/".$entityManager->getEntityType().".html.twig",
            array(
                "entity" => $entityManager->getEntity()
            )
        );
    }
}

<?php

namespace AppBundle\Renderer;

use AppBundle\EntityManager\EntityManagerInterface;

class CsvRenderer
{
    private $templatingService;

    public function __construct(
        \Twig\Environment $templatingService
    ) {
        $this->templatingService = $templatingService;
    }

    public function render(EntityManagerInterface $entityManager)
    {
        return $this->templatingService->render(
            "csv/".$entityManager->getEntityType().".csv.twig",
            array(
                "entity" => $entityManager->getEntity()
            )
        );
    }
}

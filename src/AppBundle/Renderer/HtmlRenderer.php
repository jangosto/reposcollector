<?php

namespace AppBundle\Renderer;

use AppBundle\EntityManager\EntityManagerInterface;

class HtmlRenderer
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
            "html/".$entityManager->getEntityType().".html.twig",
            array(
                "entity" => $entityManager->getEntity()
            )
        );
    }
}

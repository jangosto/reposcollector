<?php

namespace AppBundle\Renderer;

use AppBundle\EntityManager\EntityManagerInterface;

class HtmlRenderer
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
            "html/".$entityManager->getEntityType().".html.twig",
            array(
                "entity" => $entityManager->getEntity()
            )
        );
    }
}

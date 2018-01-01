<?php

namespace AppBundle\Renderer;

use AppBundle\EntityManager\EntityManagerInterface;

interface HtmlRendererInterface
{
    public function render(EntityManagerInterface $entityManager);
}

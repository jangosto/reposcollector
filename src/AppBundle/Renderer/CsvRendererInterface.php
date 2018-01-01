<?php

namespace AppBundle\Renderer;

use AppBundle\EntityManager\EntityManagerInterface;

interface CsvRendererInterface
{
    public function render(EntityManagerInterface $entityManager);
}

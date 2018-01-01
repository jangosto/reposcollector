<?php

namespace AppBundle\Twig;

use AppBundle\Renderer\HtmlRenderer;
use AppBundle\Renderer\CsvRenderer;

class AppExtension extends \Twig_Extension
{
    private $htmlRenderService;
    private $csvRenderService;

    public function __construct(
        HtmlRenderer $htmlRenderService,
        CsvRenderer $csvRenderService
    ) {
        $this->htmlRenderService = $htmlRenderService;
        $this->csvRenderService = $csvRenderService;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('renderEntity', array($this, 'renderEntityFunction'))
        );
    }

    public function renderEntityFunction($entityManager, $format)
    {
        switch ($format) {
            case "html":
                return $this->htmlRenderService->render($entityManager);
                break;

            case "csv";
                return $this->csvRenderService->render($entityManager);
                break;

            default:
                return "Format ".$format." is not available...";
                break;
        }
    }
}

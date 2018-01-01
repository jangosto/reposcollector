<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\EntityManager\RepositoryManager;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/repos/{organizationName}.html", name="organizationrepospage")
     */
    public function orgReposAction(Request $request, $organizationName)
    {
        $repositoryManagers = array();
        $fetchService = $this->get('app_bundle.api_fetcher');
        $renderService = $this->get('app_bundle.html_renderer');

        $apiData = $fetchService->getReposDataByOrganizationName($organizationName);
        foreach (json_decode($apiData) as $repoData) {
            $repositoryManagers[] = new RepositoryManager($repoData);
        }

        return $this->render(
            'html/list.html.twig',
            array(
                "managers" => $repositoryManagers,
                "organization" => $organizationName
            )
        );
    }
}

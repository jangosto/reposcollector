<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\EntityManager\RepositoryManager;

class DefaultController extends Controller
{
    /**
     * @Route("/repos/{organizationName}.html", name="organizationrepospage")
     */
    public function orgReposAction(Request $request, $organizationName)
    {
        $repositoryManagers = array();
        $fetchService = $this->get('app_bundle.api_fetcher');
        $renderService = $this->get('app_bundle.html_renderer');

        if (($apiData = $fetchService->getReposDataByOrganizationName($organizationName)) != false) {
            foreach (json_decode($apiData, true) as $repoData) {
                $repositoryManagers[] = new RepositoryManager($repoData);
            }

            return $this->render(
                'html/list.html.twig',
                array(
                    "managers" => $repositoryManagers,
                    "organization" => $organizationName
                )
            );
        } else {
            return $this->render(
                'html/exceded_requests.html.twig',
                array(
                    "organization" => $organizationName
                )
            );
        }
    }

    /**
     * @Route("/repos/{organizationName}.csv", name="organizationreposcsv")
     */
    public function orgReposCsvAction(Request $request, $organizationName)
    {
        $repositoryManagers = array();
        $fetchService = $this->get('app_bundle.api_fetcher');
        $renderService = $this->get('app_bundle.csv_renderer');

        $apiData = $fetchService->getReposDataByOrganizationName($organizationName);
        foreach (json_decode($apiData, true) as $repoData) {
            $repositoryManagers[] = new RepositoryManager($repoData);
        }

        $response = new Response();

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$organizationName.'_repos.csv"');
        $response->sendHeaders();
        $response->setContent(
            $this->renderView(
                'csv/list.csv.twig',
                array(
                    "managers" => $repositoryManagers,
                    "organization" => $organizationName
                )
            )
        );

        return $response;
    }
}

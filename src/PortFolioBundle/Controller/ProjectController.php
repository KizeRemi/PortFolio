<?php 
namespace PortFolioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    /**
     * @Route("/projets", name="portfolio_project")
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$projects = $em->getRepository('PortFolioBundle:Project')->findAll();
        return $this->render('project/index.html.twig', ['projects' => $projects]);
    }
}
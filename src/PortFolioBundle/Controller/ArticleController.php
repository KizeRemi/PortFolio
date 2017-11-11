<?php 
namespace PortFolioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    /**
     * @Route("/articles", name="portfolio_article")
     */
    public function indexAction()
    {
       	$em = $this->getDoctrine()->getEntityManager();
    	$articles = $em->getRepository('PortFolioBundle:Article')->findAll();
        return $this->render('article/index.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/articles/{slug}", name="portfolio_article_show")
     */
    public function showAction(Request $request, $slug)
    {
       	$em = $this->getDoctrine()->getEntityManager();
        $article = $em->getRepository('PortFolioBundle:Article')->findOneBySlug($slug);
        if (!$article) {
            throw new NotFoundHttpException();
        }
        return $this->render('article/show.html.twig', ['article' => $article]);
    }
}
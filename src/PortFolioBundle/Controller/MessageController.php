<?php 
namespace PortFolioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use PortFolioBundle\Entity\Message;
use PortFolioBundle\Form\MessageType;

class MessageController extends Controller
{
    /**
     * @Route("/envoyer-message", name="portfolio_message")
     */
    public function indexAction(Request $request)
    {
    	$session = new Session();
    	$message = new Message();
    	$form = $this->createForm(MessageType::class, $message);
    	$form->handleRequest($request);
   		if($form->isSubmitted() && $form->isValid()){
   			$em = $this->getDoctrine()->getEntityManager();
   			$hasSend = $em->getRepository('PortFolioBundle:Message')->hasSend($message->getEmail());
   			if(!$hasSend){
	    		$em->persist($message);
	    		$em->flush();
				$session->getFlashBag()->add('success', 'Merci pour votre message, je vous envoie une réponse dés que possible. :)');  
				  unset($message);
			    unset($form);
			    $message = new Message();
    			$form = $this->createForm(MessageType::class, $message);
   			} else {
				$session->getFlashBag()->add('warning', 'Je n\'ai pas encore lu votre précédent message, un peu de patience. ;)');
   			}
   		}
        return $this->render('message/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
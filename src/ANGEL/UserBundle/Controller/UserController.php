<?php

namespace ANGEL\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {    	
    	$objDoc = $this->getDoctrine()->getManager();
    	$users = $objDoc->getRepository('ANGELUserBundle:User')->findAll();
    	$res = 'Lista de usuarios:<br/>';
    	foreach ($users as $user) {
    		$res .= 'Usuario: '.$user->getUsername(). ' Nombre: '.$user->getFirstname().'<br/>';
    	}
    	
        return new Response($res);
    }
    public function viewAction($id)
    {
    	$reposi = $this->getDoctrine()->getRepository('ANGELUserBundle:User');
    	$user = $reposi->find($id);
    	return new Response("El ID " . $id . " Corresponde a: " . $user->getFirstname());
    }
}
//003972b981b63944f241e3f94d7ee190eca49028
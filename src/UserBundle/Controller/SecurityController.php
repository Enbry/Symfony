<?php
// src/OC/UserBundle/Controller/SecurityController.php;

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
  public function loginAction(Request $request)
      {
          return $this->render('UserBundle:Security:login.html.twig');
      }

      public function loginCheckAction(Request $request)
      {

      }
}

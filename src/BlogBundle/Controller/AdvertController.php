<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use BlogBundle\Entity\Advert;
use BlogBundle\Entity\Image;
use BlogBundle\Form\AdvertType;
use BlogBundle\Form\AdvertEditType;
use BlogBundle\Entity\Category;
use BlogBundle\Form\CategoryType;
use BlogBundle\Form\CategoryEditType;
use BlogBundle\Entity\Tag;



class AdvertController extends Controller
{
  public function indexAction($page)
  {
    if ($page < 1) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }

    $nbPerPage = 3;

    $listAdverts = $this->getDoctrine()
      ->getManager()
      ->getRepository('BlogBundle:Advert')
      ->getAdverts($page, $nbPerPage)
    ;

    $nbPages = ceil(count($listAdverts)/$nbPerPage);

    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:index.html.twig', array(
      'listAdverts' => $listAdverts,
      'nbPages'     => $nbPages,
      'page'        => $page
    ));
  }

  public function listAction($page)
  {
    if ($page < 1) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    $nbPerPage = 10;


    $listAdverts = $this->getDoctrine()
      ->getManager()
      ->getRepository('BlogBundle:Advert')
      ->getAdverts($page, $nbPerPage)
    ;


    $nbPages = ceil(count($listAdverts)/$nbPerPage);


    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:articles.html.twig', array(
      'listAdverts' => $listAdverts,
      'nbPages'     => $nbPages,
      'page'        => $page
    ));
  }

  public function viewAction($id)
  {

    $em = $this->getDoctrine()->getManager();


    $advert = $em->getRepository('BlogBundle:Advert')->find($id);


    if ($advert === null) {
      throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:view.html.twig', array(
      'advert'           => $advert
    ));
  }

  public function viewCategoryAction($id)
  {

    $em = $this->getDoctrine()->getManager();


    $category = $em->getRepository('BlogBundle:Category')->find($id);


    if ($category === null) {
      throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:category.html.twig', array(
      'category'           => $category
    ));
  }

  public function listCategoryAction($page)
  {
    if ($page < 1) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    $nbPerPage = 10;


    $listCategories = $this->getDoctrine()
      ->getManager()
      ->getRepository('BlogBundle:Category')
      ->getCategories($page, $nbPerPage)
    ;


    $nbPages = ceil(count($listCategories)/$nbPerPage);


    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:categories.html.twig', array(
      'listCategories' => $listCategories,
      'nbPages'     => $nbPages,
      'page'        => $page
    ));
  }

  public function listTagAction($page)
  {
    if ($page < 1) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    $nbPerPage = 10;


    $listTags = $this->getDoctrine()
      ->getManager()
      ->getRepository('BlogBundle:Tag')
      ->getTags($page, $nbPerPage)
    ;


    $nbPages = ceil(count($listTags)/$nbPerPage);


    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:tags.html.twig', array(
      'listTags' => $listTags,
      'nbPages'     => $nbPages,
      'page'        => $page
    ));
  }

  public function CategoryAction($id)
  {

    $em = $this->getDoctrine()->getManager();


    $category = $em->getRepository('BlogBundle:Category')->find($id);


    if ($category === null) {
      throw $this->createNotFoundException("La catégorie d'id ".$id." n'existe pas.");
    }


    return $this->render('BlogBundle:Advert:category.html.twig', array(
      'category'           => $category
    ));
  }



  public function addAction(Request $request)
  {

    $advert = new Advert();
    $form = $this->createForm(new AdvertType(), $advert);

    if ($form->handleRequest($request)->isValid()) {
      $advert->getImage()->upload();
      $em = $this->getDoctrine()->getManager();
      $em->persist($advert);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      return $this->redirect($this->generateUrl('blog_view', array('id' => $advert->getId())));
    }


    return $this->render('BlogBundle:Advert:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }

  public function addCategoryAction(Request $request)
  {

    $category = new Category();
    $form = $this->createForm(new CategoryType(), $category);

    if ($form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($category);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Catégorie bien enregistrée.');

      return $this->redirect($this->generateUrl('blog_categories', array('id' => $categories->getId())));
    }


    return $this->render('BlogBundle:Advert:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }

  public function editAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();


    $advert = $em->getRepository('BlogBundle:Advert')->find($id);

    if (null === $advert) {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }

   $form = $this->createForm(new AdvertEditType(), $advert);

<<<<<<< HEAD

=======
>>>>>>> origin/master
    if ($form->handleRequest($request)->isValid()) {

      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

      return $this->redirect($this->generateUrl('blog_view', array('id' => $advert->getId())));
    }

    return $this->render('BlogBundle:Advert:edit.html.twig', array(
      'form'   => $form->createView(),
      'advert' => $advert
    ));
  }

  public function editCategoryAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();


    $category = $em->getRepository('BlogBundle:Category')->find($id);

    if (null === $category) {
      throw new NotFoundHttpException("La catégorie d'id ".$id." n'existe pas.");
    }

   $form = $this->createForm(new CategoryEditType(), $category);


    if ($form->handleRequest($request)->isValid()) {

      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Catégorie bien modifiée.');

      return $this->redirect($this->generateUrl('blog_categories', array('id' => $category->getId())));
    }

    return $this->render('BlogBundle:Advert:edit_category.html.twig', array(
      'form'   => $form->createView(),
      'category' => $category
    ));
  }

  public function deleteAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();


    $advert = $em->getRepository('BlogBundle:Advert')->find($id);

    if (null === $advert) {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }


    $form = $this->createFormBuilder()->getForm();

    if ($form->handleRequest($request)->isValid()) {
      $em->remove($advert);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");

      return $this->redirect($this->generateUrl('blog_home'));
    }


    return $this->render('BlogBundle:Advert:delete.html.twig', array(
      'advert' => $advert,
      'form'   => $form->createView()
    ));
  }

  public function deleteTagAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();


    $tag = $em->getRepository('BlogBundle:Tag')->find($id);

    if (null === $tag) {
      throw new NotFoundHttpException("Le tag d'id ".$id." n'existe pas.");
    }


      $em->remove($tag);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");

      return $this->redirect($this->generateUrl('blog_tags'));



    return $this->render('BlogBundle:Advert:deletetag.html.twig', array(
      'tag' => $tag,
      'form'   => $form->createView()
    ));
  }

  public function deleteCategoryAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();


    $category = $em->getRepository('BlogBundle:Category')->find($id);

    if (null === $category) {
      throw new NotFoundHttpException("La catégorie d'id ".$id." n'existe pas.");
    }


      $em->remove($category);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");

      return $this->redirect($this->generateUrl('blog_categories'));



    return $this->render('BlogBundle:Advert:deletecategory.html.twig', array(
      'category' => $category,
      'form'   => $form->createView()
    ));
  }

  public function menuAction($limit = 3)
  {
    $listAdverts = $this->getDoctrine()
      ->getManager()
      ->getRepository('BlogBundle:Advert')
      ->findBy(
        array(),
        array('date' => 'desc'),
        $limit,
        0
    );

    return $this->render('BlogBundle:Advert:menu.html.twig', array(
      'listAdverts' => $listAdverts
    ));
  }
}

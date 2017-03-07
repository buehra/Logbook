<?php

namespace AppBundle\Controller;

use AppBundle\Entity\driver;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('this should not be reached!');
    }

    /**
     * @Route("/user/{id}", name="user_edit")
     * @param driver $driver
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function userEdit(driver $driver, Request $request)
    {

        $form = $this->createForm('AppBundle\Form\UserType', $driver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //EntityManager definieren
            $em = $this->getDoctrine()->getManager();

            $displayName = $driver->getFirstname() . ' ' . $driver->getName();
            $driver->setDisplayName($displayName);

            $plainPassword = $form["password"]->getData();

            if (!empty($plainPassword)){
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($driver, $plainPassword);

                $driver->setPassword($encoded);
            }

            //Abo speichern
            $em->persist($driver);
            //Save
            $em->flush();


            return $this->redirectToRoute('homepage');
        }
        return $this->render('user/userEdit.html.twig', array(
            'user' => $driver,
            'edit_form' => $form->createView()
        ));
    }
}

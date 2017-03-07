<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:57
 */
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \AppBundle\Entity\refuel;

class RefuelController extends Controller
{
    /**
     * @Route("/refuel", name="refuel_show")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuelShow(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:refuel');
        $refuels = $repository->findAll();
        // replace this example code with whatever you need
        return $this->render('refuel/refuelShow.html.twig', array(
            'refuels' => $refuels
        ));
    }

    /**
     * @Route("/refuel/create", name="refuel_create")
     * @Route("/refuel/edit/{id}", name="refuel_edit")
     * @param Request $request
     * @param refuel $refuel
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param refuel $refuel
     */
    public function refuelCreate(Request $request, refuel $refuel = null)
    {
        if ($refuel == null){
            $refuel = new refuel();
        }

        $form = $this->createForm('AppBundle\Form\RefuelType', $refuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //EntityManager definieren
            $em = $this->getDoctrine()->getManager();

            // Logged User
            $refuel->setDriver($this->getUser());

            //Refuel speichern
            $em->persist($refuel);
            //Save
            $em->flush();

            return $this->redirectToRoute('refuel_show');
        }

        return $this->render('refuel/refuelCreate.html.twig', array(
            'refuel' => $refuel,
            'edit_form' => $form->createView()
        ));
    }

    /**
     * @Route("/refuel/delete/{id}", name="refuel_delete")
     * @param refuel $refuel
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuelDelete(refuel $refuel)
    {
        //EntityManager definieren
        $em = $this->getDoctrine()->getManager();
        $em->remove($refuel);
        $em->flush();

        return $this->redirectToRoute('refuel_show');
    }

}

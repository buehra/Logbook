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
use \AppBundle\Entity\driving_plan;

class PlanController extends Controller
{
    /**
     * @Route("/plan", name="plan_show")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planShow(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:driving_plan');
        $plan = $repository->findAll();
        // replace this example code with whatever you need
        return $this->render('driving_plan/planShow.html.twig', array(
            'plans' => $plan
        ));
    }

    /**
     * @Route("/plan/create", name="plan_create")
     * @Route("/plan/edit/{id}", name="plan_edit")
     * @param Request $request
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planCreate(Request $request, driving_plan $plan = null)
    {
        if ($plan == null){
            $plan = new driving_plan();
        }

        $form = $this->createForm('AppBundle\Form\PlanType', $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //EntityManager definieren
            $em = $this->getDoctrine()->getManager();

            // Logged User
            $plan->setDriver($this->getUser());

            //Refuel speichern
            $em->persist($plan);
            //Save
            $em->flush();

            return $this->redirectToRoute('plan_show');
        }
        // replace this example code with whatever you need
        return $this->render('driving_plan/planCreate.html.twig', array(
            'plan' => $plan,
            'edit_form' => $form->createView()
        ));
    }

    /**
     * @Route("/plan/delete/{id}", name="plan_delete")
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planDelete(driving_plan $plan)
    {
        //EntityManager definieren
        $em = $this->getDoctrine()->getManager();
        $em->remove($plan);
        $em->flush();

        return $this->redirectToRoute('plan_show');
    }

    /**
     * @Route("/plan/detail/{id}", name="plan_detail")
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planDetail(driving_plan $plan)
    {
        // replace this example code with whatever you need
        return $this->render('driving_plan/planDetail.html.twig', array(
            'plan' => $plan
        ));
    }
}

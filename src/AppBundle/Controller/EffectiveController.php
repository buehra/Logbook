<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:57
 */
namespace AppBundle\Controller;

use AppBundle\Entity\costs;
use AppBundle\Entity\driver;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \AppBundle\Entity\driving_effective;

class EffectiveController extends Controller
{
    /**
     * @Route("/effective", name="effective_show")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveShow(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:driving_effective');
        $effectives = $repository->findAll();

        return $this->render('driving_effective/effectiveShow.html.twig', array(
            'effectives' => $effectives
        ));
    }

    /**
     * @Route("/effective/create", name="effective_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param driving_effective $effective
     */
    public function effectiveCreate(Request $request)
    {
        $effective = new driving_effective();

        $form = $this->createForm('AppBundle\Form\EffectiveType', $effective);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //EntityManager definieren
            $em = $this->getDoctrine()->getManager();

            // Logged User
            $effective->setDriver($this->getUser());

            //Refuel speichern
            $em->persist($effective);
            //Save
            $em->flush();

            return $this->redirectToRoute('effective_show');
        }
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveCreate.html.twig', array(
            'effective' => $effective,
            'edit_form' => $form->createView()
        ));
    }

    /**
     * @Route("/effective/delete/{id}", name="effective_delete")
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveDelete(driving_effective $effective)
    {
        //EntityManager definieren
        $em = $this->getDoctrine()->getManager();
        $em->remove($effective);
        $em->flush();

        return $this->redirectToRoute('effective_show');
    }

    /**
     * @Route("/effective/edit/{id}", name="effective_edit")
     * @param Request $request
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveEdit(Request $request, driving_effective $effective)
    {
        $form = $this->createForm('AppBundle\Form\EffectiveCloseType', $effective);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //EntityManager definieren
            $em = $this->getDoctrine()->getManager();

            // Logged User
            $effective->setDriver($this->getUser());

            $boat = $effective->getBoat();

            $hour = floatval($effective->getDrivingHour()) - floatval($boat->getDrivehour());
            $boat->setDrivehour($effective->getDrivingHour());
            $effective->setDrivingHour(round($hour, 2));

            $driver = $effective->getDriver();
            $costs = $driver->getCosts();

            //Hat noch keine Kosten
            if (empty($costs)){
                $costs = new costs();
                $costs->setDriver($driver);
                $costs->setYear(date("Y"));
                $hours = (float)$costs->getHours() + (float)$effective->getDrivingHour();
                $costs->setHours($hours);
                $em->persist($costs);
            }else{
                //Hat Kosten
                foreach ($costs as $cost){

                if ($cost->getYear() != (int)date("Y")){
                    $newcost = new costs();
                    $newcost->setDriver($driver);
                    $newcost->setYear(date("Y"));
                    $hours = (float)$newcost->getHours() + (float)$effective->getDrivingHour();
                    $newcost->setHours($hours);
                    $em->persist($newcost);
                }else{
                    $hours = (float)$cost->getHours() + (float)$effective->getDrivingHour();
                    $cost->setHours($hours);
                    $em->persist($cost);
                }
                }
            }

            var_dump($costs);

            $em->persist($effective);
            $em->persist($boat);

            //Save
            $em->flush();

            return $this->redirectToRoute('effective_show');
        }
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveEdit.html.twig', array(
            'effective' => $effective,
            'edit_form' => $form->createView()
        ));

    }

    /**
     * @Route("/effective/detail/{id}", name="effective_detail")
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveDetail(driving_effective $effective)
    {
        dump($effective->getDriver()->getCosts());
        return $this->render('driving_effective/effectiveDetail.html.twig',array(
            'effective' => $effective
        ));
    }
}

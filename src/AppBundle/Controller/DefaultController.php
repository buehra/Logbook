<?php

namespace AppBundle\Controller;

use AppBundle\Entity\driver;
use AppBundle\Entity\driving_effective;
use DateTime;
use Doctrine\DBAL\Query\QueryBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Wer ist momentan auf See?
        $effective = $em->getRepository('AppBundle:driving_effective')->findOneBy(array('effective_date_to' => null));
        if (empty($effective)){
            $aufsee = 'Keiner';
        }else{
            $aufsee = $effective->getDriver()->getFirstname();
        }

        //Letzter Unfall
        $damage = $em->getRepository('AppBundle:damage')->findBy(array(), array('damage_date'=>'desc'));
        if (!empty($damage)){
            $lastDamage = $damage[0]->getDamageDate();
        }else{
            $lastDamage = null;
        }


        //Letzte Tankung
        $refuel = $em->getRepository('AppBundle:refuel')->findBy(array(), array('refuel_date'=>'desc'));
        if (!empty($refuel)){
            $lastRefuel = $refuel[0]->getRefuelDate();
        }else{
            $lastRefuel = null;
        }

        //Geplant für heute
        $todayPlans = $this->getDoctrine()
            ->getManager()
            ->createQuery('SELECT e FROM AppBundle:driving_plan e WHERE e.plane_date_from > CURRENT_DATE()')
            ->getResult();

        $plansCount = Count($todayPlans);

        $drivers = $em->getRepository('AppBundle:driver')->findall();
        $statHour = Array();

        foreach ($drivers as $driver){
            if (!empty($driver->getCosts())){
                $costs = $driver->getCosts();
                foreach ($costs as $cost){
                    if ($cost->getYear() == date('Y')){
                        $statHour[$driver->getId()] = ['name' => $driver->getDisplayName(), 'hours' => $cost->getHours()];
                    }
                }
            }
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'aufsee' => $aufsee,
            'lastDamage' => $lastDamage,
            'lastRefuel' => $lastRefuel,
            'todayPlans' => $plansCount,
            'chartValue' => $statHour,

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

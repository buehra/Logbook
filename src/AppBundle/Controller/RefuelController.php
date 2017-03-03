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
        // replace this example code with whatever you need
        return $this->render('refuel/refuelShow.html.twig');
    }

    /**
     * @Route("/refuel/create", name="refuel_create")
     * @param refuel $refuel
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuelCreate(refuel $refuel)
    {
        // replace this example code with whatever you need
        return $this->render('refuel/refuelCreate.html.twig');
    }

    /**
     * @Route("/refuel/delete/{id}", name="refuel_delete")
     * @param refuel $refuel
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuelDelete(refuel $refuel)
    {
        // replace this example code with whatever you need
        return $this->render('refuel/refuelShow.html.twig');
    }

    /**
     * @Route("/refuel/edit/{id}", name="refuel_edit")
     * @param refuel $refuel
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuelEdit(refuel $refuel)
    {
        // replace this example code with whatever you need
        return $this->render('refuel/refuelEdit.html.twig');
    }

    /**
     * @Route("/refuel/detail/{id}", name="refuel_detail")
     * @param refuel $refuel
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuelDetail(refuel $refuel)
    {
        // replace this example code with whatever you need
        return $this->render('refuel/refuelDetail.html.twig');
    }
}

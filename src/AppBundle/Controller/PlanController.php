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
        // replace this example code with whatever you need
        return $this->render('driving_plan/planShow.html.twig');
    }

    /**
     * @Route("/plan/create", name="plan_create")
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planCreate(driving_plan $plan)
    {
        // replace this example code with whatever you need
        return $this->render('driving_plan/planCreate.html.twig');
    }

    /**
     * @Route("/plan/delete/{id}", name="plan_delete")
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planDelete(driving_plan $plan)
    {
        // replace this example code with whatever you need
        return $this->render('driving_plan/planShow.html.twig');
    }

    /**
     * @Route("/plan/edit/{id}", name="plan_edit")
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planEdit(driving_plan $plan)
    {
        // replace this example code with whatever you need
        return $this->render('driving_plan/planEdit.html.twig');
    }

    /**
     * @Route("/plan/detail/{id}", name="plan_detail")
     * @param driving_plan $plan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planDetail(driving_plan $plan)
    {
        // replace this example code with whatever you need
        return $this->render('driving_plan/planDetail.html.twig');
    }
}

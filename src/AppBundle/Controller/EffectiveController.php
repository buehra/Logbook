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
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveShow.html.twig');
    }

    /**
     * @Route("/effective/create", name="effective_create")
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveCreate(driving_effective $effective)
    {
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveCreate.html.twig');
    }

    /**
     * @Route("/effective/delete/{id}", name="effective_delete")
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveDelete(driving_effective $effective)
    {
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveShow.html.twig');
    }

    /**
     * @Route("/effective/edit/{id}", name="effective_edit")
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveEdit(driving_effective $effective)
    {
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveEdit.html.twig');
    }

    /**
     * @Route("/effective/detail/{id}", name="effective_detail")
     * @param driving_effective $effective
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function effectiveDetail(driving_effective $effective)
    {
        // replace this example code with whatever you need
        return $this->render('driving_effective/effectiveDetail.html.twig');
    }
}

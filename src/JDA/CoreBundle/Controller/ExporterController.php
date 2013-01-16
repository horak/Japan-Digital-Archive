<?php

namespace JDA\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExporterController extends Controller
{

    public function indexAction()
    {

        // $loggedUser = $this->get('security.context')->getToken()->getUser();
        $fileLoc = realpath("lastExport.txt");
        if(!file_exists($fileLoc)) {
            file_put_contents($fileLoc, date('m/d/Y h:i:s a', strtotime('12/11/2012 1:51:00 pm')));
        }
		$lastExport = file_get_contents($fileLoc);
        return $this->render('JDACoreBundle:SeedExport:export.html.twig', array(
                    'page'=> 'export',
                    'lastExport' => $lastExport,
                ));
    }
    
	public function updateAction()
    {

        // $loggedUser = $this->get('security.context')->getToken()->getUser();
        $fileLoc = realpath("lastExport.txt");
        if(file_exists($fileLoc)) {
            file_put_contents($fileLoc, date('m/d/Y h:i:s a', time()));
        }
        
		return $this->render('JDACoreBundle:SeedExport:ok.html.twig', array(
                    'page'=> 'export',
                ));
    }
}


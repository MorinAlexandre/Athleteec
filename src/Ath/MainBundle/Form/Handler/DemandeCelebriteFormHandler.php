<?php

namespace Ath\MainBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface as Translator;

class DemandeCelebriteFormHandler
{
    protected $request;
    protected $em;
    protected $session;
    protected $translator;

    public function __construct(Request $request, ObjectManager $em, Session $session, Translator $translator)
    {
        $this->request = $request;
        $this->em      = $em;
        $this->session = $session;
        $this->translator = $translator;
    }

    public function process(Form $form)
    {
        if ('POST' === $this->request->getMethod()) {
            $form->bind($this->request);

            if ($form->isValid()) {
                $demandeCelebrite = $form->getData();
                $demandeCelebrite->setDateDemande(new \DateTime());

                $this->em->persist($demandeCelebrite);
                $this->em->flush();

                $this->session->getFlashBag()->add('notice', $this->translator->trans("flash.demande_celebrite.success", array(), 'home'));

                return true;
            }

            $this->session->getFlashBag()->add('error', $this->translator->trans("flash.edit.error", array(), 'home'));
        }
        
        
        return false;
    }
}

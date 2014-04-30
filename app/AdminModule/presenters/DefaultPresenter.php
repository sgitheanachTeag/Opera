<?php

namespace AdminModule;

use Nette\Security\User;

final class DefaultPresenter extends BasePresenter
{
    public function startup()
    {
        parent::startup();

        $user = $this->getUser();

        if (!$user->isLoggedIn()) {
            if ($user->getLogoutReason() === User::INACTIVITY) {
                $this->flashMessage('Uplynula doba neaktivity! Systém vás z bezpečnostných dôvodov
odhlásil.', 'warning');
            }

            $backlink = $this->storeRequest();
            $this->redirect('Auth:login', array('backlink' => $backlink));

        } else {
            if ( !$user->isLoggedIn) {
#!$user->isAllowed($this->name, $this->action)) {
                $this->flashMessage('Na vstup do tejto sekcie nemáte dostatočné oprávnenia!', 'warning');
                $this->redirect('Auth:login');
            }
        }
    }

    public function actionLogout()
    {
        $this->getUser()->logOut();
#       $this->flashMessage('Práve ses odhlásil.');
        $this->redirect('Auth:login');
    }

    protected function createComponentPokus ( )
    {
#       return new \MenuControl;
        $news = $this->models->news->findAll();
        return new \NewsControl($news);
    }



    protected function createComponentNewsControl ( )
    {
        return new \News();
    }

}


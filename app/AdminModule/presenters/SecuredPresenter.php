<?php

namespace AdminModule;

use Nette\Security\User;

abstract class SecuredPresenter extends BasePresenter
{
    public function startup()
    {
        parent::startup();

        $user = $this->getUser();

        if (!$user->isLoggedIn()) {
            if ($user->getLogoutReason() === User::INACTIVITY) {
                $this->flashMessage('Tato stránka nebyla delší dobu aktivní. přihlaste se prosím znovu.', 'warning');
            }

            $backlink = $this->storeRequest();
            $this->redirect('Auth:login', array('backlink' => $backlink));

        } 
   }
}

<?php

namespace AdminModule;

use Nette\Http\User,
    Nette\Application\UI\Form;

final class mainBannerPresenter extends SecuredPresenter
{

    public function actionDefault () {
#           $this->template->news = $this->models->news->findAll();
    }
}


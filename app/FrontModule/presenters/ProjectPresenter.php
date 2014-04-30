<?php

namespace FrontModule;

class ProjectPresenter extends \BasePresenter {

    function actionView ($id) {
       $this->template->proj = 'projects/' . $id . '.latte';
    }



}

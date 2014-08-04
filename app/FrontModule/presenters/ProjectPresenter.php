<?php

namespace FrontModule;

class ProjectPresenter extends \BasePresenter {

    function actionView ($slug) {
        $project = $this->projectModel->fetch(array('slug' =>   $slug))->fetch();
        if($project && $project->id) {
            $this->template->project = $project;
            $this->template->now = new \DateTime();
        } else {
            $this->redirect('Default:Error');
        }
#       $this->template->proj = 'projects/' . $id . '.latte';
    }



}

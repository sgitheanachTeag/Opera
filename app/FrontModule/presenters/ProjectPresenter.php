<?php

namespace FrontModule;

class ProjectPresenter extends \BasePresenter {

    function actionView ($slug) {
        $project = $this->projectModel->table()->where('slug = ? AND is_public = ? ' , $slug, 1 )->fetch();
        if($project && $project->id) {
            $this->template->project = $project;
            $this->template->now = new \DateTime();
        } else {
            $this->redirect('Default:Error');
        }
#       $this->template->proj = 'projects/' . $id . '.latte';
    }



}

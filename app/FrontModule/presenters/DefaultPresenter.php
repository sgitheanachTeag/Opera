<?php

namespace FrontModule;

class DefaultPresenter extends \BasePresenter {


    function renderHome () {
        $banners =  $this->fileModel->fetch(array('file_class' => 1, 'is_public' => 1)); 
        $first = $banners->get(0);
        if ($first) {
            $this->template->bannerName = $first['filepath'] . $filepath['name'];
        }
        else {
            $this->template->bannerPath = "static/img/content/banner.jpg";
        }
    }

    function renderNews () {
        $this->template->news = $this->newsModel->fetch(array('is_public' => 1));
    }

    function renderPromo () {
        $this->template->files = $this->fileModel->fetch(array('is_public' => 1, 'file_class' => 1 ));
    }


}

<?php
abstract class BasePresenter extends Nette\Application\UI\Presenter {

    /** @var NewsModel */
    protected $newsModel;

    /** @var FileModel */
    protected $fileModel;

    /** @var ProjectModel */
    protected $projectModel;

    
    public function inject(\FileModel $fileModel, \FilestackDirs $fileStack, \NewsModel $newsModel, \ProjectModel  $projectModel ) {
        $this->fileModel = $fileModel;
        $this->newsModel = $newsModel;
        $this->projectModel = $projectModel;
//      $this->fileStack = $fileStack;
    } 

	protected function beforeRender() {
        $projectListFuture = $this->projectModel->fetch("dt_from > now()");	
        $projectListPast = $this->projectModel->fetch("dt_from < now()");	
        $this->template->projectListPast =  $projectListPast;

//      $this->template->projectListCurrent = array(
//          array(
//              'desc' => 'Současný monstrprojekt',
//              'link' => 'x-y-z'
//          ),
//      );

        $this->template->projectListFuture  = $projectListFuture;
	}

}

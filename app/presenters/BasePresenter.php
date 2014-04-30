<?php


abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	protected function beforeRender() {
	
    $this->template->projectListPast = array(
        array(
            'desc' => 'Vánoce plné barokní hudby',
            'link' => 'baroque-music-christmas-2013',
        ),
        array(
            'desc' => 'Domenico Sarri: Didone abbandonata  ',
            'link' => 'domenico-sarri-didone-abbandonata'
        ),
//      array(
//          'desc' => 'Proj3',
//          'link' => 'proj3'
//      ),
    );

    $this->template->projectListCurrent = array(
        array(
            'desc' => 'Současný monstrprojekt',
            'link' => 'x-y-z'
        ),
    );

    $this->template->projectListFuture  = array(
        array(
            'desc' => 'Plánovaný monstrprojekt',
            'link' => 'x-y-z-1'
        ),
        array(
            'desc' => 'Plánovaný monstrprojekt II',
            'link' => 'x-y-z-2'
        ),
    );


////	$this->template->viewName = $this->view;
////	$this->template->root = isset($_SERVER['SCRIPT_FILENAME']) ? realpath(dirname(dirname($_SERVER['SCRIPT_FILENAME']))) : NULL;

////	$a = strrpos($this->name, ':');
////	if ($a === FALSE) {
////		$this->template->moduleName = '';
////		$this->template->presenterName = $this->name;
////	} else {
////		$this->template->moduleName = substr($this->name, 0, $a + 1);
////		$this->template->presenterName = substr($this->name, $a + 1);
////	}
	}

}

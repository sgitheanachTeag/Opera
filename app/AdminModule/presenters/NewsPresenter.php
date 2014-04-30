<?php

namespace AdminModule;

use Nette\Http\User,
    Nette\Application\UI\Form;

final class NewsPresenter extends SecuredPresenter {
//  /** @var PostsRepository */
//  private $postsRepository;
    
    /** @var NewsModel */
    private $newsModel;
 
public function inject(\NewsModel $newsModel) {
// $this->postsRepository = $postsRepository;
 $this->newsModel = $newsModel;
 } 


    public function actionDefault () {
#           $this->template->news = $this->model->news->findAll();
    }



    public function createComponentPostNewsForm () {
        $form = new \Nette\Application\UI\Form;
//      $form->addGroup('Content');
        $form->addTextArea('body', 'Novina:')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Neposílej mě prázdný...');
        $form->addText('header', 'Nadpis/Hlavička')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Neposílej mě prázdný...');
//      $form->addGroup('Validity');
        $form->addText('dt_from', 'Začátek')
            ->setAttribute('class', 'form-control');
        $form->addText('dt_to', 'Konec')
            ->setAttribute('class', 'form-control');
        $form->addCheckBox('is_public', '')
            ->setOption('description', 'Zveřejnit i ve veřejné části.');
//      $form->addGroup('Create');
        $form->addSubmit('post_news', 'Uložit')
            ->setAttribute('class', 'btn btn-primary');
        $form->onSuccess[] = callback($this, 'postNewsFormSubmitted');

        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = null; //'dl';
        $renderer->wrappers['pair']['container'] = 'div';
        $renderer->wrappers['label']['container'] = null; //'dt';
        $renderer->wrappers['control']['container'] = null;//'dd';
        return $form;
    }

    public function postNewsFormSubmitted (Form $form) {
        $data = $form->getValues();
        $data['dt_created'] = new \DateTime();
        $data['created_by'] = $this->getUser()->getIdentity()->id;
        $id = $this->newsModel->insert($data);
        $this->flashMessage('Novina uložena!');
        $this->redirect("this"); 
    }

}


<?php

namespace AdminModule;

use Nette\Http\User,
    Nette\Application\UI\Form;

final class ProjectPresenter extends SecuredPresenter {
    


    public function actionDefault () {
            $this->template->projects = $this->projectModel->fetchAll();
    }


    public function actionDelete ($id) {
//      if ($this->projectModel->exists($id)){
            $this->projectModel->delete($id);
            $this->flashMessage('Aktualita odstraněna!');
            $this->redirect("default"); 
//      }
    }
    public function actionEdit ($id) {
        $current_projects = $this->projectModel->get($id); 
        if (!$current_projects) {
            $this->error('Aktualita nenalezena');
        }
        $this['postProjectsForm']->setDefaults($current_projects->toArray());    
    }

    public function actionUnpublish ($id){
        $this->mk_publish($id, false);
            $this->flashMessage('Aktualita nebude viditelná pro veřejnost!');
            $this->redirect("default"); 
    }


    public function actionPublish ($id){
        $this->mk_publish($id, true);
        $this->flashMessage('Aktualita bude viditelná pro veřejnost!');
        $this->redirect("default"); 
    }


    private function mk_publish ($id, $val) {
        $current_projects = $this->projectModel->get($id); 
        if (!$current_projects) {
            $this->error('Aktualita nenalezena');
        }
        $this->projectModel->publish($id, $val);

    }



    public function createComponentPostProjectsForm () {
        $form = new \Nette\Application\UI\Form;
//      $form->addGroup('Content');
        $form->addTextArea('body', 'Tělo projektu:')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Neposílej mě prázdný...');
        $form->addText('header', 'Nadpis/Hlavička')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Neposílej mě prázdný...');
        $form->addText('header_short', 'Zkrácený nadpis (do menu)')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Neposílej mě prázdný...');
//      $form->addGroup('Validity');
        $form->addText('dt_from', 'Koná se od')
            ->setAttribute('class', 'form-control');
        $form->addText('dt_to', 'Koná se do')
            ->setAttribute('class', 'form-control');
        $form->addCheckBox('is_public', '')
            ->setOption('description', 'Zveřejnit i ve veřejné části.');
//      $form->addGroup('Create');
        $form->addSubmit('post_projects', 'Uložit')
            ->setAttribute('class', 'btn btn-primary');
        $form->onSuccess[] = callback($this, 'postProjectsFormSubmitted');

        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = null; //'dl';
        $renderer->wrappers['pair']['container'] = 'div';
        $renderer->wrappers['label']['container'] = null; //'dt';
        $renderer->wrappers['control']['container'] = null;//'dd';
        return $form;
    }

    public function postProjectsFormSubmitted (Form $form) {
        $data = $form->getValues();
        $postId = $this->getParameter('id');
        $data['dt_created'] = new \DateTime();
        $data['slug'] = \Nette\Utils\Strings::webalize($data['header_short']);
        $data['dt_from'] = new \DateTime($data['dt_from']);
        if ($data['dt_to']) {
        $data['dt_to'] = new \DateTime($data['dt_to']);
        }
        else {
            unset($data['dt_to']);
        } 
        
//      $data['created_by'] = $this->getUser()->getIdentity()->id;
        if ($postId) {
            $post = $this->projectModel->get($postId);
            $post->update($data);
        }
        else {
           $id = $this->projectModel->insert($data);
        }
        $this->flashMessage('Byl založen nový projekt!');
        $this->redirect("default"); 
    }

}


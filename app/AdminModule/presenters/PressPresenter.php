<?php

namespace AdminModule;

use Nette\Http\User,
    Nette\Application\UI\Form;

final class PressPresenter extends SecuredPresenter {
  
    /** @var NewsModel */
    private $fileModel;
     
    public function inject(\FileModel $fileModel) {
        $this->fileModel = $fileModel;
    } 


    public function actionDefault () {
            $this->template->pressFiles = $this->fileModel->fetchAll();
    }


    public function actionDelete ($id) {
            $this->newsModel->delete($id);
            $this->flashMessage('Aktualita odstraněna!');
            $this->redirect("default"); 
    }
    public function actionEdit ($id) {
        $current_news = $this->newsModel->get($id); 
        if (!$current_news) {
            $this->error('Aktualita nenalezena');
        }
        $this['postNewsForm']->setDefaults($current_news->toArray());    
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
        $current_news = $this->newsModel->get($id); 
        if (!$current_news) {
            $this->error('Aktualita nenalezena');
        }
        $this->newsModel->publish($id, $val);

    }

    public function createComponentPressUploaderForm () {
        
        $form = new \Nette\Application\UI\Form;
        $form->addTextArea('abstract', 'Abstrakt:')
            ->setAttribute('class', 'form-control');
        $form->addText('header', 'Nadpis/Hlavička')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Neposílej mě prázdný...');
        $form->addCheckBox('is_public', '')
            ->setOption('description', 'Zveřejnit?');
        $form->addUpload('file', 'Soubor')->setRequired('Tak nějaký soubor tu být musí, innit')
//          ->addConditionOn(Form::FILLED)
            ->addRule(Form::MAX_FILE_SIZE,'Větší, jak 5MB se tam nevejde. au.', 1024 * 1024 * 5);
        $form->addSelect('file_class', 'Typ souboru', array( '1' => 'Tisková zpráva', 2 => 'Banner', 10 => 'Jiné'))
            ->setDefaultValue(1);
        $form->addSubmit('post_news', 'Uložit')
            ->setAttribute('class', 'btn btn-primary');
        $form->onSuccess[] = callback($this, 'postPresUploaderFormSubmitted');

        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = null; //'dl';
        $renderer->wrappers['pair']['container'] = 'div';
        $renderer->wrappers['label']['container'] = null; //'dt';
        $renderer->wrappers['control']['container'] = null;//'dd';
        return $form;
    }

    public function postPresUploaderFormSubmitted (Form $form) {
        $data = $form->getValues();
        $id = $this->getParameter('id');
        $data['dt_created'] = new \DateTime();
        $data['created_by'] = $this->getUser()->getIdentity()->id;
        if ($id) {
            $post = $this->pressModel->get($id);
            $post->update($data);
        }
        else {
           $id = $this->newsModel->insert($data);
        }
        $this->flashMessage('Aktualita uložena!');
        $this->redirect("default"); 
    }

}


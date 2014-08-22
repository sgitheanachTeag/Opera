<?php

namespace AdminModule;

use Nette\Http\User,
    Nette\Application\UI\Form;

final class NewsPresenter extends SecuredPresenter {
//  /** @var PostsRepository */
//  private $postsRepository;
    
//  /** @var NewsModel */
//  private $newsModel;
 
//  public function inject(\NewsModel $newsModel) {
//  // $this->postsRepository = $postsRepository;
//   $this->newsModel = $newsModel;
//   } 


    public function actionDefault () {
            $this->template->news = $this->newsModel->fetchAll();
    }


    public function actionDelete ($id) {
//      if ($this->newsModel->exists($id)){
            $this->newsModel->delete($id);
            $this->flashMessage('Aktualita odstraněna!');
            $this->redirect("default"); 
//      }
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



    public function createComponentPostNewsForm () {
        $form = new \Nette\Application\UI\Form;
//      $form->addGroup('Content');
        $form->addTextArea('body', 'Aktualita:')
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
        $postId = $this->getParameter('id');
        $data['dt_created'] = new \DateTime();
        $data['dt_from'] = new \DateTime($data['dt_from']);
        if ($data['dt_to']) {
        $data['dt_to'] = new \DateTime($data['dt_to']);
        }
        else {
            unset($data['dt_to']);
        } 
        
        $data['created_by'] = $this->getUser()->getIdentity()->id;
        if ($postId) {
            $post = $this->newsModel->get($postId);
            $post->update($data);
        }
        else {
           $id = $this->newsModel->insert($data);
        }
        $this->flashMessage('Aktualita uložena!');
        $this->redirect("default"); 
    }

}


<?php

namespace AdminModule;

use Nette\Http\User,
    Nette\Application\UI\Form;

final class TicketsPresenter extends SecuredPresenter {
    
    /** @var TicketsModel */
    private $ticketsModel;
 
public function inject(\ticketsModel $ticketsModel) {
// $this->postsRepository = $postsRepository;
 $this->ticketsModel = $ticketsModel;
 } 


    public function actionDefault () {
            $this->template->tickets = $this->ticketsModel->fetchAll();
    }


    public function actionDelete ($id) {
            $this->ticketsModel->delete($id);
            $this->flashMessage('Link na prodej listku odstraněn!');
            $this->redirect("default"); 
    }
    public function actionEdit ($id) {
        $current_tickets = $this->ticketsModel->get($id); 
        if (!$current_tickets) {
            $this->error('Listek nenalezen');
        }
        $this['postTicketsForm']->setDefaults($current_tickets->toArray());    
    }

    public function actionUnpublish ($id){
        $this->mk_publish($id, false);
            $this->flashMessage('Prodej listku nebude viditelny pro veřejnost!');
            $this->redirect("default"); 
    }


    public function actionPublish ($id){
        $this->mk_publish($id, true);
        $this->flashMessage('Listek bude viditelny pro veřejnost!');
        $this->redirect("default"); 
    }


    private function mk_publish ($id, $val) {
        $current_tickets = $this->ticketsModel->get($id); 
        if (!$current_tickets) {
            $this->error('Listek nenalezena');
        }
        $this->ticketsModel->publish($id, $val);

    }



    public function createComponentPostTicketsForm () {
        $form = new \Nette\Application\UI\Form;
//      $form->addGroup('Content');
        $form->addTextArea('body', 'Listek:')
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
            ->setOption('description', 'Zveřejnityi ve veřejné části.');
//      $form->addGroup('Create');
        $form->addSubmit('post_tickets', 'Uložit')
            ->setAttribute('class', 'btn btn-primary');
        $form->onSuccess[] = callback($this, 'postTicketsFormSubmitted');

        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = null; //'dl';
        $renderer->wrappers['pair']['container'] = 'div';
        $renderer->wrappers['label']['container'] = null; //'dt';
        $renderer->wrappers['control']['container'] = null;//'dd';
        return $form;
    }

    public function postTicketsFormSubmitted (Form $form) {
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
            $post = $this->ticketsModel->get($postId);
            $post->update($data);
        }
        else {
           $id = $this->ticketsModel->insert($data);
        }
        $this->flashMessage('Link pro prodej listku uložen!');
        $this->redirect("default"); 
    }

}


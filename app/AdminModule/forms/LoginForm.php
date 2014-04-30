<?php

namespace AdminModule\Forms;

use Nette\Application\UI\Form,
    Nette\Environment,
    Nette\Security\AuthenticationException;

class LoginForm extends Form
{
    public function __construct($parent, $name)
    {
        parent::__construct($parent, $name);

        $this->addProtection('Prosím odošlite prihlasovacie údaje znova (vypršala platnosť bezpečnostného tokenu).');

        $this->addText('login', 'Uživ. jméno:')
            ->addRule(Form::FILLED, 'máš nějaké?');
//            ->addRule(Form::EMAIL, 'Zadaný login nie je platná emailová adresa');

        $this->addPassword('password', 'Password:')
            ->addRule(Form::FILLED, 'Prosím zadajte heslo.');

        $this->addSubmit('send', 'Log in!');
        $this->onSuccess[] = array($this, 'formSubmited');
    }

    public function formSubmited($form)
    {
        try {
            $user = $this->getPresenter()->getUser();
            $user->login($form['login']->value, $form['password']->value);

            $this->getPresenter()->restoreRequest($this->getPresenter()->backlink);
            $this->getPresenter()->redirect('Default:default');
        }
        catch (AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }
}

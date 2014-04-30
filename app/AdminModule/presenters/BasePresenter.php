<?php

namespace AdminModule;

abstract class BasePresenter extends \BasePresenter {

    protected function beforeRender() {
           $this->template->mainMenuItems = array(
            ':Front:Default:default' => 'Veřejná část',
            'Default:default' => 'Domů',
            'Calendar:default' => 'Kalendář',
            'AddressBook:default' => 'Adresář',

        );
    }
}

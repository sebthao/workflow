<?php
    echo $this->Form->create($users);
    echo $this->Form->control('userName',['label' => 'Nom de compte']);
    echo $this->Form->control('password',['label' => 'Mot de passe']);
    echo $this->Form->button('Valider');
    echo $this->Form->end();


<?php
echo $this->Form->create($users,['url' => ['controller' => 'Users', 'action' => 'rechercheSession']]);
echo $this->Form->control('search',['label' => 'Recherche par tag 1 par 1']);
echo $this->Form->button('Rechercher');
echo $this->Form->end();

echo $this->Form->create($users,['url' => ['controller' => 'Sessions', 'action' => 'addSession']]);
echo $this->Form->button('New Session');
echo $this->Form->end();

foreach($sessions as $session){

echo $session->promotion."<br>";
    echo $this->Form->create($users,['url' => ['controller' => 'Sessions', 'action' => 'addSession']]);
    $this->Form->hidden('article_id', ['value' => $session->id]);
    echo $this->Form->button('Voir');
    echo $this->Form->end();
    echo $this->Form->create($users,['url' => ['controller' => 'Sessions', 'action' => 'addSession']]);
    $this->Form->hidden('article_id', ['value' => $session->id]);
    echo $this->Form->button('Dupliquer');
    echo $this->Form->end();
    echo $this->Form->create($users,['url' => ['controller' => 'Sessions', 'action' => 'addSession']]);
    $this->Form->hidden('article_id', ['value' => $session->id]);
    echo $this->Form->button('Admission');
    echo $this->Form->end();
    echo $this->Form->create($users,['url' => ['controller' => 'Sessions', 'action' => 'addSession']]);
    $this->Form->hidden('article_id', ['value' => $session->id]);
    echo $this->Form->button('Supprimer');
    echo $this->Form->end();


}
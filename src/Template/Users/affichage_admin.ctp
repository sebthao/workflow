<?php
echo $this->Form->create($users,['url' => ['controller' => 'Users', 'action' => 'rechercheSession']]);
echo $this->Form->control('search',['label' => 'Recherche par tag 1 par 1']);
echo $this->Form->button('Rechercher');
echo $this->Form->end();

echo $this->Form->create($users,['url' => ['controller' => 'Sessions', 'action' => 'addSession']]);
echo $this->Form->button('New Session');
echo $this->Form->end();

foreach($sessions as $session){


}
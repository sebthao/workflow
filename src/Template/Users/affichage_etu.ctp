<?php


echo $this->Form->create($users,['url' => ['controller' => 'Users', 'action' => 'afficheEtu']]);
echo $this->Form->control('search',['label' => 'Recherche ...']);
echo $this->Form->button('Rechercher');
echo $this->Form->end();






foreach ($subjects as $subject) {

    echo $subject->title . "<br>";
    echo $subject->description . "<br>";
    echo substr($subject->content, 1, 50) . "...<br>";
    echo $subject->idUserMentor."<br>";



    echo $this->Form->create($users, ['url' => ['controller' => 'Users', 'action' => 'index']]);
    echo $this->Form->button('Choisir');
    echo $this->Form->end();


    echo $this->Form->create($users, ['url' => ['controller' => 'Users', 'action' => 'index']]);
    echo $this->Form->button('Lire');
    echo $this->Form->end();

}



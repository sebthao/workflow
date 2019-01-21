<?php


echo $this->Form->create($users,['url' => ['controller' => 'Users', 'action' => 'afficheEtuChoix']]);
echo $this->Form->control('search',['label' => 'Recherche']);
echo $this->Form->button('Rechercher');
echo $this->Form->end();






foreach ($subjects as $subject) {

    echo "Titre : ".$subject->title . "<br>";
    echo "Description : ".$subject->description . "<br>";
    echo substr($subject->description, 0, 50) . "...<br>";


    echo "Enseignant : ".$subject->Enseignant."<br>";



    echo $this->Form->create($subject, ['url' => ['controller' => 'Users', 'action' => 'choisirSubject']]);
    echo $this->Form->hidden('id', [$subject->id]);
    echo $this->Form->button('Choisir');
    echo $this->Form->end();


    echo $this->Form->create($subject, ['url' => ['controller' => 'Subjects', 'action' => 'affSubject']]);
    echo $this->Form->hidden('id', [$subject->id]);
    echo $this->Form->button('Lire');
    echo $this->Form->end();

}

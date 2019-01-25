<?php

echo $this->Form->create($subjects,['url'=>['controller'=>'Users','action'=>'affichageEns']]);
echo $this->Form->button('Retour');
echo $this->Form->end();
echo "<p>Bonjour, ici vous pouvez soumettre un sujet de PTUT que vous superviserez</p>";

echo $this->Form->create($subjects,['url'=>['controller'=>'Subjects','action'=>'addSubject']]);
echo $this->Form->control('Titre',['required'=>true]);
echo $this->Form->control('Description',['required'=>true]);
echo $this->Form->button("Valider");

echo $this->Form->end();

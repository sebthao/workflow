<?php

echo 'Bonjour. Ici vous pouvez soumettre un sujet de PTUT.';
echo '<br>';
echo $this->Form->create($subject, ['type'=>'flie']);

echo $this->Form->control('title',['label'=>'Saisissez le titre :']);
echo $this->Form->control('content',['label' => 'Saisissez la description :']);
//echo $this->Form->control('tags',['label'=>'Saisissez les mots clefs :']);


echo 'Choississez votre prof :'. '<br>';
echo $this->Form->imput('mentor', array('type'=>'select', 'options'=>$profs ));

echo $this->Form->button('Valider');
echo $this->Form->end();

echo $this->Form->create($user,['controller' => 'Users', 'url' => '/Users/affichageEtuChoix']);
echo $this->Form->button('Retour');
echo $this->Form->end();
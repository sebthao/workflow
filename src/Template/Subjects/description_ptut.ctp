<?php
echo $this->Form->create($subject,['url'=>['controller'=>'Users','action'=>'affichageEns']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

echo $this->Form->create($subject,['url'=>['controller'=>'Users', 'action'=>'affichageEns']]);
echo "Sujet: ".$subject->title."<br><br>";
echo $subject->description."<br><br>";
echo "Tuteur: ".$nomMentor;
echo $this->Form->end();
<?php

echo $this->Form->create($subject,['url'=>['controller'=>'Users', 'action'=>'affichageEns']]);
echo "Sujet: ".$subject->title."<br><br>";
echo $subject->description."<br><br>";
echo "Tuteur: ".$nomMentor;
echo $this->Form->end();
<?php

echo $this->Form->create($subjects,['url'=>['controller'=>'Users','action'=>'soumissionEns']]);
echo $this->Form->control("Rechercher");
echo $this->Form->create($subjects, ['url' => ['controller' => 'Users', 'action' => 'soumissionEns']]);
echo $this->Form->button('Soumettre un sujet');
echo $this->Form->end();

foreach ($subjects as $subject){
    echo $subject->title."<br>";
    //echo $sessions->date."<br>";
    echo $this->Form->create($subject, ['url' => ['controller' => 'Subjects', 'action' => 'descriptionPtut']]);
    echo $this->Form->hidden('id', [$subject->id]);
    echo $this->Form->button('Lire');
    echo $this->Form->end();

    echo $this->Form->create($subject, ['url' => ['controller' => 'Subjects', 'action' => 'setVisible']]);
    echo $this->Form->hidden('id', [$subject->id]);
    echo $this->Form->button('Rendre Visible');
    echo $this->Form->end();
    echo"<br>";
}
/*s*/
echo $this->Form->end();
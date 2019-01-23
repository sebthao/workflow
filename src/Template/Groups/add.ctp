<?php
echo $this->Form->create($etudiants,['url'=>['controller'=>'Users','action'=>'affichageEns']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

$redirect=$this->Form->create($etudiants,['url'=>['controller'=>'Groups','action'=>'choix']]);

echo "<legend>Combien voulez-vous mettre d'élèves dans ce Ptut?</legend><br>";
echo $redirect;
echo $this->Form->control('number',['type'=>'number','value'=>'0','min'=>'0','max'=>'4']);
echo $this->Form->control('Valider',['type'=>'submit','value'=>'Submit']);
echo $this->Form->end();

?>
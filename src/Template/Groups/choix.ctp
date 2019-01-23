<?php

//dd($this->getRequest()->getSession()->read('nombre'));
$pop=$this->getRequest()->getSession()->read('nombre');
echo $pop;

echo $this->Form->create($etudiants,['url'=>['controller'=>'Groups','action'=>'add']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

echo $this->Form->create($etudiants,['url'=>['controller'=>'Users','action'=>'affichageEns']]);
$array=array();
foreach ($etudiants as $etudiant){
    $nomEtu=$etudiant->firstName." ".$etudiant->lastName;
    array_push($array,$nomEtu);
}
//dd($array);
echo $this->Form->input('Eleve',array('type'=>'select','options'=>$array));
echo $this->Form->button('Valider');
echo $this->Form->end();
?>
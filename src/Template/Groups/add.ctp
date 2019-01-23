<?php
echo $this->Form->create($etudiants,['url'=>['controller'=>'Users','action'=>'affichageEns']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

echo "<fieldset><p>Combien voulez-vous mettre d'élèves dans ce Ptut?</p></fieldset>";
echo $this->Form->create($etudiants,['url'=>['controller'=>'Groups','action'=>'choix']]);
$popo="Nombre: <input type='number' name='personne' value='0' min='0' max='4'>";
echo $popo;
$this->getRequest()->getSession()->write('nombre',$_POST[$popo);
echo $this->Form->button('Valider');
echo $this->Form->end();

?>
<?php

echo $this->Form->create($etudiants,['url'=>['controller'=>'Groups','action'=>'add']]);
echo $this->Form->button('Retour');
echo $this->Form->end();


echo $this->Form->create($etudiants,['url'=>['controller'=>'Users','action'=>'verification']]);
echo $this->Form->hidden('nbetu',['value'=>$nbetu]);
foreach ($etudiants as $etudiant){
    echo $this->Form->hidden('idEtu',['value'=>$etudiant->id]);
}
$this->getRequest()->getSession()->write('personne',$array);
$i=0;
if ($nbetu==0){
    echo "<p>il n'y a pas d'élèves dans ce groupe</p>";
}
else{
    echo "<legend>Veuillez indiquer le nom des ".$nbetu." élèves à insérer dans le groupe:</legend><br>";
    while ($i<$nbetu){
        echo "<p>Élève ".($i+1).":</p>";
        echo $this->Form->select('Promotion'.$i,$array);
        $i=$i+1;
        if ($i==$nbetu && $nbetu<>0){
            echo $this->Form->button('Valider');
            $this->getRequest()->getSession()->write('Grouped',1);
        }
    }
}

echo $this->Form->end();
?>
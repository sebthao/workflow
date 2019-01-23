<?php

echo $this->Form->create($etudiants,['url'=>['controller'=>'Groups','action'=>'add']]);
echo $this->Form->button('Retour');
echo $this->Form->end();


echo $this->Form->create($etudiants,['url'=>['controller'=>'Users','action'=>'verification']]);
$array=array();
foreach ($etudiants as $etudiant){
    $nomEtu=$etudiant->firstName." ".$etudiant->lastName;
    array_push($array,$nomEtu);
}
$i=0;
if ($nbetu==0){
    echo "<p>il n'y a pas d'élèves dans ce groupe</p>";
}
else{
    echo "<legend>Veuillez indiquer le nom des ".$nbetu." élèves à insérer dans le groupe</legend>";
    while ($i<$nbetu){
        echo $this->Form->select('Promotion'.$i,$array);
        $i=$i+1;
        if ($i==$nbetu && $nbetu<>0){
            echo $this->Form->button('Valider');
        }
    }
}
echo $this->Form->end();
?>
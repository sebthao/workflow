<?php
echo $this->Html->script('onglet');
echo $this->Html->css('onglet');
?>
    <body>
<div class="systeme_onglets">
    <div class="onglets">
        <?php
        $i=0;
        foreach($arraysessions as $arraysession){
            echo"<span class=\"onglet_0 onglet\" id=\"onglet_".$i."\" onclick=\"javascript:change_onglet($i);\">".$arraysession->promo.$arraysession->idsession."</span>";

            $i++;
        }
        /*    echo"<span class=\"onglet_0 onglet\" id=\"onglet_quoi\" onclick=\"javascript:change_onglet('quoi');\">Quoi</span>".
                "<span class=\"onglet_0 onglet\" id=\"onglet_qui\" onclick=\"javascript:change_onglet('qui');\">Qui</span>".
                "<span class=\"onglet_0 onglet\" id=\"onglet_pourquoi\" onclick=\"javascript:change_onglet('pourquoi');\">Pourquoi</span>";*/
        ?>
    </div>
    <div class="contenu_onglets">
<?php
$i=0;
foreach ($arraysessions as $arraysession2){
    //Formulaire ici!!!!
    echo "<div class=\"contenu_onglet\" id=\"contenu_onglet_".$i."\">";
    echo $this->Form->create($subjects,['url'=>['controller'=>'Users','action'=>'soumissionEns']]);
    echo $this->Form->control("Rechercher");
    echo $this->Form->create($subjects, ['url' => ['controller' => 'Users', 'action' => 'soumissionEns']]);
    echo $this->Form->hidden('idsession', ['value' => $arraysession2->idsession]);
    echo $this->Form->hidden('idpromotion', ['value' => $arraysession2->id]);
    echo $this->Form->button('Soumettre un sujet');
    echo $this->Form->end();
    foreach ($subjects as $subject){
        if($arraysession2->idsession == $subject->idSession){
            echo $subject->title."<br>";
            //echo $sessions->date."<br>";
            echo $this->Form->create($subject, ['url' => ['controller' => 'Subjects', 'action' => 'descriptionPtut']]);
            echo $this->Form->hidden('idSujet', ['value' => $subject->id]);
            echo $this->Form->hidden('idsession', ['value' => $subject->idSession]);
            echo $this->Form->hidden('idpromotion', ['value' => $arraysession2->id]);
            echo $this->Form->button('Lire');
            echo $this->Form->end();
            echo $this->Form->create($subject, ['url' => ['controller' => 'Subjects', 'action' => 'setVisible']]);
            echo $this->Form->hidden('idSujet', ['value' => $subject->id]);
            echo $this->Form->hidden('idsession', ['value' => $subject->idSession]);
            echo $this->Form->hidden('idpromotion', ['value' => $arraysession2->id]);
            echo $this->Form->button('Rendre Visible');
            echo $this->Form->end();
            if($this->getRequest()->getSession()->read('Grouped')==0){
                echo $this->Form->create($subject, ['url' => ['controller' => 'Groups', 'action' => 'add']]);
                echo $this->Form->hidden('idSujet', ['value' => $subject->id]);
                echo $this->Form->hidden('idsession', ['value' => $subject->idSession]);
                echo $this->Form->hidden('idpromotion', ['value' => $arraysession2->id]);
                echo $this->Form->button('Ajouter Groupe');
                echo $this->Form->end();
            }else{
                echo $this->Form->create($subject, ['url' => ['controller' => 'Groups', 'action' => 'add']]);
                echo $this->Form->hidden('idSujet', ['value' => $subject->id]);
                echo $this->Form->hidden('idsession', ['value' => $subject->idSession]);
                echo $this->Form->hidden('idpromotion', ['value' => $arraysession2->id]);
                echo $this->Form->button('Modifier Groupe');
                echo $this->Form->end();
            }
        }
    }
    echo"</div>";
    $i++;
}
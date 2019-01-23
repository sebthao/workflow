<?php
echo $this->Html->script('onglet');
echo $this->Html->css('onglet');
?>
    <body>
<div class="systeme_onglets">
    <div class="onglets">
        <?php
        echo"<span class=\"onglet_0 onglet\" id=\"onglet_quoi\" onclick=\"javascript:change_onglet('quoi');\">Quoi</span>".
            "<span class=\"onglet_0 onglet\" id=\"onglet_qui\" onclick=\"javascript:change_onglet('qui');\">Qui</span>".
            "<span class=\"onglet_0 onglet\" id=\"onglet_pourquoi\" onclick=\"javascript:change_onglet('pourquoi');\">Pourquoi</span>";
        ?>
    </div>
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

echo $this->Form->end();
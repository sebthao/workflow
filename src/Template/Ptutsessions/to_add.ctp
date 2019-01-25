<?php
    echo $this->Html->css('lesq');
    echo $this->Html->script('boutonNewPhase');



    echo $this->Form->create($sessions, ['name'=>'nomForm', 'url' => ['controller' => 'Ptutsessions', 'action' => 'toAdd']]);
    echo $this->Form->control('nomSession', ['label' => 'Saisissez le nom de la session :']);


    echo $this->Form->control('Datevent',['label'=>'Date de début :','type'=>'date']);

    //liste des promotions
    echo $this->Form->control('Promo', ['label'=>'Choississez la promo pour ce Ptut :','type'=>'select', 'options'=>$pro]);

    echo $this->Form->control('SujEtuChoix', ['label'=>'Soumission de sujet par les etudiant','type'=>'checkbox'] );

    echo $this->Form->control('Autre', ['Si besoin autres checkbox','type'=>'checkbox'] );


    echo $this->Form->button('Valider');
    echo $this->Form->end();


    echo $this->Form->button('Nouvelle Phase', array('name'=>'boutonPhase','onclick' => 'newPhase()'));

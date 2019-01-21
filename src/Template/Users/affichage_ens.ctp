<?php

echo $this->Form->control("Rechercher");
echo $this->Form->button("Soumettre un sujet").'<br>';

foreach ($subjects as $subject){
    echo $subject->title."<br>";
    //echo $sessions->date."<br>";
    echo $this->Form->button("Lire");
    echo $this->Form->button("Soumettre").'<br>';
}

echo $this->Form->end();
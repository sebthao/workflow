<?php

echo $this->Form->control("rechercher");
echo $this->Form->button("Soumettre un sujet");

foreach ($subjects as $subject) {
    dd($this->Sessions);
    echo $this->title;
    echo $this->Sessions->date;
    echo $this->Sessions->promotion;
    echo $this->Form->control("Lire");
    echo $this->Form->control("Soumettre");
    echo $this->Form->control("Télécharger");

}
echo $this->Form->end();
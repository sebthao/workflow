<?php

echo "<p>Bonjour ici vous pouvez soumettre un sujet de PTUT que vous superviserez</p>";
echo $this->Form->create($subjects,['url'=>['controller'=>'Subjects','action'=>'addSubject']]);
echo $this->Form->control("Titre");
echo $this->Form->control("Description");
echo $this->Form->button("Valider");

echo $this->Form->end();

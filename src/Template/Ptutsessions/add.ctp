<?php

$form= $this->Form;
echo $form->create($sessions);
echo $form->control('date',['label' => 'Année']);
echo $form->select('Promotion', ['Lp Metinet', 'Lp IEM', '2eme année']);
echo $form->control('tagss',['label'=>'Saisissez les tags à séparer avec une ","']);
echo $form>control('content',['label' => 'Saisissez la description de votre article']);
echo $form->control('picture', ['type' => 'file','label' => 'Inserez une image']);
echo $form->button('Valider');
echo $form>end();


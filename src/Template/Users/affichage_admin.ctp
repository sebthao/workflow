<?php
echo $this->Form->create($users,['url' => ['controller' => 'Users', 'action' => 'rechercheSession']]);
echo $this->Form->control('search',['label' => 'Recherche par tag 1 par 1']);
echo $this->Form->button('Rechercher');
echo $this->Form->end();

echo $this->Form->create($users,['url' => ['controller' => 'Ptutsessions', 'action' => 'toAdd']]);
echo $this->Form->button('New Session');
echo $this->Form->end();

foreach($sessions as $session) {
    echo $session->id;
    foreach ($promos as $promo) {
        if ($promo->id == $session->promotion_id) {
            echo 'Ptut ' . $promo->title . "<br>";
            echo 'Debut : ' . $session->date_event . "<br>";

            echo $this->Form->create($users, ['url' => ['controller' => 'Ptutsessions', 'action' => 'view']]);
            echo $this->Form->hidden('article_id', ['value' => $session->id]);
            echo $this->Form->button('Voir');
            echo $this->Form->end();

            echo $this->Form->create($users, ['url' => ['controller' => 'Ptutsessions', 'action' => 'cloned']]);
            echo $this->Form->hidden('article_id', ['value' => $session->id]);
            echo $this->Form->button('Dupliquer');
            echo $this->Form->end();

            echo $this->Form->create($users, ['url' => ['controller' => 'Ptutsessions', 'action' => 'admission']]);
            echo $this->Form->hidden('session_id', ['value' => $session->id]);
            echo $this->Form->button('Admission');
            echo $this->Form->end();

            echo $this->Form->create($users, ['url' => ['controller' => 'Ptutsessions', 'action' => 'supr']]);
            echo $this->Form->hidden('id', ['value' => $session->id]);
            echo $this->Form->button('Supprimer');
            echo $this->Form->end();
        }
    }
}
<?php
/*echo" <script type=\"text/javascript\">".
    "function change_onglet(name){document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';".
    "document.getElementById('onglet_'+name).className = 'onglet_1 onglet';".
    "document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';".
    "document.getElementById('contenu_onglet_'+name).style.display = 'block';".
    "anc_onglet = name;}".
    "</script>";

echo" <div class=\"systeme_onglets\">".
    "<div class=\"onglets\">".
    "<span class=\"onglet_0 onglet\" id=\"onglet_quoi\" onclick=\"javascript:change_onglet('quoi');\">Quoi</span>".
    "<span class=\"onglet_0 onglet\" id=\"onglet_qui\" onclick=\"javascript:change_onglet('qui');\">Qui</span>".
    "<span class=\"onglet_0 onglet\" id=\"onglet_pourquoi\" onclick=\"javascript:change_onglet('pourquoi');\">Pourquoi</span>".
    "</div>".
    "<div class=\"contenu_onglets\">".
    "<div class=\"contenu_onglet\" id=\"contenu_onglet_quoi\">".
    "<h1>Quoi?</h1>".
    "Un simple syst&egrave;me d'onglet utilisant les technologies:<br />".
    "<ul>".
    "<li>(X)html</li>".
    "<li>CSS</li>".
    "<li>Javascript</li>".
    "</ul>".
    "</div>".
    "<div class=\"contenu_onglet\" id=\"contenu_onglet_qui\">".
    "<h1>Qui?</h1>".
    "C'est un script r&eacute;alis&eacute; par Ybouane,<br />".
    "Webmaster du site <a href=\"http://www.supportduweb.com/\">http://www.supportduweb.com/</a>".
    "</div>".
    "<div class=\"contenu_onglet\" id=\"contenu_onglet_pourquoi\">".
    "<h1>Pourquoi?</h1>".
    "Pour simplifier la navigation et la diviser en parties".
    "</div>".
    "</div>".
    "<script type=\"text/javascript\">";*/



$int =1;
$cpt=$query2->count();


while($cpt!=0){
    foreach ($query2 as $q){
        if($q->rank == $int){
           foreach ($subjects as $subject){
               if($subject->id ==$q->subject_id){
                   echo 'choix n°'.$int.' : ';
                   echo $subject->title ;
                   echo '<br>';
                   $int = $int+1;
                   $cpt = $cpt-1;
               }
           }
        }
    }
}


echo $this->Form->create($users,['url' => ['controller' => 'Users', 'action' => 'afficheEtuChoix']]);
echo $this->Form->control('search',['label' => 'Recherche']);
echo $this->Form->button('Rechercher');
echo $this->Form->end();


foreach ($subjects as $subject) {

    echo "Titre : " . $subject->title . "<br>";
    echo "Description : " . $subject->description . "<br>";
    echo substr($subject->description, 0, 50) . "...<br>";

    echo "Enseignant : " . $subject->Enseignant . "<br>";

    echo $this->Form->create($subject, ['url' => ['controller' => 'Users', 'action' => 'choisirSubject']]);
    echo $this->Form->hidden('id', [$subject->id]);
    echo $this->Form->button('Choisir');
    echo $this->Form->end();

    echo $this->Form->create($subject, ['url' => ['controller' => 'Subjects', 'action' => 'affSubject']]);
    echo $this->Form->hidden('id', [$subject->id]);
    echo $this->Form->button('Lire');
    echo $this->Form->end();
}



<?php
$int =0;

echo $user.'<br> ';

foreach ($idpromo as $ip){
    echo $ip.'<br> ';
}
foreach ( $sess as $s){
    echo $s.'<br> ';
}
foreach ( $stat as $st){
    echo $st.'<br> ';
}


echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

foreach ($sess as $s){
    foreach ($stat as $st){
        if($s->statu_id==$st->id){
            foreach ($idpromo as $ip){
                echo 'PTUT '. $ip->title.' Debut :'.$s->date_event. ' Etat : '.$st->name.'<br>';
            }
        }
    }
    if($s->statu_id != 1){
        $int = $int +1;
    }
}


if($int==0){
    echo 'Vous n avez actuellement aucune session en cours'.'<br>';

}


















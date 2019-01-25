<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 21/01/2019
 * Time: 09:50
 */

namespace App\Controller;


class PtutsessionsController  extends AppController
{

    public function supr()
    {


        $ptutsession = $this->Ptutsessions->get($this->getRequest()->getData('id'));
        $phases=$this->Ptutsessions->Phases->find()->toarray();
        $deletesubject=null;
        $deletephase=null;
        foreach ($phases as $phase){
            if($phase->ptutsession_id==$ptutsession->id){
                $deletephase=$this->Ptutsessions->Phases->get($phase->id);
                $result=$this->Ptutsessions->Phases->delete($phase);
            }
        }

        $subjects=$this->Ptutsessions->Subjects->find()->toarray();
        foreach ($subjects as $subject){


            if($subject->idSession==$ptutsession->id){
                 $deletesubject=$this->Ptutsessions->Subjects->get($subject->id);

                $result=$this->Ptutsessions->Subjects->delete($deletesubject);
            }
        }

        $result = $this->Ptutsessions->delete($ptutsession);
        return $this->redirect('/Users/affichageAdmin');

    }


    public function toAdd()
    {
        $pro = array();
        $promos=$this->Ptutsessions->Promotions->find()->toarray();
        foreach ($promos as $p){
            array_push($pro, $p->title);
        }


        if(!empty($this->getRequest()->getData())){
            $int = 0;
            $ptutsessions=$this->Ptutsessions->newEntity();
            $query=$this->Ptutsessions->Promotions->find()->all();
            foreach ($query as $q){
                if($this->getRequest()->getData('Promo')==$int){
                    $ptutsessions->promotion_id= $q->id;
                }
                $int=$int+1;
            }

            $da=$this->getRequest()->getData('Datevent');


            $vda='';
            if($da['month']=='01'){
                $vda='Janvier '.$da['year'];
            }
            elseif ($da['month']=='02'){
                $vda='Fevrier '.$da['year'];
            }
            elseif ($da['month']=='03'){
                $vda='Mars '.$da['year'];
            }
            elseif ($da['month']=='04'){
                $vda='Avril '.$da['year'];
            }
            elseif ($da['month']=='05'){
                $vda='Mai '.$da['year'];
            }
            elseif ($da['month']=='06'){
                $vda='Juin '.$da['year'];
            }
            elseif ($da['month']=='07'){
                $vda='Juillet '.$da['year'];
            }
            elseif ($da['month']=='08'){
                $vda='Aout '.$da['year'];
            }
            elseif ($da['month']=='09'){
                $vda='Septembre '.$da['year'];
            }
            elseif ($da['month']=='10'){
                $vda='Octobre '.$da['year'];
            }
            elseif ($da['month']=='11'){
                $vda='Novembre '.$da['year'];
            }
            elseif ($da['month']=='12'){
                $vda='decembre '.$da['year'];
            }

            $ptutsessions->date_event = $vda;
            $ptutsessions->statu_id = 2;
            $ptutsessions->title = $this->getRequest()->getData('nomSession');

            $ptutsessions->soumission_etu = $this->getRequest()->getData('SujEtuChoix');

            if($this->Ptutsessions->save($ptutsessions)){

                $i=1;


                while($this->getRequest()->getData('nomPhase'.$i)!=null){
                    $phases=$this->Ptutsessions->Phases->newEntity();
                    $phases->title=$this->getRequest()->getData('nomPhase'.$i);

                    $da=$this->getRequest()->getData('nomCa'.$i);
                    $vda=$da['month']." ".$da['year'];
                    $phases->date_event=$vda;
                    $phases->content=$this->getRequest()->getData('nomDescription'.$i);
                    $phases->ptutsession_id=$ptutsessions->id;

                    if($this->Ptutsessions->Phases->save($phases)){}
                    else {
                        $this->Flash->error('erreur');
                        return $this->redirect('/Ptutsessions/toAdd');
                    }
                    $i++;
                }
                $this->Flash->success('Sauvegardé');
                return $this->redirect('/Users/affichageAdmin');
            }else{
                $this->Flash->error('erreur');
                return $this->redirect('/Ptutsessions/toAdd');
            }
        }
        else{
            $sessions = $this->Ptutsessions->find()->all();
            $this->set(compact('sessions', 'pro'));
            //return $this->redirect('/Ptutsessions/toAdd');
        }





    }






}


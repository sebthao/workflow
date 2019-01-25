var i=0;

function newPhase(){
    i=(i+1)*1;

    ////////saut de ligne/////////////
    var br =document.createElement('br');


    ///////Titre champs de saisi//////////
    var name = 'Choississez le nom de votre phase '+i+" :";
    var txtp=document.createElement('q');
    txtp.innerHTML=name;


    //////Champs de saisis non de la phase///////////
    var sup = document.createElement("input");
    sup.name='nomPhase'+i;
    sup.type = "text";


    ///////Titre calendrier//////////
    var txtc =document.createElement('q');
    txtc.innerHTML='Veuillez saisir une date :';

    ///////////////////Calendrier////////////////////////
    var cal = document.createElement("input");
    cal.name='nomCal'+i;
    cal.type = "date";


    ///////Titre description//////////
    var txtd =document.createElement('q');
    txtd.innerHTML='Veuillez saisir votre description :';


    /////////////////Description///////////////////////
    var des = document.createElement("input");
    des.name='nomDescription'+i;
    des.type = "text";
    des.className="champ";






    //////Insertion sur le form/////////////////////
    ///saut de ligne///
    nomForm.appendChild(br);

    ////////titre champs de saisi de la phase/////////
    nomForm.appendChild(txtp);

    ///////champs de saisi de la phase///////////
    nomForm.appendChild(sup);

    ////////titre calendrier/////////
    nomForm.appendChild(txtc);

    //////calendrier//////
    nomForm.appendChild(cal);

    ////////titre description/////////
    nomForm.appendChild(txtd);

    ////////////description///////////
    nomForm.appendChild(des);



}
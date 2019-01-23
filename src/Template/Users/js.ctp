<?php
echo $this->Html->script('onglet');
echo $this->Html->css('onglet');
?>
<body>
<div class="systeme_onglets">
    <div class="onglets">
        <?php
        echo"<span class=\"onglet_0 onglet\" id=\"onglet_quoi\" onclick=\"javascript:change_onglet('quoi');\">Quoi</span>".
        "<span class=\"onglet_0 onglet\" id=\"onglet_qui\" onclick=\"javascript:change_onglet('qui');\">Qui</span>".
        "<span class=\"onglet_0 onglet\" id=\"onglet_pourquoi\" onclick=\"javascript:change_onglet('pourquoi');\">Pourquoi</span>";
        ?>
    </div>
    <div class="contenu_onglets">
        <?php

        ?>
        <div class="contenu_onglet" id="contenu_onglet_quoi">
            <h1></h1>
            Un simple syst&egrave;me d'onglet utilisant les technologies:<br />
            <ul>
                <li>(X)html</li>
                <li>CSS</li>
                <li>Javascript</li>
            </ul>
        </div>
        <div class="contenu_onglet" id="contenu_onglet_qui">
            <h1>Qui?</h1>
            C'est un script r&eacute;alis&eacute; par Ybouane,<br />
            Webmaster du site <a href="http://www.supportduweb.com/">http://www.supportduweb.com/</a>
        </div>
        <div class="contenu_onglet" id="contenu_onglet_pourquoi">
            <h1>Pourquoi?</h1>
            Pour simplifier la navigation et la diviser en parties
        </div>
    </div>
</div>
<script type="text/javascript">
    //<!--
    var anc_onglet = 'quoi';
    change_onglet(anc_onglet);
    //-->
</script>
</body>
</html>
<?php

abstract class BaseController {
    protected function genererVue($nomVue, $donnees = []) {
        // Requière le template principal (par exemple, un fichier layout)
        //require_once 'view/template.php';
        
        // Extraire les données pour les rendre disponibles dans la vue
        if (!empty($donnees)) {
            extract($donnees);
        }
        
        // Inclure la vue spécifique
        include("view/$nomVue.php");
    }

}
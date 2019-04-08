<?php

abstract class AbstractEntity
{      
    protected function hydrate(array $donnees)
    {
        foreach ($donnees as $cle => $valeur) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . implode('', array_map('ucfirst', explode('_', $cle)));
            //echo 'method : ' . $method . '<br/>';
            //echo $method . '<br/>';
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($valeur);
            }
        }
    }
}
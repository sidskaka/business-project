<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

function userFullName() {

    // dd(Request::user());
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

function setMenuClass($route, $class) {
    $routeActuelle = Request::route()->getName();

    if (contains($routeActuelle, $route)) {
        return $class;
    }

    return "";
}

function setMenuActive($route) {
    $routeActuelle = Request::route()->getName();

    if ($routeActuelle === $route) {
        return 'active';
    }

    return "";
}

function contains($container, $contenu) {
    return Str::contains($container, $contenu);
}

function getRolesName() {
    $rolesName = "";
    $i = 0;
    
    // dd(count(auth()->user()->roles));

    foreach(auth()->user()->roles as $role) {

        // dump($i);

        $rolesName .= $role->nom;

        if ($i < sizeof(auth()->user()->roles) - 1) {
            $rolesName .= ", ";
        }
        $i++;

    }
    
    return $rolesName;
}
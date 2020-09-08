<?php
//3
function getDataBase() {
    try {
        $bdd = new PDO('mysql:host=mysql2.montpellier.epsi.fr;dbname=Workshop;charset=utf8;port=5306;',
            'mathias.boudou', '726HFH', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $exception) {
        $bdd = null;
    }
    return $bdd;
}

function getListe(PDO $bdd,$fromTable,Array $cond = [],Array $condLike = [],$askSelect = '*',$specialCond= "") { //Cond pour Condition
    //Pour utiliser cette fonction il faut lui envoyer :
    //La bdd
    //Le(s) table au quel on veux accéder
    //Une liste des condtions à récupérer tel que :
    // array(arg1 => value1, arg2 => value 2, etc)
    //Il est possible de demander les conditions avec like aussi
    //Avec un exemple :
    // array( 'idClient' => 15, 'prenom' => 'Maxime')
    $query = "SELECT {$askSelect} FROM {$fromTable} WHERE 1 ";
    //Etape 1 : On génère la requête sql avec les arguments demandés :
    foreach ($cond as $key => $arg) {
        $query = "{$query} AND {$key} = :p_{$key} ";
    }
    foreach ($condLike as $key2 => $arg2) {
        $query = "{$query} AND {$key2} LIKE :p_{$key2} ";
    }
    if (!empty($specialCond)){
        $query = "{$query} AND {$specialCond}";
    }
    //Affectation des paramètres (Pour rappel les paramètres (p_arg) sont une sécuritée)
    $statement = $bdd->prepare($query);
    foreach ($cond as $key => $arg) {
        $para = ':p_'.$key;
        $statement->bindValue($para, $arg);
    }
    foreach ($condLike as $key => $arg) {
        $arg = $arg . '%';
        $para = ':p_'.$key;
        $statement->bindValue($para, $arg);
    }
    //var_dump($statement);
    //On réalise la requète et on renvoie le résultat
    $liste = null;
    if ($statement->execute()) {
        $liste = $statement->fetchALL(PDO::FETCH_OBJ);
        //On finie par fermer la ressource
    }
    $statement->closeCursor();
    return $liste;
}

function updateListe(PDO $bdd,$fromTable,Array $args,$idModif) {
    //Pour utiliser cette fonction il faut lui envoyer :
    //La bdd
    //Le(s) table au quel on veux accéder
    //Une liste des modifs à faire :
    // array(arg1 => modif1, arg2 => modif2, etc)
    //Avec un exemple :
    // array( 'nom' => Bourrier, 'prenom' => 'Maxime')
    //ET AUSSI il faut donner l'id de l'éllement à modife
    //var_dump($idModif);
    $query = "UPDATE {$fromTable} SET {$idModif} ";
    //Etape 1 : On génère la requête sql avec les arguments demandés :
    foreach ($args as $key => $arg) {
        $query = "{$query} , {$key} = :p_{$key} ";
    }
    $query = "{$query} WHERE {$idModif}";
    //Affectation des paramètres (Pour rappel les paramètres (p_arg) sont une sécuritée)
    $statement = $bdd->prepare($query);
    //$statement->bindValue(':p_id', $idModif);
    foreach ($args as $key => $arg) {
        $para = ':p_'.$key;
        $statement->bindValue($para, $arg);
    }
    //var_dump($statement);
    //On réalise l'update
    $statement->execute();
    $statement->closeCursor();
}

function getInfoUser($bdd, $user_id){
    // récupère les informations d'un utilisateur à partir de son identifiant, ainsi que les infos de sa ville

    $query = "SELECT * FROM user AS u, city AS c WHERE c.c_id = u.u_id";

// si on rentre pas quelque chose de vide ou égal à 0
    if (!empty($city_name)) {
        $query .= " AND u.u_id LIKE :u_id";
    }
    $user = null;
    $statement = $bdd->prepare($query);

    // pour afficher toute la liste
    if (!empty($city_name)) {
        $user_id = $user_id . '%';
        $statement->bindParam(':u_id', $user_id);
    }

    if ($statement->execute()) {
        $user = $statement->fetchAll(PDO::FETCH_OBJ);
        // Fermeture de la ressource
        $statement->closeCursor();
    }
    return $user;
}

function getCityById ($bdd) {
    // pour récupérer le NOM et uniquement le nom de la ville d'un utilisateur connecté
    if(!empty($bdd)) {
        $cities = getInfoUser($bdd, 1); // TODO : changer le 1 avec l'id de l'utilister
        if (!empty($cities)) {
            foreach ($cities as $city) {
                if ($city->c_id == 1){ // TODO : changer l'id et mettre l'id de la ville de l'utilisteur
                    return  $city->c_name;
                }
            }
        }
    }
}
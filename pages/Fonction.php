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

function insertListe(PDO $bdd,$toTable,Array $args) {
    //Pour utiliser cette fonction il faut lui envoyer :
    //La bdd
    //Le(s) table au quel on veux insérer
    //Une liste des insertion à faire :
    // array(arg1 => modif1, arg2 => modif2, etc)
    //Avec un exemple :
    // array( 'idClient' => 15, 'prenom' => 'Maxime')
    $tableValues = '';
    $values = '';
    foreach ($args as $key => $arg) {
        $tableValues = "{$tableValues},{$key}";
        $values = "{$values},:p_{$key}";
    }
    //On supprime la première virgule parasite
    $tableValues = substr($tableValues, 1);
    $values = substr($values, 1);
    //On construit le query
    $query = "INSERT INTO {$toTable}({$tableValues}) VALUES ({$values}) ";
    //Affectation des paramètres (Pour rappel les paramètres (p_arg) sont une sécuritée)
    $statement = $bdd->prepare($query);
    foreach ($args as $key => $arg) {
        $para = ':p_'.$key;
        $statement->bindValue($para, $arg);
    }
    //var_dump($statement);
    //On réalise l'insertion
    $statement->execute();
    $statement->closeCursor();
}
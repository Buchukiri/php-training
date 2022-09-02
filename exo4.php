<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 4</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 4</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link active" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

<?php

$array = [12, 65, 95, 41, 85, 63, 71, 64];

$arrayA = [12, "le", 95, 12, 85, "le", 71, "toi", 95, "la"];
$arrayB = [85, "toi", 95, "la", 65, 94, 85, "avec", 37, "chat"];
?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et retourne la chaîne de caractère HTML permettant d'afficher les valeurs du tableau sous la forme d'une liste.</p>
            <div class="exercice-sandbox">
            <?php


                function getHtmlFromArray(array $array) :string {
                    $list ="";
                    foreach($array as $index => $value) {
                        $list .= "<li>$index: $$value</li>"
                    }
                    return "<ul>$list</ul>"
                }

                echo getHtmlFromArray($arrayA);


            ?>

           


            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
            <div class="exercice-sandbox">

            <?php
            
            function getNumberPair(array $array):string {
                $list = "<ul>";
                foreach($array as $number) {
                    if ($number%2 ===0) {
                        $list .= "<li>".$number."</li>"
                    }
                }
                $list .="</ul>";
                return $list;
            }
            
            echo getNumberPair($arrayA)


            function getEvenNumberFromArray(array $array) :array {
                // $a =[];
                // foreach($array as $number) {
                //     if($number%2 ===0) {
                //         $a[] = $number
                //     }
                //     return $a
                return array_filter($array,fn($v) => $v%2 === 0);
            }

            echo getHtmlFromArray(getEvenNumberFromArray($array))
            ?>

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les entiers d'index pair</p>
            <div class="exercice-sandbox">

            <?php
            
            function getEvenInex(array $a):array {
                return array_filter($a,fn($k) => $k%2 === 0)
            }
            
            ?>

            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers. La fonction doit retourner les valeurs du tableau mulipliées par 2.</p>
            <div class="exercice-sandbox">


            <?php
            
            /**
             * Filter numeric values of the array and multiply them by 2.
             * 
             * @param array $array
             * @return array
             */

            function getValueMultiplyBy2(array $array):array {
                $newArray = [];
                foreach ($array as $value) {
                    if(is_numeric($value)) $newArray[] = $value * 2;
                }
                return $newArray
            }

            var_dump(getValueMultiplyBy2($arrayA))
            
            ?>



            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
            <div class="exercice-sandbox">

            
            <?php
            
            /**
             * Filter numeric values of the array and divided by the seconde parametre
             * 
             * @param array $array The list of values to be divided
             * @param integer $div The divider
             * @return array
             */

            function divideValuesBy(array $array, int $div):array {
                    return array_map(fn($v) =>$v/$div, array_filter($array, "is_numeric"))
                return $newArray
            }

            var_dump(divideValuesBy($arrayB,8))
            
            ?>

            
                
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers ou de chaînes de caractères et retourne le tableau sans doublons</p>
            <div class="exercice-sandbox">

              
            <?php
            
            /**
             * RClean array from duplicates values
             * 
             * @param array $array The list of values to be divided
             * @return array
             */

            function cleanArrayFromDuplicate(array $array):array {
                return array_unique($array)

                // $output =[];
                // foreach ($array as $value) {
                //     if(!in_array($value,$output)) 
                //     $output[] = $value
                // }
                // return $output;
            }

            var_dump(cleanArrayFromDuplicate($arrayA))
            
            ?>




                
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
            <div class="exercice-sandbox">

             <?php
            
            /**
             * Returns the  intersection of 2 arrays
             * 
             * @param array $array 
             * @param array $array 
             * @return array
             */

            function getArrayIntersection(array $array,array $arrayA):array {
                return array_intersect($array,$arrayA)
            }
            var_dump(doubleArray($arrayA,$arrayB))

            // OR

               function getArrayIntersection(array $array,array $arrayA):array {
                $a = [];
                foreach ($array as $value) {
                   if (in_array($value,$arrayA)) $a[$key] = $value; 
                    return $a;
                }
            }


            // OR
            return array_filter($array,fn($v) =>in_array($v,$arrayA));


            var_dump(getArrayIntersection($arrayA,$arrayB))



            
            ?>
                
            </div>
        </section>
                    
        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau des valeurs du premier tableau qui ne sont pas dans le second</p>
            <div class="exercice-sandbox">



             <?php
            
            /**
             * Return the values from the first array but not in the seconde one
             * 
             * @param array $a
             * @param array $b
             * @return array
             */
            
            
            function getArrayDIfference(array $a, array $b):array {
                return array_diff($a,$b)
            }

            var_dump(getArrayDIfference($arrayA,$arrayB))
            
            ?>

            </div>
        </section>

                    
        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Réécrire la fonction précédente pour lui ajouter 
                un paramètre booléen facultatif. Si celui-ci est à true, le tableau retourné sera sans doublons</p>
            <div class="exercice-sandbox">

            <?php
            
            /**
             * Return the values from the first array but not in the seconde one
             * 
             * @param array $a
             * @param array $b
             * @param bool $unique  Removes the duplicate from output
             * @return array
             */
            
      
           

            
            function getArrayDIfference(array $a, array $b, bool $unique = false):array {
                  $output = [];
            foreach ($a as $key => $value) {
                if(!in_array($value,$b)) $output[$key] = $value;
            }
            if($unique) return  cleanArrayFromDuplicate($output);
            
            return $output    
            }

            var_dump(getArrayDIfference($arrayA,$arrayB,true))
            
            ?>



            </div>
        </section>

            
        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
            <div class="exercice-sandbox">

             <?php
            
            /**
             * Return the values from the first array but not in the seconde one
             * 
             * @param array $a
             * @param array $b
             * @param bool $unique  Removes the duplicate from output
             * @return array
             */
            
      
           

            
            function getValuesFromArray(array $a, int $n) {
                return array_slice($a, 0, $n);
            }
 
            
            ?>

                
            </div>
        </section>
    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>
<?php
$pageTitle = "Introduction PHP - Exo 5";
$pageNumber = 5;
include 'includes/_header.php';
/**
 * Gives the HTML list from the given array. 
 *
 * @param array $array
 * @param string|null $classUl
 * @param string|null $classLi
 * @return string
 */
function getHtmlFromArray(array $array, string $classUl = null, string $classLi = null) :string {
    if ($classUl) $classUl = " class=\"$classUl\"";
    if ($classLi) $classLi = " class=\"$classLi\"";
    $valueToLi = fn($v) => "<li$classLi>$v</li>";
    return "<ul$classUl>".implode("", array_map($valueToLi, $array))."</ul>";
}

/**
 * Returns serie URL from id
 *
 * @param integer $idSerie
 * @return string
 */
function getSerieURL(int $idSerie) :string {
    return "?serie=$idSerie#";
}

/**
 * Returns Html to display a title
 *
 * @param integer $level 
 * @param string $content
 * @param string|null $classCss
 * @return string
 */
function getHtmlTitle(int $level, string $content, string $classCss = null):string {
    $classCss = $classCss ? " class=\"$classCss\"" : "";
    return "<h${level}${classCss}>$content</h$level>";
}

/**
 * returns a Html code for the given serie
 *
 * @param array $serie
 * @return string
 */
function getHtmlSerie(array $serie, bool $isFull = false):string {
    $html = "<a href=\"".getSerieURL($serie["id"])."\"><img src=\"".$serie["image"]."\" class=\"serie-img\"></a>";
    $html .= getHtmlTitle(2, "<a class=\"serie-lnk\" href=\"".getSerieURL($serie["id"])."\">".$serie["name"]."</a>", "serie-ttl");
    $html .= getHtmlTitle(3, "Créée par :");
    $html .= getHtmlFromArray($serie["createdBy"], "text-list", "text-list-item");
    $html .= getHtmlTitle(3, "Acteurs :");
    $html .= getHtmlFromArray($serie["actors"], "text-list", "text-list-item");
    if ($isFull) {
        $html .= getHtmlTitle(3,"L'anée de Creation :")."<p>".$serie["launchYear"]."</p>";
        $html .= getHtmlTitle(3,"Disponible sur :")."<p>".$serie["availableOn"]."</p>";
        // $html .= getHtmlTitle(3,"Styles :")."<p>".$serie["styles"]."</p>";
        // $html .= getHtmlFromArray($serie["styles"], "text-list", "text-list-item");
        
    }
    return $html;
}


            
// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>

        <section class="exercice">
            Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
            Les données sont accessibles dans la variable $series.
        </section>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis afficher l'ensemble des plateformes de diffusion des séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                    $platforms = [];
                    foreach ($series as $serie) {
                        // if (!in_array($serie["availableOn"], $platforms)) {
                            $platforms[] = $serie["availableOn"];
                        // }
                    }

                    // $platforms = array_map(fn($s) => $s["availableOn"], $series);

                    $platforms = array_unique($platforms);
                    sort($platforms);

                    echo getHtmlFromArray($platforms);
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis affichez l'ensemble des styles de séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                    $styles = [];
                    foreach ($series as $serie) {
                        foreach ($serie["styles"] as $style) {
                            $styles[] = $style;
                        }
                    }

                    // ---------------

                    $styles = array_unique(array_merge(...array_map(fn($s) => $s["styles"], $series)));

                    sort($styles);

                    echo getHtmlFromArray($styles);

                ?>
            </div>
        </section>

        <section class="exercice">
            <h2 class="exercice-ttl">Paramètre par valeur ou par référence</h2>
            <p class="exercice-txt">Passage d'un paramètre par valeur</p>
            <div class="exercice-sandbox">
                <?php

                $a = 5;

                function myFuncVal(int $x) :void {
                    $x += 2;
                }

                myFuncVal($a);

                var_dump($a);
                ?>
            </div>
            <p class="exercice-txt">Passage d'un paramètre par référence</p>
            <div class="exercice-sandbox">
                <?php

                $a = 5;

                function myFuncRef(int &$x) :void {
                    $x += 2;
                }

                myFuncRef($a);

                var_dump($a);
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Afficher la liste de toutes les séries avec l'image principale, le titre, l'équipe de création et la liste des acteurs</p>
            <p class="exercice-txt">L'image et le titre de la série sont des liens menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
            <p class="exercice-txt">Afficher une seule série par ligne sur les plus petits écrans, 2 séries par ligne sur les écrans intermédiaires et 4 séries par ligne sur un écran d'ordinateur.</p>
            <div class="exercice-sandbox">
                <?=getHtmlFromArray(array_map("getHtmlSerie", $series), "series", "serie")?>


                <!-- OR -->

                <!-- <?php

                // function getSerieURL(int $idSerie):string {
                //     return "?serie=$idSerie";
                // }
                // foreach ($series as $serie) {
                //     // var_dump($serie["image"],$serie["name"],$serie["createdBy",$serie["actors"]]);
                //     echo "<li class=\"series-item serie\">";
                //     echo "<a href=\"exo5.php?serie=".$serie["id"]."\"><img class=\"serie-img\" src=\"".$serie["image"]."\"></a>";
                //     echo "<h2 class=\"serie-ttl\"><a href=\"exo5.php?serie=".$serie["id"]."\">".$serie["name"]."</h2></a>";
                //     echo "<h3>Creée par :</h3>";
                //     echo getHtmlFromArray($serie["createdBy"]);
                //     echo "<h3>Acteurs :</h3>";
                //     echo getHtmlFromArray($serie["actors"]);
                //     echo "</li>";
                // };
            ?> -->
            </div>
        </section>


        <!-- QUESTION 4 -->
        <section id="question4" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série.</p>
            <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
            <div class="exercice-sandbox">

            <?php

                $isFound = false;
                if (isset($_GET["serie"])) {
                    foreach ($series as $serie) {
                       if ($_GET["serie"]==$serie["id"]) {
                            $isFound = true;
                            echo getHtmlSerie($serie,true);
                       };
                    };
                    if (!$isFound) {
                        echo "La serie est indisponible";
                    };
                };
            ?>
                
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Globaliser l'entête et le pied des pages de ce mini-site.</p>
            <p class="exercice-txt">S'assurer de conserver les titres des pages et l'affichage dynamique du menu.</p>
            <div class="exercice-sandbox">
    
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section id="question6" class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Créer un tableau listant les pages du site.</p>
            <p class="exercice-txt">Créer une fonction générant le code HTML du menu du site.</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>
        <?php
            include 'includes/_footer.php';
        ?>
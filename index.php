<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Appel service web</title>
        <meta charset='utf-8' />
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="normalize.css"/> 
        <link rel="stylesheet" href="ext/morris.js-0.5.1/morris.css">
        <script src="ext/morris.js-0.5.1/morris.js"></script>
        <link rel="stylesheet" href="ext/morris.js-0.5.1/examples/lib/example.css">
        <script src="ext/morris.js-0.5.1/examples/lib/example.js"></script>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">  
        <link rel="stylesheet" type="text/css" href="style.css"/>   
    </head>
    <body>
        <header>
            <h1>Service Web - page de récupération des datas</h1>
        </header>
        <main>

            <script type="text/javascript"><!--

                function retour() {
                    var selectElmt = document.getElementById("choixBis");
                    var data = selectElmt.options[selectElmt.selectedIndex].value;
                    $.ajax({
                        type: "GET",
                        url: "webServiceWindData.php",
                        data: 'data=' + data,           //envoi de la ville saisie par l'utilisateur
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (response) {
                            var WindData = response;
                            $('#graph').empty();      //vidage de la div graph  
                            /*$('#contenu').empty();
                            //$.each(WindData, function (index, WindData) {$('#contenu').append('<div class="data"><p>' + WindData.annee + '</p><p>' + WindData.mois + '</p><p>' + WindData.jour + '</p><p>' + WindData.heure + '</p><p>' + WindData.vent + '</p></div>');});   //ancien retour du service
                            $.each(WindData, function (index, WindData) {
                                var date = new Date(WindData.period);

                                $('#contenu').append('<div class="data"><p class="pdate">' + date.toLocaleDateString("fr-FR", {weekday: "long", year: "numeric", month: "long", day: "numeric"}) + '</p><p class="pdata">' + WindData.vent + '</p></div>');
                            });     //affichage d'un tableau de data
                            WindData = response;*/

                            Morris.Line({       //affichage du graphique de data
                              element: 'graph',
                              data: WindData,
                              xkey: 'period',
                              xLabelFormat: function (x) {
                                return new Date(x).toLocaleDateString("fr-FR", {year: "numeric", month: "long", day: "numeric"})},
                              xLabelAngle: 30,
                              ykeys: ['vent'],
                              labels: ['vent (m/s)'],
                              dateFormat: function (x) { return new Date(x).toLocaleDateString("fr-FR", {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric"})}
                            });
                        },
                        failure: function (msg) {
                            $('#contenu').empty();
                            console.log (msg);
                            $('#contenu').text(msg);
                        }
                    });
                };


            //--></script>

            <div id="graph"></div>           

            <div id="main">
                <div class="data" id="formulaire">
                    <select name="choixBis" id="choixBis">
                        <option value="11">Cognac</option>
                        <option value="2">Amiens</option>
                        <option value="29">Aurillac</option>
                        <option value="21">Belfort</option>
                        <option value="5">Biarritz</option>
                        <option value="3">Bordeaux</option>
                        <option value="30">Bourges</option>
                        <option value="10">Brest</option>
                        <option value="35">Caen</option>
                        <option value="36">Cherbourg</option>
                        <option value="26">Clermont-Ferrand</option>
                        <option value="12">Compiègne</option>
                        <option value="20">Dijon</option>
                        <option value="22">Grenoble</option>
                        <option value="13">Le Havre</option>
                        <option value="33">Le Mans</option>
                        <option value="6">Lille</option>
                        <option value="27">Limoge</option>
                        <option value="15">Lyon</option>
                        <option value="14">Marseille</option>
                        <option value="4">Montpellier</option>
                        <option value="18">Nancy</option>
                        <option value="8">Nantes</option>
                        <option value="23">Nice</option>
                        <option value="31">Orléans</option>
                        <option value="1">Paris</option>
                        <option value="7">Perpignan</option>
                        <option value="16">Reims</option>
                        <option value="34">Rennes</option>
                        <option value="37">Rouen</option>
                        <option value="19">Strasbourg</option>
                        <option value="28">Tarbes</option>
                        <option value="25">Toulouse</option>
                        <option value="32">Tours</option>
                        <option value="17">Troyes</option>
                        <option value="24">Valence</option>
                        <option value="9">Vannes</option>
                    </select>
                    <button onclick="javascript:retour();"> Cliquez ici </button>
                </div>

                <div id="contenu"></div>
            </div>
        </main>
        <footer>
            <p>Thibault Santonja</p>
        </footer>
    </body>
</html>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Appel service web</title>
        <meta charset='utf-8' />
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="normalize.css"/> 
        <link rel="stylesheet" type="text/css" href="style.css"/> 
        <link rel="stylesheet" href="ext/morris.css">
        <script src="ext/morris.js"></script>
        <link rel="stylesheet" href="ext/example.css">
        <script src="ext/example.js"></script>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">    
    </head>
    <body>
        <header>
            <h1>Service Web - page de récupération des datas</h1>
        </header>
        <main>

            <script type="text/javascript"><!--
                /*function testdate(timestamp_data) {
                    var annee = 2017;
                    var mois = 07;
                    var jour = 11;
                    var heure = 12;
                    var periodeA = new Date(annee, mois, jour, heure, 00, 00, 000);
                    periodeA = periodeA.getTime();
                    var periodeB = new Date(annee, mois, jour+5, heure, 00, 00, 000);
                    periodeB = periodeB.getTime();
                    var periodeC = new Date(annee, mois, jour+10, heure, 00, 00, 000);
                    periodeC = periodeC.getTime();
                    var periodeD = new Date(annee, mois, jour+15, heure, 00, 00, 000);
                    periodeD = periodeD.getTime();
                    var periodeE = new Date(annee, mois, jour+20, heure, 00, 00, 000);
                    periodeE = periodeE.getTime();

                    console.log(periodeA);


                    var timestamp_data = [
                     {"period": periodeA, "licensed": 10},
                     {"period": periodeB, "licensed": 11},
                     {"period": periodeC, "licensed": 13},
                     {"period": periodeD, "licensed": 12},
                     {"period": periodeE, "licensed": 9}
                    ];

                    Morris.Line({
                      element: 'graph',
                      data: timestamp_data,
                      xkey: 'period',
                      ykeys: ['licensed'],
                      labels: ['licensed'],
                      dateFormat: function (x) { return new Date(x).toDateString(); }
                    });
                };*/
                
                function retour() {
                    var selectElmt = document.getElementById("choixBis");
                    var data = selectElmt.options[selectElmt.selectedIndex].value;
                    $.ajax({
                        type: "GET",
                        url: "webServiceWindData.php",
                        data: 'data=' + data,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (response) {
                            var WindData = response;
                            $('#contenu').empty();
                            $.each(WindData, function (index, WindData) {$('#contenu').append('<div class="data"><p>' + WindData.annee + '</p><p>' + WindData.mois + '</p><p>' + WindData.jour + '</p><p>' + WindData.heure + '</p><p>' + WindData.vent + '</p></div>');});

                            Morris.Line({
                              element: 'graph',
                              data: response,
                              xkey: 'period',
                              ykeys: ['licensed'],
                              labels: ['licensed'],
                              dateFormat: function (x) { return new Date(x).toDateString(); }
                            });
                        },
                        failure: function (msg) {
                            console.log (msg);
                            $('#contenu').text(msg);
                        }
                    });
                };


            //--></script>

            <div id="graph"></div>
            
            <button onclick="javascript:testdate();"> Cliquez ici </button>            

            <div class="data">
                <div id="formulaire">
                    <select name="choixBis" id="choixBis">
                        <option value="11">Cognac</option>
                        <option value="1">Paris</option>
                        <option value="2">Amiens</option>
                        <option value="3">Bordeaux</option>
                        <option value="4">Montpellier</option>
                        <option value="5">Biarritz</option>
                        <option value="6">Lille</option>
                        <option value="7">Perpignan</option>
                        <option value="8">Nantes</option>
                        <option value="9">Vannes</option>
                        <option value="10">Brest</option>
                        <option value="12">Compiègne</option>
                        <option value="13">Le Havre</option>
                        <option value="14">Marseille</option>
                        <option value="15">Lyon</option>
                    </select>
                    <button onclick="javascript:retour();"> Cliquez ici </button>
                </div>

            </div>
            <div class="data">
                <p>Année</p>
                <p>Mois</p>
                <p>Jour</p>
                <p>Heure</p>
                <p>Data</p>
            </div>
            <div id="contenu"></div>

        </main>
        <footer>
            <p>Thibault Santonja</p>
        </footer>
    </body>
</html>

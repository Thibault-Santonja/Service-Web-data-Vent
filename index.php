<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Appel service web</title>
        <meta charset='utf-8' />
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="normalize.css"/> 
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
                    console.log($('#choixBis'));
                    $.ajax({
                        type: "GET",
                        url: "webServiceWindData.php",
                        data: 'data=' + data,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            var WindData = response;
                            $('#contenu').empty();
                            $.each(WindData, function (index, WindData) {$('#contenu').append('<div class="data"><p>' + WindData[0] + '</p><p>' + WindData[1] + '</p><p>' + WindData[2] + '</p><p>' + WindData[3] + '</p><p>' + WindData[4] + '</p></div>');});
                        },
                        failure: function (msg) {
                            console.log (msg);
                            $('#contenu').text(msg);
                        }
                    });
                };
            //--></script>

            <div class="data">
            
                <div id="formulaire">
                    <select name="choixBis" id="choixBis">
                        <option value="11">Cognac</option>
                        <option value="1">Paris</option>
                        <option value="10">Brest</option>
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
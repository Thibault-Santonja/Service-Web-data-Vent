<?php

header('Content-Type: application/json');


class WindData {
	protected $_annee;
	protected $_mois;
	protected $_jour;
	protected $_heure;
	protected $_vent;

	public function __construct($annee, $mois, $jour, $heure, $vent) {
		$this->_annee = $annee;
		$this->_mois = $mois;
		$this->_jour = $jour;
		$this->_heure = $heure;
		$this->_vent = $vent;
	}

	public function getYear() {return $this->_annee;}
	public function getMonth() {return $this->_mois;}
	public function getDay() {return $this->_jour;}
	public function getHour() {return $this->_heure;}
	public function getWind() {return $this->_vent;}
}




class WindDataEnMS {
	protected $_period;
	protected $_vent;

	public function __construct($ms, $vent) {
		$this->_period = $ms;
		$this->_vent = $vent;
	}

	public function getMS() {return $this->_period;}
	public function getWind() {return $this->_vent;}
}




class ListData {
	protected $_arrayData;

	public function __construct($liste_data) {$this->_arrayData = $liste_data;}
	public function getArray() {return $this->_arrayData;}
}


function getUrlContent($valeur){
	switch ($valeur) {
		case '2':			
			# Amiens : 389 224
			$x = 389;
			$y = 224;
			break;
			
		case '3':
			# Bordeaux : 287 501
			$x = 287;
			$y = 501;
			break;
			
		case '4':
			# Montpellier : 461 580
			$x = 461;
			$y = 580;
			break;
			
		case '5':
			# Biarritz : 249 582
			$x = 249;
			$y = 582;
			break;
			
		case '6':
			# Lille : 398 176
			$x = 398;
			$y = 176;
			break;
			
		case '7':
			# Perpignan : 435 625
			$x = 435;
			$y = 625;
			break;

		case '8':
			# Nantes : 254 372
			$x = 254;
			$y = 372;
			break;

		case '9':
			# Vannes : 210 347
			$x = 210;
			$y = 347;
			break;

		case '10':
			# Brest : 148 303
			$x = 148;
			$y = 303;
			break;

		case '11':
			# Cognac : 292 457
			$x = 292;
			$y = 457;
			break;

		case '12':
			# Compiègne : 415 247
			$x = 415;
			$y = 247;
			break;

		case '13':
			# Le Havre : 315 247
			$x = 315;
			$y = 247;
			break;

		case '14':
			# Marseille : 532 582
			$x = 532;
			$y = 582;
			break;

		case '15':
			# Lyon : 510 439
			$x = 510;
			$y = 439;
			break;

		case '16':
			#Reims : 451 255
			$x = 451;
			$y = 255;
			break;
		
		case '17':
			#Troyes : 459 307
			$x = 459;
			$y = 307;
			break;

		case '18':
			#Nancy : 528 277
			$x = 528;
			$y = 277;
			break;

		case '19':
			#Strasbourg : 590 281
			$x = 590;
			$y = 281;
			break;

		case '20':
			#Dijon : 503 358
			$x = 503;
			$y = 358;
			break;

		case '21':
			#Belfort : 567 335
			$x = 567;
			$y = 335;
			break;

		case '22':
			#Grenoble : 533 473
			$x = 533;
			$y = 473;
			break;

		case '23':
			#Nice : 604 551
			$x = 604;
			$y = 551;
			break;

		case '24':
			#Valence : 501 487
			$x = 501;
			$y = 487;
			break;

		case '25':
			#Toulouse : 367 574
			$x = 367;
			$y = 574;
			break;

		case '26':
			#Clermont-Ferrand : 435 450
			$x = 435;
			$y = 450;
			break;

		case '27':
			#Limoge : 359 448
			$x = 358;
			$y = 448;
			break;

		case '28':
			#Tarbes : 315 595
			$x = 315;
			$y = 395;
			break;

		case '29':
			#Aurillac : 407 499
			$x = 407;
			$y = 499;
			break;

		case '30':
			#Bourges : 402 381
			$x = 402;
			$y = 381;
			break;

		case '31':
			#Orléans : 383 338
			$x = 383;
			$y = 338;
			break;

		case '32':
			#Tours : 340 366
			$x = 340;
			$y = 366;
			break;

		case '33':
			#Le Mans : 320 331
			$x = 320;
			$y = 333;
			break;

		case '34':
			#Rennes : 253 321
			$x = 253;
			$y = 321;
			break;

		case '35':
			#Caen : 298 265
			$x = 298;
			$y = 265;
			break;

		case '36':
			#Cherbourg : 255 243
			$x = 255;
			$y = 243;
			break;

		case '37':
			#Rouen : 255 243
			$x = 347;
			$y = 255;
			break;

		default: 
			# Paris : 394 285
			$x = 394;
			$y = 285;
			break;
	}
	

	date_default_timezone_set('Europe/Paris');


	$url = 'http://www.meteociel.fr/modeles/gefs_table.php?x=' . $x . '&y=' . $y . '&run=0&ext=fr&mode=11&sort=0';		//création d'une variable contenant l'url de la page

	//initialisation d'une session
	$ch = curl_init();

	//execution   
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$data = curl_exec($ch);					//stockage du code source de la page dans une variable $data
	//$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	//verification d'erreur
	if (curl_errno($ch)) {
		$erreur = 'Error on cURL functions : ' . curl_error($ch);
		return json_encode($erreur);
	}
	else {
	    $data = str_split($data);        	//transformation de la variable data qui est au format texte, en format tableau
	    $i = 0;                             //variable permettant le parcourt du tableau $data
	    $k = 0;                             //variable correspondant à chaque ligne du tableau de data que l'on a récupéré et permettant de se déplacer verticalement dans le tableau créé
	    $l = 0;								//variable comptant le nombre de data récupérée sur une ligne et permettant de se déplacer horizontalement dans le nouveau tableau contenant les data interessante
	    $tmp = "";                          //permet de reconstituer chaque nombre sous forme chaine de caractère, que l'on transforme ensuite en nombre.
	    $flag = 0;                          //permettra de connaitre la fin du tableau de la page web, contenant la data
	    $sumData = 0;						//contient la somme de toute les data d'une ligne pour ensuite en faire la moyenne
	    $listWindData = array();			//tableau a de dimension stockant l'année, le mois, le jours, l'heure et la moyenne des vent 
	    $listWindDataEnMS = array();
	    while ($flag != 1) {				//le flag correspondant à la fin du tableau de data qui nous intéresse, tant que l'on est pas à la fin, on continu
	        $i++;
	        if (($data[$i] == "=") && ($data[$i+2] == "g") && ($data[$i+3] == "e") && ($data[$i+4] == "f") && ($data[$i+5] == "s") && ($data[$i+7] == ">"))   //si on trouve la class gefs, c'est que nous sommes dans le bon tableau, contenant toutes les datas sur les vents, qui nous intéresse donc on rentre dans le nouveau while
	            while ($flag != 1) {											//comme précédemment
	                if ($data[$i] == '<' && $data[$i+1] == 't' && $data[$i+2] == 'r' && $data[$i+3] == '>') {       //les balises <tr> correspondent à une nouvelle ligne du tableau
	                    for ($y=0; $y < $l-1; $y++) $sumData += $ligne[$y];   //sachant que l'on a fini la ligne précédente, on additionnne donc toute les datas récupérés de la ligne précédente
				        if ($k>1) {												//si k>1, cela signifie que l'on a sauté les deux premières lignes du tableau qui ne nous interessent pas


							//$temporaire = new WindData($annee, $mois, $jour, $heure, round((($sumData/($l-1))+0.0)*10)/10);
				        	//$temporaire = (array)$temporaire;
				        	//$arrayList[$k-2] = $temporaire;
				        	$dateMS = $annee . '-' . $mois . '-' . $jour;
				        	$temporaire = new WindDataEnMS((strtotime($dateMS)+$heure*3600)*1000, round((($sumData/($l-1))+0.0)*10)/10);
				        	$temporaire = (array)$temporaire;
				        	$listWindDataEnMS[$k-2] = $temporaire;

				        	/*$listWindData[$k-2][0] = $annee;					//stockage de la data à k-2 (car on saute les deux premières lignes inutiles) et à la colonne souhaitée
				        	$listWindData[$k-2][1] = $mois;
				        	$listWindData[$k-2][2] = $jour;
				        	$listWindData[$k-2][3] = $heure;
				        	$listWindData[$k-2][4] = round((($sumData/($l-1))+0.0)*10)/10;*/		//on fait la moyenne de la somme de data que l'on stock dans le tableau
				        }
	                    $k++;  													//on avance d'un ligne
	                    $sumData = 0;											//RAZ de la somme des datas puisque l'on est passé à une nouvelle ligne
	                    $l = 0;													//on est donc en début de ligne donc $l revient à 0
	                    $annee = ($data[$i+24] . $data[$i+25] . $data[$i+26] . $data[$i+27]) + 0;	//récupération de l'année de la ligne de data
	                    $mois = ($data[$i+29] . $data[$i+30]) + 0;				//récupération du mois de la ligne de data
	                    $jour = ($data[$i+32] . $data[$i+33]) + 0;				//récupération du jour de la ligne de data
	                    $heure = ($data[$i+35] . $data[$i+36]) + 0;				//récupération de l'heure de la ligne de data
	                }

	                if ($data[$i] == '<' && $data[$i+1] == 't' && $data[$i+2] == 'd' && $data[$i+4] == 'b' && $data[$i+5] == 'g'){   //les balises<td bd...> contiennent une data de prévision
	                    $i+=20;													//on saute les 20 caractères suivant correspondant à la couleur en hexadécimal
	                    while ($data[$i] != '<') {								//tant que l'on atteind pas le '<' de la fermeture de la balise </td> on reste dans la boucle (pour reconstituer les nombres)
	                        if ($data[$i] == '0' || $data[$i] == '1' || $data[$i] == '2' || $data[$i] == '3' || $data[$i] == '4' || $data[$i] == '5' || $data[$i] == '6' || $data[$i] == '7' || $data[$i] == '8' || $data[$i] == '9')					//on test si l'on récupère bien un chiffre
	                            $tmp = $tmp . $data[$i];						//on concatène le chiffre
	                        $i++;												//on continue d'avancer pour aller au chiffre suivant
	                    }
	                    $ligne[$l++] = $tmp + 0;								//transformation de tmp en entier et mise dans un tableau récupérant chaques datas de la ligne
	                    $tmp = "";												//RAZ de tmp
	                }

	                $i++;														//on avance dans le tableau contenant notre page web

	                if (($data[$i+1] == "<") && ($data[$i+2] == "/") && ($data[$i+3] == "t") && ($data[$i+4] == "a") && ($data[$i+5] == "b") && ($data[$i+6] == "l") && ($data[$i+7] == "e") && ($data[$i+8] == ">")) $flag = 1;	//quand on trouve la balise </table>, nous sommes à la fin du tableau dans la page qui nous intéresse
	            }
	    }
		//fermeture
		curl_close($ch);

		//$liste_tab_data	= new ListData($listWindData);
		//return json_encode($liste_tab_data->getArray());

		//$liste_obj_data = new ListData($arrayList);
		//return str_replace('*_', '', str_replace('\u0000', '', json_encode($liste_obj_data->getArray())));


		$liste_obj_data = new ListData($listWindDataEnMS);
		return str_replace('*_', '', str_replace('\u0000', '', json_encode($liste_obj_data->getArray())));

	}
}

/* "main" */

if (isset($_GET['data'])){
	$selection = $_GET['data'] + 0;
	echo getUrlContent($selection);
}
else
	echo getUrlContent(11);


?>
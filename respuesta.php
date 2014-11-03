
<?php
class Respuesta
{
	


	public function sendGet()
	{
		//url contra la que atacamos
		$ch = curl_init("http://localhost/rest/index.php/book");
		//a true, obtendremos una respuesta de la url, en otro caso, 
		//true si es correcto, false si no lo es
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//establecemos el verbo http que queremos utilizar para la petición
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		//obtenemos la respuesta
		$response = curl_exec($ch);
		// Se cierra el recurso CURL y se liberan los recursos del sistema
		curl_close($ch);
		if(!$response) {
		    return false;
		}else{
			var_dump($response);
		}
	}

	public function sendPost($aupo,$tipo,$ispo)
    {
        //datos a enviar
        $data = array("autor" => $aupo, "titulo"=> $tipo,"isbn"=> $ispo);
        //url contra la que atacamos
        $ch = curl_init("http://localhost/rest/index.php/book");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if(!$response) {
            return false;
        }else{
            var_dump($response);
        }
    }

        public function sendPut($idp,$tipu,$aupu,$ispu)
    {
        //datos a enviar
        $data = array("autor" => $aupu , "isbn" => $ispu , "titulo" => $tipu , "id" => $idp);
        //url contra la que atacamos
        $ch = curl_init("http://localhost/rest/index.php/book");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if(!$response) {
            return false;
        }else{
            var_dump($response);
        }
    }


    public function sendDelete($id)
    {
        //url contra la que atacamos
        $ch = curl_init("http://localhost/rest/index.php/book/$id");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        //enviamos el array data
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if(!$response) {
            return false;
        }else{
            var_dump($response);
        }
    }

	

}

$curl = new Respuesta();

if ($_POST[read]) {
    $curl->sendGet();
}


if ($_POST[create]) { 
    $tic = $_REQUEST['name'];
    $auc = $_REQUEST['autor'];
    $isc = $_REQUEST['isbn'];
    $curl->sendPost($auc,$tic,$isc);
    header('Location: asd.html');
}


if ($_POST[update]) {
    $idu = $_REQUEST['id'];
    $tiu = $_REQUEST['titulo'];
    $auu = $_REQUEST['autor'];
    $isu = $_REQUEST['isbn'];
    $curl->sendPut($idu,$tiu,$auu,$isu);
    header('Location: asd.html');
}


if ($_POST[delete]) {
    $ids = $_REQUEST['id'];
    $curl->sendDelete($ids);
    header('Location: asd.html');
}

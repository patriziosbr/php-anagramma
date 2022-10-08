

<!-- # TECH TEST

## Obiettivo
Verificare che un anagramma di una stringa sia contenuto in un'altra stringa.

## Task
Creare una classe che abbia un metodo anagramma che accetti due stringhe.
public function anagramma(string $needle, string $haystack): boolean {}

Il metodo deve controllare che la stringa $needle sia un qualsiasi
anagramma dell'$haystack.
Il metodo deve restituire true se si tratta di un anagramma,
false viceversa.

Assumi che:
 - Il codice sia sviluppato preferibilmente in PHP.
 - $needle sia una stringa di lunghezza massima di 1024 caratteri.
 - $haystack sia una stringa di lunghezza massima di 1024 caratteri.
 - Non ci siano funzioni native che effettuino l'anagramma di una stringa.
 - Il controllo sia case-insensitive.

### Esempio
Date due stringhe A = "abc" e B = "itookablackcab" lo script stamperà a video
"vero", poiché anagrammando A si può trovare una occorrenza di "cab" nella
stringa B. -->

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// 2.a - $needle sia una stringa di lunghezza massima di 1024 caratteri -> case1(se la stringa è superiore a 1024 false).
// 3.a - $haystack sia una stringa di lunghezza massima di 1024 caratteri.

function anagramma($needle, $haystack) {

    // - Il controllo sia case-insensitive.
    $needle = strtolower($needle);
    $haystack = strtolower($haystack);

    // FORSE DEVO TOGLIERE TUTTI I CARATTERI SPECIALI . , / E LASCIARE SOLO LETTERE

    // se la stringa è superiore a 1024 false da mettere a 1024
    if(strlen($needle) > 1024 || strlen($haystack) > 1024) {
       return 'FALSE - too long';
    } else {
        // return 'TRUE - go ahead';
        $fullStringLength = strlen($needle);
        $singleCharLength = strlen(count_chars($needle, 3));
        
        function printCharMostRepeated($needle) {
            if (!empty($needle))
            {
                $max = 0;
                foreach (count_chars($needle, 1) as $key => $val)
                    if ($max < $val) {
                        $max = $val;
                        $i = 0;
                        unset($letter);
                        $letter[$i++] = chr($key);
                    } else if ($max == $val)
                        $letter[$i++] = chr($key);
                if (count($letter) === 1){
                    'The character the most repeated is "'.$letter[0].'"';
                    return $letter[0];
                }else if (count($letter) > 1) {
                    'The characters the most repeated are : ';
                    $count = count($letter);
                    $arrRepetedChar = array();
                    foreach ($letter as $key => $value) {
                        $countedLetter = substr_count($needle, $value);
                        $arrRepetedChar[] = $countedLetter;
                        //echo '"'.$value.'"';
                        //echo ($key === $count - 1) ? '.': ', ';
                    }
                    return $arrRepetedChar; //genero la parte sotto della divisione es: 2!.2!
                }
            } else {
                echo 'value passed to '.__FUNCTION__.' can\'t be empty';
            }
        }
        $letters = printCharMostRepeated($needle);

        // $letter è un array vuol dire che ci sono 2 o + lettere ripetute else una lettera ripetuta molte volte
        if(is_array($letters)) {
            //print_r($letters); //output Array ( [0] => 2 [1] => 2 )
            function fattoriale($num){
                $res = 1;
                for ($i=1;$i<=$num;$i++) $res=$res*$i;
                return $res;
            }
            foreach ($letters as $key => $countedLetter) {
                $fattorialeTemp = fattoriale($countedLetter);
                $fattorialeBottom = $fattorialeTemp*$fattorialeTemp;
            }
            $fattorialeBottom;
            $fattorialeTop = fattoriale($fullStringLength);
            $resultFattoriale = $fattorialeTop/$fattorialeBottom;
            return $resultFattoriale.'pippo'; //return da levare
        } else {
            $countOfRepeatedChar = substr_count($needle, $letters) + 1; //aggiungo uno per far partire il fattoriale dall'indice giusto nel caso sono tutte diverse l'indice è già uno (per il +1)
            function fattorialeSimple($countOfRepeatedChar, $fullStringLength){
                $res = 1;
                for ($i=$countOfRepeatedChar; $i<=$fullStringLength; $i++) {
                    $res=$res*$i;
                }
                return $res.'pluto';
            }
            $resultFattorialeSimplified = fattorialeSimple($countOfRepeatedChar, $fullStringLength);
            return $resultFattorialeSimplified; //return da levare
        }
        

        // $needleArr = [];
        //se la stringa non è presente aggiungila
        // while(!in_array($needle, $needleArr)) {
        //     $needleArr[] = str_shuffle($needle);
        // }
        // return $needleArr;
    }
}

echo anagramma("farmacia", "pippo");
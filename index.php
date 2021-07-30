<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcijos PHP</title>
</head>
<body>
    <?php
    /*1. Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;*/
    echo "<h3>Pirma užduotis</h3>";

    function textPrint(string $string){
        echo "<h1>$string</h1>";
    };

    textPrint("Sveiki visi!");

    echo "<hr>";
    
    /*2. Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, 
    o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;*/
    echo "<h3>Antra užduotis</h3>";

    function textPrintTagNumber(string $string, int $tagNumber = 1){
        echo "<h$tagNumber>$string</h$tagNumber>";
    };

    textPrintTagNumber("Sveiki visi!", 4);
    
    echo "<hr>";
    
    /*3. Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. 
    Raides palikite. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu 
    (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo patobulintą (jeigu reikia) 
    uždavinio funkciją ir preg_replace_callback();*/
    echo "<h3>Trečia užduotis</h3>";

    //ABSOLIUCIAI NESUPRATAY, KĄ TA FUNCKCIJA DARO.

    echo md5(time());

    function randomText(string $string){
        echo "<h1>".md5(time())."</h1>";

    };

    $text = "April fools day is 04/01/2002\n";
    $text.= "Last christmas was 12/24/2001\n";

    function next_year($matches){
        return $matches[1].($matches[2]+1);
    }
    echo preg_replace_callback(
            "|(\d{2}/\d{2}/)(\d{4})|",
            "next_year",
            $text);

    echo "<hr>";
        
    /*4. Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos 
    (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;*/   
    echo "<h3>Ketvirta užduotis</h3>";

    function dalybaBeLiekanos(int $skaicius){
        $counter = 0;
        for ($i=2; $i < $skaicius; $i++) { 
            if ($skaicius % $i == 0) {
                $counter++;
            };
        }
        return $counter;
    };

    $result1 = dalybaBeLiekanos(15);

    echo $result1;

    echo "<hr>";

    /*5. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77.
    Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.;*/   
    echo "<h3>Penkta užduotis</h3>";

    $array33 = [];

    for ($i=0; $i < 100; $i++) { 
        $randomNumber = rand(33, 77);
        $array33[] = $randomNumber;
    };

    print_r($array33);

    echo "<hr>";

    function masyvoDalikliuSkaicius($array) {
        $counterArr = count($array);
        for ($i=0; $i < $counterArr; $i++) { 
            $dalikliuSk = dalybaBeLiekanos($array[$i]);
            $tempArr = array($dalikliuSk,  $array[$i]);
            $array[$i] = $tempArr;
        };
        sort($array);
        return $array;
    };

    $editedArray =  masyvoDalikliuSkaicius($array33);

    print_r($editedArray);

    echo "<hr>";

    /*6. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. 
    Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.*/  
    echo "<h3>Šešta užduotis</h3>";

    $array333 = [];

    for ($i=0; $i < 100; $i++) { 
        $randomNumber = rand(333, 777);
        $array333[] = $randomNumber;
    };

    function masyvoDalSkaiciusBePirminiu($array) {
        $newArray = masyvoDalikliuSkaicius($array);
        print_r($newArray);
        echo "<hr>";
        $counterArray = count($newArray);
        $editedArr = [];
        for ($i=0; $i < $counterArray; $i++) { 
            if ($newArray[$i][0] != 0) {
                $editedArr[] = $newArray[$i];
                continue;
            };
        };
        return $editedArr;
    };

    print_r(masyvoDalSkaiciusBePirminiu($array333));
    echo "<hr>";
    /*7. Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, 
    elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą 
    kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;*/  
    echo "<h3>Septinta užduotis</h3>";
    function createArray($elementNumber){
        $emptyArray = [];
        for ($i=0; $i < $elementNumber; $i++) { 
            $random = rand(0, 10);
            $emptyArray[$i] = $random;
        };
        return $emptyArray;
    };

    $arr = [];

    $arr = createArray(rand(10, 20));

    print_r($arr);

    echo "<hr>";

    $counter = count($arr);

    $lastArray = [];

    $lastArray = createArray(rand(10, 30));

    $counter1 = count($lastArray);

    $lastArray[count($lastArray)] = 0;

    $arr[$counter] = $lastArray;

    print_r($arr);


    
    ?>
</body>
</html>
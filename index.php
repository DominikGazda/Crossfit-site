<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
    <title>Crossfit Mielec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <script type="text/javascript" src="js/lightbox-plus-jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Basic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


</head>
<body data-spy="scroll" data-target="#paseknawigacji">
  
<!-------------------------------------startowa-------------------------------->
<div id="startowa">
    <!-------------------------nawigacja---------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"><img src="img/play.svg" alt="play"/><span> CROSSFIT    </span><span>Mielec</span></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#paseknawigacji">
        <span class="navbar-toggler-icon"></span>
        </button>
     <div class="collapse navbar-collapse" id="paseknawigacji">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="#onas">O nas</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="#opis">Opis zajęć</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="#galeria">Galeria</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="#kadra">Kadra</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="#trening">Trening</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#Cennik">Cennik</a>
            </li>
              <li class="nav-item">
            <a class="nav-link" href="#contact">Kontakt</a>
            </li>
         </ul>    
    </div>
    </nav>
    
     <!-------------------------nawigacjastop------------------------>
    
  <!--- ----------------------------------landingpage------------------------------> 
<div class="landing">
    <div class="startowa-wrap">
        <div class="startowa-inner">
          
        </div>
    </div>
</div>
    <div class ="caption text-center">
    <h1>Crossfit Mielec</h1>
    <h2>Nowy wymiar sportu</h2>
      
        <!-- -------------------MODAL OKNO---------------------------------------->
         <?php
             include 'baza.php';
             if(isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['email'])&&isset($_POST['phone']))
             {
                $imie=$_POST['imie'];
                $nazwisko=$_POST['nazwisko'];
                $login=$_POST['login'];
                $password=$_POST['password'];
                $email=$_POST['email'];
                $tel=$_POST['phone'];
             
             $zapytanie="INSERT INTO crossfit VALUES('','$imie','$nazwisko','$login','$password','$email','$tel')";
             $wynik=mysqli_query($polaczenie,$zapytanie);
            
             }
             mysqli_close($polaczenie);
            ?>
        
        <?php 

   include("baza.php");

   if (isset($_POST['login']) && isset($_POST['password'])){	   
			$user=$_POST['login'];
            $pwd=$_POST['password'];
            
            $user=htmlentities($user);
            $pwd=htmlentities($pwd);      
       
			$query="SELECT login FROM crossfit WHERE login='$user';";
            $query2="SELECT haslo FROM crossfit WHERE login='$user';";
            $query3="SELECT imie FROM crossfit WHERE login='$user';";
			$result=mysqli_query($polaczenie,$query);
			$result2=mysqli_query($polaczenie,$query2);
            $result3=mysqli_query($polaczenie,$query3);
            $passwd=mysqli_fetch_assoc($result2); 
			$imie=mysqli_fetch_assoc($result3);
			if(mysqli_num_rows($result)==0){
			echo "<span style='color:red'>Taka nazwa użytkownika nie istnieje</span>";  
			}
                else if($passwd['haslo'] != $_POST['password']){
				echo "<br><span style='color:red'>Nieprawidlowe haslo. Sprobuj ponownie</span>";
					}
					else{
						$_SESSION["imie"] = $imie['imie'];
                        $_SESSION["zalogowano"]= true;
                       
						}
        
	   } 
   ?>
        
                <?php
  
            if (isset($_SESSION["zalogowano"])){
                echo '<div class="col-md-12 text-center">';
                 echo "<h3>Cześć ".$_SESSION["imie"]. "</h3>";
                echo '</div>';
                echo '<form action="index.php" method="POST">';
                echo '<button type="submit" name="submit" id="submit" class="btn btn-outline-light btn-lg2" data-toggle="modal">WYLOGUJ SIĘ</button>';
                echo '</form>';
                if(isset($_POST['submit'])){
                    session_destroy();
                    header("Refresh:0");
        }
            }
        else
        {
            echo '<h3>Dołącz do nas !</h3>';
             echo '<button type="button" name="login" id="login" class="btn btn-outline-light btn-lg" data-toggle="modal" data-target="#loginModal">ZALOGUJ SIĘ</button>';
echo '<button type="button" name="login" id="register" class="btn btn-outline-light btn-lg" data-toggle="modal" data-target="#registerModal">REJESTRACJA</button>';
echo '<br/>';
echo '<a class="btn btn-primary btn-circle btn-xl" href="#onas"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>';
        }
        
      
            ?>
    </div>

    
 

<!--- ------------------------------landingpagestop------------------------------>  
    </div>
<!--- ----------------------------------startowastop-----------------------------> 
<!--- ----------------------------------o nas -------------------------------->
    <div id="onas" class="offset">
        <div class="col-12 narrow text-center">
        <h1>WITAJ W BOXIE CROSSFIT MIELEC</h1>
        </div>
        <div class="row text-center">
        <div class="col-md-6">
        <img src="img/box2.jpg" class="img-fluid" alt="box">
        </div>
        <div class="col-md-6">
        <p class="pierwszy">Zapraszamy do wspólnego ćwiczenia dla Twojego zdrowia ! Z nami: <br>
            -Spalisz tkankę tłuszczową<br>
            -Zbudujesz mięśnie<br>
            -Poprawisz funkcjonowanie układu krążenia co wpływa na lepszą odporność<br>
            -Zapanujesz nad stresem i lękami<br>
            -Poprawisz pewność siebie i własną samoocenę<br>
            -Wspomożesz procesy myślowe i rozwojowe mózgu ułatwiając skupienie się i uczenie <br>
            -Poprawisz humor i poziom dopaminy (hormonu szczęścia)<br> </p>         
        
            </div>
        </div>
        <div class="row text-center">
        <div class="col-md-6">
        <p class="drugi">Sportowy i zdrowy styl życia to nasze powołanie. Naszym celem jest stworzenie
            prawdziwej CrossFitową atmosferę: rodzinną,przyjazną oraz zaangażowaną.<br>
            Przyjdź do nas na pierwszy darmowy trening i zobacz jak wyglądają nasze zajęcia. Osiągnij razem z nami pełnię swojego potencjału i zdobądź pewność siebie! </p>
        </div>
        <div class="col-md-6">
     <img src="img/box.jpg " alt="box" class="img-fluid">           
        
            </div>
        </div>
     </div>
        


<!--- ----------------------------opis zajec --------------------------------------->   
       <div id="opis">
           
           <div class="fixed-background">
               
               <div class="row dark text-center">
                   
                    <div class="col-12">
                        <h3 class="heading">Co możesz u nas trenować ?</h3>
                        <div class="heading-underline"></div>
                    </div>
                   <div class="col-12 text-center">
                   <h3>Ćwiczenia z obciążeniem własnego ciała</h3>
                   </div>
                 <div class="col-md-4">
                        <h3>Gimnastyka</h3>
                     <div class="feature">
                         <img src="img/stretching.svg" alt="rozciaganie">
                     </div>
                <p class="lead">Zwinność oraz gibkość</p>
                   </div>
                      <div class="col-md-4">
                        <h3>Street workout</h3>
                     <div class="feature">
                         
                        <img src="img/street.png" alt="street">
                     </div>
                <p class="lead">Koordynacja oraz równowaga</p>
                   </div>
                      <div class="col-md-4">
                        <h3>Kalistenika</h3>
                     <div class="feature">
                         
                        <img src="img/kalistenika.png" alt="kalistenika">
                     </div>
                <p class="lead">Umiejętność panowania nad własnym ciałem</p>
                   </div>
                </div>
               <div class="row dark text-center">
                <div class="heading-underline"></div>
                        
                   <div class="col-12 text-center">
                   <h3>Ćwiczenia z ciężarami</h3>
                   </div>
                 <div class="col-md-4">
                        <h3>Kettlebell</h3>
                     <div class="feature">
                         <img src="img/kettle.png" alt="kettle">
                     </div>
                <p class="lead">Intensywny trening całego ciała</p>
                   </div>
                      <div class="col-md-4">
                        <h3>Dwubój olimpijski</h3>
                     <div class="feature">
                         
                        <img src="img/dwuboj.png" alt="dwuboj">
                     </div>
                <p class="lead">Rwanie oraz podrzut sztangi</p>
                   </div>
                      <div class="col-md-4">
                        <h3>Trójbój siłowy</h3>
                     <div class="feature">
                        <img src="img/deadlift.png" alt="deadlift">
                     </div>
                <p class="lead">Przysiad, wyciskanie leżąc oraz martwy ciąg</p>
                   </div>
                </div>
                <div class="row dark text-center">
                <div class="heading-underline"></div>
                        
                   <div class="col-12 text-center">
                   <h3>Ćwiczenia wydolnościowe</h3>
                   </div>
                 <div class="col-md-4">
                        <h3>Bieganie</h3>
                     <div class="feature">
                         <img src="img/run.png" alt="bieganie">
                     </div>
                <p class="lead">Obniża ciśnienie oraz poprawia samopoczucie</p>
                   </div>
                      <div class="col-md-4">
                        <h3>Rower</h3>
                     <div class="feature">
                         
                        <img src="img/rower.png" alt="rower">
                     </div>
                <p class="lead">Pomaga w zwalczaniu bólów kręgosłupa</p>
                   </div>
                      <div class="col-md-4">
                        <h3>Skakanka</h3>
                     <div class="feature">
                         
                        <img src="img/skakanka.png" alt="skakanka">
                     </div>
                <p class="lead">Poprawia kondycje oraz wyrabia sylwetkę</p>
                   </div>
                </div>
            
                <div class="fixed-wrap">
                <div class="fixed">
          
        </div>
    </div>
</div>
    </div>
    <!--- ----------------------------------galeria -------------------------------->
                         
   <div id="galeria" >
       <canvas id="canvas" style="position:relative; top:0;left:0; width:100%;z-index -999!important;" > </canvas>
        <div class="jumbotron">
            
            <div class="narrow">
                   
                <div class="col-12">
                <h3 class="heading">Galeria</h3>
                <div class="heading-underline"></div>
                
                </div>
            
            <div class="row text-center">
                            

                <div class="col-md-4">
                   
                    <div class="feature">
                       <a href="img/cross1big.jpg" data-lightbox= "crossfitgaleria"> <img src="img/cross1.jpg" alt="cross1" class="img-fluid"></a>
                    </div>
                
                </div>
                 <div class="col-md-4">
                    <div class="feature">
                        <a href="img/cross2big.jpg" data-lightbox="crossfitgaleria"> <img src="img/cross2.jpg" alt="cross2" class="img-fluid"></a>
                    </div>
                
                </div>
                 <div class="col-md-4">
                    <div class="feature">
                        <a href="img/cross3big.jpg" data-lightbox="crossfitgaleria"> <img src="img/cross3.jpg" alt="cross3" class="img-fluid"></a>
                    
                    </div>
                
                </div>
                  <div class="col-md-4">
                    <div class="feature">
                        <a href="img/cross4big.jpg" data-lightbox="crossfitgaleria"><img src="img/cross4.jpg" alt="cross4" class="img-fluid"></a>
                    </div>
                
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <a href="img/cross5big.jpg" data-lightbox="crossfitgaleria"><img src="img/cross5.jpg" alt="cross5" class="img-fluid"></a>
                    </div>
                
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <a href="img/cross6big.jpg" data-lightbox="crossfitgaleria"><img src="img/cross6.jpg" alt="cross6" class="img-fluid"></a>
                    </div>
                </div>
                                
            </div>
            </div>
        </div>
               
                           
    </div>
                

<!--- ------------------------------kadra --------------------------------------->   
    <div id="kadra" class="offsetkadra">
    <div class="col-md-12 text-center">
    <h1>Kadra</h1>
        </div>
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
       <div class="col-md-12 kadra">
               <div class="row">
               <div class="col-md-6 text-center">
                   <img src="img/trener1.jpg" alt="trener1">
                   </div>
                   <div class="col-md-6">
                   <blockquote> 
                       Ukończył Akademię Wychowania Fizycznego w Anglii w Norwich. Przez wiele lat grający w piłkę nożną zawodowo w Anglii oraz w Polsce, a teraz jeden z czołowych i najbardziej rozpoznawalnych zawodników CrossFit w Kraju. Od wielu lat związany z branżą sportową jako Instruktor zajęć grupowych oraz Trener Personalny. Swoje doświadczenie zawodowe zdobywał uczestnicząc w wielu kursach w kraju i za granicą. CrossFit jest jego największą pasją, dlatego dąży do tego, aby być najlepszym trenerem dla swoich podopiecznych i to go motywuje do dalszego rozwoju. W tej kwestii jest bezkompromisowy! Swoją popularność trenerską zawdzięcza przede wszystkim wrodzonym umiejętnościom dydaktycznym.
                       <ul>
                       <li>Certyfikat CrossFit Level 1</li>
                           <li>Certyfikat Instruktora Olympic Weightlifting</li>
                           <li>Level 2 NVQ Diploma in Personal Training</li>
                           <li>Level 3 NVQ Diploma in Personal Training</li>
                           <li>Level 2 in Strength & Conditioning</li>
                       </ul>
                       <hr class="kadra-hr">
                       <cite>&#8212; - Artur Biega, coach</cite>
                    </blockquote>
                   </div>
               
               </div>
               
               </div>
    </div>
    <div class="carousel-item">
       <div class="col-md-12 kadra">
               <div class="row">
               <div class="col-md-6 text-center">
                   <img src="img/trener2.png" alt="trener2">
                   </div>
                   <div class="col-md-6">
                   <blockquote> 
                      Jest absolwentem Krakowskiej Akademii Wychowania Fizycznego ze Specjalnością Wad Postaw. Trener CrossFit z certyfikatem CrossFit Level 1. Do momentu ukończenia studiów jego życie kręciło się wokół łyżwiarstwa szybkiego. Reprezentował nasz kraj na Zimowych Igrzyskach Olimpijskich w Vancouver. Przez 10 lat był reprezentantem kadry narodowej w łyżwiarstwie szybkim. Dwa lata spędził w Niemczech szkoląc się i trenując w KIA SPEED SKATING ACADEMY. Kończąc jazdę na łyżwach wiedział, że będzie się spełniał w dziedzinie CrossFitu. Jest wielkim pasjonatem tej dyscypliny i bardzo wierzy w ten właśnie system treningowy. Uważa, że nie ma nic lepszego. Swoją pasją zaraża ludzi, a to daje mu olbrzymią satysfakcję.
                       <ul>
                          <li>Certyfikat CrossFit Level 1</li>
                           <li>Certyfikat Instruktora Olympic Weightlifting</li>
                           <li>Level 2 NVQ Diploma in Personal Training</li>
                           <li>Level 3 NVQ Diploma in Personal Training</li>
                           <li>Level 2 in Strength & Conditioning</li>
                       </ul>
                       <hr class="kadra-hr">
                       <cite>&#8212; - Andrzej Biegacz, head coach</cite>
                    </blockquote>
                   </div>
               
               </div>
               
               </div>
      </div>
    <div class="carousel-item">
       <div class="col-md-12 kadra">
               <div class="row">
               <div class="col-md-6 text-center">
                   <img src="img/trener3.png" alt="trener1">
                   </div>
                   <div class="col-md-6">
                   <blockquote> 
                       Ukończył Akademię Wychowania Fizycznego w Anglii w Norwich. Przez wiele lat grający w piłkę nożną zawodowo w Anglii oraz w Polsce, a teraz jeden z czołowych i najbardziej rozpoznawalnych zawodników CrossFit w Kraju. Od wielu lat związany z branżą sportową jako Instruktor zajęć grupowych oraz Trener Personalny. Swoje doświadczenie zawodowe zdobywał uczestnicząc w wielu kursach w kraju i za granicą. CrossFit jest jego największą pasją, dlatego dąży do tego, aby być najlepszym trenerem dla swoich podopiecznych i to go motywuje do dalszego rozwoju. W tej kwestii jest bezkompromisowy! Swoją popularność trenerską zawdzięcza przede wszystkim wrodzonym umiejętnościom dydaktycznym.
                       <ul>
                       <li>Certyfikat CrossFit Level 1</li>
                           <li>Certyfikat Instruktora Olympic Weightlifting</li>
                           <li>Level 2 NVQ Diploma in Personal Training</li>
                           <li>Level 3 NVQ Diploma in Personal Training</li>
                           <li>Level 2 in Strength & Conditioning</li>
                       </ul>
                       <hr class="kadra-hr">
                       <cite>&#8212; - Rafał Kafar, coach</cite>
                    </blockquote>
                   </div>
               
               </div>
               
               </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
     </div>   
<!--- --------------------------------Trening-------------------------------------->
    
    <div id="trening" class="offset4">
        <div class="col-12 narrow text-center">
                  <?php
  
            if (isset($_SESSION["zalogowano"])){
                include 'skrypt.php';
                echo '<h1>Twój darmowy tygodniowy trening</h1>';
echo '<br><h2>Dziś jest ';
    dayOfWeek(); 
echo '</h2><br>';
echo '<div class="table-responsive">';
echo '<table id="tablePreview" class="table table-bordered">';
echo '<thead>';
echo '<tr>';
echo '<th>#</th>';
echo '<th>Poniedziałek</th>';
echo '<th>Wtorek</th>';
echo '<th>Środa</th>';
echo '<th>Czwartek</th>';
echo '<th>Piątek</th>';
echo '<th>Sobota</th>';
echo '<th>Niedziela</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
echo '<th scope="row">1</th>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '<td>Rozgrzewka<br>10 min</td>';
echo '</tr>';
echo '<tr>';
echo '<th scope="row">2</th>';
echo '<td>Burpees<br>10x3</td>';
echo '<td>Tureckie wstawanie<br>10x4</td>';
echo '<td>Sprawle<br>15x4</td>';
echo '<td>Wskakiwanie na platformę<br>15x5</td>';
echo '<td>Squat<br>10x4</td>';
echo '<td>Push-up<br>10x4</td>';
echo '<td>Brzuszki<br>15x4</td>';
echo '</tr>';
echo '<tr>';
echo '<th scope="row">3</th>';
echo '<td>Russian twist<br>15x4</td>';
echo '<td>Sit-up<br>15x4</td>';
echo '<td>Krokodylki<br>20x3</td>';
echo '<td>Tureckie wstawanie<br>10x4</td>';
echo '<td>Sprawle<br>15x4</td>';
echo '<td>Krokodylki<br>20x3</td>';
echo '<td>Sprawle<br>15x4</td>';
echo '</tr>';
echo '<tr>';
echo '<th scope="row">4</th>';
echo '<td>Push-up<br>10x4</td>';
echo '<td>Squat<br>15x3</td>';
echo '<td>Inverted rows<br>15x4</td>';
echo '<td>Push-up<br>10x4</td>';
echo '<td>Russian twist<br>15x4</td>';
echo '<td>Wskakiwanie na platformę<br>15x5</td>';
echo '<td>Push up<br>10x4</td>';
echo '</tr>';
echo '<tr>';
echo '<th scope="row">5</th>';
echo '<td>Squat<br>10x4</td>';
echo '<td>Single unders<br>50x3</td>';
echo '<td>Push-up<br>15x4</td>';
echo '<td>Inverted rows<br>15x4</td>';
echo '<td>Push-up<br>10x4</td>';
echo '<td>Sit-up<br>15x4</td>';
echo '<td>Single unders<br>50x3</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '<p class="instrukcja">15x4 - oznacza 15 powtórzeń w 4 seriach<br>';
echo 'Ćwiczenia przystosowane są do wykonywania w domu<br>';
echo 'Jeżeli nie wiesz jak wykonać jakieś ćwiczenie prawidłowo pokażemy Ci w naszym boxie</p>';
echo '';
                
                }
        else
        {
             
            echo '<div class="dostep text-center col-md-12">';
            echo '<h1>Darmowy trening na ten tydzień</h1>';
            echo '<strong>Dostęp tylko dla zalogowanych użytkowników</strong>';
            echo '</div>';
        }
            
                ?>
        </div>
</div>

<!--- ----------------------------------Cennik------------------------------------->
     <div id="Cennik" class="offset3">
        <div class="col-12 narrow text-center">
        <h1>Cennik</h1>
         </div> 
     <div class="container">
         <div class="row">
        <div class="col-md-4 mb-3">
             <div class="card mb-4 box-shadow">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">Pierwsze wejście za darmo</h4>
                 </div>
                 <div class="card-body">
                     <h5 class="card-title text-center">0 zł
                     
                     </h5>
                <p class="card-text text-center"><ul>
                     <li>Trening wprowadzający</li>
                     <li>Konsultacja z dietetykiem</li>
                     <li>Darmowy masaż</li>
                     
                     </ul></p>
                
                 </div>
            </div>
             
             
             </div>
              <div class="col-md-4 mb-3">
             <div class="card mb-4 box-shadow">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">Wejście jednorazowe</h4>
                 </div>
                 <div class="card-body">
                     <h5 class="card-title text-center">25 zł 
                     
                     </h5>
                <p class="card-text text-center"><ul>
                     <li>Trening wprowadzający</li>
                     <li>Darmowy masaż</li>
                     </ul></p>
                
                 </div>
            </div>
             
             
             </div>
              <div class="col-md-4 mb-3">
             <div class="card mb-4 box-shadow">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">Karnet miesięczny</h4>
                 </div>
                 <div class="card-body">
                     <h5 class="card-title text-center">150 zł <small class="text-miuted">/ miesiąc</small>
                     
                     </h5>
                <p class="card-text text-center"><ul>
                     <li>Codzienne treningi</li>
                     <li>Konsultacja z dietetykiem 3 razy w miesiacu</li>
                     <li>Konsultacja z fizjoterapeutą raz w miesiącu</li>
                      </ul></p>
                
                 </div>
            </div>
             </div>
     
         </div>
    <div class="text-center">
        <p><h2>Respektujemy</h2></p>
        <img src="img/karta2.png" alt="respektujemy" class="img-fluid"/>
    </div>
           

    </div>

</div>

<!--- ----------------------------------contact --------------------------------------->
      <div id="contact" class="offsetcontact">
        <footer>
          <div class="row justify-content-center">
            
            <div class="col-md-12 text-center">
                <h2><strong>Skontaktuj sie z nami</strong> </h2>
                <p>39-300 Mielec<br>ul. Mickiewicza 12<br>Tel.: 555-444-333 </p>
                <p><a href="tel:515494230"><i class="fas fa-phone"></a></i></p>
                <a href="mailto:info@crossfitmielec.com.pl">info@crossfitmielec.com.pl</a>
                <p><a href="https://pl-pl.facebook.com/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/?lang=pl" target="_blank"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></p>

              </div>
            </div>
          
          <div id="mapy">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2127.5513956079512!2d21.463050958357037!3d50.302503971187996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473d6b2452164d13%3A0xd3e4b82f4e35480!2sCrossFit+Mielec!5e0!3m2!1spl!2spl!4v1561219636510!5m2!1spl!2spl" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
          
          </footer>
        
</div>
 <!--- ----------------------------Okno modalne------------------------------------>         
          
             <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                             <h4 class="modal-title">Zaloguj się</h4>
                        <button type="button" class="close" data-dismiss="modal">
                        &times;
                        </button>
                     
                    </div>
                    <div class="modal-body">
                    <form action="index.php" method="POST">
                    <label>Login</label>
                        <input type="text" name="login" id="login" class="form-control"/>
                        <br/>
                        <label>Hasło</label>
                        <input type="password" name="password" id="password" class="form-control"/>
                        <br/>
                        <button type="submit" name="login_button" id="login_button" class="btn btn-warning">Login</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
          


             <div id="registerModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                             <h4 class="modal-title">Rejestracja</h4>
                        <button type="button" class="close" data-dismiss="modal">
                        &times;
                        </button>
                     
                    </div>
                    <div class="modal-body">
                    <form action="index.php" method="POST">
                        <label>Imię</label>
                        <input type="text" name="imie" id="imie" class="form-control" required/>
                        <br/>
                        <label>Nazwisko</label>
                        <input type="text" name="nazwisko" id="nazwisko" class="form-control"/>
                        <br/>
                    <label>Login</label>
                        <input type="text" name="login" id="login" class="form-control" required/>
                        <br/>
                        <label>Hasło</label>
                        <input type="password" name="password" id="password" class="form-control" required/>
                        <br/>
                        <label>E-mail</label>
                        <input type="email" name="email" id="email" class="form-control"/>
                        <br/>
                         <label>Numer telefonu</label>
                        <input type="tel"  name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="000-000-000" class="form-control"><br/>
                        <button type="submit" name="register_button" id="register_button" class="btn btn-warning">Zarejestruj</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
       


        </div>
<!--- ----------------------------------## --------------------------------------->
 <!--- ----------------------SKRYPTY DO BOOTSTRAPA -------------------------------->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
      var canvas = document.querySelector('canvas');



canvas.width=window.innerWidth-6;
canvas.height=window.innerHeight-6;

var c=canvas.getContext('2d');




var colorArray=[
	'#FF6B53',
	'#565F51',
	'#9F6A58',
	'#194A2F',
	'#05290E',
];



var mouse={

	x:undefined,
	y:undefined
}
var maxRadius=90;
var minRadius=30;


window.addEventListener('mousemove',
	function(event){
		mouse.x=event.x;
		mouse.y=event.y; 
		console.log(mouse);
	

})






function Circle(x,y,dx,dy,radius){

	this.x=x;
	this.y=y;
	this.dx=dx;
	this.dy=dy;
	this.radius=radius;
	this.minRadius=radius;
	this.color=colorArray[Math.floor(Math.random()*colorArray.length)];


	this.draw= function(){
		c.beginPath();
		c.arc(this.x,this.y,this.radius,0,2*Math.PI,false);
		
		c.fillStyle=this.color;
		c.fill();

	}

	this.update= function(){
		if(this.x>innerWidth-this.radius||this.x<0+this.radius){
			this.dx=-this.dx;
		}
		if(this.y>innerHeight-this.radius||this.y<0+this.radius){
			this.dy=-this.dy;
		}
		this.y+=this.dy;
		this.x+=this.dx;


		if(mouse.x - this.x<50&&mouse.x - this.x>-50&&mouse.y - this.y<50&&mouse.y - this.y>-50){
			if(this.radius<maxRadius){
			this.radius+=1;
			}
		}else if(this.radius>this.minRadius){
			this.radius-=1;
		}


		this.draw();

	}

}




var circleArray=[];

for(var i=0; i<300; i++){

var x=Math.random()*(innerWidth-radius*2)+radius;
var y=Math.random()*(innerHeight-radius*2)+radius;
var dx=(Math.random()-0.5)*3;
var dy=(Math.random()-0.5)*3;
var radius=Math.random()*20+1;
circleArray.push(new Circle(x, y, dx, dy,radius));


}


function animate(){
	requestAnimationFrame(animate);
	c.clearRect(0,0,innerWidth,innerHeight);


	for(var i=0; i<circleArray.length; i++){
		circleArray[i].update();
	}
}

animate();


</script>
</body>
</html>
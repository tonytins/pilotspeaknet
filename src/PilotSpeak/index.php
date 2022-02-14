<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#b8daff" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="konami.js"></script>
    <script src="https://kit.fontawesome.com/0cb6746fd4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Pilot Speak Generator</title>
  </head>
  <style>

  </style>
  <body>
    <div class="container">
    <h1 class="display-4">Pilot Speak</h1>
    <h4 class="fancyfont">What is "Pilot Speak Generator"?</h4>
    <p class="fancyfont">Have you ever found yourself with a group of pilots and wanted something to contribute to the conversation? Well now you can! This interactive tool will allow you to easily generate (potentially) relevant topics to spark discussion!</p>
    </div>

    <?php
    $jsonfile = file_get_contents("wordbank.json");
    $getjson = json_decode($jsonfile, true);

    $buzzword = $getjson["buzzword"][array_rand($getjson["buzzword"])]; // Blue
    $location = $getjson["location"][array_rand($getjson["location"])]; // Grey
    $time = $getjson["time"][array_rand($getjson["time"])]; // Green
    $descriptor = $getjson["descriptor"][array_rand($getjson["descriptor"])]; // Yellow

    $line = "The " . $buzzword . " on " . $location . " " . $time . " was " . $descriptor;
    $lineurl = str_replace(' ', '%20', $line);
    ?>

    <div class="container">
      <div class="card">
        <div class="card-body lol1" style="text-align: center; font-size: 150%;">
            <p class="fonty">The <span class="badge badge-primary" style="transform: rotate(2deg); box-shadow: 2px 1px 5px grey;"><?php echo $buzzword; ?></span> on <span class="badge badge-secondary" style="transform: rotate(-1deg);box-shadow: 2px 1px 5px grey;"><?php echo $location; ?></span> <span class="badge badge-success" style="transform: rotate(1deg);box-shadow: 2px 1px 5px grey;"><?php echo $time; ?></span>
           was <span class="badge badge-warning" style="transform: rotate(1deg);box-shadow: 2px 1px 5px grey;"><?php echo $descriptor; ?>.</span></p>
         </div>
         <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary" onclick="copyText()" id="peep"><i class="fas fa-copy"></i> Copy</button>
          <button type="button" class="btn btn-light" onclick="window.location.href = 'https://twitter.com/intent/tweet?text=<?php echo $lineurl; ?>';"><i class="fab fa-twitter"></i> Share on Twitter</button>
          <button type="button" class="btn btn-light" onclick="window.location.href = 'https://telegram.me/share/url?text=<?php echo $lineurl; ?>';"><i class="fab fa-telegram-plane"></i> Share on Telegram</button>
          <button type="button" class="btn btn-success" onclick="window.location.href = '.';"><i class="fas fa-sync-alt"></i></button>
        </div>
       </div>
       <?php
        $file = 'totalgens.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file
        $yes = number_format($fdata);
        $totalcombo = count($descriptor) * count($time) * count($location_noun1) * count($buzzword1);
        $totalcomboformatted = number_format($totalcombo);
        $wordbank = count($descriptor) + count($time) + count($location_noun1) + count($buzzword1);
        $wordbankformatted = number_format($wordbank);?>
        <p><small>So far, <mark><strong><?php echo $yes ?></strong></mark> phrases were generated using this app. Application made in love by <a href="https://twitter.com/DrRaccoon">@DrRaccoon</a> for <a href="https://twitter.com/FlyinFox53">@FlyinFox53</a> and ported to .NET by <a href="https://twitter.com/tonyt1ns">@tonyt1ns</a>.
      Like what I make? <a href="https://ko-fi.com/drraccoon"><i class="fa-solid fa-cup-togo"></i> Buy me a coffee</a>!<br>
        There are currenly <mark><? echo $wordbankformatted; ?></mark> words, making <mark><? echo $totalcomboformatted; ?></mark> total combinations. Want to contribute more phases and words? Join this <a href="https://t.me/PilotSpeak">telegram group</a>. Last updated: <mark><? echo "".date("F d Y.",filemtime("wordbank.json")); ?></mark></small></p>
        <center><p>Accidentally made in <i class="fab fa-php"></i>
     </div>
     <input type="text" value="The <?php echo $buzzword; ?> on <?php echo $location; ?> <?php echo $time; ?> was <?php echo $descriptor; ?>." id="textInput" style="opacity: 0;">
     <script>
     function copyText(){
       navigator.vibrate(500);
         var text = document.getElementById("textInput");
         text.select();
         document.execCommand("copy");
         document.getElementById("peep").innerHTML = "Copied!";
         text.focus();
        text.setAttribute('style', 'display:none;');
     }
     </script>

     <script>
       konami.load();
       var easter_egg = new Konami('https://www.furaffinity.net/view/26114232/');
     </script>
  </body>
</html>

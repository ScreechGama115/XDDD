<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("Location: ../index.php");
}

ini_set('error_reporting',0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");
* {
  font-family: 'Open Sans', sans-serif;
  box-sizing: border-box;
  color: #333;
  font-size: 100%;
  line-height: 1.5;
}
nav {
  --duration: .5s;
  --easing: ease-in-out;
  position: relative;
  width: 15%;
	z-index: 200;
  margin: 20px;
	position: fixed;
}
nav ol {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
nav li {
  margin: -4px 0 0 0;
}
nav a {
  display: block;
  text-decoration: none;
  background: #fff;
  transform-origin: 0 0;
  transition: transform var(--duration) var(--easing), color var(--duration) var(--easing);
  transition-delay: var(--delay-out);
  border-radius: 4px;
  padding: 1em 1.52em;
}
nav a:hover {
  background: #efefef;
}
nav .sub-menu a {
  font-size: .9em;
  color: #666666;
  border-left: 2em solid white;
  padding: .75em;
  background: linear-gradient(to right, #dddddd 2px, #ffffff 2px);
}
nav .sub-menu a:hover {
  background: linear-gradient(to right, #dddddd 2px, #efefef 2px);
}
nav header {
  font-weight: 600;
  display: block;
  background: rgba(255, 255, 255, 0.5);
  transform-origin: 0 0;
  transition: transform var(--duration) var(--easing), color var(--duration) var(--easing);
  transition-delay: var(--delay-out);
  border-radius: 4px;
  padding: 1em 1.52em;
}
nav header span {
  border: none;
  background: transparent;
  font-size: 1.5em;
  padding: 0;
  cursor: pointer;
  line-height: 1;
  float: right;
}
nav footer button {
  position: absolute;
  top: 0;
  left: 0;
  border: none;
  padding: calc(1em - 2px);
  width: 100%;
  transform-origin: 0 0;
  transition: transform var(--duration) var(--easing);
  transition-delay: calc(var(--duration) + (.1s * (var(--count) / 2)));
  cursor: pointer;
  outline: none;
  background: #cdcdcd;
  opacity: 0;
}
nav.closed a,
nav.closed header {
  transform: translateY(calc(var(--top) * -1)) scaleY(0.1) scaleX(0.2);
  transition-delay: var(--delay-in);
  color: transparent;
}
nav.closed footer button {
  transition-delay: 0s;
  transform: scaleY(0.7) scaleX(0.2);
}


    </style>
</head>
<body>

    <nav class="menu" id="menu">
    <header>Menu <span>×</span></header>
    <ol>
        <li class="menu-item"><a href="../index.php">Inicio</a></li>
        <li class="menu-item"><a href="#0">Sobre Nosotros</a></li>
        <li class="menu-item">
            <a href="#0">Opciones</a>
            <ol class="sub-menu">
                <li class="menu-item"><a href="perfil.php?id=<?php echo $_SESSION['id_count']; ?>">Perfil</a></li>
                <li class="menu-item"><a href="Sub/salas.php">Salas</a></li>
                <li class="menu-item"><a href="#0">Afiches</a></li>
            </ol>
        </li>
        <li class="menu-item">
            <a href="#0">Contatos</a>
            <ol class="sub-menu">
                <li class="menu-item"><a href="#0">32180593</a></li>
                <li class="menu-item"><a href="#0">tapatiojobs@gmail.com</a></li>
                <li class="menu-item"><a href="#0">@tapatiojobs</a></li>
            </ol>
        </li>
        <li class="menu-item"><a href="Includes/logout.php">Cerrar Sesion</a></li>
    </ol>
    <footer><button aria-label="Toggle Menu">Toggle</button></footer>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>

   var $els = $('.menu a, .menu header');
var count = $els.length;
var grouplength = Math.ceil(count/3);
var groupNumber = 0;
var i = 1;
$('.menu').css('--count',count+'');
$els.each(function(j){
    if ( i > grouplength ) {
        groupNumber++;
        i=1;
    }
    $(this).attr('data-group',groupNumber);
    i++;
});

$('.menu footer button').on('click',function(e){
    e.preventDefault();
    $els.each(function(j){
        $(this).css('--top',$(this)[0].getBoundingClientRect().top + ($(this).attr('data-group') * -15) - 20);
        $(this).css('--delay-in',j*.1+'s');
        $(this).css('--delay-out',(count-j)*.1+'s');
    });
    $('.menu').toggleClass('closed');
    e.stopPropagation();
});

</script>
</body>
</html>

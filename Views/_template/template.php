<?php namespace Views;

$template = new Template();
    class Template{
        public function __construct(){
?>

<!--  acá va el html -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicio</title>
    <link rel="stylesheet" href="<?php echo URL;?>Views/css/boostrap.css  "  >
    <link rel="stylesheet" href="<?php echo URL;?>Views/css/general.css  "  >
</head>
<body>
    <h1>Aca esta la pagina de inicio</h1>





















    <?php  
       } //cierra   public function __construct
       public function __destruct(){
    ?>
    <script src="<?php echo URL;   ?>Views/_temlate/js/boostrap.js" ></script>
</body>
</html>


<?php 
 } // cierra   public function __destruct()

} //cierra la class
?>
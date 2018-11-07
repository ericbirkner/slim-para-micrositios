<h1>Hola soy el home</h1>
<?php
  print_r($data['usuarios']);
  foreach ($data['usuarios'] as $usuario) {
?>
  <li><?php echo $usuario['nombre']; ?></li>

<?php
  }
?>

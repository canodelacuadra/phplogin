<?php include 'header.php';?>
<div class="container">
<!-- Si usted necesita información sobre el usuario, ponlos en la variable de $_SESSION y muéstralos aquí -->
Hola, <?php echo $_SESSION['user_name']; ?>. Estás autenticado.
Trate de cerrar esta pestaña del navegador y abrirlo nuevamente. Todavía está! ;)

<!--  la gente se pregunta dónde: "index.php?logout" es sólo una forma simplificada de "index.php?logout=true" -->
<a href="index.php?logout">Cerrar autenticación</a>
</div>
<?php include 'footer.php';?>
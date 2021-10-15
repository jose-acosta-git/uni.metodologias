<!DOCTYPE html>
<html lang="es">

<head>
    <base href='{BASE_URL}'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motoneta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Agrego css -->    
    <link href="./front/css/style.css" rel="stylesheet" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

 <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand" href="/" action="" method="GET">Motoneta </a>
        <a class="nav-link " href="material"> Materiales Aceptados</a>
    </nav>
<body>
   
        
    {include file='./vue/listMaterials.vue'}
    

    <script type="text/javascript" src='front/js/scriptMaterials.js'></script>
</body>


</html>
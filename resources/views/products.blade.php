<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ap[i]</title>
</head>
<body>
    <div class="container mt-2" id="main" >

        <H2>Api Products</H2>
        
        <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Action</th>
        <button  onclick="renderFormularioCrear()" class="btn btn-primary">New Item</button>
      </tr>
    </thead>
    <tbody id="response">

     
    </tbody>

    <div id="formulario">

    </div>
  </table>
        

    </div>
     <script src="./js/Api.js"></script>    
</body>
</html>
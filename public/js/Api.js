let HTML = [];

function destroy($id) {
    console.log('You are destroying 1 element :', $id);

    $elementErase = $id

    fetch(`http://127.0.0.1:8000/api/product/${$elementErase}/delete`, {
            method: 'DELETE', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },

        })
        .catch((error) => {
            console.error('Error:', error);
        });



}
//-------------------------------------------------------------------
//Funcion de retorno de datos (JSON-api-endpoint)
async function getData(url) {
    const response = await fetch(url);
    const Data = await response.json();

    console.log(Data);

    Items = Data;
    //Cambiar products por el item en cuestion que retorna el fetch 
    content = Items.products;

    content.forEach(element => {
        HTML += ` <tr>
        <td>${element.name}</td>
        <td>${element.description}</td>
        <td>${element.price}</td>
        <td>${element.qty}</td>
        <td><button id='${element.id}' class="btn btn-warning" onclick="destroy(this.id)">Delete</button></td>
      </tr>`
    });




    document.getElementById('response').innerHTML = HTML;



}
let myUrl = 'http://127.0.0.1:8000/api/products'
Content = getData(myUrl);
//-------------------------------------------------------------------

function NewRecord() {
    let name = document.getElementById("name").value;
    let description = document.getElementById("description").value;
    let price = document.getElementById("price").value;
    let qty = document.getElementById("qty").value;

    const data = { name: `${name}`, description: `${description}`, price: `${price}`, qty: `${qty}` };
    fetch('http://127.0.0.1:8000/api/product/add', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });

}

function renderFormularioCrear() {
    document.getElementById('formulario').innerHTML = `<div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control" id="description">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price">
                </div>
                
                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" class="form-control" id="qty">
                </div>
                <button type="submit" onclick="NewRecord()" class="btn btn-primary"> Crear </button>`;
}
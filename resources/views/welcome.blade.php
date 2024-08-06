<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
    html,body{
        height: 100%;
    }

    body{
        background: conic-gradient(rgb(14, 12, 12), rgb(19, 18, 18));
        align-content: center;
        color: white;
    }
  </style>
  <body>
    <div class="container bg-dark">
        <div class="row text-center" >
            <h2 class="display-3">
                Dictionary 
            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card bg-dark mb-5">
                    
                    <div class="card-body ">
                        <form class="w-75 m-auto">
                            <div class="mb-3 d-flex">
                              <input type="text" id="input" class="form-control " id="search" aria-describedby="search">
                              <button type="submit" id="button" class="btn btn-primary w-25">Search</button>
                            </div>
                          </form>
                    </div>
                    <div class="card-footer text-light text-center">Results Will Be Appear Here -></div>
                  </div>

                
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

const button = document.querySelector('#button');
button.addEventListener('click',function(e){
    e.preventDefault();
    console.log('clicked');
    document.querySelector('.card-footer').innerHTML = `<p>Searching</p>`;

    const input = document.querySelector('#input').value;
    console.log(input);

    const response = fetch  (`https://api.dictionaryapi.dev/api/v2/entries/en/${input}`,{
        method : 'GET',
        headers : {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        // console.log(data[0].meanings[0].definitions[0]);
        const definition = data[0].meanings[0].definitions[0];
        document.querySelector('.card-footer').innerHTML = `<p>${definition.definition}</p>`;
    }).catch(error => {
        console.error('Error:', error);
        document.querySelector('.card-footer').innerHTML = `<p>No results found</p>`;
    })
})

</script>
</html> 
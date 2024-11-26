var search = document.getElementById('pesquisar');
    //Usando a tecla enter para pesquisar
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter"){
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'produtos.php?search='+search.value;
    }
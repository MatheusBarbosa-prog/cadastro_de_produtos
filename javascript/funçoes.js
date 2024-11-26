
const form = document.getElementById('form');
    const campos = document.querySelectorAll('.required');
    const spans = document.querySelectorAll('.s-required');

    function setError(index){
        campos[index].style.border = '2px solid #e63636';
        spans[index].style.display = 'block';
    }

    function removeError(index){
        campos[index].style.border = '';
        spans[index].style.display = 'none';
    }

    function nomeValidate(){
        if(campos[0].value.length < 4){
            setError(0);
        }else {
            removeError(0);
        }
    }

    function localValidate(){
        if(campos[1].value.length < 3){
            setError(1);
        }else {
            removeError(1);
        }
    }

    function codValidate(){
        if(campos[2].value.length < 4){
            setError(2);
        }else{
            removeError(2);
        }
    }

    function tipoValidate(){
        if(campos[3].value.length < 4){
            setError(3);
        }else {
            removeError(3);
        }
    }
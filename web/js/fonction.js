$(function(){
    function afficherIdentification(){
        document.getElementById("identificationdiv").style.display="inline";
        document.getElementById("nav").style.height="235px";
        return false;
    }

    
    
    $('#identification').click(afficherIdentification);
})

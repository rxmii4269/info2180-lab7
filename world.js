"use strict";

window.onload = () =>{
    
    let search = document.getElementById("lookup");
    let lookup = document.getElementById("lookup_cities");
    let country = this.$("#country");
    let result = document.getElementById('result');
    
    
    search.addEventListener('click', ()=>{
        
        
        this.$.ajax({
            type : "GET",
            url: "world.php",
            data: country,
            success: (data) => {
                
                
                result.innerHTML = data;
            }
        });
    });
    
    lookup.addEventListener('click', ()=>{
        
        this.$.ajax({
            type: "GET",
            url:"world.php",
            data: country.serialize()+"&context=cities",
            success: (data)=>{
                result.innerHTML = data;
            }
        });
    });
    
};
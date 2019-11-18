"use strict";

window.onload = () =>{
    
    let search = document.getElementById("lookup");
    
    
    search.addEventListener('click', (e)=>{
        
        
        
       
        
        this.$.ajax({
            type : "GET",
            url: "world.php",
            data: this.$('#country'),
            success: (data) => {
                let result = document.getElementById('result');
                
                result.innerHTML = data;
            }
        });
    });
};
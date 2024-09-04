
function rating(i)
{   
        
         if(( (i!=4) &&  document.getElementById(i+1).src == "../img/selectedStar.svg")  )
         {

             for (let index = i+1; index < 5 ; index++) {
                

                 document.getElementById(index).src = "image/unselectedStar.svg"
                 
             }
             
         }
         else
         {  

             for (let index = 0; index <=i ; index++) {
                 
                 document.getElementById(index).src = "../img/selectedStar.svg"
                 
             }
         }




}
function check()
{
    var count = 0 ;  

            
        for (let index = 0; index < 5; index++) {
         if(  document.getElementById(index).src == "http://localhost/SEM-5/image/selectedStar.svg" )
       {
           count++;

         
         
     }
 }
       document.getElementById("submit").value = count;
       
     }
var submit   =  document.getElementById("submit").value;

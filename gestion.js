x = document.getElementById("modelin");
y = document.getElementById("modelup");
function displmodsign(id){

if (id == "modelup") {
    y.style.display = "flex";
    x.style.display = "none";
} else {
    x.style.display = "flex";
    y.style.display = "none";
}
 console.log(id);
}
window.onclick = function(event) {
    if (event.target == x) {
      x.style.display = "none";
    }
    else if (event.target == y) {
        y.style.display = "none";
      }
  }

    var c = document.getElementById('connecte').innerHTML;
    var l = document.getElementById('prod').innerHTML;
    console.log(l)
    if (c=="login"){
        for (let i = 0; i < parseInt(l); i++) {
            document.getElementById("but" +i+ "").disabled = true;
        }
       
    }else{
      
    }

document.getElementById("panier").style.display ="none";
function panproo(){
   b = document.getElementById("btnp").innerHTML;
    if(b=="Produit"){
        document.getElementById("pro").style.display ="none";
        document.getElementById("panier").style.display ="block";
        document.getElementById("btnp").innerHTML="panier";
    }else{
        document.getElementById("pro").style.display ="block";
        document.getElementById("panier").style.display ="none";
        document.getElementById("btnp").innerHTML="Produit";
    }
}
function panier(pa){
    
 }
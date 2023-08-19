var amountTicket = document.getElementById("amount");
var total = document.getElementById("total");
var norek = document.getElementById("norek");
var copy = document.getElementById("save");
var schedule = document.getElementById("date");
var weekend = document.getElementById("status");

amountTicket.addEventListener("input", function(){
   if (amountTicket.value > 10){
        amountTicket.value = 10;
    }
});
amountTicket.addEventListener("input", function(){
    var amount  = parseInt(amountTicket.value);
    if (weekend.value == "1") {
        var totalPrice = amount * 100000;
    } else if( weekend.value == "0"){
        var totalPrice = amount * 85000; 
    }
    var price = totalPrice.toLocaleString("id-ID", {style: "currency", currency: "IDR"});
    total.textContent = price;
    
});

copy.addEventListener("click", function(){
    norek.select();
    document.execCommand("copy");
});


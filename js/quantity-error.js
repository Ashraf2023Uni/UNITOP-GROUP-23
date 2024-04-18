
document.getElementById('addToBasket').addEventListener('submit', e => {
    var quantity = document.getElementById('quantity').value;
    if(quantity == "quantity" || quantity === ""){
        alert("Please select a quantity.");
        e.preventDefault();
    }
});
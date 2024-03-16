//Error message appears when quantity is not selected, Humayra Hussain 210005848

document.getElementById('addToBasket').addEventListener('submit', function(event) {
    var quantity = document.getElementById('quantity').value;
    if(quantity === "Select Quantity" || quantity === ""){
        alert("Please select a quantity.");
        event.preventDefault();
    }
});
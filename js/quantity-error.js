//Error message appears when quantity is not selected, Humayra Hussain 210005848

document.getElementById('addToBasket').addEventListener('submit', e => {
    var quantity = document.getElementById('quantity').value;
    if(quantity == "quantity" || quantity === ""){
        alert("Please select a quantity.");
        e.preventDefault();
    }
});
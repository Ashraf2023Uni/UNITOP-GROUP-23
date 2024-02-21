//Sorting products - can't sort without node.js? or some way of connecting to database
function sortProducts(){
    var selectElement = document.getElementById("select");
    var selectedValue = selectElement.ariaValueMax;

    switch(selectedValue){
        case 'low-to-hight':
            productsData.sort((a,b) => a.price - b.price);
            break;
        case 'high-to-low':
            productsData.sort((a,b) => b.price - a.price);
            break;
        default:
            break;
    }
    updateProductDisplay();
}


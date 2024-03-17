//Sorting products based on price and category

/*document.addEventListener("DOMContentLoaded", function(){
    //Variables for selecting the sorting options
    const productsCard = document.getElementById('product-row');
    const sortByPrice = document.getElementById('sortBy');
    let productsArray = Array.from(productsCard.children);

    //Function for sorting
    function sortBy(sortValue){
        switch(sortValue){
            case 'low-to-high':
                productsArray.sort((a,b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
                break;
            case 'high-to-low':
                productsArray.sort((a,b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
                break;
            case 'default':
                break;
        }

        //Update display with sorted items
        itemsArray.forEach(product => {
            productsCard.appendChild(product);
        });
    }

    //Event listener for sorting dropdown change
    sortByPrice.addEventListener('change', function(){
        //Get the selected option from the dropdown
        const sortValue = this.value;

        //Apply sorting based on the selected value
        sortBy(sortValue);
    });
});*/

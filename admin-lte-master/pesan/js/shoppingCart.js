// ***************************************************
// Shopping Cart functions

var shoppingCart = (function () {
    // Private methods and properties
    var cart = [];

    function Item(name, sedia, price, count, merk) {
        this.name = name
        this.sedia = sedia
        this.price = price
        this.count = count
        this.merk = merk
    }

    function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart === null) {
            cart = []
        }
    }

    loadCart();



    // Public methods and properties
    var obj = {};

    obj.addItemToCart = function (name, sedia, price, count, merk) {
        //alert('aasd');
        for (var i in cart) {
            
            if (cart[i].price === price) {
                if(cart[i].count>=cart[i].sedia){
                    return;
                }else{
                    cart[i].count += count;
                    saveCart();
                    return;
                }
                
            }
            
            
        }

        
        if(name!==""){ // maksimal pinjem 5
            console.log("addItemToCart:", name, sedia, price, count,merk);
            var item = new Item(name, sedia, price, count, merk);
            cart.push(item);
            saveCart();
        }else{
            return;
        }
        
    };

    obj.setCountForItem = function (name, count) {
        for (var i in cart) {
            if (cart[i].price === price) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCart = function (price) { // Removes one item
        for (var i in cart) {
            if (cart[i].price === price) { // "3" === 3 false
                cart[i].count--; // cart[i].count --
                if (cart[i].count === 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCartAll = function (price) { // removes all item name
        for (var i in cart) {
            if (cart[i].price === price) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();
    };


    obj.clearCart = function () {
        cart = [];
        saveCart();
    }


    obj.countCart = function () { // -> return total count
        var totalCount = 0;
        for (var i in cart) {
            totalCount += cart[i].count;
        }

        return totalCount;
    };

    // obj.totalCart = function () { // -> return total cost
    //     var totalCost = 0;
    //     for (var i in cart) {
    //         totalCost += cart[i].price * cart[i].count;
    //     }
    //     return totalCost.toFixed(2);
    // };

    obj.listCart = function () { // -> array of Items
        var cartCopy = [];
        console.log("Listing cart");
        console.log(cart);
        for (var i in cart) {
            console.log(i);
            var item = cart[i];
            var itemCopy = {};
            for (var p in item) {
                itemCopy[p] = item[p];
            }
            itemCopy.total = (item.price * item.count).toFixed(2);
            cartCopy.push(itemCopy);
        }
        return cartCopy;
    };

    // ----------------------------
    return obj;
})();





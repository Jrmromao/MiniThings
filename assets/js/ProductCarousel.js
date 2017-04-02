/**
 * Created by jrmromao on 20/01/2017.
 */
(function(){

    $('#itemslider').carousel({ interval: 3000 });
}());

(function(){
    $('.carousel-showmanymoveone .item').each(function(){
        var itemToClone = $(this);

        for (var i=1;i<6;i++) {
            itemToClone = itemToClone.next();


            if (!itemToClone.length) {
                itemToClone = $(this).siblings(':first');
            }


            itemToClone.children(':first-child').clone()
                .addClass("cloneditem-"+(i))
                .appendTo($(this));
        }
    });
}());


    function alertFunc() {
    alert("Login to add this item to your Wishlist!");
}

    function alertFuncCart() {
    alert("You Must be logged in to purchase this item! ");
}


//input product qty in details
$(document).on('click', '.number-spinner button', function () {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
    } else {
        if (oldValue > 1) {
            newVal = parseInt(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    btn.closest('.number-spinner').find('input').val(newVal);
});




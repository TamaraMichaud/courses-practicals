$(function() {

   $('#todoList ul').sortable({
      items: "li:not('.listTitle, .addItem')", // exclude these two
      connectWith: "ul", // allow movement between days
      dropOnEmpty: true,
      placeholder: "emptySpace" // css class
   });

   $('input').keydown(function(e) {

      if(e.keyCode == 13) { // 13 = return
         var item = $(this).val();
         $(this).parent().parent() // input, li, ul
            .append('<li>' + item + '</li>');
         $(this).val(''); // empty the input box
      }

   });

   $('#trash-box').droppable({
      drop: function(event, ui) { // default values
         ui.draggable.remove(); // causes deletion of the item

      }


   });


});
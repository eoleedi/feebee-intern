function showModal() {
    $('#category').modal('show'); 
}

function get_cat(id){
    $('.btn-group .btn').click(function(){
        var cat_id = '#cat_btn_' + id.toString(); 
        $(cat_id).html('<button class=\"btn btn-outline-info my-2 my-sm-0\" type=\"submit\" onclick=\"showModal()\" value='+id+'>'+$(event.target).val()+'</button>');
        $('#category').modal('hide')
        id = 0;
        cat_id = 0;
    })
}

$('.cat_btn').click(function(){
    var id = $(event.target).val();
    get_cat(id)
})


function showMM() {
    $('#hidden_text').modal('show'); 
}




    


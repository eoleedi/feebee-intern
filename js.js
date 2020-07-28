function showModal() {
    $('#category').modal('show'); 
}

function get_cat(id){
    $('.btn-group .btn').click(function(){
        var cat_id = '#cat_btn_' + id.toString(); 
        var cat_status_id = '#cat_status_' + id.toString(); 
        $(cat_id).html('<button class=\"btn btn-outline-info my-2 my-sm-0\" type=\"submit\" onclick=\"showModal()\" value='+id+'>'+$(event.target).val()+'</button>');
        if($(event.target).val() == '選擇分類'){
            $('#cat_status_' + id.toString()).html('no');
            $('#cat_status_' + id.toString()).css('color', 'red');
        }
        else{
            $('#cat_status_' + id.toString()).html('yes');
            $('#cat_status_' + id.toString()).css('color', 'green');
        }
        
        
        $('#category').modal('hide');

        $('#temp1').val($('#cat_id_'+ id.toString()).html());
        $('#temp2').val($('#cat_title_'+ id.toString()).html());
        $('#temp3').val($('#cat_btn_'+ id.toString()+' .btn').html());
        $('#temp4').val($('#cat_status_'+ id.toString()).html());

        id = 0;
        cat_id = 0;
    })
}

$('.cat_btn').click(function(){
    var id = $(event.target).val();
    get_cat(id);
})

function showMM() {
    $('#text_hidden').modal('show');
}



    


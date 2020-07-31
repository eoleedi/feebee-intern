//派發系統
function showModal() {
    $('#category').modal('show'); 
}

function get_cat(id){
    $('.btn-group .btn').click(function(){
        var cat_id = '#cat_btn_' + id.toString(); 
        var cat_status_id = '#cat_status_' + id.toString();
         
        $(cat_id + ' button').html($(event.target).val());
        if($(event.target).val() == '選擇分類'){
            $('#cat_status_' + id.toString()).html('no');
            $('#cat_status_' + id.toString()).css('color', 'red');
        }
        else{
            $('#cat_status_' + id.toString()).html('yes');
            $('#cat_status_' + id.toString()).css('color', 'green');
        }

        $('#category').modal('hide');

        var cat_title_id = $('#cat_title_'+ id.toString()).html();
        var cat_btn_id = $('#cat_btn_'+ id.toString()+' .btn').html()

        id = 0;
        cat_id = 0;

        $.ajax({
            type: "POST",
            url: "cat_ajax.php",
            data: {
                'cat_title_id' : cat_title_id,
                'cat_btn_id' : cat_btn_id,
            },
            dataType: "json",
            error: function (xhr) { 
                //alert("錯誤"+xhr.responseText);  
                //return false;
            },
            success: function(data){
                //alert(data.rcode);
            }
            
        });
        
    })
}

$('.cat_btn').click(function(){
    var id = $(event.target).val();
    get_cat(id);
})




    


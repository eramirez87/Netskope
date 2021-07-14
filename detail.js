let Detail = {
    add : function(e,event){
        event.preventDefault();
        let data = $("#commentForm").serializeArray();
        $.post('addComment',data,(resp)=>{
            if(resp.success){
                location.reload(true);
            }
        },'json');
    }
};
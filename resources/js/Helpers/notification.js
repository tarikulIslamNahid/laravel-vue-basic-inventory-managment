
class notification{
    customNoti(text){
        new Noty({
            type: 'success',
            layout:'topRight',
            text: text,
            timeout:1200,
        }).show();
    }
    
    success(){
        new Noty({
            type: 'success',
            layout:'topRight',
            text: 'Successfully Done',
            timeout:1200,
        }).show();
    }
    alert(){
        new Noty({
            type: 'alert',
            layout:'topRight',
            text: 'Are You sure ?',
            timeout:1200,
        }).show();
    }
    error(){
        new Noty({
            type: 'error',
            layout:'topRight',
            text: 'Somthing Went Wrong !',
            timeout:1200,
        }).show();
    }
    warning(){
        new Noty({
            type: 'warning',
            layout:'topRight',
            text: 'Opps Wrong!',
            timeout:1200,
        }).show();
    }
    Image_size(){
        new Noty({
            type: 'error',
            layout:'topRight',
            text: 'Upload Image less then 1MB',
            timeout:1300,
        }).show();
    }
    cartSuccess(){
        new Noty({
            type: 'success',
            layout:'topRight',
            text: 'Successfully Cart Added !!!',
            timeout:1200,
        }).show();
    }
    cartDelete(){
        new Noty({
            type: 'success',
            layout:'topRight',
            text: 'Successfully Cart Deleted !!!',
            timeout:1200,
        }).show();
    }
}

export default notification = new notification()

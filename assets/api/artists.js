$(document).ready(function(){
    $(document).on('submit', '#registration', function(e){
        e.preventDefault();

        let method = this.method;
        let action = this.action;
        let data = new FormData(this);


        $.ajax({
            url: action,
            type: method,
            data: data,
            processData: false,
            contentType: false,
            success: (data) => {
                let output = JSON.parse(data);
                let status = Number(output.status);
                if(status == 1){
                    toastr.success(output.message);
                    window.location.href = base + "/artists";
                }else{
                    toastr.error(output.message);
                }
            },
            error: (data) => {
                toastr.error(data);
            }
        });

    });

    //login process
    $(document).on('submit', '#login', function(e){
        e.preventDefault();

        let method = this.method;
        let action = this.action;
        let data = new FormData(this);


        $.ajax({
            url: action,
            type: method,
            data: data,
            processData: false,
            contentType: false,
            success: (data) => {
                let output = JSON.parse(data);
                let status = Number(output.status);
                if(status == 1){
                    toastr.success(output.message);
                    window.location.href = base + "/artists/dashboard";
                }else{
                    toastr.error(output.message);
                }
            },
            error: (data) => {
                toastr.error(data);
            }
        });
    });

    $(document).on('submit', '#update', function(e){
        e.preventDefault();

        let method = this.method;
        let action = this.action;
        let data = new FormData(this);

        $.ajax({
            url: action,
            type: method,
            data: data,
            processData: false,
            contentType: false,
            success: (data) => {
                let output = JSON.parse(data);
                let status = Number(output.status);
                if(status == 1){
                    toastr.success(output.message);
                    window.location.href = base + "/artists/dashboard";
                }else{
                    toastr.error(output.message);
                }
            },
            error: (data) => {
                toastr.error(data);
            }
        });

    });
});

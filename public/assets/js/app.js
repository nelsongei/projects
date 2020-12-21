    $(document).ready(function() {
    $('#example').DataTable();
});
    // Javascript to enable link to tab
    setTimeout(tab,1);
    function tab(){
    $(document).ready(function() {
        if (location.hash) {
            $("a[href='" + location.hash + "']").tab("show");
        }
        $(document.body).on("click", "a[data-toggle='tab']", function(event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
});

    $('#mydate').datepicker({
    container: ".bdc"
});
};


    // setInterval(notifications,1000);

    function notifications(){
    //get notifications
    $.ajax({
        url:"http://localhost/hr/public/getNotifications",
        type:'GET',
        data:'_token=<?php echo csrf_token() ;?>',
        success:function(data){
            if(data.success=='1'){
                var output='';
                var count=0;
                for(var x=0;x<data.notifications.length;x++){
                    count+=data.notifications[x]['total'];
                    output+='<div class="dropdown-divider"></div><a href="http://localhost/hr/public'+data.notifications[x]['linkurl']+data.notifications[x]['linkindex']+'" class="dropdown-item"><span class="mr-2">'+data.notifications[x]['linkicon']+'</span>'+data.notifications[x]['total']+' '+data.notifications[x]['notification']+'<span class="float-right text-muted text-sm">Not read</span> </a>';
                }
                document.getElementById('nHolder').innerHTML=output;
                document.getElementById('countNot').innerHTML=count;
                document.getElementById('countNot1').innerHTML=count;
            } else{

            }
        }
    });
}

    // setInterval(notifications,1000);

    function notifications(){
    //get notifications
    $.ajax({
        url:"http://localhost/hr/public/getNotifications",
        type:'GET',
        data:'_token=<?php echo csrf_token() ;?>',
        success:function(data){
            if(data.success=='1'){
                if(data.notifications.length>0){
                    var output=' <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">';
                    var count=0;
                    for(var x=0;x<data.notifications.length;x++){
                        count++;
                        output+='<a href="#" class="dropdown-item"><!-- Message Start --><div class="media"><div  style="background: #ddd; border:1px solid #ddd; width:50px; height: 50px; border-radius:  50%;" title="From '+data.notifications[x]['byy']+'"><h3 style="margin-top: 7px;">'+data.notifications[x]['byy'].substring(0,3)+'</h3></div><divclass="media-body"><h3 class="dropdown-item-title">'+data.notifications[x]['byy']+'<span class="float-right text-sm text-danger"><i class="fas fa-user"></i> Admin</span></h3><p class="text-sm">'+data.notifications[x]['action']+'</p><p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '+data.notifications[x]['created_at']+'</p></div></div> <!-- Message End --></a><div class="dropdown-divider"></div>';
                    }
                    output+='</div>'
                    document.getElementById('nHolder2').innerHTML=output;
                    document.getElementById('countNot2').innerHTML=count;
                }else{

                    output='<div class="py-3"><center style="color:  #b3cccc !important;"><i class="fas fa-file fa-5x"></i><i class="fas fa-times fa-2x" style="z-index: 9999; color: #fff; margin-left: -25px;"></i><br><h6>No notifications available</h6></center></div>';
                    document.getElementById('nHolder2').innerHTML=output;
                    document.getElementById('countNot2').innerHTML=0;
                }



            } else{

            }
        }
    });
}

//
    function getUser(){
        var name=$("#firstname").val();
        document.getElementById("empName").innerHTML=name;
    }

    function getImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#default')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    var editor_config = {
        path_absolute : "",
        selector: "textarea.my-editor",
        setup : function(ed){
            ed.on('init',function(){
                this.getDoc().body.style.fontFamily='Tw Cen MT';
                this.getDoc().body.style.fontSize='44';
            });
        },
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolot",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);

    $(function () {
        $("#employees").DataTable();
        $("#departments").DataTable();
        $("#companies").DataTable();
        $("#designations").DataTable();
        $('#employeesalarys').DataTable();
        $('#loanedd').DataTable();
        $('#perfomanceTracker').DataTable();
        $('#advancePay').DataTable();
        $('#approvedExpense').DataTable();
        $('#pendingExpense').DataTable();
        $('#disExpense').DataTable();
        $('#contract').DataTable();
        $('#contracts').DataTable();
        $('#leaves').DataTable();
        $('#leaves2').DataTable();
        $('#confirmations').DataTable();
        $('#pyrolls').DataTable();
        $('#bftt').DataTable();
        $('.musters').DataTable();
        $('#pyreports').DataTable();
        $('#perfomancess').DataTable();
        $('#mail_body').DataTable();
        $('#customTemps').DataTable();
    });

    function pint(){
        document.getElementById('footer').style.display='none';
        document.getElementById('address').style.display='block';
        window.print();
    }


    function reloaderr(){
        var pathh=window.location.href;
        window.location.assign(pathh);
    }


    //time renderer
    function renderTimeDesktop() {

        var currentTime= new Date();
        var diem = "AM"
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if (h ==0){
            h = 12
        }   else if (h>12) {
            h = h - 12;
            diem = "PM";

        }

        if (h<10){
            h = "0" + h;

        }

        if (m<10){
            m = "0" + m;

        }

        if (s<10){
            s = "0" + s;

        }


        var myClock = document.getElementById('clockdisplayDesktop')
        //myClock.textContent = h + ":" + m + ":" + s + " " +diem;
        myClock.innerHTML = h + ":" + m + ":" + s + " " + "<sup style='font-size:12px;'>"+diem+"</sup>";
        setTimeout(renderTimeDesktop,1000);
    }


    renderTimeDesktop();


    function makeEaseOut(timing) {
        return function(timeFraction) {
            return 1 - timing(1 - timeFraction);
        }
    }

    function bounce(timeFraction) {
        for (let a = 0, b = 1, result; 1; a += b, b /= 2) {
            if (timeFraction >= (7 - 4 * a) / 11) {
                return -Math.pow((11 - 6 * a - 11 * timeFraction) / 4, 2) + Math.pow(b, 2)
            }
        }
    }

    let bounceEaseOut = makeEaseOut(bounce);

    window.onload = function() {
        $("#brick").fadeIn(3500);
        animate({
            duration: 3000,
            timing: bounceEaseOut,
            draw: function(progress) {
                brick.style.left = progress * 50 + '%';
            }
        });

        setInterval(Incrementerr,20);
        var x=0;
        function Incrementerr(){
            x=x+1;
            if(x<=document.getElementById('incrementHolder').value){
                document.getElementById('increment').innerHTML=x;
            }


        }
    };
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $.widget.bridge('uibutton', $.ui.button)

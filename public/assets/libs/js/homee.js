
setInterval(getEnquiries,1000);
function getEnquiries(){
	$.ajax({
    url:"./getEnquiries",
    type:'GET',
    data:'_token=<?php echo csrf_token() ;?>',
    success:function(data){
      if(data.success==1){
      	var output='';
      	for(var x=0;x<data.enquiries.length;x++){
            if(data.unread>0){
                document.getElementById('indicator').style.display="block";
            }
            else if(data.enquiries[x]['readStatus']==1){
                document.getElementById('indicator').style.display="none";
               output+=' <a href="./enquiries" class="list-group-item list-group-item-action active" > <div class="notification-info"><div class="notification-list-user-img"><img src="assets/images/account.png" alt="" class="user-avatar-md rounded-circle"></div> <div class="notification-list-user-block"><span class="notification-list-user-name">'+data.enquiries[x]['firstname']+' '+data.enquiries[x]['lastname']+'</span><br>'+data.enquiries[x]['subject']+'<div class="notification-date text-secondary">'+data.enquiries[x]['created_at']+'</div></div> </div> <span title="Has been read" class="float-right text-success" onclick="event.preventDefault(); updateView('+data.enquiries[x]['id']+')" style="margin-top:-10px;"><i class="fa fa-check"></i><i class="fa fa-check"></i></span></a>';
            }else{
                document.getElementById('indicator').style.display="block";
                output+=' <a href="./enquiries" class="list-group-item list-group-item-action active" > <div class="notification-info"><div class="notification-list-user-img"><img src="assets/images/account.png" alt="" class="user-avatar-md rounded-circle"></div> <div class="notification-list-user-block"><span class="notification-list-user-name">'+data.enquiries[x]['firstname']+' '+data.enquiries[x]['lastname']+'</span><br>'+data.enquiries[x]['subject']+'<div class="notification-date text-secondary">'+data.enquiries[x]['created_at']+'</div></div> </div> <span class="float-right text-warning" onclick="event.preventDefault(); updateView('+data.enquiries[x]['id']+')" style="margin-top:-10px;"><i class="fa fa-check"></i> mark as read</span></a>';
            }
      		
      		
      	}
      	document.getElementById('enquiriesArea').innerHTML=output;

      }
  }
});
}

function updateView(id){
    $.ajax({
    url:"./updateView/"+id,
    type:'GET',
    data:'_token=<?php echo csrf_token() ;?>',
    success:function(data){
      if(data.success==1){
            
      }
      }
      }); 
}



function courseGraph(){


 $.ajax({
    url:"./getCourseGraphData",
    type:'GET',
    data:'_token=<?php echo csrf_token() ;?>',
    success:function(data){
      if(data.success==1){
        //graph here and pupulate it
        		var ctx = document.getElementById("myChart");

				var myChart = new Chart(ctx, {
				    type: 'pie',//specify the type of graph you want to deal with
				    data: {
				        labels: data.courseArray,//the labels of your graphs
				        datasets: [{
				            label: '# users',//what the user sees when he/she overs a given label
				            data:data.usersArray, //The data set of your graph
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)', //the colors of your labels
				                'rgba(54, 162, 235, 0.2)', //the colors of your labels
				                'rgba(255, 206, 86, 0.2)', //the colors of your labels
				                'rgba(75, 192, 192, 0.2)', //the colors of your labels
				                'rgba(153, 102, 255, 0.2)', //the colors of your labels
				                'rgba(255, 159, 64, 0.2)' //the colors of your labels
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)', //the color of the label borders 
				                'rgba(54, 162, 235, 1)', //the color of the label borders 
				                'rgba(255, 206, 86, 1)', //the color of the label borders 
				                'rgba(75, 192, 192, 1)', //the color of the label borders 
				                'rgba(153, 102, 255, 1)', //the color of the label borders 
				                'rgba(255, 159, 64, 1)' //the color of the label borders 
				            ],
				            borderWidth: 1
				        }]
				    },
				    options: {
				        scales: {
				         	
				        }
				    }
				});
      }
      
    },
    error: function (xhr, desc, err)
    {


    }
});

}




	
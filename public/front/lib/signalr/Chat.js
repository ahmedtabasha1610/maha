"use strict"
var myname="";var connection=new signalR.HubConnectionBuilder().withUrl("/messageHub").build();connection.start().then(function(){console.log("good");}).catch(function(e){console.log(e);});connection.on("ReceiveMessage",function(user,message){var msg=message.replace(/&/g,"&amp;").replace(/</g,"&lt").replace(/>/g,"&gt;");if(userId==user){$('body').cornerpopup({variant:10,topCorner:0,content:'<a class="btn-feed-zoom" href="'+msg+'" target="_blank" ><i class="fa fa-video-camera" aria-hidden="true"></i>  &nbsp;  ابدأ الاجتماع الان  &nbsp;   </a>',onBtnClick:function(){}});$('body').cornerpopup.popupShow();}});connection.on("ReceiveRate",function(user,message){var msg=message.replace(/&/g,"&amp;").replace(/</g,"&lt").replace(/>/g,"&gt;");if(userId==user){$('#zoomfeedback').modal('show');$('#meetUrl').val(msg);}});
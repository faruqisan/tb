function loadChat(){

}


function sendChat(receiverId){
  var chats = document.getElementById('chatText').value;
  var url = "../sendChat";
  $.post(url,{
      receiver : receiverId,
      chat:chats
      },function(data){
      if(data.status == true){
        location.reload()
        //Materialize.toast('Sukses Mengirim Pesan !', 4000);
      }else{
        Materialize.toast('Gagal Mengirim Pesan !', 4000);
      }
        }
      );
}

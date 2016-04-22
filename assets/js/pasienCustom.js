function deleteVideo(idVideo){
  var url = "deleteVideo";
  $.post(url,{
      id : idVideo,
      },function(data){
      if(data.status == true){
        location.reload();
        Materialize.toast('Sukses Hapus Video !', 4000);
      }else{
        Materialize.toast('Gagal Hapus Video !', 4000);
      }
        }
      );
}

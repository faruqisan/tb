function declineVideo(idVideo){
  var thisKeterangan = document.getElementById('keteranganTolak'+idVideo).value;
  var url = "declineVideo";
  $.post(url,{
      id : idVideo,
      keterangan : thisKeterangan
      },function(data){
      if(data.status == true){
        location.reload();
        Materialize.toast('Sukses Tolak Video !', 4000);
      }else{
        Materialize.toast('Gagal Tolak Video !', 4000);
      }
        }
      );
}

function acceptVideo(idVideo){
  var thisKeterangan = document.getElementById('keteranganTerima'+idVideo).value;
  var url = "acceptVideo";
  $.post(url,{
      id : idVideo,
      keterangan : thisKeterangan
      },function(data){
      if(data.status == true){
        location.reload();
        Materialize.toast('Sukses Terima Video !', 4000);
      }else{
        Materialize.toast('Gagal Terima Video !', 4000);
      }
        }
      );
}

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

function submitKomentar(idVideo){
  var komentar = document.getElementById('textarea'+idVideo).value;
  var url = 'Pasien/submitComment';
  $.post(url,{
      id : idVideo,
      comment : komentar
      },function(data){
      if(data.status == true){
        location.reload();
        Materialize.toast('Sukses Tambahkan Komentar !', 4000);
      }else{
        Materialize.toast('Gagal Tambahkan Komentar !', 4000);
      }
        }
      );
}

function loadComment(idVideo){
  var url='Pasien/getComment/'+idVideo;
  $.getJSON(url,function(data){
      var parent = document.getElementById('modalCommentContent'+idVideo);
      $(parent).empty();
      if(data == false){
        var li = document.createElement("li");
        li.className="collection-item avatar";

        var icon = document.createElement("i");
        icon.className = "material-icons circle";
        var icon_name = document.createTextNode('cancel');
        icon.appendChild(icon_name);
        li.appendChild(icon);

        var span = document.createElement("span");
        span.className = "title";
        var b = document.createElement("b");
        var title = document.createTextNode('Belum Ada Komentar');
        b.appendChild(title);
        span.appendChild(b);
        li.appendChild(span);

        parent.appendChild(li);
      }else{
        for(i=0;i<data.length;i++){
          var li = document.createElement("li");
          li.className="collection-item avatar";

          var icon = document.createElement("i");
          icon.className = "material-icons circle";
          var icon_name = document.createTextNode('account_circle');
          icon.appendChild(icon_name);
          li.appendChild(icon);

          var span = document.createElement("span");
          span.className = "title";
          var b = document.createElement("b");
          var title = document.createTextNode(data[i].firstname+' '+data[i].lastname);
          b.appendChild(title);
          span.appendChild(b);
          li.appendChild(span);

          var pdate = document.createElement("p");
          var date_text = document.createTextNode(data[i].comment_date);
          pdate.appendChild(date_text);
          li.appendChild(pdate);

          var br = document.createElement("br");
          li.appendChild(br);

          var pcomment = document.createElement("p");
          var comment_text = document.createTextNode(data[i].comment);
          pcomment.appendChild(comment_text);
          li.appendChild(pcomment);

          parent.appendChild(li);
        }
      }
    });
}

<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" id="cont" data-receiver="">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-envelope"></i>  Message from <b><span id="cname"></span></b></h4>
      </div>
      <div class="modal-body">
        <textarea style="resize: none;" class="form-control" rows="5" id="message" placeholder="Write a message..." disabled=""></textarea> 
      </div>
      <div class="modal-footer">
        <div class="form-inline">
          <input type="text" class="form-control">
          <button onclick="sendMessage()" type="button" class="btn btn-success btn-md">Reply</button>&nbsp;
          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
        </div>       
      </div>
    </div>
  </div>
</div>
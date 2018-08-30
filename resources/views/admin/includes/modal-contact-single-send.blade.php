<div class="modal fade" id="sendMessage-{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong>Send Message</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>To: {{ ucwords($c->name) }} - {{ $c->mobile_number }}</strong></p>
        
        <form action="{{ route('admin.send.single.message.post') }}" method="POST" autocomplete="off">
          {{ csrf_field() }}
          <input type="hidden" name="contact_id" value="{{ $c->id }}" >
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control underlined" name="message" id="message"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Send Message</button>
          </div>
        </form>        

      </div>
      <div class="modal-footer">
        <small>Send Message</small>
      </div>
    </div>
  </div>
</div>
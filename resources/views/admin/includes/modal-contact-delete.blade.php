<div class="modal fade" id="contactDelete-{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong>Delete Contact</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Are you sure you want to delete <strong>{{ ucwords($c->name) }} - {{ $c->mobile_number }}</strong> in contact list?</p>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" class="close" data-dismiss="modal" aria-label="Close">No</button>

          <a href="{{ route('admin.delete.contact', ['id' => $c->id]) }}" class="btn btn-danger">Yes [Delete]</a>
      </div>
    </div>
  </div>
</div>
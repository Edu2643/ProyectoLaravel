<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">¡Éxito!</h5>
                
            </div>
            <div class="modal-body">
                <p>{{ Session::get('mensaje') }}</p>
            </div>
            
        </div>
    </div>
</div>

@if(Session::has('mensaje'))
<script>
    $(document).ready(function(){
        $('#successModal').modal('show');
    });
</script>
@endif
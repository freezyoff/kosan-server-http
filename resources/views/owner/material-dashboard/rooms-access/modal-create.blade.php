<?php 
	$modalID = isset($modalID)? $modalID : "_".\Str::random();
	
	$formID = "_".\Str::random();
	$inputID = "_".\Str::random();
	$buttonID = "_".\Str::random();
	$saveBtnID = "_".\Str::random();
?>

@push('modal')
<!-- begin: owner/material-dashboard/access-control/modal-create-room -->
<div class="modal fade" id="{{$modalID}}" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
	<form id="{{$formID}}" action="{{route('web.owner.rooms.create')}}" method="post">
		@csrf
		<input id="{{$formID}}-location" name="location" type="hidden" value="" />
	
		<div class="modal-content">
			<div class="modal-header border-0 pt-0 pl-4 pr-4 pt-4 pb-0">
				<h5 class="modal-title">
					<span>Tambah Hak Akses </span>
					<span>di </span> 
					<span id="{{$formID}}-location-name" class="text-primary"></span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body border-0 p-4">
				<div>
					<input id="{{$inputID}}" 
						name="roomAttr[email]" 
						type="text" 
						class="form-control" 
						placeholder="Email Penyewa" />
				</div>
				<div class="form-row mt-2">
					<div class="col">
						<input name="roomAttr[rate_daily]" 
							type="text" 
							class="form-control {{$inputID}}-room-rate" 
							placeholder="Harga sewa harian" />
					</div>
					<div class="col">
						<input name="roomAttr[rate_weekly]" 
							type="text" 
							class="form-control {{$inputID}}-room-rate" 
							placeholder="Harga sewa mingguan" />
					</div>
					<div class="col">
						<input name="roomAttr[rate_monthly]" 
							type="text" 
							class="form-control {{$inputID}}-room-rate" 
							placeholder="Harga sewa bulanan" />
					</div>
				</div>
			</div>
			<div class="modal-footer border-0 pt-0 pl-4 pr-4 pb-4 pt-0">
				<button type="button" class="btn btn-grey" data-dismiss="modal">Batal</button>
				<button id="{{$saveBtnID}}" type="submit" class="btn btn-primary" disabled="disabled">Simpan</button>
			</div>
		</div>
	
	</form>
</div>
</div>
@endpush

@push('script')
<script>
$("#{{$inputID}}").on('change keyup', function(){
	$("#{{$saveBtnID}}").attr('disabled', $('#{{$inputID}}').val().length <= 0);
});
$("#{{$modalID}}").on('show.bs.modal', function() {
	$('#{{$formID}}-location').val(APP.prevTableData);
	$('#{{$formID}}-location-name').html($("#a_"+APP.prevTableData).html().trim());
	setTimeout(function(){ 
		$("#{{$inputID}}").focus().trigger('change');
	}, 500);
	$(".{{$inputID}}-room-rate").trigger('input');
});

$('.{{$inputID}}-room-rate').each((index, item)=>{
	$(item).inputFilterCurrency();
	$(item).on('input keydown keyup focusout focusin', ()=>{
		let hasValue = $(item).val() != "";
		if (hasValue){
			$(item).addClass('text-right');
		}
		else{
			$(item).removeClass('text-right');
		}
	});
});
</script>
@endpush
<!-- end: owner/material-dashboard/access-control/modal-create-room -->
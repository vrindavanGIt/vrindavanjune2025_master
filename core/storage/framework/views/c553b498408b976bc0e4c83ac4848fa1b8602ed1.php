<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.css" rel="stylesheet" />
<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('Contacts Leads')); ?></b></h3>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4" >
        <div class="card-body">
            <div class="alert alert-success alert-dismissible d-none">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>Contact Leads Deleted Successfully.</b>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="data-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1">S.No</th>
                            <th width="1"><input type="checkbox" class="all_select"></th>
                            <th width="120">Name</th>
                            <th width="140" >Email</th>
                            <th width="100">Phone</th>
                            <th width="100">WhatsApp</th>
                            <th width="100" >Country/City</th>
                            <th class="none">Message</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>



<div id="MyPopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">
                    Delete user log...
                </h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <input type="button" id="btnClosePopup" value="Close" class="btn btn" />
                <input type="button" onclick="btndeleteePopup()" value="Delete" class="btn btn-danger" />
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>

<script type="text/javascript">
    $(function () {
        var table = $('#data-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('back.contacts.leads')); ?>",
        dom: 'lBrtip',
        buttons: [
            {
                text: 'BluckDelete',
                action: function ( e, dt, node, config ) {
                    if(confirm('Do you want delete these items?')){
                        checkboxIds = [];
                        $(".select").each(function () {
                            var checkbox = $(this);
                            if(checkbox.prop('checked')==true){
                                var checkboxId = checkbox.data("id"); // Get the value of the data-id attribute
                                checkboxIds.push(checkboxId);
                            }
                        });
                        $.ajax({
                            url: "<?php echo e(route('bluck.leads.delete')); ?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            'checkboxIds':checkboxIds},
                            success: function(data) {
                                $('.all_select').prop('checked',false);
                                if(data.status){
                                    $('.alert-success').removeClass('d-none');
                                    $('#data-table').DataTable().ajax.reload();
                                }else{
                                    alert(data.msg);
                                }
                            }
                        });
                    }
                }
            }
        ],
        columns: [
            {data: 'id',render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data:'checkbox',orderable: false, searchable: false},
            {data: 'name',name:'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'whatsapp', name: 'whatsapp'},
            {data: 'country_city', name: 'country_city', orderable: false, searchable: false},
            {data: 'message', name: 'message', orderable: false, searchable: false},
        ]
    });
  });

 function deleteuseractivity($id){
  $.ajax({
        url: "<?php echo e(route('back.activity.delete')); ?>",
        type: 'post',
        dataType: 'json',
        data: {method: '_DELETE',
        "_token": "<?php echo e(csrf_token()); ?>",
        'visitor_details_id':$id,
         submit: true},
         success: function(data) {
            $('.data-table').DataTable().ajax.reload();
    }
    }).always(function (data) {
        $('#news-table').DataTable().draw(false);
    });
 }
function view_cart_checkout($id){

    $.ajax({
        url: "<?php echo e(route('back.cart.checkout')); ?>",
        type: 'post',
        dataType: 'json',
        data: {
        "_token": "<?php echo e(csrf_token()); ?>",
        'visitor_details_id':$id,
         submit: true},
         success: function(data) {
             if(data==1){
                 var myPopup = window.open("<?php echo e(route('front.cart')); ?>");
                 return  myPopup.doStuffOnPopup;
                }
                console.log(data);
         }

         });
}


</script>
<script type="text/javascript">
$('.all_select').click(function(){
   if($(this).prop('checked') == true){
       $('.select').prop('checked',true);
    }else{
        $('.select').prop('checked',false);
   }
})
    $(function () {
        $("#btnSubmit").click(function () {
            $("#MyPopup").modal("show")

            $("#btnClosePopup").click(function () {
            $("#MyPopup").modal("hide");
        });

        });

    });

    function btndeleteePopup(){

    $.ajax({
        url: "<?php echo e(route('back.date.waise.delete')); ?>",
        type: 'post',
        // dataType: 'json',
        data: {
        "_token": "<?php echo e(csrf_token()); ?>",
        'from_date': ($('#start_date').val()),
        'to_date': ($('#end_date').val()),
         submit: true},
         success: function(data) {
            if(data.date_validetion){

                    $('#date_validetion').text(data.date_validetion);
                    $("#MyPopup").modal("hide");

            }
            if(data.record_delete){

            $('#date_validetion').text(data.record_delete);
            $("#MyPopup").modal("hide");

            }


            if(data==1){
                  var myPopup = window.open("<?php echo e(route('front.cart')); ?>");
                  return  myPopup.doStuffOnPopup;
            }
            $('.data-table').DataTable().ajax.reload();
         }
        //  error: function(errors){
        //     console.log(errors);
        //     },

         });
    }

</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/back/contactsLeads/index.blade.php ENDPATH**/ ?>
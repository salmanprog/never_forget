$(document).on('change','#status',function(e) {
    select = $(this);
    selectedOption = select.find( "option[value=" + select.val() + "]" );
    var status =  selectedOption.val();
    var search = $('#search').val();
    var product_id = $('#product_id').val();
    var medium_id = $('#medium_id').val();
    var pageurl = $('#page_url').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, product_id, medium_id);
});
$('#search').keyup((function(e) {
    var search = $(this).val();
    var status = $('#status').val();
    var pageurl = $('#page_url').val();
    var product_id = $('#product_id').val();
    var medium_id = $('#medium_id').val();
    var page = 1;
    fetchAll(pageurl, page, search, status, product_id, medium_id);
}));

$(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    var search = $('#search').val();
    var status = $('#status').val();
    var product_id = $('#product_id').val();
    var medium_id = $('#medium_id').val();
    var pageurl = $('#page_url').val();
    var page = $(this).attr('href').split('page=')[1];
    fetchAll(pageurl, page, search, status, product_id, medium_id);
});

function fetchAll(pageurl, page, search, status,product_id="null",medium_id="null"){
    $.ajax({
        url:pageurl+'?page='+page+'&search='+search+'&status='+status+'&product_id='+product_id+'&medium_id='+medium_id,
        type: 'get',
        success: function(response){
            $('#body').html(response);
        }
    });
}

//delete record
$('.delete').on('click', function(){
    var slug = $(this).attr('data-slug');
    var delete_url = $(this).attr('data-del-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : delete_url,
                type : 'DELETE',
                success : function(response){
                    if(response){
                        $('#id-'+slug).hide();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Not Deleted!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    })
});

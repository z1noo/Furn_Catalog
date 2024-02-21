<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btn-like, .btn-unlike').on('click', function () {
    var button = $(this);
    var produkId = button.attr('data-produk-id');
    var action = button.hasClass('btn-like') ? 'like' : 'unlike';

    // Send the AJAX request to like or unlike the product
    $.ajax({
        type: 'POST',
        url: `{{ route('like.store', ':produkId') }}`.replace(':produkId', produkId),
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                var jumlahLikeElement = $('.jumlah-like[data-produk-id="' + produkId + '"]');
                jumlahLikeElement.text(data.jumlah_like);

                // Toggle between "Like" and "Unlike" buttons
                if (action === 'like') {
                    button.removeClass('btn-like').addClass('btn-unlike').text('Unlike');
                } else {
                    button.removeClass('btn-unlike').addClass('btn-like').text('Like');
                }
            }
        }
    });
});

$('.add-comment-form').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);
        var produkId = form.attr('data-produk-id');
        var comment = form.find('textarea[name="komentar"]').val();

        // Send the AJAX request to submit the comment
        $.ajax({
            type: 'POST',
            url: `{{ route('comment.store', ['produk_id' => ':produkId']) }}`.replace(':produkId', produkId),
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'produk_id': produkId,
                'komentar': comment
            },
            dataType: 'json',
            success: function(data) {
                if (data.success) {
            // Append the new comment to the comments section
            var commentSection = form.siblings('.comments'); // Find comments container
            var newComment = '<p>' + data.user_name + ': ' + comment + '</p>'; // Include the username
            commentSection.append(newComment);

            // Clear the input field
            form.find('textarea[name="komentar"]').val('');
                }
            }
        });
    });


});

function openModal(modalId, title, imagePath) {
        document.getElementById(modalId).classList.add('active');
        document.getElementById('modalTitle').innerHTML = title;
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }

</script>
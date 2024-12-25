<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 3/12/2023
 * Time: 5:33 PM
 */
?>

@push('scripts')
    <!-- Date range picker -->
    <script type="text/javascript">
        // var date = new Date();
        $(function() {

            $("#branch_id").on('change', function(e) {
                e.preventDefault();
                var url = "{{ route('search.branch-wise-class') }}";
                var id = $(this).val();

                var form_data = {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                };
                $.ajax({
                    type: 'POST',
                    url: url, // the url where we want to POST
                    data: form_data,
                    dataType: 'json',
                    encode: true
                }).done(function(data) {
                    console.log(data);
                    if (data.status == "success") {
                        var html = "<option value=''>Select Class </option>";

                        $.each(data.modals, function(key, value) {
                            html += `<option  value=${key}>${value}</option>`;
                        });

                        $('#class_id').html(html);
                    }
                });
            });


            $("#class_id").on('change', function(e) {
                e.preventDefault();
                var url = "{{ route('search.class-wise-subject') }}";
                var id = $(this).val();

                var form_data = {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                };
                $.ajax({
                    type: 'POST',
                    url: url, // the url where we want to POST
                    data: form_data,
                    dataType: 'json',
                    encode: true
                }).done(function(data) {
                    console.log(data);

                    if (data.status == "success") {
                        var html = '<div class="custom-controls-stacked">';

                        $.each(data.modals, function(key, value) {
                            html += '<label class="custom-control custom-checkbox">' +
                                '<input type="checkbox" class="custom-control-input" name="subjects[]" value="' +
                                key + '">' +
                                '<span class="custom-control-label">' + value + '</span>' +
                                '</label>';
                        });

                        $('#subject_id').html(html + "</div>");
                    }
                });
            });
            $('#class_id').on('change', function() {
                let url = "{{ route('business_admin.class_section') }}";
                let form_data = {
                    '_token': "{{ csrf_token() }}",
                    'id': $(this).val()
                };
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form_data,
                    success: function(res) {
                        option = "<option value=''>Select</option>";
                        $('#section_id').removeAttr('required');
                        if (res.length > 0) {
                            $.each(res, function(i, el) {
                                option +=
                                    `<option value='${el.section.id}'>${el.section.section_name}</option>`;
                            })
                            $('#section_id').attr('required', true);
                        }
                        $('#section_id').html(option);
                    }
                })
            })

        });
    </script>
@endpush

 <script type="text/javascript">
    $(document).ready(function() {
        $('#article-content').summernote({
          height: 300
        });
    });

    $('#tag_list').select2({
        placeholder: 'Enter a tag',
        ajax: {
            dataType: 'json',
            url: '{{ url("admin/tag/api") }}',
            delay: 400,
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data, page) {
              return {
                results: data
              };
            },
        }
    });

    $('#category_list').select2({
        placeholder: 'Enter a category',
        ajax: {
            dataType: 'json',
            url: '{{ url("admin/category/api") }}',
            delay: 400,
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data, page) {
              return {
                results: data
              };
            },
        }
    });
</script>
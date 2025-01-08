<script src="{{ asset('js/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
    height: 400,
    plugins: [
      "advlist autolink anchor charmap codesample emoticons hr image link lists media searchreplace table visualblocks wordcount",
      "hr insertdatetime nonbreaking pagebreak print preview responsivefilemanager code",
      "contextmenu directionality textcolor"
    ],
    toolbar: [
      'undo redo | blocks | styleselect | bold italic | alignleft aligncenter alignright | lineheight | forecolor backcolor',
      'indent outdent | bullist numlist | code | table | link unlink anchor image media | emoticons charmap | removeformat | print preview'
    ].join(' | '),
    toolbar_mode: 'floating'
  });

  $('#lfm').filemanager('image');
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <div class="mb-3">
        <label class="form-label" for="image">Image</label><br>
        <input type="hidden" id="image" class="form-control" name="image">
        <div class="input-group" style="position: relative; display: inline-block; width: 100px;">
            <img id="img" class="btn-image rounded-1" src="{{ asset('./storage/default.jpg') }}" width="100px"
                alt="Image">
            <button id="lfm" data-input="thumbnail" data-preview="holder" type="button"
                class="btn btn-light btn-image" id="choose-button"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0, 0, 0, 0.4); border: none; color: white; font-weight: bold; text-align: center;">
                Choose
            </button>
        </div>
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <input id="thumbnail" class="form-control" type="text" name="filepath">
    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script> --}}
    
<!-- dependencies (Summernote depends on Bootstrap & jQuery) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

<!-- markup -->
<textarea id="summernote-editor" name="content"></textarea>

<!-- summernote config -->
<script>
  $(document).ready(function(){

    // Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote-editor').summernote({
      toolbar: [
        ['popovers', ['lfm']],
      ],
      buttons: {
        lfm: LFMButton
      }
    })
  });
</script>


</body>

</html>

<label for="">{{ $title }}</label>
<div class="imageUpload">
    <div class="previewThumbnail" style="width: 100%;">
        <img id="{{ $name }}" class="imgPreview"
            onclick="selectFileWithCKFinder('{{ $action }}', '{{ $name }}')"
            src="{{ $images != '' ? url($images) : URL::asset('./storage/default.jpg') }}"
            width="100px" />
        <input type="hidden" name="{{ $name }}" id="{{ $action }}" class="inputImg"
            value="{{ $images != '' ? $images : '' }}" />
        <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm btn-close"
            onclick="removeFileWithCKFinder('{{ $action }}', '{{ $name }}')"><i class="ti ti-x"></i></a>
    </div>
    <a href="javascript:void(0)"
       onclick="selectFileWithCKFinder('{{ $action }}', '{{ $name }}')"
       class="btnAddImage">Chọn ảnh</a>
</div>
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>
    CKFinder.config({
        connectorPath: '/ckfinder/connector'
    });
</script>
<script>
    function selectFileWithCKFinder(elementId, previewSrc) {
        CKFinder.modal({
            chooseFiles: true,
            width: 1300,
            height: 700,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById(elementId);
                    output.value = file.getUrl();

                    var pr = document.getElementById(previewSrc);
                    pr.src = file.getUrl();
                });
                finder.on('file:choose:resizedImage', function(evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });

        $('.btn-close').show();
    }

    //remove images
    function removeFileWithCKFinder(elementId, previewSrc) {
        var output = document.getElementById(elementId);
        output.value = "";
        var pr = document.getElementById(previewSrc);
        pr.src = '{{ URL::asset('admin/img/placeholder.png') }}';
    }

    //remove images
    function removeFileWithCKFinder2(elementId, previewSrc) {
        var $class = document.getElementsByClassName(elementId);
        var output = document.getElementById(elementId);
        output.value = "";
        var pr = document.getElementById(previewSrc);
        pr.src = '{{ URL::asset('admin/img/placeholder.png') }}';
        $class[0].remove();
    }
</script>

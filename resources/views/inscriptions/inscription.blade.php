@extends('layouts.app')

@section('content')
<script type="text/javascript">
        var reader = new FileReader();

        function readFileAsString(files) {
            if (files.length === 0) {
                console.log('No se ha seleccionado algún archivo!!');
                return;
            }

            reader.readAsText(files[0]);
            //reader.onload;
            reader.onload = function(event) {
                console.log('...Carga completada');
                //console.log('File content:', event.target.result);
            };
        }
</script>
<div class = "container">
<h4>Add file</h4>
<input type="file" id="upload" onchange="readFileAsString(this.files)">
</div>
@endsection
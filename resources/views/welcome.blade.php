<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FB Downloader</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color: #000000d6;">

    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-2" style="margin-top: 40px;">
                <div id="divVideo" class="embed-responsive embed-responsive-16by9">
                    <video controls>
                        <source id="video_source" class="embed-responsive-item" src="" allowfullscreen>
                    </video>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-2" style="margin-top: 60px;">
                <div class="card" style="box-shadow: inset 0 0 10px #000000;">
                    <div class="card-header">
                        Facebook Video Download
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="video_url" class="form-control" name="video_url" value="" placeholder="Fill FB video url" />
                        </div>
                        <button class="btn btn-sm btn-primary btn-block" id="download_button">Download</button>
                        <div id="spinner" class="spinner-border offset-5 text-primary"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#spinner').hide();        
            $('#divVideo').hide();
        });

        $('#download_button').click(function() {
            var video_url = $('#video_url').val();
            if (video_url) {
                $.ajax({
                    url: "{{route('video_link')}}",
                    method: 'get',
                    data: {
                        video_url: video_url,
                    },
                    beforeSend: function(result) {
                        $('#spinner').show();
                        $('#download_button').hide();
                    },
                    success: function(result) {
                        console.log(result);
                        if (result.hdlink) {
                            $('#divVideo video source').attr('src', result.hdlink);
                        } else {
                            $('#divVideo video source').attr('src', result.sdlink);
                        }
                        $("#divVideo video")[0].load();

                        $('#spinner').hide();
                        $('#divVideo').show();
                        $('#download_button').show();
                    }
                });
            }
        });
    </script>

</body>

</html>
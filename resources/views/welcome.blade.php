<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FB Downloader</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body style="background-color: #3e3a0e;">

    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-2" style="margin-top: 170px;">
                <div class="card" style="box-shadow: inset 0 0 10px #000000;">
                    <div class="card-header">
                        Facebook Video Download
                    </div>
                    <div class="card-body">
                        <form action="{{route('video_link')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="video_url" value="" placeholder="Fill FB video url" />
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
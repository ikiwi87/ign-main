<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Hello</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<body>
    @include('msg')
    <div class="about-banner">
    </div>
    <div class="contact-background">
        <div class="contactussec">
            <div class="container">
                <div class="col-md-10">
                    <div class="contactformsec clearfix">
                        <form action="{{route('sending_email')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label>Email Address</label>
                            {{-- <input type="email" class="form-control" name="email"> --}}
                            <textarea rows="10" name="email" cols="50"></textarea>
                            <input type="file" name="file" class="form-control">
                            <input type="submit" name="submit" value="Submit" class="submit-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
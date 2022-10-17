<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Centum-D. Link shortener</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center align-items-center">
        <div class="col col-lg-5">
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{route('links.create')}}" method="post">
                        @csrf
                        @if(session()->has('success_short_link'))
                            <div class="alert alert-success alert-dismissible mb-2 fade show" role="alert">
                                <strong>Link was successfully created!</strong> <a href="{{session()->get('success_short_link')}}" class="link-success" target="_blank">{{session()->get('success_short_link')}}</a>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible mb-2 fade show" role="alert">
                                    <strong>Validation error!</strong> {{$error}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <div class="mb-3">
                            <label for="inputLink" class="form-label">Original Url</label>
                            <input name='url' type="url" class="form-control" id="inputLink" required>
                            <div id="linkHelp" class="form-text">Please enter original link for shortening. Must be valid URL</div>
                        </div>
                        <div class="mb-3">
                            <label for="inputDate" class="form-label">Lifetime</label>
                            <input name="lifetime" type="number" min="1" max="24" value="24" class="form-control" id="inputDate"
                                   required>
                            <div id="dateHelp" class="form-text">Please enter the lifetime of the link in hours. The maximum lifetime of a link is 24 hours.</div>
                        </div>
                        <div class="mb-3">
                            <label for="inputCounter" class="form-label">Max numbers of enters</label>
                            <input name="max_count" type="number" min="0" max="2147483647" value="0" class="form-control"
                                   id="inputCounter" required>
                            <div id="counterHelp" class="form-text">Please enter the maximum number of clicks on the link. 0 - unlimited number of clicks</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
